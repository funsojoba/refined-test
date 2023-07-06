<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['exam_id']); // Drop the foreign key constraint
            $table->dropColumn('exam_id'); // Drop the existing exam_id column

            $table->string('exam_id'); // Add the new exam_id column as string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('exam_id'); // Drop the exam_id column

            $table->unsignedBigInteger('exam_id'); // Add the exam_id column as unsigned big integer again
            $table->foreign('exam_id')->references('id')->on('exams');
        });
    }
};

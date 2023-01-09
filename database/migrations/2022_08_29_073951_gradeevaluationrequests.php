<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Gradeevaluationrequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_evaluation_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('gradelevel_id');
            $table->integer('course_id');
            $table->integer('section_id');
            $table->integer('semester_id');
            $table->integer('faculty_id');
            $table->integer('subject_id');
            $table->text('reason');
            $table->string('file');
            $table->timestamps();
            $table->tinyInteger('deleted')->nullable();
            $table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_evaluation_requests');
    }
}

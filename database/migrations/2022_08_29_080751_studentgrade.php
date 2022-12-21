<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Studentgrade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_grades', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('gradelevel_id');
            $table->integer('subject_id');
            $table->integer('faculty_id');
            $table->integer('subjectteacher_id');
            $table->integer('schoolyear_id');
            $table->integer('semester_id');
            $table->integer('midterm')->nullable();
            $table->integer('finals')->nullable();
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
        Schema::dropIfExists('student_grades'); 
    }
}

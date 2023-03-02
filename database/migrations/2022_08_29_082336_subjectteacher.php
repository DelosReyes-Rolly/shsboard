<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subjectteacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_teachers', function (Blueprint $table) {
            $table->id();
            $table->integer('faculty_id');
            $table->integer('gradelevel_id');
            $table->integer('course_id');
            $table->integer('section_id');
            $table->integer('subject_id');
            $table->integer('schoolyear_id');
            $table->integer('semester_id');
            $table->time('time_start');
            $table->time('time_end');
            $table->tinyInteger('monday')->nullable();
            $table->tinyInteger('tuesday')->nullable();
            $table->tinyInteger('wednesday')->nullable();
            $table->tinyInteger('thursday')->nullable();
            $table->tinyInteger('friday')->nullable();
            $table->tinyInteger('saturday')->nullable();
            $table->tinyInteger('isPrint')->nullable();
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
        Schema::dropIfExists('subject_teachers'); 
    }
}

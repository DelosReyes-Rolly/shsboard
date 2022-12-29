<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Advisory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisories', function (Blueprint $table) {
            $table->id();
            $table->integer('faculty_id');
            $table->integer('gradelevel_id');
            $table->integer('course_id');
            $table->integer('section_id');
            $table->integer('schoolyear_id');
            $table->integer('cardgiving')->nullable();
            $table->tinyInteger('grade_release')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('advisories'); 
    }
}

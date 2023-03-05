<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Activitystreams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_streams', function (Blueprint $table) {
            $table->id();
            $table->integer('faculty_id');
            $table->integer('gradelevel_id');
            $table->integer('course_id');
            $table->integer('section_id');
            $table->integer('subject_id');
            $table->string('what');
            $table->text('content');
            $table->date('expired_at')->nullable();
            $table->time('whn_time');
            $table->integer('status');
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
        Schema::dropIfExists('activity_streams'); 
    }
}

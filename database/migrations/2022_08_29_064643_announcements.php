<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Announcements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->integer('faculty_id')->comment('0 - admin')->nullable();
            $table->string('image')->nullable();
            $table->string('what')->nullable();
            $table->string('who')->nullable();
            $table->date('whn');
            $table->time('whn_time')->nullable();
            $table->string('whr')->nullable();
            $table->text('content');
            $table->integer('approval')->comment('1 - pending, 2 - approved, 3 - rejected')->nullable();
            $table->integer('status')->comment('1 - active, 2 - expired');
            $table->integer('privacy')->comment('1 - public, 2 - private')->nullable();
            $table->date('expired_at');
            $table->dateTime('approved_at')->nullable();
            $table->integer('is_event')->comment('NULL - announcement, 1 - event, 2 - reminder')->nullable();
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
        Schema::dropIfExists('announcements');
    }
}

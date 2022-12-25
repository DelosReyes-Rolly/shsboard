<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('address_id');
            $table->integer('course_id');
            $table->integer('section_id');
            $table->string('LRN');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->integer('gradelevel_id');
            $table->string('username')->nullable();
            $table->string('password');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('gender');
            $table->integer('status')->default('1')->comment('1 - active, 2 - alumni, 3 - dropped');
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
        Schema::dropIfExists('students'); 
    }
}

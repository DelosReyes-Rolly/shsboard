<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Registrants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrants', function (Blueprint $table) {
            $table->id();
            $table->integer('schoolyear_id');
            $table->integer('gradelevel_id');
            $table->integer('isReturning');
            $table->integer('isLearners');
            $table->string('LRN')->nullable();
            $table->string('PSA_number')->nullable();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('suffix')->nullable();
            $table->date('birth_date');
            $table->tinyInteger('sex');
            $table->integer('age');
            $table->string('isIndigenous')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('street');
            $table->string('barangay');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('father_last_name');
            $table->string('father_first_name');
            $table->string('father_middle_name')->nullable();
            $table->string('father_suffix')->nullable();
            $table->string('mother_last_name');
            $table->string('mother_first_name');
            $table->string('mother_middle_name')->nullable();
            $table->string('mother_suffix')->nullable();
            $table->string('guardian_last_name');
            $table->string('guardian_first_name');
            $table->string('guardian_middle_name')->nullable();
            $table->string('guardian_suffix')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('cellphone_number')->nullable();
            $table->integer('last_grade_level');
            $table->integer('last_school_year');
            $table->string('school_name');
            $table->string('school_address');
            $table->integer('semester_id');
            $table->string('track');
            $table->string('strand');
            $table->integer('modality');
            $table->string('email');
            $table->string('password');
            $table->string('signature');
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
        Schema::dropIfExists('registrants'); 
    }
}

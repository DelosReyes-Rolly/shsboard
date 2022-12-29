<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Documentrequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('document_id');
            $table->integer('purpose_id');
            $table->integer('gradelevel_id');
            $table->string('file');
            $table->integer('status')->comment('1 - Pending, 2 - On Process, 3 - For Collection, 4 - Completed, 5 - Denied, 6 - For follow-up')->nullable();
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
        Schema::dropIfExists('document_requests');
    }
}

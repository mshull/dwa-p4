<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalCaseNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_case_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('heading')->nullable();
            $table->text('value')->nullable();
            $table->timestamps();

            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('legal_case_id')->unsigned()->nullable();

            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('legal_case_id')->references('id')->on('legal_cases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('legal_case_notes');
    }
}

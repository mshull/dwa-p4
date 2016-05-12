<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('external_id');
            $table->string('defendant')->nullable();
            $table->string('calls')->nullable();
            $table->dateTime('next_deadline')->nullable();
            $table->timestamps();

            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('legal_case_type_id')->unsigned()->nullable();
            $table->integer('legal_case_status_id')->unsigned()->nullable();

            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('legal_case_type_id')->references('id')->on('legal_case_types');
            $table->foreign('legal_case_status_id')->references('id')->on('legal_case_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('legal_cases');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalCaseActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_case_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', array('task', 'reminder'));
            $table->enum('status', array('pending', 'in_progress', 'complete'));
            $table->string('heading')->nullable();
            $table->text('value')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->timestamps();

            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('legal_case_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('legal_case_actions');
    }
}

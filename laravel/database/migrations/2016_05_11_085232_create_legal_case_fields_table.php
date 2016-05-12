<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalCaseFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legal_case_fields', function (Blueprint $table) {
            $table->text('value')->nullable();
            $table->timestamps();

            $table->integer('legal_case_id')->unsigned()->nullable();
            $table->integer('legal_case_field_name_id')->unsigned()->nullable();

            $table->foreign('legal_case_id')->references('id')->on('legal_cases');
            $table->foreign('legal_case_field_name_id')->references('id')->on('legal_case_field_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('legal_case_fields');
    }
}

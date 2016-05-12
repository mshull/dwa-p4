<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('home_phone');
            $table->string('work_phone');
            $table->string('mobile_phone');
            $table->string('emergency_phone');
            $table->string('address');
            $table->string('address_more');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('email');
            $table->string('birth_year');
            $table->timestamps();

            $table->integer('contact_type_id')->unsigned()->nullable();
            $table->foreign('contact_type_id')->references('id')->on('contact_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}

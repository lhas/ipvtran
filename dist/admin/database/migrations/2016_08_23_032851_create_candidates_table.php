<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('certification_attachment');
            $table->string('name');
            $table->string('sex');
            $table->string('cpf');
            $table->string('rg');
            $table->string('date_of_birth');
            $table->string('orgao_expedidor');
            $table->string('mom_name');
            $table->string('address');
            $table->string('address_num');
            $table->string('address_complement');
            $table->string('address_neighbourhood');
            $table->string('address_cep');
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('nr_cnh');
            $table->string('category');
            $table->string('email');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('candidates');
    }
}

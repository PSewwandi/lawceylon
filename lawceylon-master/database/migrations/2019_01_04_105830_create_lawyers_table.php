<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('honorific',50);
            $table->string('firstName',30);
            $table->string('lastName',30);
            $table->string('gender',10);
            $table->string('Email',30);
            $table->string('NIC_passportNumber',20);
            $table->string('password',256);
            $table->string('Specialist_Area',30);
            $table->string('Experience_Period',2);
            $table->string('Address',100);
            $table->string('TP_Number',10);//changed
            $table->string('biography',100);
            $table->string('barnumber',10);
            $table->string('consultationFee',10);
            $table->string('image',256);
            // $table->tinyInteger('checked',1);
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
        Schema::dropIfExists('lawyers');
    }
}

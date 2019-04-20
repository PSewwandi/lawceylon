<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminmessagelawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminmessagelawyers', function (Blueprint $table) {
            $table->increments('m_id');
            $table->string('l_name',50);
            $table->integer('lawyer_id',6)->unsigned();
            $table->string('email',60);
            $table->text('message');
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
        Schema::dropIfExists('adminmessagelawyer');
    }
}

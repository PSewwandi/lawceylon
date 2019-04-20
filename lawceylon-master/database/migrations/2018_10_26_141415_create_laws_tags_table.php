<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laws_tags', function (Blueprint $table) 
        {
            $table->integer('laws_id')->unsigned()->index();
            $table->integer('lawtags_id')->unsigned()->index();
            $table->foreign('laws_id')->references('id')->on('laws')->onDelete('cascade');
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
        Schema::dropIfExists('laws_tags');
    }
}

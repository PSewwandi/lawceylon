<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laws', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',256);
            $table->string('subtitle',256);
            $table->string('slug',100);
            $table->text('body');
            $table->text('exp');
            $table->boolean('status')->nullable();
            $table->integer('posted_by')->nullable();
            $table->string('image',256)->nullable();
            $table->string('subcategory1');
            $table->string('subcategory2');
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
        Schema::dropIfExists('laws');
    }
}

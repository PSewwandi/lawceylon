<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawcategoryLawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawcategory_laws', function (Blueprint $table)
        {
            $table->integer('laws_id')->unsigned()->index();
            $table->integer('lawcategories_id')->unsigned()->index();
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
        Schema::dropIfExists('lawcategory_laws');
    }
}

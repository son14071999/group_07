<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCacdangbaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cacdangbai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ndkt')->unsigned();
            $table->foreign('id_ndkt')->references('id')->on('noidungkienthuc')->onDelete('cascade');
            $table->text('nd');
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
        Schema::dropIfExists('cacdangbai');
    }
}

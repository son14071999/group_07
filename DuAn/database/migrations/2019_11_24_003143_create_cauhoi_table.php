<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauhoiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cauhoi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_de')->unsigned();
            $table->foreign('id_de')->references('id')->on('dethi')->onDelete('cascade');
            $table->tinyInteger('doKho')->default(3);
            $table->integer('cauSo');            
            $table->string('image')->nullable();
            $table->text('nd')->nullable();
            $table->integer('id_ndkt')->unsigned();
            $table->foreign('id_ndkt')->references('id')->on('noidungkienthuc')->onDelete('cascade');
            $table->integer('id_cdb')->unsigned();
            $table->foreign('id_cdb')->references('id')->on('cacdangbai')->onDelete('cascade');
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
        Schema::dropIfExists('cauhoi');
    }
}

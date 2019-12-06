<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCautraloiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cautraloi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_cauHoi')->unsigned();
            $table->foreign('id_cauHoi')->references('id')->on('cauhoi')->onDelete('cascade');
            $table->text('nd');
            $table->string('maCTL');
            $table->tinyInteger('trangThai')->default(0);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('cautraloi');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoidungkienthucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noidungkienthuc', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('lop')->default(0);
            $table->string('mon')->nullable();
            $table->text('nd')->default('');
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
        Schema::dropIfExists('noidungkienthuc');
    }
}

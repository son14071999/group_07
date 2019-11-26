<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDethiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dethi', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->text('tenDe');
            $table->text('tenDeKhongDau');//dùng trong route
            $table->integer('id_theLoaiDe')->unsigned();
            $table->foreign('id_theLoaiDe')->references('id')->on('theloaide');
            $table->string('mon')->default('');
            $table->tinyInteger('lop')->defaule(0);
            $table->tinyInteger('kieuDe')->default(0);//0->đề random; 1->đề có sẵn
            $table->integer('soNguoiLam')->default(0);//số người đã làm đề và ấn submit( chỉ tính với đề có sắn(kieude=1))
            $table->tinyInteger('doKho')->default(3);//{0:rất dễ; 1:dễ; 2: trung bình; 3: khó; 4:rất khó}
            $table->integer('thoiGian'); 
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
        Schema::dropIfExists('dethi');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barang', function (Blueprint $table) {
            $table->string('barang_id',20)->primary();
            $table->string('grosir_id',20);
            $table->string('barang_nama',200)->nullable();
            $table->integer('barang_total')->nullable();
            $table->string('barang_unit',50)->nullable();
            $table->double('barang_price',10)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('grosir_id')->references('grosir_id')->on('tb_grosir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_barang');

    }
}

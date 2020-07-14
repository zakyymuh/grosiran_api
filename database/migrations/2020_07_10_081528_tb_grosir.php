<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbGrosir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_grosir', function (Blueprint $table) {
            $table->string('grosir_id',20)->primary();
            $table->string('grosir_name',200)->nullable();
            $table->string('grosir_address',100)->unique()->nullable();
            $table->string('grosir_username',100)->nullable();
            $table->string('grosir_password',60)->nullable();
            $table->string('status',1)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_grosir');
    }
}

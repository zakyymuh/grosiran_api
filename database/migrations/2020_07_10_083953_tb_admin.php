<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_admin', function (Blueprint $table) {
            $table->string('admin_id',20)->primary();
            $table->string('admin_name',200)->nullable();
            $table->string('admin_email',100)->unique()->nullable();
            $table->string('admin_username',100)->nullable();
            $table->string('admin_password',60)->nullable();
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
        Schema::dropIfExists('tb_admin');
    }
}

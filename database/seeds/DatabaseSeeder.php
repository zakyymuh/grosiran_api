<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('seed_tb_grosir');
        $this->call('seed_tb_admin');
        $this->call('seed_tb_pembeli');
        $this->call('seed_tb_barang');
    }
}

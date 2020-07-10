<?php

use Illuminate\Database\Seeder;

class seed_tb_barang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'barang_id' => 1,
                'grosir_id' => 1,
                'barang_nama' => 'Royco Cap Badak',
                'barang_total' => 50,
                'barang_unit' => 'Sachet',
                'barang_price' => 20000,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ], [
                'barang_id' => 2,
                'grosir_id' => 1,
                'barang_nama' => 'Rinso Cap Bala-bala',
                'barang_total' => 1000,
                'barang_unit' => 'Pack',
                'barang_price' => 30000,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
        ];

        DB::table('tb_barang')->insert($arr);
    }
}

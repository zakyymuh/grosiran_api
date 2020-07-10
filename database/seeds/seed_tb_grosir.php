<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class seed_tb_grosir extends Seeder
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
                'grosir_id' => 1,
                'grosir_name' => 'first Grosir',
                'grosir_address' => 'Masih gada tempat',
                'grosir_username' => 'firstGros',
                'grosir_password' => Hash::make('Grossfirst'),
                'status' => 'A',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'last_login' => date('Y-m-d h:i:s'),
            ],
            [
                'grosir_id' => 2,
                'grosir_name' => 'second Grosir',
                'grosir_address' => 'Masih di tempat dulu',
                'grosir_username' => 'secondGros',
                'grosir_password' => Hash::make('GrossSecond'),
                'status' => 'P',
                'created_at' =>date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'last_login' => date('Y-m-d h:i:s'),
            ],
        ];

        DB::table('tb_grosir')->insert($arr);
    }
}

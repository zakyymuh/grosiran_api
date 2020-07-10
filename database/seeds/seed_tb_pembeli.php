<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class seed_tb_pembeli extends Seeder
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
                'pembeli_id' => 1,
                'pembeli_name' => 'first Buyer',
                'pembeli_address' => "di rumah korona",
                'pembeli_username' => "firstBuyer",
                'pembeli_password' => Hash::make('BuyFirst'),
                'status' => 'A',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'last_login' => date('Y-m-d h:i:s'),
            ],
            [
                'pembeli_id' => 2,
                'pembeli_name' => "second Buyer",
                'pembeli_address' => "samping rumah A",
                'pembeli_username' => 'secondBuyer',
                'pembeli_password' => Hash::make('BuySecond'),
                'status' => 'P',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'last_login' => date('Y-m-d h:i:s'),
            ],
        ];

        DB::table('tb_pembeli')->insert($arr);
    }
}

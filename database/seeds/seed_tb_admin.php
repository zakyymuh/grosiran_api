<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class seed_tb_admin extends Seeder
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
                'admin_id' => 1,
                'admin_name' => 'first Admin',
                'admin_email' => 'admin@gmail.com',
                'admin_username' => 'adminGross',
                'admin_password' => Hash::make('goAdmin'),
                'status' => 'A',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
                'last_login' => date('Y-m-d h:i:s'),
            ],
        ];

        DB::table('tb_admin')->insert($arr);
    }
}

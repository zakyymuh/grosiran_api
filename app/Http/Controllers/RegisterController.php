<?php
/**
 * Created by PhpStorm.
 * User: Zaky
 * Date: 13/07/2020
 * Time: 19:21
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Pembeli;


class RegisterController
{
    public function pembeli(Request $request)
    {
        $password = $request->input('pembeli_password');
        $result = Pembeli::create([
            'pembeli_id' => $request->input('pembeli_id'),
            'pembeli_name' => $request->input('pembeli_name'),
            'pembeli_username' => $request->input('pembeli_username'),
            'pembeli_password' => Hash::make($password),
        ]);
        if ($result){
            $data = [
                'status' => "00",
                'msg' => "success",
            ];
        } else {
            $data = [
                'status' => "01",
                'msg' => "failed",
            ];
        }
        return $data;
    }
}
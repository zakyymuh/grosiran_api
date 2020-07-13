<?php

namespace App\Http\Controllers;
use App\Grosir;
use App\Pembeli;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function loginAdmin(Request $request){
        $username = $request->input('admin_username');
        $password = $request->input('admin_password');

        $resultUsername = Admin::where("admin_username", $username)->first();
        if(!$resultUsername) {
            $data = [
                "status" => "03",
                "msg" => "User not found",
            ];
            return $data;
        }
        if (Hash::check($password, $resultUsername->admin_password)) {
            $newtoken  = $this->_generateRandomString();

            $resultUsername->update([
                'token' => $newtoken,
                'last_login' => date('Y-m-d h:i:s'),
            ]);

            return $data = [
                "status" => "00",
                "message" => "success",
                "token" => $newtoken,
            ];

        } else {
            return $data = [
                "status" => "01",
                "msg" => "failed, Username and password tidak sesuai",
            ];
        }

    }
    public function loginGrosir(Request $request){
        $username = $request->input('grosir_username');
        $password = $request->input('grosir_password');

        $resultUsername = Grosir::where("grosir_username", $username)->first();
        if(!$resultUsername) {
            $data = [
                "status" => "03",
                "msg" => "User not found",
            ];
            return $data;
        }
        if (Hash::check($password, $resultUsername->grosir_password)) {
            $newtoken  = $this->_generateRandomString();

            $resultUsername->update([
                'token' => $newtoken,
                'last_login' => date('Y-m-d h:i:s'),
            ]);

            return $data = [
                "status" => "00",
                "message" => "success",
                "token" => $newtoken,
            ];

        } else {
            return $data = [
                "status" => "01",
                "msg" => "failed, Username and password tidak sesuai",
            ];
        }

    }
    public function loginPembeli(Request $request){
        $username = $request->input('pembeli_username');
        $password = $request->input('pembeli_password');

        $resultUsername = Pembeli::where("pembeli_username", $username)->first();
        if(!$resultUsername) {
            $data = [
                "status" => "03",
                "msg" => "User not found",
            ];
            return $data;
        }
        if (Hash::check($password, $resultUsername->pembeli_password)) {
            $newtoken  = $this->_generateRandomString();

            $resultUsername->update([
                'token' => $newtoken,
                'last_login' => date('Y-m-d h:i:s'),
            ]);

            return $data = [
                "status" => "00",
                "message" => "success",
                "token" => $newtoken,
            ];

        } else {
            return $data = [
                "status" => "01",
                "msg" => "failed, Username and password tidak sesuai",
            ];
        }

    }

    private function _generateRandomString(){
        $karakkter = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $length = strlen($karakkter);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $karakkter[rand(0, $length - 1)];
        }
        return $str;
    }
}

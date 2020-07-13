<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Pembeli;
use App\Barang;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembeliController extends Controller
{
    use SoftDeletes;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("authPembeli");
    }
    public function index(Request $request){
        $token  = $request->token;
        $result = Pembeli::where('token',$token)->get()->first();
        return $result;
    }
    public function showAllBarang(){
        return Barang::all();
    }
    public function showAll(){
        return Pembeli::all();
    }
    public function store(Request $request)
    {
        return Pembeli::create([
            'pembeli_id' => $request->input('pembeli_id'),
            'pembeli_name' => $request->input('pembeli_name'),
        ]);
    }
    public function remove(Request $request){
        $id = $request->input('pembeli_id');
        $result = Pembeli::destroy($id);
        if($result){
            $data = [
                'status' => '1',
                'msg' => 'Success',
            ];
        }else{
            $data = [
                'status' => '0',
                'msg' => 'failed',
            ];
        }
        return $data;
    }
    public function update(Request $request){
        $id = $request->input('pembeli_id');
        $findResult = Pembeli::find($id);
        if($findResult){
            $updateResult = Pembeli::where('pembeli_id', $id)->update([
                'pembeli_id' => $id,
                'pembeli_name' => $request->input('pembeli_name'),
            ]);

            if ($updateResult){
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
        }else{
            $data = [
                'status' => "03",
                'msg' => "Not found",
            ];
        }
        return $data;
    }
    public function logout(Request $request){
        $token = $request->token;
        $result = Pembeli::where("token", $token)->first();
        $result->update([
            'token' => null,
        ]);
        return $data = [
            'status' => "00",
            'msg' => "success",
        ];
    }
}

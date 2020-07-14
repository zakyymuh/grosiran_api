<?php

namespace App\Http\Controllers;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use App\Grosir;
use App\Barang;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrosirController extends Controller
{
    use SoftDeletes;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("authGrosir");
    }
    public function index(Request $request){
            $token  = $request->token;
            $result = Grosir::where('token',$token)->get()->first();
            return $result;
    }
    public function showBarang(Request $request){
        $grosir_id = $this->_getId($request->token);
        $result = Barang::where('grosir_id',$grosir_id->id)->get();
        return $result;
    }
    public function storeBarang(Request $request){

        $getDataGrosir = $this->_getId($request->token);
        $result = Barang::create([
            'grosir_id' => $getDataGrosir->id,
            'barang_id' => $request->input('barang_id'),
            'barang_name' => $request->input('barang_name'),
            'barang_price' => $request->input('barang_price'),
            'barang_total' => $request->input('barang_total'),
            'barang_unit' => $request->input('barang_unit'),
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s'),
        ]);
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
    public function testResult(Request $request){
        return $this->_getId($request->token);
    }
    private function _getId($token){
        $result = Grosir::where('token',$token)->select("grosir_id as id")->get()[0];
        return $result;
    }
    public function store(Request $request)
    {
        return Grosir::create([
            'grosir_id' => $request->input('grosir_id'),
            'grosir_name' => $request->input('grosir_name'),
        ]);
    }
    public function remove(Request $request){
        $id = $request->input('grosir_id');
        $result = Grosir::destroy($id);
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
        $id = $request->input('grosir_id');
        $findResult = Grosir::find($id);
        if($findResult){
            $updateResult = Grosir::where('grosir_id', $id)->update([
                'grosir_id' => $id,
                'grosir_name' => $request->input('grosir_name'),
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
        $result = Grosir::where("token", $token)->first();
        $result = $result->update([
            'token' => null,
        ]);
        if($result){
            return $data = [
                'status' => "00",
                'msg' => "success",
            ];
        }else{
            return $data = [
                'status' => "01",
                'msg' => "failed",
            ];
        }
    }
}

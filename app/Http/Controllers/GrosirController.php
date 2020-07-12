<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Grosir;
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
        //
    }
    public function showAll(){
        return Grosir::all();
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
}

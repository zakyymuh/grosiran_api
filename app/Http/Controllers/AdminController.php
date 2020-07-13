<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminController extends Controller
{
    use SoftDeletes;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware("authAdmin");
    }
    public function showAll(){
        return Admin::all();
    }
    public function store(Request $request)
    {
        $result = Admin::create([
            'admin_id' => $request->input('admin_id'),
            'admin_name' => $request->input('admin_name'),
        ]);
        if($result){
            $data = [
                'status' => '00',
                'msg' => 'success',
            ];
        }else{
            $data = [
                'status' => '01',
                'msg' => 'failed',
            ];
        }
        return $data;
    }
    public function remove(Request $request){
        $id = $request->input('admin_id');
        $result = Admin::destroy($id);
        if($result){
            $data = [
                'status' => '00',
                'msg' => 'success',
            ];
        }else{
            $data = [
                'status' => '01',
                'msg' => 'failed',
            ];
        }
        return $data;
    }
    public function update(Request $request){
        $id = $request->input('admin_id');
        $findResult = Admin::find($id);
        if($findResult){
            $updateResult = Admin::where('admin_id', $id)->update([
                'admin_id' => $id,
                'admin_name' => $request->input('admin_name'),
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
        $result = Admin::where("token", $token)->first();
        $result->update([
            'token' => null,
        ]);
        return $data = [
            'status' => "00",
            'msg' => "success",
        ];
    }
}

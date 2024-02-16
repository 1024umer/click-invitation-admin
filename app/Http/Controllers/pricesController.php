<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class pricesController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $data= DB::table('datas')->get();
        return view('prices',['data'=>$data]);       
        }
        return redirect('/login');
    }
    public function pricesUpdate(request $req)
    {
        $arr=[
            'id_data'=>$req->id_data,
            'subusa1'=>$req->subusa1,
            'tpsusa1'=>$req->tpsusa1,
            'tvqusa1'=>$req->tvqusa1,
            'subusa2'=>$req->subusa2,
            'tpsusa2'=>$req->tpsusa2,
            'tvqusa2'=>$req->tvqusa2,
            
            'subcan1'=>$req->subcan1,
            'tpscan1'=>$req->tpscan1,
            'tvqcan1'=>$req->tvqcan1,
            'subcan2'=>$req->subcan2,
            'tpscan2'=>$req->tpscan2,
            'tvqcan2'=>$req->tvqcan2,
        ];
        DB::table('datas')->where(['id_data'=>$req->id_data])->update($arr);
        return redirect('prices');
    }
}

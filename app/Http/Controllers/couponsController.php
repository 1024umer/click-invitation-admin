<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class couponsController extends Controller
{
    public function index(request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $data= DB::table('coupon')->get();
        $usersdata= DB::table('users')->where(['role'=> '2'])->get();
        
        return view('coupons',['data'=>$data,'usersdata'=>$usersdata]);
        }
        return redirect('/login');
    }

    public function cinsert(Request $req , $length = 5 )
    {
        $characters = 'ABCDEFGHIJKL0123456789MNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $data=[
            'id_user'=>$req->id_user,
            'coupon'=>$req->coupon,
            'code'=>$randomString,
            'type'=>$req->type,
            'discount'=>$req->discount,
            'start_date'=>$req->start_date,
            'count'=>$req->count,
            'expirydate'=>$req->expirydate,
            'start_date'=>$req->start_date,

        ];
        DB::table('coupon')->insert($data);
        return redirect('coupons');
    }

    public function cupdate(Request $req)
    {
        
        $data=[
            'id'=>$req->id,
            'status'=>$req->status,
        ];
        db::table('coupon')->where(['id'=>$req->id])->update($data);
         $data = DB::table('coupon')->where(['id'=>$req->id])->get();
            return redirect('coupon/'.$data[0]->id.'/');
    }

    public function coupondetails(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $data = DB::table('coupon')->where(['id'=>$request->codeID])->get();
        $eventsData = DB::table('events')->select('events.id_event' , 'events.name as eventName', 'events.type', 'users.name', 'users.surname')
        ->join('users', 'users.id', '=', 'events.id_user')
        ->where(['coupon_code'=> $data[0]->code])->get();
        return view('coupondetails',['data'=>$data,'eventsData'=>$eventsData]);
        }
         return redirect('/login');
    }   
}

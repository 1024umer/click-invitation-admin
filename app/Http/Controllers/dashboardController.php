<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            $usersdata =DB::table('users')->count();
            $reselersdata =DB::table('users')->where(['role'=>'2'])->count();
            $coupondata =DB::table('coupon')->where(['status'=>'1'])->count();
            $eventsdata =DB::table('events')->count();
            return view('dashboard',['coupondata'=>$coupondata,'usersdata'=>$usersdata ,'reselersdata'=>$reselersdata ,'eventsdata'=>$eventsdata ]);
        }
        return redirect('/login');
    }
}

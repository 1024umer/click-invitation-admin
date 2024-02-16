<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class usereventsController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $userData = DB::table('users')->get();
        $eventData = DB::table('events')->get();
        return view('userevents' , ['userData' => $userData , 'eventData'=>$eventData ]);
    }
    return redirect('/login');
    }
}

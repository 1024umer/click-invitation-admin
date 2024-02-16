<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class graphreportController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        return view('graphreport');
        }
        return redirect('/login');
    }
}

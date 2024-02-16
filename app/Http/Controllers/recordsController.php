<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class recordsController extends Controller
{
    public function index(request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $amountData = DB::table('amount_records')->get();
            $amountData = DB::table('amount_records')
        ->join('events', 'events.id_event', '=', 'amount_records.id_event')
        ->get();
        return view('records' , ['amountData' => $amountData]);
    }
    return redirect('/login');
    }

    public function getamountData(Request $request){
        if($request->session()->has('ADMIN_LOGIN')){
        $recordID = $request->invoiceID;
        $amountData = DB::table('amount_records')
        ->join('events', 'events.id_event', '=', 'amount_records.id_event')
        ->where(['id'=>$recordID])
        ->get();
        return view ('invoice',[ 'amountData'=>$amountData]);
    }
    return redirect('/login');
    }
}

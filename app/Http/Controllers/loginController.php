<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use Crypt;

class loginController extends Controller
{
    public function index(Request $request)
    {

        
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('dashboard');
        }else {

            return view('login');
        }
    }
    public function auth(Request $request){
        //return $request;
        $result = DB::table('users')->where(['email' => $request->email])->get(); 
        if(isset($result[0]) && password_verify($request->password, $result[0]->password) && $result[0]->admin == '1'){
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result[0]->id);
            return redirect('dashboard');
        }else {
            $request->session()->flash('error', 'Please enter valid login details');
            return redirect('login');
        }
    }
    public function logout(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            $request->session()->forget('ADMIN_LOGIN');
        }
        return redirect('/login');
    }
}
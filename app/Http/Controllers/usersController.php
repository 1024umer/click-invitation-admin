<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class usersController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $userData = DB::table('users')->where(['role'=>'1'])->get();
        return view('users' , ['userData' => $userData]);
    }
    return redirect('/login');
    }
    public function AddUserData(Request $req)
    {
        $newPass = password_hash($req->password,PASSWORD_DEFAULT);
            $updatedata = [
                'name'=> $req->name,
                'surname'=>$req->surname,
                'email'=>$req->email,
                'password'=>$newPass,
                'phone'=> $req->phone,
                'language'=>$req->language,
                'company'=>$req->company,
                'last_login'=> $req->last_login,
                'address'=>$req->address,
                'active'=>$req->active,
                'country'=> $req->country,
                'province'=>$req->province,
                'city'=>$req->city,
                'role'=>$req->role,
                'trail' => $req->trial,
                'trail_date' => $req->trial_date,
            ];
            DB::table('users')->where(['id'=> $req->id])->insert($updatedata);
            return redirect('/users');      
    }

    public function getUserData(Request $req){
        $singleUserData = DB::table('users')->where(['id' => $req->userID])->get();
        return $singleUserData;
    }

    public function updateUserData(Request $req)
        {
            $updatedata;
            if(strlen($req->password) > 0){
                $newPass = password_hash($req->password,PASSWORD_DEFAULT);
                
                $updatedata = [
                'name'=> $req->name,
                'surname'=>$req->surname,
                'email'=>$req->email,
                'password'=>$newPass,
                'phone'=> $req->phone,
                'language'=>$req->language,
                'company'=>$req->company,
                'last_login'=> $req->last_login,
                'address'=>$req->address,
                'active'=>$req->active,
                'country'=> $req->country,
                'province'=>$req->province,
                'city'=>$req->city,
                'role'=>$req->role,
                'trail' => $req->get_trial,
                'trail_date' => $req->get_trial_date,
            ];
            }else {
                $updatedata = [
                'name'=> $req->name,
                'surname'=>$req->surname,
                'email'=>$req->email,
                'phone'=> $req->phone,
                'language'=>$req->language,
                'company'=>$req->company,
                'last_login'=> $req->last_login,
                'address'=>$req->address,
                'active'=>$req->active,
                'country'=> $req->country,
                'province'=>$req->province,
                'city'=>$req->city,
                'role'=>$req->role,
                'trail' => $req->get_trial,
                'trail_date' => $req->get_trial_date,
            ];    
            }
            
            DB::table('users')->where(['id'=> $req->id])->update($updatedata);
            return redirect('/users');      
        }
        
        public function promolist(Request $request){
            if($request->session()->has('ADMIN_LOGIN')){
                $userData = DB::table('users')->where(['role'=>'1'])->get();
                $guestList = DB::table('guests')->where([['email','!=','']])->get();
                
                return view('promotional' , ['userData' => $userData, 'guestList' => $guestList]);
            }
            return redirect('/login');
        }
        public function deleteUserData(Request $req)
        {
            DB::table('users')->where(['id'=> $req->id])->delete();
            return response()->json('success');
        }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class resellersController extends Controller
{
    public function index(request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $userData = DB::table('users')->where(['role'=>'2'])->get();
        return view('resellers' , ['userData' => $userData]);
    }
    return redirect('/login');

    }
    public function AddResellerData(Request $req)
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
                'role'=>'2',
                'trail' => $req->trial,
                'trail_date' => $req->trial_date,
            ];
            DB::table('users')->where(['id'=> $req->id])->insert($updatedata);
            return redirect('/resellers');      
    }
    
    public function getResellerData(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $data = DB::table('users')->where(['id' => $request->userID])->get();
         return $data;
        }
        return redirect('/login');
    }

    public function getcouponData(Request $request){
        if($request->session()->has('ADMIN_LOGIN')){
        $data = DB::table('coupon')->where(['id_user' => $request->userID])->get();
        $couponData = DB::table('coupon')->where(['id_user'=>$request->userID])->get();
        return view ('resellercoupondetails',['data'=>$data, 'couponData'=>$couponData]);
        }
        return redirect('/login');
    }

    public function updateresellerData(Request $req)
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
            return redirect('/resellers');      
    }

    public function resellercoupon(Request $request , $length = 5 )
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $characters = 'ABCDEFGHIJKL0123456789MNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $data=[
            'id_user'=>$request->id_user,
            'coupon'=>$request->coupon,
            'code'=>$randomString,
            'type'=>$request->type,
            'discount'=>$request->discount,
            'start_date'=>$request->start_date,
            'count'=>$request->count,
            'expirydate'=>$request->expirydate,
            'start_date'=>$request->start_date,

        ];
        DB::table('coupon')->insert($data);
        return redirect('resellers');
    }
    return redirect('/login');
    }
}

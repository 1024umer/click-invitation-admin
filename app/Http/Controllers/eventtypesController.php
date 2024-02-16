<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class eventtypesController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            
            return view('eventtypes');
        }
        return redirect('/login');
    }

    public function addeventtype(Request $req)
    {
        // return $req;
        $coupleEvent = 0;
        if(isset($req->couple_event)){
            $coupleEvent = 1;
        }
        
        $corporateEvent = 0;
        if(isset($req->corporate_event)){
            $corporateEvent = 1;
        }

        $addEventtypedata = [
            'title'=> $req->title,
            'id_animation'=>$req->id_animation,
            'couple_event'=>$coupleEvent ,
            'corporate_event' => $corporateEvent,
        ];
        // return $addEventtypedata;
        DB::table('event_type')->where(['id_eventtype'=> $req->eventtypeID])->insert($addEventtypedata);
        return redirect('eventtypes');
    }

    public function getEventtypedata(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $EventtypeData = DB::table('event_type')
        ->join('animation', 'animation.id_animation', '=', 'event_type.id_animation')        
        ->get();
        $animationdata= DB::table('animation')->get();
        // return $EventtypeData;
        return view('eventtypes' , [ 'EventtypeData' => $EventtypeData ,'animationdata'=>$animationdata]);
        }
        return redirect('/login');
    }
    
    public function updateEventtypeData(Request $req)
    {
        $coupleEvent = "0";
        if($req->couple_event == 'on'){
            $coupleEvent = "1";
        }
        
        $corporateEvent = "0";
        if($req->corporate_event == 'on'){
            $corporateEvent = "1";
        }
            $updatedata = [
                'id_eventtype'=> $req->id_eventtype,
                'title'=>$req->title,
                'id_animation'=>$req->id_animation,
                'couple_event'=>$coupleEvent,
                'corporate_event' => $corporateEvent,
            ];
            DB::table('event_type')->where(['id_eventtype'=> $req->id_eventtype])->update($updatedata);
            return redirect('eventtypes');        
    }
    
    public function eventtypedetail(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $data = DB::table('cards_upload')->where(['id_eventtype'=>$request->eventtypeID, 'type'=> 'card'])->get();
        $bgdata = DB::table('cards_upload')->where(['id_eventtype'=>$request->eventtypeID, 'type'=> 'background'])->get();
        return view('eventtypedetails',['data'=>$data,'bgdata'=>$bgdata, 'eventID' => $request->eventtypeID]);
        }
        return redirect('/login');
    }

    public function eventtypeCardUpload(Request $request)
    {
            $request->validate([
                'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
      
            $imageName = time().'.'.$request->img->extension();  
            
            $request->img->move(public_path('eventcards'), $imageName);
       
            $arr=[
                'id_eventtype' => $request->eventID,
                'type' => $request->imgType,
                'img' => $imageName,
            ];
            $data= DB::table('cards_upload')->where(['id_eventtype'=>$request->id_eventtype])->insert($arr);
            return redirect('eventtypedetails/'.$request->eventID);
       
        
    }
    
    public function viewSticker(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            $data = DB::table('stickers')->get();
            return view('stickersView',['data'=>$data]);
        }
        return redirect('/login');
    }
    
    public function stickerUpload(Request $request)
    {
            // $request->validate([
            //     'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // ]);
      
            // $imageName = time().'.'.$request->img->extension();  
            
            // $request->img->move(public_path('stickers'), $imageName);
       
            // $arr=[
            //     'img' => $imageName,
            // ];
            // $data= DB::table('stickers')->insert($arr);
            // return redirect('sticker/'.$request->eventID);
       
       
        $request->validate([
            'imgs.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate each image
        ]);
    
        $images = $request->file('imgs');
        $imageNames = [];
    
        if($request->hasFile('imgs')) {
            foreach ($images as $image) {
                $imageName = time().rand(1,100).'.'.$image->extension(); // Ensure unique names
                $image->move(public_path('stickers'), $imageName); // Move each image to public/stickers
                $imageNames[] = $imageName; // Collect names to insert into the database
            }
    
            // Insert all images into the database in one go if preferred
            $arr = array_map(function($name) {
                return ['img' => $name];
            }, $imageNames);
    
            $data = DB::table('stickers')->insert($arr); // Insert each image record to the database
        }
    
        return redirect('sticker/'.$request->eventID);
        
    }

}
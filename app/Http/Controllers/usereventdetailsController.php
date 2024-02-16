<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usereventdetailsController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $eventtypesloop= DB::table('event_type')->get();
        $events = DB::table('events')->where(['id_user'=> $request->userID])->get();
        $singleUserData = DB::table('users')->where(['id' => $request->userID])->get();
        return view('usereventdetails' , ['eventtypesloop' => $eventtypesloop,'events' => $events, 'userData' => $singleUserData, 'id_user'=> $request->userID]);
        }
        return redirect('/login');
    }
    
    public function eventall()
    {
        if($request->session()->has('ADMIN_LOGIN')){
        return view('eventalldetails');
        }
        return redirect('/login');
    }

    public function getdata(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
        $singleEventData = DB::table('events')->where(['id_event' => $request->eventID])->get();
        return view('usereventdetails' , [ 'eventData' => $singleEventData]);
    }
    return redirect('/login');
    }

    // Main 
    public function eventIDget(Request $request)
    {   
        if($request->session()->has('ADMIN_LOGIN')){
        $eventRecords = DB::table('events')->where(['id_user'=> $request->userID, 'id_event'=> $request->eventID])->get();
        $mealdata = DB::table('meals')->where(['id_event'=> $request->eventID])->get();
        $guestdata = DB::table('guests')->where(['id_event'=> $request->eventID])->get();
        // $singleUserData = DB::table('users')->where(['id' => $request->userID])->get();
        $cardData = DB::table('cards')->where(['id_user'=> $request->userID, 'id_event'=> $request->eventID])->orderBy('id_card', 'DESC')->get();
        $tableData = DB::table('tables')->where(['id_event'=> $request->eventID])->get();
        $giftData = DB::table('gifts')->where(['id_event'=> $request->eventID])->get();
        $photogalleryData = DB::table('photogallery')->where(['id_event'=> $request->eventID])->get();
        return view('eventalldetails' , ['eventRecords' => $eventRecords, 'mealdata' => $mealdata,
         'guestdata' => $guestdata, 'tableData'=> $tableData, 'cardData' => $cardData, 'giftData'=>$giftData, 'photogalleryData'=>$photogalleryData ]); 
        }
        return redirect('/login');
    }
   
    //post method for updating general Information Data
    public function updateGeneralInforData(Request $req)
    {
            $updatedata = [
                'name'=> $req->name,
                'date'=>$req->date,
                'summary'=>$req->summary,
            ];
            DB::table('events')->where(['id_event'=> $req->id_event])->update($updatedata);
            $data = DB::table('events')->where(['id_event'=> $req->id_event])->get();
            return redirect('userevents/'.$data[0]->id_user.'/'.$req->id_event);        
    }

    public function addGuestlistData(Request $req)
    {
             //return $req;
            $updatedata = [
                'name'=> $req->name,
                'email'=>$req->email,
                'phone'=>$req->phone,
                'whatsapp'=> $req->whatsapp,
                'mainguest'=>$req->mainguest,
                'notes'=>$req->notes,
                'allergies'=> $req->allergies,
                'declined'=>$req->declined,
                'checkin'=>$req->checkin,
                'members_number'=> $req->members_number,
                'opened'=>$req->opened,
                'id_event'=> $req->id_event,
                'code' => 'code here',
            ];
            DB::table('guests')->insert($updatedata);
            $data2 = DB::table('events')->where(['id_event'=> $req->id_event])->get();
            return redirect('userevents/'.$data2[0]->id_user.'/'.$req->id_event);        
    }
    
    public function updateGuestInforData(Request $req)
    {
             //return $req;
            $updatedata = [
                'name'=> $req->name,
                'email'=>$req->email,
                'phone'=>$req->phone,
                'whatsapp'=> $req->whatsapp,
                'mainguest'=>$req->mainguest,
                'notes'=>$req->notes,
                'allergies'=> $req->allergies,
                'declined'=>$req->declined,
                'checkin'=>$req->checkin,
                'members_number'=> $req->members_number,
                'opened'=>$req->opened,
            ];
            DB::table('guests')->where(['id_guest'=> $req->id_guest])->update($updatedata);
            //$data = DB::table('guests')->where(['id_guest'=> $req->id_guest])->get();
            $data2 = DB::table('events')->where(['id_event'=> $req->id_event])->get();
            
            return redirect('userevents/'.$data2[0]->id_user.'/'.$req->id_event);        
    }

    public function addmeal(Request $req)
    {
        $addmealdata = [
            'name'=> $req->name,
            'description'=>$req->description,
            'id_event'=> $req->id_event
        ];
        DB::table('meals')->where(['id_event'=> $req->eventID])->insert($addmealdata);
        $data = DB::table('events')->where(['id_event'=> $req->id_event])->get();
        return redirect('userevents/'.$data[0]->id_user.'/'.$req->id_event);
    }

    public function updateMealInforData(Request $req)
    {
            //  return $req;
            $updatedata = [
                'id_event'=>$req->id_event,
                'id_meal'=>$req->id_meal,
                'name'=> $req->name,
                'description'=>$req->description,
            ];
            DB::table('meals')->where(['id_meal'=> $req->id_meal])->update($updatedata);
            //$data = DB::table('guests')->where(['id_guest'=> $req->id_guest])->get();
            $data2 = DB::table('events')->where(['id_event'=> $req->id_event])->get();
            
            return redirect('userevents/'.$data2[0]->id_user.'/'.$req->id_event);        
    }

    public function DeleteMeal(Request $req)
    {
        $mealdata = DB::delete('meals')->where(['id_meal'=> $req->id_meal]);
        return redirect('userevents/'.$mealdata[0]->id_user.'/'.$req->id_event);        
    }

    public function addcard(Request $req)
    {
        $data = DB::table('events')->where(['id_event'=> $req->id_event])->get();
             //return $req;
            $insertdata = [
                'id_event'=>$req->id_event,
                'id_user' => $data[0]->id_user,
                'title1'=> $req->title1,
                'title2'=>$req->title2,
                'title3'=>$req->title3,
                'title4'=> $req->title4,
                'titleFont'=>$req->titleFont,
                'titleColor'=>$req->titleColor,
                'name1'=> $req->name1,
                'name2'=>$req->name2,
                'cermony'=>$req->cermony,
                'cermonyFont'=> $req->cermonyFont,
                'cermonyColor'=>$req->cermonyColor,
                'other1'=> $req->other1,
                'other2'=>$req->other2,
                'other3'=>$req->other3,
                'otherFont'=> $req->otherFont,
                'otherColor'=>$req->otherColor,
                'bgName'=>$req->bgName,
                'cardName'=> $req->cardName,
                'fontColor'=>$req->fontColor,
                'fontFamily'=>$req->fontFamily,
                'customCard'=> $req->customCard,
                'cardColorOut'=>$req->cardColorOut,
                'cardColorIn'=>$req->cardColorIn,
                'rsvp'=>$req->rsvp,
                'msgTitle'=> $req->msgTitle,
                'updated_at' => date("Y-m-d h:i:s"),
            ];
            DB::table('cards')->where(['id_card'=> $req->id_card])->insert($insertdata);
            return redirect('userevents/'.$data[0]->id_user.'/'.$req->id_event);        
    }

    public function updateCardInforData(Request $req)
    {
             //return $req;
            $updatedata = [
                'title1'=> $req->title1,
                'title2'=>$req->title2,
                'title3'=>$req->title3,
                'title4'=> $req->title4,
                'titleFont'=>$req->titleFont,
                'titleColor'=>$req->titleColor,
                'name1'=> $req->name1,
                'name2'=>$req->name2,
                'cermony'=>$req->cermony,
                'cermonyFont'=> $req->cermonyFont,
                'cermonyColor'=>$req->cermonyColor,
                'other1'=> $req->other1,
                'other2'=>$req->other2,
                'other3'=>$req->other3,
                'otherFont'=> $req->otherFont,
                'otherColor'=>$req->otherColor,
                'bgName'=>$req->bgName,
                'cardName'=> $req->cardName,
                'fontColor'=>$req->fontColor,
                'fontFamily'=>$req->fontFamily,
                'customCard'=> $req->customCard,
                'cardColorOut'=>$req->cardColorOut,
                'cardColorIn'=>$req->cardColorIn,
                'rsvp'=>$req->rsvp,
                'msgTitle'=> $req->msgTitle,
            ];
            DB::table('cards')->where(['id_card'=> $req->id_card])->update($updatedata);
            $data = DB::table('events')->where(['id_event'=> $req->id_event])->get();
            
            return redirect('userevents/'.$data[0]->id_user.'/'.$req->id_event);        
    }
    
    public function addtable(Request $req)
    {
        $addtabledata = [
            'name'=> $req->name,
            'number'=>$req->number,
            'guest_number'=>$req->guest_number,
            'id_event'=> $req->id_event
        ];
        DB::table('tables')->where(['id_event'=> $req->eventID])->insert($addtabledata);
        $data = DB::table('events')->where(['id_event'=> $req->id_event])->get();
        return redirect('userevents/'.$data[0]->id_user.'/'.$req->id_event);
    }

    public function updateGuestTableInforData(Request $req)
    {
            $updatedata = [
                'id_event'=>$req->id_event,
                'id_table'=>$req->id_table,
                'name'=> $req->name,
                'number'=>$req->number,
                'guest_number'=>$req->guest_number,
            ];
            DB::table('tables')->where(['id_table'=> $req->id_table])->update($updatedata);
            $data2 = DB::table('events')->where(['id_event'=> $req->id_event])->get();
            
            return redirect('userevents/'.$data2[0]->id_user.'/'.$req->id_event);        
    }

    public function DeleteTable(Request $req)
    {
        $tabledata = DB::delete('tables')->where(['id_table'=> $req->id_table]);
        return redirect('userevents/'.$tabledata[0]->id_user.'/'.$req->id_event);        
    }
    
    public function addnewEvent(Request $req)
    {
        
        $addNewEventdata = [
            'id_user' => $req->userID,
            'name'=> $req->name,
            'date'=>$req->date,
            'type'=>$req->type,
            'paid' => '0',
            
        ];
        DB::table('events')->where(['id_user'=> $req->userID])->insert($addNewEventdata);
        $data = DB::table('events')->where(['id_user'=> $req->userID])->get();
        return redirect('userevents/'.$data[0]->id_user.'/');
    }

        
}

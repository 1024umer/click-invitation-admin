<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class apiController extends Controller
{
    //Get General Information
    public function getGeneralInfo(Request $req){
        
        $generalinfoData = DB::table('events')->where(['id_user'=> $req->userID, 'id_event'=>$req->eventID])->get();
        return $generalinfoData;
    }
    // Get Guests Data
    public function getGuestData(Request $req){
       
        $guestData = DB::table('guests')->where(['id_guest'=> $req->guestID])->get();
        return $guestData;
    }
    // guest Deleted
    public function guestDeletedData(Request $req){
        
        $guestData = DB::table('guests')->where(['id_guest'=> $req->guestID])->delete();
        return $guestData;
    }
    // Get Meal Data
    public function getMealData(Request $req){
       
        $mealData = DB::table('meals')->where(['id_meal'=> $req->mealID])->get();
        return $mealData;
    }
    // Meal Deleted
    public function mealDeletedData(Request $req){
        
        $mealData = DB::table('meals')->where(['id_meal'=> $req->mealID])->delete();
        return $mealData;
    }
    // Get Guests Data
    public function getGuestTableData(Request $req){
       
        $tableData = DB::table('tables')->where(['id_table'=> $req->tableID])->get();
        return $tableData;
    }
    // Table Deleted
    public function tableDeletedData(Request $req){
        
        $tableData = DB::table('tables')->where(['id_table'=> $req->tableID])->delete();
        return $tableData;
    }
    //
    public function getCardImages(Request $req){
       
        $cardDataimages = DB::table('cards')->where(['id_card'=> $req->cardID])->orderBy('id_card', 'DESC')->get();
        return $cardDataimages;
    }
    // Card Get Data
    public function getCardData(Request $req){
       
        $cardData = DB::table('cards')->where(['id_card'=> $req->cardID])->orderBy('id_card', 'DESC')->get();
        return $cardData;
    }
    // Event Type Get
    public function EventTypeData(Request $req){
        
        $eventtypeData = DB::table('event_type')->where(['id_eventtype'=> $req->eventtypeID])->get();
        return $eventtypeData;
    }
    // Event Type Deleted
    public function EventTypeDeletedData(Request $req){
        
        $EventtypeData = DB::table('event_type')->where(['id_eventtype'=> $req->eventtypeID])->delete();
        return   $EventtypeData;
    }
    // Event Delete Data
    public function DeleteEventData(Request $req){
        
        $EventData = DB::table('events')->where(['id_event'=> $req->eventID])->delete();
        return  $EventData;
    }
    
    // Sticker Delete Data
    public function DeleteSticker(Request $req){
        
        $EventData = DB::table('stickers')->where(['id'=> $req->stickerID])->delete();
        return  $EventData;
    }
    
    //coupon Api
    public function CodeData(Request $req){
        
        $Data = DB::table('codes')
        ->join('coupon', 'coupon.id', '=', 'codes.id_code')
        ->where(['coupon.id'=> $req->codeID])
        ->get();
        return $Data;
    }
    //Counpon Status Edit
    public function couponstatus(Request $req)
    { 
        $data = DB::table('coupon')->where(['id'=>$req->codeID])->get();
        return $data;     
    }
    public function deleteEventBG(Request $req){
        
        $Data = DB::table('cards_upload')->where(['id'=> $req->imageID])->delete();
        return  $Data;
    }
    
    public function toBeRefund(Request $req){
        $Data = DB::table('amount_records')->where(['id'=> $req->codeID])->update([
           'status' => 'To Be Refunded'
        ]);;
        return  $Data;
    }
    
    public function refunded(Request $req){
        $Data = DB::table('amount_records')->where(['id'=> $req->codeID])->update([
           'status' => 'Refunded'
        ]);
        
        $eventID = DB::table('amount_records')->where(['id' => $req->codeID])->get();
        DB::table('events')->where(['id_event' => $eventID[0]->id_event])->update([
            'paid'=> 0,
            ]);
        
        return  $Data;
    }
    
    public function makeQR(Request $req){
        $data = 'Your data to be encoded in the QR code';

        $qrCode = QrCode::format('png')->size(200)->generate($data);

        return response($qrCode)->header('Content-Type', 'image/png');
        return $req->txt;
    }
}

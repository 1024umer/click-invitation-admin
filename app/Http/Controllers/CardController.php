<?php

namespace App\Http\Controllers;

use App\CardsUpload;
use App\EventType;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(){
        $cards = CardsUpload::get();
        $events = EventType::get();
        return view('card')->with(compact('cards','events'));
    }
}

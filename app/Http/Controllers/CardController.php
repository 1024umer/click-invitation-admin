<?php

namespace App\Http\Controllers;

use App\CardsUpload;
use App\EventType;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        $cards = \DB::select('
        SELECT cu.*, et.*
        FROM cards_upload cu
        LEFT JOIN event_type et ON cu.id_eventtype = et.id_eventtype');
        $events = EventType::get();
        return view('card')->with(compact('cards', 'events'));
    }
    public function store(Request $request)
    {
        if ($request->file('img')) {
            $img = $request->file('img');
            $img->move(public_path('eventcards'), $img->getClientOriginalName());
        }
        $requestData = $request->only(['id_eventtype', 'type']);
        $requestData['img'] = 'eventcards/' . $img->getClientOriginalName();
        $cards = CardsUpload::create($requestData);
        return redirect()->route('card.list');
    }
    public function destroy(Request $request)
    {
        $card = CardsUpload::where('id', $request->id)->first();
        $card->delete();
        return response()->json(true);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use Illuminate\Support\Facades\DB;
class CardTemplateController extends Controller
{

    public function index()
    {
        $templates = Template::get();
        return view('templates')->with(compact('templates'));
    }

    public function create()
    {
        return view('invitation-new');
    }
    public function getCard(Request $request)
    {
        $stickers = DB::table('stickers')->get();
        return ['stickers' => $stickers];
    }

    public function store(Request $request)
    {
        try {
            $template = Template::create([
                'json' => $request->json_blob,
                'name' => $request->name ? $request->name : 'New Template',
            ]);

            return response()->json(['status' => true,'template'=>$request->json_blob]);
        } catch (Exception $e) {
            return response(['status' => false,'message'=>$e->getMessage()]);
        }
    }
    public function destroy(Request $request)
    {
        $templete = Template::find($request->id)->delete();
        return response(['status' => true]);
    }
    public function getCSRFToken(){
        return csrf_token();
    }
    public function allTemplates(){
        $templates = Template::get();
        if($templates->count() > 0){
            return response($templates);
        }else{
            return response(['message'=>'No Template Found']);
        }
    }
}

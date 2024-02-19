<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use Illuminate\Support\Facades\DB;
class CardTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = Template::get();
        return view('templates')->with(compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invitation-new');
    }
    public function getCard(Request $request)
    {
        $stickers = DB::table('stickers')->get();
        return ['stickers' => $stickers];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $templete = Template::find($request->id)->delete();
        return response(['status' => true]);
    }
    public function getCSRFToken(){
        return csrf_token();
    }
}

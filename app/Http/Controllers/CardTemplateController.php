<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
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

        $template = Template::create([
            'json' => $request->json_blob,
            'name' => $request->name ? $request->name : 'New Template',
        ]);
        if($template){
            return view('invitation-new')->with(compact('template'));
        }else{
            return back()->with('error', 'Something went wrong!');
        }
    }
    public function update(Request $request){
        try{
            $template = Template::find($request->template_id);
    
            $base64Image = $request->data_url;
            $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
            $decodedImage = base64_decode($base64Image);
    
            $imagePath = public_path('storage/templates/' . $template->name . '.png');
            file_put_contents($imagePath, $decodedImage);
    
            $template->update([
                'json' => $request->json_blob,
                'image' => $template->name.'.png',
            ]);
    
            return redirect()->route('card-template-list');
        } catch (\Exception $e){
            return response(['status' => false, 'message' => $e->getMessage()]);
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

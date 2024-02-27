<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;
use App\Blog;
class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        return view('blogs.list')->with(compact('blogs'));
    }
    public function create()
    {
        return view('blogs.blog');
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.blog')->with(compact('blog'));
    }
    public function store(BlogRequest $request){
        // dd($request->all());
        $imagePath = $request->file('image')->store('blogs', 'public');
        $blog = Blog::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imagePath,
            'slug' => $request->slug,
            'page_title' => $request->page_title,
            'meta_tag' => $request->meta_tag,
        ]);
        if($blog){
            return redirect()->route('blog.list');
        }else{
            return redirect()->back()->withErrors(['error' => 'Something went wrong!']);
        }
    }
    public function update(BlogRequest $request,$id){
        // dd($request->all());
        if($request->file('image')){
            $imagePath = $request->file('image')->store('blogs', 'public');
        }
        $blog = Blog::find($id);

        $blog->update([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imagePath,
            'slug' => $request->slug,
            'page_title' => $request->page_title,
            'meta_tag' => $request->meta_tag,
        ]);
        $blog->refresh();
        if($blog){
            return redirect()->route('blog.list');
        }else{
            return redirect()->back()->withErrors(['error' => 'Something went wrong!']);
        }
    }
    public function destroy(Request $request){
        $id = $request->id;
        $blog = Blog::find($id)->delete();
        return response()->json(null,200);
    }
}

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
    public function edit($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('blogs.blog')->with(compact('blog'));
    }
    public function store(BlogRequest $request)
    {
        // dd($request->all());
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }else{
            $imagePath = null;
        }
        $blog = Blog::create([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imagePath,
            'slug' => $request->slug,
            'page_title' => $request->page_title,
            'meta_tag' => $request->meta_tag,
            'is_trending' => $request->is_trending ? 1 : 0,
            'is_popular' => $request->is_popular ? 1 : 0,
            'is_latest' => $request->is_latest ? 1 : 0,
        ]);
        if ($blog) {
            return redirect()->route('blog.list');
        } else {
            return redirect()->back()->withErrors(['error' => 'Something went wrong!']);
        }
    }

    public function update($slug, Request $request)
    {
        $blog = Blog::where('slug', $slug)->first();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $blog->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'image' => $imagePath,
                'slug' => $request->slug,
                'page_title' => $request->page_title,
                'meta_tag' => $request->meta_tag,
                'is_trending' => $request->is_trending ? 1 : 0,
                'is_popular' => $request->is_popular ? 1 : 0,
                'is_latest' => $request->is_latest ? 1 : 0,
            ]);
            $blog->refresh();
        } else {
            $blog->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'slug' => $request->slug,
                'page_title' => $request->page_title,
                'meta_tag' => $request->meta_tag,
                'is_trending' => $request->is_trending ? 1 : 0,
                'is_popular' => $request->is_popular ? 1 : 0,
                'is_latest' => $request->is_latest ? 1 : 0,
            ]);
            $blog->refresh();
        }
        if ($blog) {
            return redirect()->route('blog.list')->with('success', 'Blog post updated successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Something went wrong!']);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $blog = Blog::find($id)->delete();
        return response()->json(null, 200);
    }
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('blogs.show')->with(compact('blog'));
    }
}

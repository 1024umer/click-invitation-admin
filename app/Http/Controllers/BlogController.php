<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {

        return view('blogs.blog');
    }
    public function store(BlogRequest $request){
        $slug = str_replace(' ', '-', strtolower($request->slug));

    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->take(6)->get();
        return view('anasayfa', compact('blogs'));
    }
}

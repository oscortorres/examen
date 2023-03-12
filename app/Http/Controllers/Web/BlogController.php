<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where("posted", "yes")->paginate(2);
        // dd($posts);
        return view("web.blog.index", compact("posts"));
    }    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // dd($post);
        // return view("web.blog.show", compact("post"));
        return view("web.blog.show", compact("post"));
    }    
}

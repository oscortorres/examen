<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::paginate(2));
    }

    public function all()
    {
        return response()->json(Post::get());
    }

    public function slug (Post $post){ //$slug

        // $post = Post::with('category')->where('slug', $slug)->firstOrFail();
        $post->category;

        return response()->json($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $res = Post::create($request->validated());

        return response()->json($res);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        $post->update($request->validated());

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $post->delete();

        return response()->json("fue eliminado");
    }
}

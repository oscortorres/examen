<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(2);

        return response()->json($categories);
    }   
    
    public function all()
    {
        return response()->json(Category::get());
    }

    public function slug ($slug){

        $category = Category::where('slug', $slug)->firstOrFail();

        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $res = Category::create($request->validated());

        return response()->json($res);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category)
    {
        $category->update($request->validated());

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        try {

            $category->delete();

            return response()->json('fue eliminado');

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($th);
        }
        

        
    }

    public function posts (Category $category){

        // $posts = Post::join('categories', 'categories.id', '=', 'posts.category_id')
        // ->select('posts.*', 'categories.title as category')
        // ->where('categories.id', $category->id)
        // ->get();

        $posts = Post::with('category')
        ->where('category_id', $category->id)
        ->get();


        // show builsql
        // ->toSql();

        return response()->json($posts);
    }
}

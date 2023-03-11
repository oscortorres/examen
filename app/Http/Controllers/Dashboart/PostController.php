<?php

namespace App\Http\Controllers\Dashboart;

// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {      
        
        // dd(Category::find(1)->posts);

        $posts = Post::paginate(2);

        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $categories = Category::get();
        $categories = Category::pluck('id', 'title');
        $post = new Post();

        // dd($categories);

        echo view('dashboard.post.create', compact('categories', 'post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        // dd($request);
        // echo request('title');
        // echo $request->input('slug');
        // dd($request->all());

        // ! more specific validations
        // $validated = $request->validate(StoreRequest::myRules());
        // $validated = Validator::make($request->all(), StoreRequest::myRules());

        // dd($validated->errors());
        // dd($validated->fails());

        
        // $data = array_merge($request->all(), ['image' => ''], ['user_id' => 1]);


        // $data = $request->validated();
        // $data['slug'] = Str::slug($data['name']);
        // dd($data);

        $res = Post::create($request->validated());

        // //obtener el id insertado
        // $idPost = $res->id;

        // $dataInserComent = [
        //     'user_id' => 1, 
        //     'post_id' => $idPost, 
        //     'comment' => request('comment')
        // ];        

        // Comment::create($dataInserComent);

        // return route("post.create");
        // return redirect("/post/create");
        // return redirect()->route("post.create");
        return to_route("post.create")->with('status','Registro creado');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        // echo 'show';
        echo view('dashboard.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        $categories = Category::pluck('id', 'title');

        // dd($categories);

        echo view('dashboard.post.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {
        //
        // dd($request->validated());
        $post->update($request->validated());

        // $request->session()->flash('status','Registro actualizado');

        return to_route("post.index")->with('status','Registro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        
        // echo 'destroy';
        $post->delete();


        return to_route("post.index")->with('status','Registro eliminado');
    }
}

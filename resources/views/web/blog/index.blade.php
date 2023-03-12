@extends('web.layout')

@section('content')
    
    <x-web.blog.post.index :posts="$posts">
        <h1>Listado Principal de post</h1>
    </x-web.blog.post.index>
@endsection
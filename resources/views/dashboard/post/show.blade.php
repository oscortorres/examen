@extends('dashboard.layout')

@section('content')
    <h1> {{ $post->name }}</h1>

    <p>{{ $post->posted }}</p>

    {{-- <div>{{$post->content}}</div> --}}
    
    
@endsection

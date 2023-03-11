@extends('dashboard.layout')

@section('content')
    <h1>Actualizar Post: {{ $post->name }}</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('post.update', $post->id) }}" method="post">

        {{-- @method('PUT') --}}
        @method('PATCH')

        @include('dashboard.post._form')

    </form>
@endsection

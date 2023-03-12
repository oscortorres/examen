{{ $slot }}

@foreach ($posts as $p)
    <div class="card card-white mb-2">
        <h3>{{ $p->name }}</h3>
        <a href="{{ route('web.blog.show', $p) }}">Ir</a>
    </div>
@endforeach

{{ $posts->links() }}

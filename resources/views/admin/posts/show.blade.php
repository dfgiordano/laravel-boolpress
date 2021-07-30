@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> {{ $post->title }} </h1>
        {{-- sto recuperando il nome della categoria dall'oggetto categoria, ma se è null ho errore, mettendolo in un if invece ci entra solo quando c'è una categoria definita $post->category --}}
        @if ($post->category)
        <a href="{{ route('admin.categories.show', $post->category->id) }}"> <h3>Categoria : {{ $post->category->name }}</h3> </a>
        @else 
            <h3>L'articolo non appartiene a nessuna categoria</h3>
        @endif
        {{-- creo il div con i tag, solo se ce n'è almeno uno (count($post->tags > 0) --}}
        @if (count($post->tags) > 0)
        <div>
            @foreach ($post->tags as $tag)
                <span class="badge badge-dark">{{ $tag->name }}</span>
            @endforeach
        </div>
        @else 
            <h5>Nessun tag collegato all'articolo</h5>
        @endif
        <p class="mt-5"> {{ $post->post }} </p>
        <div>
            <a class="btn btn-warning mt-4" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
            <a class="btn btn-info mt-4" href="{{ route('admin.posts.index', $post->id) }}">Elenco articoli</a>
        </div>
    </div>
@endsection
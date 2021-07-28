@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <ul>
        @forelse ($category->posts as $post)
            <li> <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a> </li>
        @empty 
            <li>Nessun articolo presente in questa categoria</li>
        @endforelse
    </ul>
    <a class="btn btn-primary" href="{{ route('admin.posts.index', $post->id) }}">Elenco articoli</a>
</div>
@endsection
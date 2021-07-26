@extends('layouts.app')

@section('content')
    <div class="container">
        <h1> {{ $post->title }} </h1>
        <a class="btn btn-secondary mt-4" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
        <a class="btn btn-info mt-4" href="{{ route('admin.posts.index', $post->id) }}">Elenco articoli</a>
        <div class="mt-5"> {{ $post->post }} </div>
    </div>
@endsection
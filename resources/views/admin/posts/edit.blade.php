@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica l'articolo: <span> {{ $post->title }} </span>
        </h1>
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid
                @enderror " id="title" name="title"  placeholder="Inserici il titolo" value="{{ $post->title }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="post"></label>
                <textarea class="form-control @error('post') is-invalid
                @enderror " id="post" name="post" rows="6">{{ $post->post }}</textarea>
              </div>
              <button class="btn btn-success" type="submit">Salva</button>
              <a class="btn btn-primary ml-3" href="{{ route('admin.posts.index') }}">Elenco articoli</a>
        </form>
    </div>
@endsection
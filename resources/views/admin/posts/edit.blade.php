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
                <label for="post">Testo</label>
                <textarea class="form-control @error('post') is-invalid
                @enderror " id="post" name="post" rows="6" placeholder="Inserisci il testo dell'articolo">{{ old('post', $post->post) }}</textarea>
              </div>
              <div class="form-group">
                <label for="category_id">Categoria</label>
                <select name="category_id" id="category_id">
                    <option value="">Seleziona la categoria</option>
                    @foreach ($categories as $category)
                          <option value="{{ $category->id }}"
                              {{ ($category->id == old('category_id',$post->category_id)) ? 'selected' : '' }}
                              > {{ $category->name }} </option>
                    @endforeach
                </select>
            </div>
              <button class="btn btn-success" type="submit">Salva</button>
              <a class="btn btn-primary ml-3" href="{{ route('admin.posts.index') }}">Elenco articoli</a>
        </form>
    </div>
@endsection
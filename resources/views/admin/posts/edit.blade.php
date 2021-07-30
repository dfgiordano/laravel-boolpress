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
            {{-- tag --}}
            <div class="class form-group">
                <h4>Seleziona almeno un tag</h4>
              @foreach ($tags as $tag)
              {{-- devo gestire sia errori di validazione (if) e anche recuoero di dati(else) con contains vado a cercare se nella collection esiste un oggetto con un determinato id  --}}
              <div class="form-check form-check-inline">
                    @if ($errors->any())
                        <input class="form-check-input" type="checkbox" 
                        name="tags[]" value="{{$tag->id}}" id="tag-{{$tag->id}}" 
                        {{ in_array($tag->id, old('tags', [] )) ? 'checked' : ''}}
                        >
                    @else
                        <input class="form-check-input" type="checkbox" 
                        name="tags[]" value="{{$tag->id}}" id="tag-{{$tag->id}}" 
                        {{ $post->tags->contains($tag->id) ? 'checked' : '' }}
                        >
                    @endif
                    <label class="form-check-label" for="tag-{{$tag->id}}">{{$tag->name}}</label>
              </div>
              @error('tags')
                  <small class="text-danger d-block"> {{$message}} </small>
              @enderror
              @endforeach
            </div>
              {{-- /tag --}}
              <button class="btn btn-success" type="submit">Salva</button>
              <a class="btn btn-primary ml-3" href="{{ route('admin.posts.index') }}">Elenco articoli</a>
        </form>
    </div>
@endsection
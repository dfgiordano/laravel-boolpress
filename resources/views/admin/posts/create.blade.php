@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inserisci il tuo nuovo articolo</h1>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid
                @enderror " id="title" name="title" value="{{old('title')}}" placeholder="Inserici il titolo">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="articolo"></label>
                <textarea class="form-control @error('content') is-invalid
                @enderror " id="articolo" name="content" rows="6">value="{{old('content')}}"</textarea>
              </div>
              <button class="btn btn-success" type="submit">Salva</button>
              <a class="btn btn-primary ml-3" href="{{ route('admin.posts.index') }}">Elenco articoli</a>
        </form>
    </div>
@endsection

{{-- manca lo slug --}}
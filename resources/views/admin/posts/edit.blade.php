@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica l'articolo </h1>
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" id="title" placeholder="Inserici il titolo">
              </div>
              <div class="form-group">
                <label for="articolo"></label>
                <textarea class="form-control" id="articolo" rows="6"></textarea>
              </div>
              <button class="btn btn-success" type="submit">Salva</button>
              <a class="btn btn-primary ml-3" href="{{ route('admin.posts.index') }}">Elenco articoli</a>
        </form>
    </div>
@endsection
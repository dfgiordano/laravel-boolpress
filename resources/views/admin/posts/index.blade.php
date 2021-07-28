@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Elenco degli articoli</h1>
        <a class="btn btn-light" href="{{ route('admin.posts.create') }}">Scrivi un nuovo articolo</a>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Slug</th>
                    <th>Categoria</th>
                    <th colspan="3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            @if ($item->category)
                                {{ $item->category->name }}
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-info">
                                <a href="{{ route('admin.posts.show', $item->id) }}">Mostra</a>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-warning">
                                <a href="{{ route('admin.posts.edit', $item->id) }}">Modifica</a>
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $item->id)}}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Slug</th>
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
                            <button class="btn btn-info">
                                <a href="{{ route('admin.posts.show', $item->id) }}">Show</a>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-warning">
                                modify
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger">
                                delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('layouts.admin.app')

@section('page_title', "Gestione Posts")
    
@section('page_content')
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo post</th>
                    <th>Testo post</th>
                    <th>Slug</th>
                    <th>Creato il</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post["id"] }}</td>
                    <td>{{ $post["title"] }}</td>
                    <td>{{ $post["text_content"] }}</td>
                    <td>{{ $post["slug"] }}</td>
                    <td>{{ $post["created_at"] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
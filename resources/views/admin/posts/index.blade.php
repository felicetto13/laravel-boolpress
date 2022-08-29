@extends('layouts.admin.app')

@section('page_title', "Gestione Posts")
    
@section('page_content')
    <div class="p-5 mx-auto">
        <div class="d-flex justify-content-between">
            <h2>Lista post</h2>
            <a href="{{ route("admin.posts.create") }}" class="btn btn-primary"><span class="link-new-post">+</span></a>
        </div>
        <table >
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
                    <td>{{ $post["text"] }}</td>
                    <td>{{ $post["slug"] }}</td>
                    <td>{{ $post["created_at"] }}</td>
                    <td>
                        <div class="group-btn-table">
                            <a href="{{ route("admin.posts.show", $post["slug"]) }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route("admin.posts.edit", ['post' => $post->slug]) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route("admin.posts.destroy", $post["slug"]) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
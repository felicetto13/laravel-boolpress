@extends('layouts.admin.app')

@section('page_title', "Post #". $post["id"])
    
@section('page_content')
    <div class="p-5 mx-auto">
        <div class="d-flex">
            <div>
                <h2 class="mr-3 mb-0"><a href="{{ route("admin.posts.index") }}" class="arrow-moving"><i class="fa-solid fa-angle-left"></i></a>  Post  #{{ $post["id"] }}</h2>
            </div>
            <div class="group-btn-table">
                <a href="{{ route("admin.posts.edit", ['post' => $post->slug]) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route("admin.posts.destroy", $post["slug"]) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titolo post</th>
                    <th>Testo post</th>
                    <th>Slug</th>
                    <th>Image</th>
                    <th>categoria</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $post["id"] }}</td>
                    <td>{{ $post["title"] }}</td>
                    <td>{{ $post["text"] }}</td>
                    <td>{{ $post["slug"] }}</td>
                    <td>{{ $post["image"] }}</td>
                    @if ($post->category)
                    <td>{{ $post->category->name }}</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
@endsection
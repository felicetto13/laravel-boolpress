@extends('layouts.admin.app')

@section('page_title', "Gestione categorys")
    
@section('page_content')
    <div class="p-5 mx-auto">
        <table >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Categoria</th>
                    <th>Slug Categoria</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category["id"] }}</td>
                    <td>{{ $category["name"] }}</td>
                    <td>{{ $category["slug"] }}</td>
                    <td>
                        <div class="group-btn-table">
                            <a href="{{ route("admin.categories.show", $category["id"]) }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route("admin.categories.edit", ['category' => $category->id]) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route("admin.categories.destroy", $category["id"]) }}" method="post">
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
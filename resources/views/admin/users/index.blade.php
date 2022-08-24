@extends('layouts.admin.app')

@section('page_title', "Gestione users")
    
@section('page_content')
    <div class="p-5 mx-auto">
        <table >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Creato il</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user["id"] }}</td>
                    <td>{{ $user["name"] }}</td>
                    <td>{{ $user["email"] }}</td>
                    <td>{{ $user["created_at"] }}</td>
                    <td>
                        <div class="group-btn-table">
                            <a href="{{ route("admin.users.show", $user["id"]) }}" class="btn btn-warning"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route("admin.users.edit", ['user' => $user->id]) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route("admin.users.destroy", $user["id"]) }}" method="post">
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
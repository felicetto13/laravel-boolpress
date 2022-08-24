

@extends('layouts.admin.app')

@section('page_title', "User: ". $user["name"])
    
@section('page_content')
    <div class="p-5 mx-auto">
        <div class="d-flex">
            <div>
                <h2 class="mr-3 mb-0"><a href="{{ route("admin.users.index") }}" class="arrow-moving"><i class="fa-solid fa-angle-left"></i></a>  Post  #{{ $user["id"] }}</h2>
            </div>
            <div class="group-btn-table">
                <a href="{{ route("admin.users.edit", $user->id) }}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                <form action="{{ route("admin.users.destroy", $user["id"]) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
            </div>
        </div>

        @dd($user->details->address)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Indirizzo</th>
                    <th>Codice postale</th>
                    <th>Città</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user["id"] }}</td>
                    <td>{{ $user["name"] }}</td>
                    <td>{{ $user["email"] }}</td>
                    <td>{{ $user->details()["address"]}}</td>
                    <td>{{ $user->details->postal_code }}</td>
                    <td>{{ $user->details->city }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
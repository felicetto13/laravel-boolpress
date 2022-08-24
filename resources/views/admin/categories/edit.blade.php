@extends('layouts.admin.app')

@section('page_title', 'Modifica Utente')

@section('page_content')
    <div class="container mt-5 py-5">
        <h2>Modifica utente</h2>
        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="input-group">
                <label for="name">Nome utente</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') ?? $user['name'] }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user['email'] }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label for="title">Indirizzo</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                    value="{{ old('address', $user->details ? $user->details->address : '') }}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label for="title">Codice Postale</label>
                <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code"
                    value="{{ old('postal_code', $user->details ? $user->details->postal_code : '') }}">
                @error('postal_code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label for="city">Titolo Post</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                    value="{{ old('city', $user->details ? $user->details->city : '') }}">
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-success">Modifica</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
@endsection

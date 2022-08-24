@extends('layouts.admin.app')

@section('page_title', 'Gestione Posts')

@section('page_content')
    <div class="container mt-5 py-5">
        <h2>Crea nuovo Post</h2>
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            @method("POST")
            <div class="input-group">
                <label for="title">Titolo Post</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label for="text">Contenuto del Post</label>
                <textarea class="form-control @error('text') is-invalid @enderror" name="text">{{ old('text') }}</textarea>
                @error('text')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-success">Aggiungi</button>
                <a href="{{route("admin.posts.index") }}" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
@endsection

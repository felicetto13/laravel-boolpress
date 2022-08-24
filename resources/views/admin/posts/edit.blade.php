@extends('layouts.admin.app')

@section('page_title', 'Gestione Posts')

@section('page_content')
    <div class="container mt-5 py-5">
        <h2>Modifica il Post</h2>
        <form action="{{ route('admin.posts.update', $post->slug) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="input-group">
                <label for="title">Titolo Post</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title') ?? $post['title'] }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <label for="text">Contenuto del Post</label>
                <textarea class="form-control @error('text') is-invalid @enderror" name="text">{{ old('text') ?? $post['text'] }}</textarea>
                @error('text')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <select class="form-control @error('cateogory_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value=""></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category->id === $category->id ? "selected" : "" }}>{{ $category->name }}</option>
                @endforeach
                @error('cateogory_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
            <div class="button-group">
                <button type="submit" class="btn btn-success">Modifica</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Annulla</a>
            </div>
        </form>
    </div>
@endsection

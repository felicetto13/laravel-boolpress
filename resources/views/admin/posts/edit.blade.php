@extends('layouts.admin.app')

@section('page_title', 'Gestione Posts')

@section('page_content')
    <div class="container mt-5 py-5">
        <h2>Modifica il Post</h2>
        <form action="{{ route('admin.posts.update', $post->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="input-group">
                
                <label for="image" class="form-label @error('image') is-invalid @enderror">Carica un'immagine di copertina</label>
                <input class="form-control" name="image" type="file" id="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
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
                    <option value="{{ $category->id }}" {{ $post->category->id === $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
                @error('cateogory_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </select>
            <div class="form-group">
                <label>Tags</label>
                <select type="text" name="tags[]" class="form-control @error('tags') is-invalid @enderror" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $post->tag->contains($tag) ? 'selected' : '' }}>
                            {{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tags')
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

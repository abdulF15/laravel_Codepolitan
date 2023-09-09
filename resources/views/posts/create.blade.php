@extends('layouts.app')
@section('title','Create Post')
@section('content')
    <div class="container">
        <h1>Create New Form</h1>
        <form action="{{ url('posts') }}" method="POST" class="form-control">
            @csrf
            <div class="mb-3">
                <label for="Title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="Title" placeholder="Judul Blog" name="title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary"> Simpan </button>
        </form>
    </div>
    
@endsection

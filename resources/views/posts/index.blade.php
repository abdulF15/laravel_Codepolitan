@extends('layouts.app')

@section('title','Index Blog')

@section('content')
    <h1>
        Blog Abdul
        <a href="{{url("posts/create")}}" class="mx-2 btn btn-secondary">New Blog!</a>
    </h1>
    <h3>{{ $Title }}</h3>

    @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <p class="card-text"><small class="text-muted">Last updated at {{date("d M Y H:i",strtotime($post->created_at))}}</small></p>
                <a href="{{ url("posts/$post->id") }}" class="btn btn-secondary">Selengkapnya</a>
                <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-warning">EDIT</a>
                <form action="{{url("posts/$post->id")}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button onclick="confirm('Apa anda Yakin ingin menghapus ?')" class="btn btn-danger m-2" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach 
@endsection


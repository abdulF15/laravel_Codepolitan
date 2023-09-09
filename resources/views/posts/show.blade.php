@extends("layouts.app")
@section('title',"Detail : $post->title")
@section('content')
    <div class="container mb-3">
        <article class="blog-post">
            <h2 class="blog-post-title mb-1">{{$post->title}}</h2>
            <p class="blog-post-meta">{{date("d M Y H:i",strtotime($post->created_at))}} </p>
            <p>{{$post->content}}</p>
        </article>
        <a href="{{url("posts")}}"  class="btn btn-secondary">< Kembali</a>
        <ul class="list-group mt-3">
            <h1>Contoh Comments</h1>
            <small>{{$totCom}} komentar</small>
            @foreach ($comments as $comment)
                <li class="list-group-item">{{$comment->comment}}</li>     
            @endforeach
        </ul>
    </div>
@endsection
   
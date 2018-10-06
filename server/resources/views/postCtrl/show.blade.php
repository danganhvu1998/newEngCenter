@extends('layouts.app')

@section('content')
    @if ($status == 1)
        <h3>Active Post</h3>
    @else
        <h3>Hidden Post</h3>
    @endif  
    <br>

    @foreach($posts as $post)
        <div class="row">
            <div class="col-md-3">
                <a href="/ADMIN/post/edit/{{$post->id}}">
                    <img height="150" width="150"  src='{{$post->img_url}}'>
                </a>
            </div>
            <div class="col-md-8">
                <h4>{{$post->title}}</h4><br>
                <p>{{$post->sum_up}}</p>
            </div>
            <div class="col-md-1">
                <div class="row">
                    <a href="/ADMIN/post/edit/{{$post->id}}">
                        <button class="btn btn-primary">edit</button>
                    </a>
                </div>  
                <hr>  
                <div class="row">
                    <a href="/ADMIN/post/edit_status/{{$post->id}}">
                        <button class="btn btn-primary">on/off</button>
                    </a>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
    <div class="row">
        <div class="col-lg-10 text-center">
            <a href="/posts/show/{{$status}}/1" class="btn btn-primary">1</a>
            <div class="btn-group">
                <a href="/posts/show/{{$status}}/{{$pageNum-2}}" class="btn btn-primary"><<</a>
                <a href="/posts/show/{{$status}}/{{$pageNum-1}}" class="btn btn-primary"><</a>
                <a class="btn btn-primary">Current Page: {{$pageNum}}</a>
                <a href="/posts/show/{{$status}}/{{$pageNum+1}}" class="btn btn-primary">></a>
                <a href="/posts/show/{{$status}}/{{$pageNum+2}}" class="btn btn-primary">>></a>
                <a href="/posts/show/{{$status}}/{{$pageNum+5}}" class="btn btn-primary">+5 Pages</a>
                <a href="/posts/show/{{$status}}/{{$pageNum+10}}" class="btn btn-primary">+10 Pages</a>
            </div>
        </div> 
    </div>
@endsection

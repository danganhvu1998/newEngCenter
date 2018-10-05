@extends('layouts.app')

@section('content')
	<h1><strong>Edit Post</strong></h1>
	{!! Form::open(['action' => 'PostsController@editing', 'method' => 'POST']) !!}
		{{Form::hidden('id', $post->id)}}
		<div class="form-group">
			{{Form::label('title', "Post Name <required>")}}
			{{Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'Title'])}}
		</div>
		<div class="form-group">
			{{Form::label('title', "Post Sum Up")}}
			{{Form::text('sum_up', $post->sum_up, ['class'=>'form-control', 'placeholder'=>'Post Sum Up - Make it short!'])}}
		</div>
		<div class="form-group">
			{{Form::label('title', "Image URL")}}
			{{Form::text('img_url', $post->img_url, ['class'=>'form-control', 'placeholder'=>"Paste Image's url here"])}}
		</div>
		<div class="form-group">
			{{Form::label('title', "Post Type")}}
			{{Form::select('type', [0 => 'Class Update',1 => 'Infomation Update'], $post->type)}}
		</div>
		<div class="form-group">
			{{Form::label('title', "Primary")}}
			{{Form::select('primary', [0 => 'Regular Post',1 => 'Important Post', 2 => 'Super Important Post'], $post->primary)}}
		</div>
		<div class="form-group">
			{{Form::label('title', "Post Body <required>")}}
			{{Form::textarea('post', $post->post, ['id'=>'article-ckeditor', 'class'=>'form-control', 'placeholder'=>'Post Text'])}}
		</div>
		{{Form::submit('Post', ['class' => 'btn btn-dark'])}}
	{!! Form::close() !!}
@endsection

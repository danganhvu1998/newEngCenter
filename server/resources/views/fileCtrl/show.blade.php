@extends('layouts.app')

@section('content')
	<h1><strong>Upload New File</strong></h1>
    {!! Form::open(['action' => 'FilesController@storing', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="input-group mb-3">
            {{Form::file('file')}}
            {{Form::select('type', [0 => "Normal", 1 => "Change Something From Page"], 0)}}
            {{Form::submit('UPLOAD (Maximum 2MB)', ['class' => 'btn btn-dark'])}}
        </div>
	{!! Form::close() !!}
	<hr>

	<!--End Form, Stast list-->
	@foreach($files as $file)
        <div class="row">
            <div class="col-md-4">
				<a href='/storage/file/{{$file->file_url}}'>
					<img height="150" width="200" src='/storage/file/{{$file->file_url}}' alt='{{$file->file_url}}'>
				</a>
			</div>
			<div class="col-md-7">
				storage/file/{{$file->file_url}}
			</div>
			<div class="col-md-1">
				<a href="/ADMIN/file/delete/{{$file->id}}">
					<button class="btn btn-primary">delete</button>
				</a>
			</div>
        </div>
        <hr>
	@endforeach
	<div class="row">
		<div class="col-lg-10 text-center">
			<a href="/ADMIN/file/store/1" class="btn btn-primary">1</a>
			<div class="btn-group">
				<a href="/ADMIN/file/store/{{$pageNum-2}}" class="btn btn-primary"><<</a>
				<a href="/ADMIN/file/store/{{$pageNum-1}}" class="btn btn-primary"><</a>
				<a class="btn btn-primary">Current Page: {{$pageNum}}</a>
				<a href="/ADMIN/file/store/{{$pageNum+1}}" class="btn btn-primary">></a>
				<a href="/ADMIN/file/store/{{$pageNum+2}}" class="btn btn-primary">>></a>
				<a href="/ADMIN/file/store/{{$pageNum+5}}" class="btn btn-primary">+5 Pages</a>
				<a href="/ADMIN/file/store/{{$pageNum+10}}" class="btn btn-primary">+10 Pages</a>
			</div>
		</div>
	</div>

@endsection

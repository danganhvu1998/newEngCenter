@extends('layouts.app')

@section('content')
    @foreach($tests as $test)
        <div class="row">
            <div class="col-md-3">
                <strong>Created At: {{$test->created_at}}<br></strong>
                Last Edit At: {{$test->updated_at}}<br>
                <strong>Name: {{$test->name}}<br></strong>
                Phone: {{$test->phone}}<br>
                <strong>Subject: {{$test->subject}}</strong>
            </div>
            <div class="col-md-6">
                {!!$test->submisson!!}
            </div>
            <div class="col-md-3">
                @if($test->score>90)
                    {!! Form::open(['action' => 'FreeTestsController@scoring', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::hidden('testID', $test->id, ['class'=>'form-control'])}}
                            {{Form::number('score', '', ['class'=>'form-control', 'placeholder'=>'Score 00(0.0) -> 90(9.0)'])}}
                            {{Form::textarea('note', '', ['class'=>'form-control', "rows"=>"4", 'placeholder'=>'Any Note?'])}}
                        </div>
                        {{Form::submit('Score', ['class' => 'btn btn-dark'])}}
                    {!! Form::close() !!}
                @else
                    <span>Score: {{$test->score}}</span><hr>
                    <span>Note: {{$test->note}}</span>
                @endif
            </div>
        </div>
        <hr>
    @endforeach
    <div class="row">
        <div class="col-lg-10 text-center">
            <a href="/ADMIN/freetest/1" class="btn btn-primary">1</a>
            <div class="btn-group">
                <a href="/ADMIN/freetest/{{$pageNum-2}}" class="btn btn-primary"><<</a>
                <a href="/ADMIN/freetest/{{$pageNum-1}}" class="btn btn-primary"><</a>
                <a class="btn btn-primary">Current Page: {{$pageNum}}</a>
                <a href="/ADMIN/freetest/{{$pageNum+1}}" class="btn btn-primary">></a>
                <a href="/ADMIN/freetest/{{$pageNum+2}}" class="btn btn-primary">>></a>
                <a href="/ADMIN/freetest/{{$pageNum+5}}" class="btn btn-primary">+5 Pages</a>
                <a href="/ADMIN/freetest/{{$pageNum+10}}" class="btn btn-primary">+10 Pages</a>
            </div>
        </div> 
    </div>
@endsection

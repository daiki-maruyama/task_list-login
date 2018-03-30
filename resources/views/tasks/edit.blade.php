@extends('layouts.app')

@section('content')

    <h1>id[ {{ $task->id }} ]の編集ページ</h1>

    {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
    
    	{!! Form::label('title', 'タイトル') !!}
        {!! Form::text('title') !!}
        
        {!! Form::label('status', 'status') !!}
        {!! Form::text('status') !!}

        {!! Form::label('content', '内容') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('更新') !!}

    {!! Form::close() !!}

@endsection
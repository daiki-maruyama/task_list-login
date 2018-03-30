@extends('layouts.app')

@section('content')

    <h1>新規タスク作成ページ</h1>

    {!! Form::model($task, ['route' => 'tasks.store']) !!}
    
    	{!! Form::label('tiile', 'タイトル:') !!}
        {!! Form::text('title') !!}
        
        {!! Form::label('status', 'status') !!}
        {!! Form::text('status') !!}

        {!! Form::label('content', '内容') !!}
        {!! Form::text('content') !!}

        {!! Form::submit('投稿') !!}

    {!! Form::close() !!}

@endsection
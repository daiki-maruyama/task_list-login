<!--詳細表示ページ-->

@extends('layouts.app')

@section('content')

    <h1>id [{{ $task->id }}] の詳細ページ</h1>
    
    <p>タイトル：{{ $task->title }}</p>
    
    <p>status：{{ $task->status }}</p>
    
    <p>内容：{{ $task->content }}</p>
    
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id]) !!}
    
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}


@endsection
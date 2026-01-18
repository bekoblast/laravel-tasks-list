@extends('layouts.app')

@section('title', 'The List of Task!')

@section('content')
    @forelse ($tasks as $task )
    <div>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
    </div>
    @empty
    <div>No tasks available.</div>
    @endforelse
@endsection
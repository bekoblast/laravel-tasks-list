@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('styles')

@endsection

@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            {{-- note: old() is laravel helper that keep the correct data in form if the user submit unvalidated data! also it also work in POST method forms! --}}
            <label for="title">Title</label>
            <input @class(['border-red-500' => $errors->has('title')]) type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- ####################################################################### --}}
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea @class(['border-red-500' => $errors->has('description')]) name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- ####################################################################### --}}
        <div class="mb-4">
            <label for="long_description">Long Description</label>
            <textarea @class(['border-red-500' => $errors->has('long_description')]) name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        {{-- ####################################################################### --}}
        <div class="flex gap-2 mb-4 items-center">
            <button type="submit" class="btn">
                {{ isset($task) ? 'Update Task' : 'Add Task' }}
            </button>

            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
        {{-- ####################################################################### --}}
    </form>
@endsection
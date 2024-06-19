@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error ('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $task->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error ('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select @error ('status') is-invalid @enderror" id="status" name="status">
                <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>PENDING</option>
                <option value="in-progress" {{ old('status', $task->status) == 'in-progress' ? 'selected' : '' }}>IN PROGRESS</option>
                <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>COMPLETED</option>
            </select>
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
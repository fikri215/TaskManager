@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <h1>Task List</h1>

    <form method="GET" action="{{ route('tasks.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ request('title') }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>PENDING</option>
                        <option value="in-progress" {{ request('status') == 'in-progress' ? 'selected' : '' }}>IN PROGRESS</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>COMPLETED</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Add Task</a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if ($task->status == 'pending')
                                <span class="badge bg-primary">PENDING</span>
                            @elseif ($task->status == 'in-progress')
                                <span class="badge bg-warning">IN PROGRESS</span>
                            @elseif ($task->status == 'completed')
                                <span class="badge bg-success">COMPLETED</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>

                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this task?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-2">
                {!! $tasks->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
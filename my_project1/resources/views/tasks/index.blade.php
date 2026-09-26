@extends('layouts.app')

@section('title', 'All Tasks - Personal Task Manager')

@section('content')

    <div class="box">
        <p>Total Tasks: {{ $pendingCount + $completedCount }} |
           Pending: {{ $pendingCount }} |
           Completed: {{ $completedCount }}</p>

        <p>
            <a href="{{ route('tasks.index') }}">All</a> |
            <a href="{{ route('tasks.index', ['status' => 'Pending']) }}">Pending</a> |
            <a href="{{ route('tasks.index', ['status' => 'Completed']) }}">Completed</a>
        </p>

        <a href="{{ route('tasks.create') }}" class="btn btn-blue">+ Add Task</a>

        <br><br>

        @if ($tasks->isEmpty())
            <p>No tasks found. Click "Add Task" to create your first one.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ Str::limit($task->description, 60) ?: '-' }}</td>
                            <td>{{ $task->due_date ? $task->due_date->format('M d, Y') : '-' }}</td>
                            <td>
                                @if ($task->status === 'Pending')
                                    <span class="status status-pending">Pending</span>
                                @else
                                    <span class="status status-completed">Completed</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('tasks.status', $task) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="{{ $task->status === 'Pending' ? 'Completed' : 'Pending' }}">
                                    <button type="submit" class="btn btn-gray">
                                        Mark as {{ $task->status === 'Pending' ? 'Completed' : 'Pending' }}
                                    </button>
                                </form>

                                <a href="{{ route('tasks.edit', $task) }}" class="btn btn-blue">Edit</a>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;"
                                      onsubmit="return confirm('Delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

@endsection
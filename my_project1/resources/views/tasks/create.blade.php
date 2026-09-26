@extends('layouts.app')

@section('title', 'Add Task - Personal Task Manager')

@section('content')

    <div class="box">
        <h2>Add New Task</h2>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <label for="task_name">Task Name</label>
            <input type="text" id="task_name" name="task_name" value="{{ old('task_name') }}" placeholder="e.g. Finish Laravel project">
            @error('task_name') <div class="error">{{ $message }}</div> @enderror

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Optional details about the task">{{ old('description') }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror

            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}">
            @error('due_date') <div class="error">{{ $message }}</div> @enderror

            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="Pending" {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ old('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status') <div class="error">{{ $message }}</div> @enderror

            <button type="submit" class="btn btn-blue">Save Task</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-gray">Cancel</a>
        </form>
    </div>

@endsection
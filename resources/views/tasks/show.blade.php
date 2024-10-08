<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Task Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <p class="card-text">
                <strong>Status:</strong> {{ $task->is_completed ? 'Completed' : 'Pending' }}
            </p>
            <a href="{{ url('tasks/' . $task->id . '/edit') }}" class="btn btn-warning">Edit Task</a>
            <form action="{{ url('tasks/' . $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?');">Delete Task</button>
            </form>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Task List</a>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('partials.footer')

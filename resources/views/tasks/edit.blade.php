<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Edit Task</h1>
    
    <form action="{{ url('tasks/' . $task->id) }}" method="POST">
        @csrf
        @method('PUT')  <!-- This is used to spoof the PUT request -->
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="hidden" name="is_completed" value="0">  <!-- Hidden input for unchecked state -->
            <input type="checkbox" name="is_completed" id="is_completed" class="form-check-input" value="1" {{ $task->is_completed ? 'checked' : '' }}>
            <label for="is_completed" class="form-check-label">Completed</label>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('partials.footer')

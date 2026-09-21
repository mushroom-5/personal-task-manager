<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }

        textarea {
            height: 120px;
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
        }

        .error {
            background-color: #f8d7da;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Task</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Task Name</label>
        <input
            type="text"
            name="task_name"
            value="{{ old('task_name', $task->task_name) }}"
            required
        >

        <label>Description</label>
        <textarea
            name="description"
            required
        >{{ old('description', $task->description) }}</textarea>

        <label>Status</label>
        <select name="status" required>
            <option value="Pending"
                {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>
        </select>

        <label>Due Date</label>
        <input
            type="date"
            name="due_date"
            value="{{ old('due_date', $task->due_date) }}"
            required
        >

        <button type="submit">
            Update Task
        </button>

    </form>

    <a href="{{ route('tasks.index') }}" class="back-button">
        ← Back to Tasks
    </a>

</div>

</body>
</html>
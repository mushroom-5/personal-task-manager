<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
        }

        .add-button {
            display: inline-block;
            background-color: #198754;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .success {
            background-color: #d1e7dd;
            padding: 10px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        .edit-button {
            background-color: #0d6efd;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <a href="{{ route('tasks.create') }}" class="add-button">
        + Add Task
    </a>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($tasks as $task)

                <tr>
                    <td>{{ $task->task_name }}</td>

                    <td>{{ $task->description }}</td>

                    <td>{{ $task->status }}</td>

                    <td>{{ $task->due_date }}</td>

                    <td>
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="edit-button">
                            Edit
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}"
                              method="POST"
                              style="display: inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="delete-button"
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                Delete
                            </button>

                        </form>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5">
                        No tasks yet.
                    </td>
                </tr>

            @endforelse

        </tbody>
    </table>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Task Center | Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #0b1120;
            color: #e5e7eb;
            min-height: 100vh;
        }

        .container {
            width: 92%;
            max-width: 1250px;
            margin: auto;
            padding: 30px 0;
        }

        /* Top Navigation */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 22px;
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f2438;
            border: 1px solid #2563eb;
            border-radius: 10px;
            color: #60a5fa;
            font-size: 20px;
            font-weight: bold;
        }

        .brand h1 {
            font-size: 19px;
            color: white;
            letter-spacing: 0.5px;
        }

        .brand span {
            font-size: 11px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .system-status {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: #94a3b8;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 8px #22c55e;
        }

        /* Hero */
        .hero {
            margin-bottom: 25px;
        }

        .hero-label {
            font-size: 12px;
            color: #60a5fa;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        .hero h2 {
            font-size: 32px;
            color: white;
            margin-bottom: 8px;
        }

        .hero p {
            color: #94a3b8;
        }

        /* Add Button */
        .add-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
            padding: 12px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid #3b82f6;
            transition: 0.2s;
        }

        .add-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* Success */
        .success {
            background: #0f2d20;
            border: 1px solid #166534;
            color: #86efac;
            padding: 14px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Summary */
        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .card {
            position: relative;
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            padding: 20px;
            overflow: hidden;
        }

        .card::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: rgba(37, 99, 235, 0.08);
            transform: translate(30px, -30px);
        }

        .card-title {
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .card-number {
            font-size: 30px;
            font-weight: 700;
            color: white;
        }

        /* Task Panel */
        .task-panel {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            overflow: hidden;
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 22px;
            border-bottom: 1px solid #1f2937;
        }

        .panel-header h3 {
            color: white;
            font-size: 18px;
        }

        .panel-code {
            font-family: Consolas, monospace;
            font-size: 11px;
            color: #64748b;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 14px 16px;
            background: #0f172a;
            color: #64748b;
            font-size: 11px;
            text-align: left;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #1f2937;
            color: #cbd5e1;
            font-size: 14px;
        }

        tr:hover {
            background: #0f172a;
        }

        .task-name {
            color: white;
            font-weight: 600;
        }

        .description {
            color: #94a3b8;
            max-width: 280px;
        }

        /* Status */
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 700;
        }

        .pending {
            background: #332701;
            color: #fbbf24;
            border: 1px solid #854d0e;
        }

        .completed {
            background: #0f2d20;
            color: #86efac;
            border: 1px solid #166534;
        }

        /* Actions */
        .actions {
            white-space: nowrap;
        }

        .edit-button {
            display: inline-block;
            padding: 7px 11px;
            background: #172554;
            border: 1px solid #2563eb;
            color: #60a5fa;
            text-decoration: none;
            border-radius: 6px;
            font-size: 12px;
            margin-right: 5px;
        }

        .edit-button:hover {
            background: #1e3a8a;
        }

        .delete-button {
            padding: 7px 11px;
            background: #2a1215;
            border: 1px solid #991b1b;
            color: #fca5a5;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
        }

        .delete-button:hover {
            background: #450a0a;
        }

        .empty {
            text-align: center;
            padding: 45px;
            color: #64748b;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding-top: 25px;
            color: #475569;
            font-size: 11px;
            font-family: Consolas, monospace;
        }

        @media (max-width: 800px) {
            .summary {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                gap: 15px;
                flex-direction: column;
            }

            .hero h2 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Top Bar -->
    <div class="topbar">

        <div class="brand">

            <div class="brand-icon">
                T
            </div>

            <div>
                <h1>TASK CENTER</h1>
                <span>Personal Task Management System</span>
            </div>

        </div>

        <div class="system-status">
            <span class="status-dot"></span>
            SYSTEM ONLINE
        </div>

    </div>


    <!-- Hero -->
    <div class="hero">

        <div class="hero-label">
            Dashboard / Overview
        </div>

        <h2>Manage your tasks.</h2>

        <p>
            Track your work, deadlines, and progress in one place.
        </p>

        <a href="{{ route('tasks.create') }}" class="add-button">
            + Add New Task
        </a>

    </div>


    <!-- Success -->
    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <!-- Summary -->
    <div class="summary">

        <div class="card">
            <div class="card-title">Total Tasks</div>

            <div class="card-number">
                {{ $tasks->count() }}
            </div>
        </div>


        <div class="card">
            <div class="card-title">Pending Tasks</div>

            <div class="card-number">
                {{ $tasks->where('status', 'Pending')->count() }}
            </div>
        </div>


        <div class="card">
            <div class="card-title">Completed Tasks</div>

            <div class="card-number">
                {{ $tasks->where('status', 'Completed')->count() }}
            </div>
        </div>

    </div>


    <!-- Task Panel -->
    <div class="task-panel">

        <div class="panel-header">

            <h3>Task Database</h3>

            <span class="panel-code">
                DATABASE: tasks
            </span>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($tasks as $task)

                        <tr>

                            <td class="task-name">
                                {{ $task->task_name }}
                            </td>


                            <td class="description">
                                {{ $task->description }}
                            </td>


                            <td>

                                @if($task->status == 'Completed')

                                    <span class="status completed">
                                        COMPLETED
                                    </span>

                                @else

                                    <span class="status pending">
                                        PENDING
                                    </span>

                                @endif

                            </td>


                            <td>
                                {{ $task->due_date }}
                            </td>


                            <td class="actions">

                                <a href="{{ route('tasks.edit', $task) }}"
                                   class="edit-button">
                                    Edit
                                </a>


                                <form
                                    action="{{ route('tasks.destroy', $task) }}"
                                    method="POST"
                                    style="display:inline;"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this task?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="empty">

                                No tasks found.<br><br>

                                Click <strong>+ Add New Task</strong>
                                to create your first task.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <div class="footer">
        PERSONAL TASK MANAGER // LARAVEL 12 // MYSQL
    </div>

</div>

</body>
</html>
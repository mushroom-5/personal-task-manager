<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task | Task Center</title>

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
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .system-name {
            font-family: Consolas, monospace;
            color: #60a5fa;
            font-size: 12px;
            letter-spacing: 2px;
        }

        .online {
            font-size: 11px;
            color: #22c55e;
            font-family: Consolas, monospace;
        }

        .form-panel {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            overflow: hidden;
        }

        .panel-header {
            padding: 25px;
            border-bottom: 1px solid #1f2937;
            background: #0f172a;
        }

        .panel-label {
            color: #60a5fa;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
        }

        h1 {
            color: white;
            font-size: 28px;
            margin-bottom: 6px;
        }

        .subtitle {
            color: #64748b;
            font-size: 13px;
        }

        .form-content {
            padding: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            margin-top: 18px;
            color: #cbd5e1;
            font-size: 13px;
            font-weight: 600;
        }

        label:first-child {
            margin-top: 0;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 12px 14px;
            background: #0b1120;
            border: 1px solid #334155;
            border-radius: 7px;
            color: white;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #2563eb;
        }

        textarea {
            height: 130px;
            resize: vertical;
        }

        select option {
            background: #111827;
            color: white;
        }

        .error {
            background: #2a1215;
            border: 1px solid #991b1b;
            color: #fca5a5;
            padding: 14px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .error ul {
            padding-left: 20px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .update-button,
        .cancel-button {
            flex: 1;
            padding: 12px;
            border-radius: 7px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .update-button {
            background: #2563eb;
            border: 1px solid #3b82f6;
            color: white;
        }

        .update-button:hover {
            background: #1d4ed8;
        }

        .cancel-button {
            background: #1e293b;
            border: 1px solid #334155;
            color: #cbd5e1;
        }

        .cancel-button:hover {
            background: #334155;
        }

        .footer {
            text-align: center;
            padding-top: 20px;
            color: #475569;
            font-size: 11px;
            font-family: Consolas, monospace;
        }

        @media (max-width: 600px) {

            body {
                padding: 15px;
            }

            .buttons {
                flex-direction: column;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <div class="topbar">

        <div class="system-name">
            TASK CENTER / EDIT RECORD
        </div>

        <div class="online">
            ● ONLINE
        </div>

    </div>


    <div class="form-panel">

        <div class="panel-header">

            <div class="panel-label">
                Task Management
            </div>

            <h1>Update Task</h1>

            <p class="subtitle">
                Modify the selected task and save the changes.
            </p>

        </div>


        <div class="form-content">

            @if ($errors->any())

                <div class="error">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form
                action="{{ route('tasks.update', $task) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name', $task->task_name) }}"
                    required
                >


                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    required
                >{{ old('description', $task->description) }}</textarea>


                <label for="status">
                    Status
                </label>

                <select id="status" name="status" required>

                    <option value="Pending"
                        {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>


                <label for="due_date">
                    Due Date
                </label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date', $task->due_date) }}"
                    required
                >


                <div class="buttons">

                    <button type="submit" class="update-button">
                        Save Changes
                    </button>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="cancel-button"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>


    <div class="footer">
        PERSONAL TASK MANAGER // UPDATE MODULE
    </div>

</div>

</body>
</html>
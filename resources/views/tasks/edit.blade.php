<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Task | Personal Task Manager</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;

            background:
                linear-gradient(
                    rgba(31, 52, 35, 0.82),
                    rgba(31, 52, 35, 0.82)
                ),
                url("https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=2000&q=80");

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            color: #263126;
            min-height: 100vh;
        }


        /* APP */

        .app {
            min-height: 100vh;
            display: flex;
        }


        /* SIDEBAR */

        .sidebar {
            width: 240px;

            background: rgba(28, 47, 32, 0.96);

            color: white;

            padding: 28px 18px;

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;
        }


        .brand {
            display: flex;

            align-items: center;

            gap: 12px;

            padding: 0 12px 30px;

            border-bottom:
                1px solid rgba(255,255,255,0.12);
        }


        .brand-icon {
            width: 42px;
            height: 42px;

            border-radius: 50%;

            background: #71844a;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 22px;
        }


        .brand h2 {
            font-size: 18px;
        }


        .brand p {
            font-size: 11px;

            color: #c7d0c4;

            margin-top: 4px;
        }


        /* NAVIGATION */

        .navigation {
            margin-top: 30px;
        }


        .navigation a {
            display: flex;

            align-items: center;

            gap: 14px;

            color: #e8eee5;

            text-decoration: none;

            padding: 14px;

            margin-bottom: 8px;

            border-radius: 10px;

            font-size: 14px;

            transition: 0.2s;
        }


        .navigation a:hover,
        .navigation a.active {
            background: #566c37;
        }


        .nav-icon {
            width: 22px;

            text-align: center;

            font-size: 18px;
        }


        .sidebar-bottom {
            position: absolute;

            bottom: 35px;

            left: 30px;
            right: 30px;

            color: #cdd6c9;

            font-size: 12px;

            line-height: 1.6;
        }


        /* MAIN */

        .main {
            margin-left: 240px;

            width: calc(100% - 240px);

            min-height: 100vh;
        }


        /* TOPBAR */

        .topbar {
            height: 75px;

            background: rgba(31, 53, 36, 0.96);

            color: white;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 38px;
        }


        .topbar-title {
            font-size: 18px;

            font-weight: bold;
        }


        .system-status {
            font-size: 12px;

            color: #c8d5b9;
        }


        /* CONTENT */

        .content {
            max-width: 1050px;

            margin: 0 auto;

            padding: 45px 30px;
        }


        .breadcrumb {
            font-size: 13px;

            color: #e2e6db;

            margin-bottom: 12px;
        }


        .page-title {
            font-size: 34px;

            color: white;

            margin-bottom: 8px;
        }


        .page-description {
            color: #e2e7df;

            margin-bottom: 30px;
        }


        /* FORM CARD */

        .form-card {
            background: rgba(248, 247, 238, 0.97);

            border-radius: 18px;

            padding: 35px;

            box-shadow:
                0 15px 45px rgba(0,0,0,0.25);
        }


        .form-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            border-bottom:
                1px solid #d8d8c9;

            padding-bottom: 20px;

            margin-bottom: 25px;
        }


        .form-header h2 {
            font-size: 23px;

            color: #283729;
        }


        .task-id {
            background: #e0dfd2;

            color: #59604f;

            padding: 7px 12px;

            border-radius: 20px;

            font-size: 12px;
        }


        .form-header p {
            color: #6c746b;

            margin-top: 6px;

            font-size: 14px;
        }


        /* FORM GRID */

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 22px;
        }


        .form-group {
            display: flex;

            flex-direction: column;
        }


        .full-width {
            grid-column: 1 / -1;
        }


        label {
            font-weight: bold;

            color: #344235;

            font-size: 14px;

            margin-bottom: 8px;
        }


        input,
        textarea,
        select {

            width: 100%;

            padding: 13px 14px;

            border:
                1px solid #c9cabb;

            border-radius: 9px;

            background: white;

            font-size: 14px;

            color: #293129;

            outline: none;

            transition: 0.2s;
        }


        textarea {

            min-height: 130px;

            resize: vertical;
        }


        input:focus,
        textarea:focus,
        select:focus {

            border-color: #607640;

            box-shadow:
                0 0 0 3px rgba(96,118,64,0.12);
        }


        /* ERRORS */

        .error {

            color: #a53d32;

            font-size: 12px;

            margin-top: 6px;
        }


        /* BUTTONS */

        .actions {

            display: flex;

            justify-content: space-between;

            gap: 12px;

            margin-top: 30px;

            padding-top: 25px;

            border-top:
                1px solid #d8d8c9;
        }


        .right-actions {

            display: flex;

            gap: 12px;
        }


        .btn {

            border: none;

            border-radius: 9px;

            padding: 13px 22px;

            font-size: 14px;

            font-weight: bold;

            cursor: pointer;

            text-decoration: none;

            display: inline-block;
        }


        .btn-cancel {

            background: #deddd2;

            color: #3c443b;
        }


        .btn-cancel:hover {

            background: #cecdc2;
        }


        .btn-update {

            background: #536a36;

            color: white;
        }


        .btn-update:hover {

            background: #405529;
        }


        /* MOBILE */

        @media (max-width: 800px) {

            .sidebar {

                width: 100%;

                height: auto;

                position: relative;
            }


            .app {

                display: block;
            }


            .main {

                margin-left: 0;

                width: 100%;
            }


            .navigation {

                display: flex;

                overflow-x: auto;
            }


            .navigation a {

                white-space: nowrap;
            }


            .sidebar-bottom {

                display: none;
            }


            .form-grid {

                grid-template-columns: 1fr;
            }


            .full-width {

                grid-column: auto;
            }


            .form-header {

                flex-direction: column;

                align-items: flex-start;

                gap: 10px;
            }


            .actions {

                flex-direction: column;
            }


            .right-actions {

                width: 100%;
            }


            .right-actions .btn {

                flex: 1;

                text-align: center;
            }


            .topbar {

                padding: 0 20px;
            }


            .content {

                padding: 30px 15px;
            }


            .page-title {

                font-size: 27px;
            }

        }

    </style>

</head>


<body>


<div class="app">


    <!-- SIDEBAR -->

    <aside class="sidebar">


        <div class="brand">

            <div class="brand-icon">
                ✓
            </div>


            <div>

                <h2>
                    Personal Task Manager
                </h2>

                <p>
                    Stay Organized • Get Things Done
                </p>

            </div>

        </div>


        <nav class="navigation">


            <a href="{{ route('tasks.index') }}">

                <span class="nav-icon">
                    ⌂
                </span>

                Dashboard

            </a>


            <a href="{{ route('tasks.create') }}">

                <span class="nav-icon">
                    ＋
                </span>

                Add Task

            </a>


            <a
                href="{{ route('tasks.index') }}"
                class="active"
            >

                <span class="nav-icon">
                    ☷
                </span>

                My Tasks

            </a>


            <a href="{{ route('tasks.index') }}">

                <span class="nav-icon">
                    ✓
                </span>

                Completed

            </a>


        </nav>


        <div class="sidebar-bottom">

            Small steps every day lead to big results.

            <br>

            🌿

        </div>


    </aside>



    <!-- MAIN -->

    <main class="main">


        <!-- TOPBAR -->

        <header class="topbar">


            <div class="topbar-title">

                Task Management

            </div>


            <div class="system-status">

                ● SYSTEM ONLINE

            </div>


        </header>



        <!-- CONTENT -->

        <section class="content">


            <div class="breadcrumb">

                DASHBOARD / MY TASKS / EDIT

            </div>


            <h1 class="page-title">

                Edit Task

            </h1>


            <p class="page-description">

                Update the information and status of your task.

            </p>



            <!-- FORM CARD -->

            <div class="form-card">


                <div class="form-header">


                    <div>

                        <h2>

                            Task Information

                        </h2>


                        <p>

                            Modify the details of this task below.

                        </p>

                    </div>


                    <div class="task-id">

                        TASK #{{ $task->id }}

                    </div>


                </div>



                <!-- UPDATE FORM -->

                <form
                    action="{{ route('tasks.update', $task->id) }}"
                    method="POST"
                >

                    @csrf

                    @method('PUT')


                    <div class="form-grid">


                        <!-- TASK NAME -->

                        <div class="form-group full-width">


                            <label for="task_name">

                                Task Name

                            </label>


                            <input
                                type="text"
                                id="task_name"
                                name="task_name"
                                value="{{ old('task_name', $task->task_name) }}"
                                placeholder="Enter task name"
                                required
                            >


                            @error('task_name')

                                <span class="error">

                                    {{ $message }}

                                </span>

                            @enderror


                        </div>



                        <!-- DESCRIPTION -->

                        <div class="form-group full-width">


                            <label for="description">

                                Description

                            </label>


                            <textarea
                                id="description"
                                name="description"
                                placeholder="Describe the task..."
                                required
                            >{{ old('description', $task->description) }}</textarea>


                            @error('description')

                                <span class="error">

                                    {{ $message }}

                                </span>

                            @enderror


                        </div>



                        <!-- STATUS -->

                        <div class="form-group">


                            <label for="status">

                                Status

                            </label>


                            <select
                                id="status"
                                name="status"
                                required
                            >

                                <option
                                    value="Pending"
                                    {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}
                                >

                                    Pending

                                </option>


                                <option
                                    value="Completed"
                                    {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}
                                >

                                    Completed

                                </option>

                            </select>


                            @error('status')

                                <span class="error">

                                    {{ $message }}

                                </span>

                            @enderror


                        </div>



                        <!-- DUE DATE -->

                        <div class="form-group">


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


                            @error('due_date')

                                <span class="error">

                                    {{ $message }}

                                </span>

                            @enderror


                        </div>


                    </div>



                    <!-- ACTIONS -->

                    <div class="actions">


                        <a
                            href="{{ route('tasks.index') }}"
                            class="btn btn-cancel"
                        >

                            Cancel

                        </a>


                        <div class="right-actions">


                            <!-- ONLY UPDATE BUTTON -->

                            <button
                                type="submit"
                                class="btn btn-update"
                            >

                                ✓ Update Task

                            </button>


                        </div>


                    </div>


                </form>


            </div>


        </section>


    </main>


</div>


</body>

</html>
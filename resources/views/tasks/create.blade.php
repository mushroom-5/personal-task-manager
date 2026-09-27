<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add New Task | Personal Task Manager</title>

    <style>
        /* =========================================================
           GLOBAL
        ========================================================= */

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            min-height: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #172033;

            background:
                radial-gradient(circle at 15% 15%, rgba(70, 130, 255, .20), transparent 28%),
                radial-gradient(circle at 85% 80%, rgba(0, 220, 190, .16), transparent 28%),
                linear-gradient(135deg, #07111f, #0c1d32 45%, #102b42);

            background-attachment: fixed;
        }

        a,
        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }


        /* =========================================================
           APP
        ========================================================= */

        .app {
            min-height: 100vh;
            width: 100%;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            width: 250px;

            padding: 25px 18px;

            z-index: 100;

            color: white;

            background:
                linear-gradient(
                    160deg,
                    rgba(12, 29, 51, .98),
                    rgba(5, 16, 30, .98)
                );

            border-right: 1px solid rgba(255,255,255,.08);

            box-shadow:
                12px 0 40px rgba(0,0,0,.30);

            overflow-y: auto;
        }

        .brand {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 5px 8px 25px;

            border-bottom: 1px solid rgba(255,255,255,.10);
        }

        .brand-icon {
            width: 46px;
            height: 46px;

            flex: 0 0 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 15px;

            color: white;

            background:
                linear-gradient(145deg, #4d9cff, #1764d1);

            font-size: 22px;
            font-weight: bold;

            box-shadow:
                5px 5px 12px rgba(0,0,0,.35),
                inset 2px 2px 5px rgba(255,255,255,.30);
        }

        .brand h2 {
            font-size: 16px;
            line-height: 1.25;
        }

        .brand p {
            margin-top: 5px;

            color: #9eacc0;

            font-size: 9px;
            line-height: 1.4;
        }

        .navigation {
            margin-top: 28px;
        }

        .navigation a {
            display: flex;
            align-items: center;

            gap: 13px;

            min-height: 48px;

            margin-bottom: 9px;
            padding: 12px 14px;

            border-radius: 12px;

            color: #b9c7d8;

            text-decoration: none;

            font-size: 13px;
            font-weight: 600;

            transition: .25s ease;
        }

        .navigation a:hover {
            color: white;

            background: rgba(65, 137, 235, .15);

            transform: translateX(3px);
        }

        .navigation a.active {
            color: white;

            background:
                linear-gradient(
                    135deg,
                    #287fe8,
                    #175cc0
                );

            box-shadow:
                5px 7px 15px rgba(0,0,0,.28),
                inset 1px 1px 4px rgba(255,255,255,.20);
        }

        .nav-icon {
            width: 22px;
            flex: 0 0 22px;

            text-align: center;

            font-size: 18px;
        }

        .sidebar-bottom {
            position: absolute;

            left: 25px;
            right: 25px;
            bottom: 28px;

            color: #8292a7;

            font-size: 11px;
            line-height: 1.6;
        }


        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            width: calc(100% - 250px);

            min-height: 100vh;

            margin-left: 250px;

            min-width: 0;
        }


        /* =========================================================
           TOPBAR
        ========================================================= */

        .topbar {
            min-height: 72px;

            padding: 15px 35px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            color: white;

            background:
                rgba(7, 19, 34, .78);

            border-bottom: 1px solid rgba(255,255,255,.08);

            backdrop-filter: blur(18px);
        }

        .topbar-title {
            font-size: 18px;
            font-weight: bold;
        }

        .system-status {
            padding: 8px 13px;

            border-radius: 20px;

            color: #83f0bc;

            background: rgba(51, 214, 143, .10);

            border: 1px solid rgba(51, 214, 143, .18);

            font-size: 11px;
            font-weight: bold;
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .content {
            width: 100%;
            max-width: 1100px;

            margin: auto;

            padding: 32px;
        }

        .breadcrumb {
            margin-bottom: 12px;

            color: #8fa1b7;

            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .page-title {
            margin-bottom: 8px;

            color: white;

            font-size: 32px;
            line-height: 1.2;
        }

        .page-description {
            margin-bottom: 25px;

            color: #b9c9da;

            font-size: 13px;
        }


        /* =========================================================
           FORM CARD
        ========================================================= */

        .form-card {
            position: relative;

            overflow: hidden;

            padding: 30px;

            border-radius: 22px;

            border: 1px solid rgba(255,255,255,.14);

            background:
                rgba(239, 245, 252, .96);

            box-shadow:
                0 25px 55px rgba(0,0,0,.30),
                inset 1px 1px 0 rgba(255,255,255,.70);

            backdrop-filter: blur(18px);
        }

        .form-card::after {
            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            right: -110px;
            top: -120px;

            border-radius: 50%;

            background:
                rgba(66, 139, 230, .08);

            pointer-events: none;
        }

        .form-header {
            position: relative;
            z-index: 1;

            padding-bottom: 20px;

            margin-bottom: 25px;

            border-bottom: 1px solid #dce4ec;
        }

        .form-header h2 {
            color: #14253b;

            font-size: 23px;
        }

        .form-header p {
            margin-top: 6px;

            color: #6d7b8d;

            font-size: 13px;
        }


        /* =========================================================
           FORM
        ========================================================= */

        form {
            position: relative;
            z-index: 1;
        }

        .form-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 22px;
        }

        .form-group {
            display: flex;

            flex-direction: column;

            min-width: 0;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            margin-bottom: 8px;

            color: #2b3d53;

            font-size: 13px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;

            padding: 13px 14px;

            border: 1px solid #ccd7e2;

            border-radius: 11px;

            outline: none;

            color: #24364b;

            background: rgba(255,255,255,.96);

            font-size: 14px;

            box-shadow:
                inset 1px 2px 5px rgba(0,0,0,.035);

            transition:
                border-color .2s ease,
                box-shadow .2s ease,
                transform .2s ease;
        }

        input:hover,
        textarea:hover,
        select:hover {
            border-color: #b6c7da;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #3489e6;

            box-shadow:
                0 0 0 3px rgba(52,137,230,.12),
                inset 1px 2px 5px rgba(0,0,0,.03);
        }

        textarea {
            min-height: 140px;

            resize: vertical;

            line-height: 1.5;
        }

        input::placeholder,
        textarea::placeholder {
            color: #9aa7b5;
        }


        /* =========================================================
           VALIDATION
        ========================================================= */

        .error {
            margin-top: 6px;

            color: #bd3d48;

            font-size: 11px;
            line-height: 1.4;
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;

            gap: 12px;

            margin-top: 30px;
            padding-top: 25px;

            border-top: 1px solid #dce4ec;
        }

        .btn {
            min-height: 44px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 11px 20px;

            border: none;
            border-radius: 10px;

            font-size: 13px;
            font-weight: bold;

            text-decoration: none;

            cursor: pointer;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-cancel {
            color: #405064;

            background:
                linear-gradient(145deg, #eef2f6, #d9e0e8);

            border: 1px solid #ccd6e0;

            box-shadow:
                3px 5px 10px rgba(0,0,0,.08);
        }

        .btn-cancel:hover {
            background:
                linear-gradient(145deg, #e4e9ef, #d0d8e2);
        }

        .btn-save {
            color: white;

            background:
                linear-gradient(145deg, #348ee9, #155db6);

            box-shadow:
                4px 6px 14px rgba(25,92,174,.28),
                inset 1px 1px 3px rgba(255,255,255,.20);
        }

        .btn-save:hover {
            background:
                linear-gradient(145deg, #277fd9, #1251a1);

            box-shadow:
                5px 8px 17px rgba(25,92,174,.34);
        }


        /* =========================================================
           LARGE TABLET
        ========================================================= */

        @media (max-width: 1150px) {

            .sidebar {
                width: 220px;
            }

            .main {
                width: calc(100% - 220px);

                margin-left: 220px;
            }

            .content {
                padding: 28px 22px;
            }
        }


        /* =========================================================
           TABLET
        ========================================================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 190px;

                padding: 20px 13px;
            }

            .main {
                width: calc(100% - 190px);

                margin-left: 190px;
            }

            .brand h2 {
                font-size: 14px;
            }

            .navigation a {
                padding: 11px 9px;

                gap: 8px;

                font-size: 12px;
            }

            .topbar {
                padding: 14px 20px;
            }

            .content {
                padding: 24px 17px;
            }

            .form-card {
                padding: 24px;
            }
        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media (max-width: 700px) {

            .app {
                display: block;
            }

            .sidebar {
                position: relative;

                width: 100%;

                height: auto;

                padding: 15px;

                overflow: visible;
            }

            .brand {
                padding: 3px 3px 15px;
            }

            .brand-icon {
                width: 40px;
                height: 40px;

                flex-basis: 40px;
            }

            .navigation {
                display: flex;

                width: 100%;

                margin-top: 12px;

                gap: 7px;

                overflow-x: auto;

                padding-bottom: 4px;

                -webkit-overflow-scrolling: touch;
            }

            .navigation a {
                flex: 0 0 auto;

                min-height: 42px;

                margin-bottom: 0;

                padding: 10px 12px;

                font-size: 11px;
            }

            .sidebar-bottom {
                display: none;
            }

            .main {
                width: 100%;

                margin-left: 0;
            }

            .topbar {
                min-height: 60px;

                padding: 12px 15px;
            }

            .topbar-title {
                font-size: 14px;
            }

            .system-status {
                padding: 7px 10px;

                font-size: 9px;
            }

            .content {
                padding: 20px 12px;
            }

            .breadcrumb {
                font-size: 9px;
            }

            .page-title {
                font-size: 25px;
            }

            .page-description {
                font-size: 12px;

                line-height: 1.5;
            }

            .form-card {
                padding: 19px;

                border-radius: 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;

                gap: 18px;
            }

            .full-width {
                grid-column: auto;
            }

            .form-header h2 {
                font-size: 20px;
            }

            .actions {
                flex-direction: column-reverse;

                align-items: stretch;
            }

            .btn {
                width: 100%;

                min-height: 46px;
            }
        }


        /* =========================================================
           SMALL PHONES
        ========================================================= */

        @media (max-width: 480px) {

            .sidebar {
                padding: 12px;
            }

            .brand h2 {
                font-size: 13px;
            }

            .brand p {
                font-size: 8px;
            }

            .navigation a {
                padding: 9px 10px;

                font-size: 10px;
            }

            .topbar {
                align-items: flex-start;

                flex-direction: column;

                gap: 6px;
            }

            .content {
                padding: 16px 9px;
            }

            .page-title {
                font-size: 22px;
            }

            .form-card {
                padding: 15px;

                border-radius: 15px;
            }

            .form-header {
                padding-bottom: 16px;

                margin-bottom: 20px;
            }

            input,
            textarea,
            select {
                font-size: 16px;
            }
        }


        /* =========================================================
           EXTRA SMALL PHONES
        ========================================================= */

        @media (max-width: 360px) {

            .navigation {
                gap: 5px;
            }

            .navigation a {
                padding: 8px 9px;

                font-size: 9px;
            }

            .content {
                padding-left: 7px;
                padding-right: 7px;
            }

            .form-card {
                padding: 13px;
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


            <a
                href="{{ route('tasks.create') }}"
                class="active"
            >

                <span class="nav-icon">
                    ＋
                </span>

                Add Task

            </a>


            <a href="{{ route('tasks.index') }}">

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

            <br><br>

            ✦

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
                DASHBOARD / ADD TASK
            </div>


            <h1 class="page-title">
                Create New Task
            </h1>


            <p class="page-description">
                Add a new task and keep your work organized.
            </p>


            <!-- FORM CARD -->

            <div class="form-card">


                <div class="form-header">

                    <h2>
                        Task Information
                    </h2>

                    <p>
                        Enter the details of your new task below.
                    </p>

                </div>


                <form
                    action="{{ route('tasks.store') }}"
                    method="POST"
                >

                    @csrf


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
                                value="{{ old('task_name') }}"
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
                            >{{ old('description') }}</textarea>


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
                                    {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}
                                >
                                    Pending
                                </option>


                                <option
                                    value="Completed"
                                    {{ old('status') == 'Completed' ? 'selected' : '' }}
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
                                value="{{ old('due_date') }}"
                                required
                            >


                            @error('due_date')

                                <span class="error">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                    </div>


                    <!-- ACTION BUTTONS -->

                    <div class="actions">


                        <a
                            href="{{ route('tasks.index') }}"
                            class="btn btn-cancel"
                        >
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="btn btn-save"
                        >
                            ＋ Create Task
                        </button>


                    </div>


                </form>

            </div>


        </section>

    </main>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Personal Task Manager</title>

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
                    rgba(28, 45, 31, 0.82),
                    rgba(28, 45, 31, 0.82)
                ),
                url("https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=2000&q=80");

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            color: #263126;
            min-height: 100vh;
        }

        /* =========================
           APPLICATION
        ========================= */

        .app {
            min-height: 100vh;
            display: flex;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 240px;
            background: rgba(28, 47, 32, 0.97);
            color: white;

            padding: 28px 18px;

            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;

            z-index: 10;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 0 12px 28px;

            border-bottom: 1px solid rgba(255,255,255,0.12);
        }

        .brand-icon {
            width: 43px;
            height: 43px;

            border-radius: 50%;

            background: #71844a;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
        }

        .brand h2 {
            font-size: 17px;
        }

        .brand p {
            font-size: 10px;
            color: #c7d0c4;
            margin-top: 4px;
        }

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

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 240px;

            width: calc(100% - 240px);

            min-height: 100vh;
        }

        /* =========================
           TOP BAR
        ========================= */

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

        /* =========================
           CONTENT
        ========================= */

        .content {
            max-width: 1400px;

            margin: 0 auto;

            padding: 35px 30px;
        }

        .breadcrumb {
            font-size: 12px;

            color: #e0e5dc;

            margin-bottom: 10px;
        }

        .welcome {
            background: rgba(248,247,238,0.96);

            border-radius: 18px;

            padding: 28px 30px;

            margin-bottom: 22px;

            display: flex;

            align-items: center;
            justify-content: space-between;

            box-shadow: 0 12px 35px rgba(0,0,0,0.18);
        }

        .welcome h1 {
            font-size: 30px;

            color: #263126;

            margin-bottom: 8px;
        }

        .welcome p {
            color: #697067;

            font-size: 14px;
        }

        .date-box {
            text-align: right;

            color: #4e5d48;

            font-size: 13px;
        }

        .date-box strong {
            display: block;

            color: #273528;

            font-size: 14px;

            margin-top: 4px;
        }

        /* =========================
           STAT CARDS
        ========================= */

        .stats {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 18px;

            margin-bottom: 22px;
        }

        .stat-card {
            border-radius: 16px;

            padding: 24px;

            min-height: 140px;

            position: relative;

            overflow: hidden;

            box-shadow: 0 10px 30px rgba(0,0,0,0.18);
        }

        .stat-card.total {
            background: #657b45;
            color: white;
        }

        .stat-card.pending {
            background: #ddd9c9;
            color: #293329;
        }

        .stat-card.completed {
            background: #31553a;
            color: white;
        }

        .stat-icon {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: rgba(255,255,255,0.78);

            color: #40552f;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;

            margin-bottom: 14px;
        }

        .stat-card h3 {
            font-size: 13px;

            font-weight: normal;

            margin-bottom: 6px;
        }

        .stat-number {
            font-size: 32px;

            font-weight: bold;
        }

        .stat-description {
            font-size: 11px;

            margin-top: 6px;

            opacity: 0.8;
        }

        /* =========================
           MAIN GRID
        ========================= */

        .dashboard-grid {
            display: grid;

            grid-template-columns: minmax(0, 1fr) 310px;

            gap: 22px;

            align-items: start;
        }

        /* =========================
           TASK PANEL
        ========================= */

        .task-panel {
            background: rgba(248,247,238,0.97);

            border-radius: 18px;

            padding: 25px;

            box-shadow: 0 12px 35px rgba(0,0,0,0.20);
        }

        .panel-header {
            display: flex;

            align-items: center;
            justify-content: space-between;

            margin-bottom: 20px;
        }

        .panel-title {
            display: flex;

            align-items: center;

            gap: 10px;
        }

        .panel-title h2 {
            font-size: 21px;

            color: #273328;
        }

        .panel-icon {
            color: #526b37;

            font-size: 22px;
        }

        .search-box {
            display: flex;

            gap: 8px;
        }

        .search-box input {
            width: 190px;

            padding: 10px 13px;

            border: 1px solid #d1d1c4;

            border-radius: 8px;

            outline: none;

            background: white;
        }

        .search-box input:focus {
            border-color: #657b45;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 700px;
        }

        thead {
            background: #e9e8dd;
        }

        th {
            text-align: left;

            padding: 13px 12px;

            color: #455240;

            font-size: 12px;

            text-transform: uppercase;
        }

        td {
            padding: 15px 12px;

            border-bottom: 1px solid #dddcd1;

            font-size: 13px;

            color: #394039;

            vertical-align: middle;
        }

        tbody tr:hover {
            background: #f0efe7;
        }

        .task-name {
            font-weight: bold;

            color: #29352a;
        }

        .description {
            color: #6c736b;

            max-width: 250px;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: bold;
        }

        .status-pending {
            background: #e1ded1;

            color: #655f4e;
        }

        .status-completed {
            background: #c8dec6;

            color: #2d5a37;
        }

        /* =========================
           ACTIONS
        ========================= */

        .actions {
            display: flex;

            gap: 6px;
        }

        .btn {
            border: none;

            border-radius: 7px;

            padding: 8px 11px;

            font-size: 11px;

            font-weight: bold;

            cursor: pointer;

            text-decoration: none;
        }

        .btn-edit {
            background: #657b45;

            color: white;
        }

        .btn-edit:hover {
            background: #506536;
        }

        .btn-delete {
            background: #a65343;

            color: white;
        }

        .btn-delete:hover {
            background: #883e31;
        }

        /* =========================
           SIDE PANEL
        ========================= */

        .side-column {
            display: flex;

            flex-direction: column;

            gap: 20px;
        }

        .side-card {
            background: rgba(248,247,238,0.97);

            border-radius: 16px;

            overflow: hidden;

            box-shadow: 0 12px 30px rgba(0,0,0,0.18);
        }

        .side-card-header {
            background: #31553a;

            color: white;

            padding: 17px 20px;

            font-size: 15px;

            font-weight: bold;
        }

        .side-card-body {
            padding: 18px;
        }

        /* QUICK ACTIONS */

        .quick-action {
            display: block;

            width: 100%;

            padding: 13px;

            margin-bottom: 10px;

            border-radius: 9px;

            text-decoration: none;

            font-size: 13px;

            text-align: left;

            color: #344032;

            background: #ecebe2;

            border: 1px solid #dfded2;

            transition: 0.2s;
        }

        .quick-action:hover {
            background: #dfe5d4;
        }

        .quick-action.primary {
            background: #5c733c;

            color: white;

            border: none;

            text-align: center;

            font-weight: bold;
        }

        .quick-action.primary:hover {
            background: #485e2f;
        }

        /* ACTIVITY */

        .activity-item {
            padding: 14px 0;

            border-bottom: 1px solid #dfded3;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-title {
            font-size: 12px;

            color: #384238;

            margin-bottom: 5px;
        }

        .activity-date {
            font-size: 10px;

            color: #858b83;
        }

        .activity-dot {
            width: 9px;

            height: 9px;

            display: inline-block;

            border-radius: 50%;

            background: #55743d;

            margin-right: 7px;
        }

        .empty {
            padding: 35px 15px;

            text-align: center;

            color: #7b8179;

            font-size: 14px;
        }

        /* =========================
           ALERT
        ========================= */

        .alert {
            background: #dcebd7;

            color: #315a36;

            padding: 13px 17px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 13px;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 1000px) {

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .side-column {
                display: grid;

                grid-template-columns: 1fr 1fr;
            }

        }

        @media (max-width: 800px) {

            .app {
                display: block;
            }

            .sidebar {
                width: 100%;

                height: auto;

                position: relative;
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

            .topbar {
                padding: 0 20px;
            }

            .content {
                padding: 25px 15px;
            }

            .welcome {
                display: block;
            }

            .date-box {
                text-align: left;

                margin-top: 15px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .side-column {
                grid-template-columns: 1fr;
            }

            .panel-header {
                display: block;
            }

            .search-box {
                margin-top: 15px;
            }

            .search-box input {
                width: 100%;
            }

        }
    </style>
</head>

<body>

<div class="app">

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                ✓
            </div>

            <div>
                <h2>Personal Task Manager</h2>

                <p>
                    Stay Organized • Get Things Done
                </p>
            </div>

        </div>


        <nav class="navigation">

            <a
                href="{{ route('tasks.index') }}"
                class="active"
            >
                <span class="nav-icon">⌂</span>

                Dashboard
            </a>


            <a href="{{ route('tasks.create') }}">

                <span class="nav-icon">＋</span>

                Add Task

            </a>


            <a href="{{ route('tasks.index') }}">

                <span class="nav-icon">☷</span>

                My Tasks

            </a>


            <a href="{{ route('tasks.index') }}">

                <span class="nav-icon">✓</span>

                Completed

            </a>

        </nav>


        <div class="sidebar-bottom">

            Small steps every day lead to big results.

            <br><br>

            🌿

        </div>

    </aside>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">


        <!-- TOP BAR -->

        <header class="topbar">

            <div class="topbar-title">

                Task Management Dashboard

            </div>


            <div class="system-status">

                ● SYSTEM ONLINE

            </div>

        </header>


        <!-- CONTENT -->

        <section class="content">


            <div class="breadcrumb">

                DASHBOARD / OVERVIEW

            </div>


            <!-- WELCOME -->

            <div class="welcome">

                <div>

                    <h1>
                        Welcome Back, Nikenji!
                    </h1>

                    <p>
                        Here's your task overview for today.
                    </p>

                </div>


                <div class="date-box">

                    📅 Today

                    <strong>
                        {{ now()->format('F d, Y') }}
                    </strong>

                </div>

            </div>


            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div class="alert">

                    ✓ {{ session('success') }}

                </div>

            @endif


            <!-- =========================
                 STATISTICS
            ========================== -->

            @php

                $totalTasks = $tasks->count();

                $pendingTasks = $tasks
                    ->where('status', 'Pending')
                    ->count();

                $completedTasks = $tasks
                    ->where('status', 'Completed')
                    ->count();

            @endphp


            <div class="stats">


                <!-- TOTAL -->

                <div class="stat-card total">

                    <div class="stat-icon">
                        +
                    </div>

                    <h3>
                        Total Tasks
                    </h3>

                    <div class="stat-number">
                        {{ $totalTasks }}
                    </div>

                    <div class="stat-description">
                        All tasks in your list
                    </div>

                </div>


                <!-- PENDING -->

                <div class="stat-card pending">

                    <div class="stat-icon">
                        ◷
                    </div>

                    <h3>
                        Pending Tasks
                    </h3>

                    <div class="stat-number">
                        {{ $pendingTasks }}
                    </div>

                    <div class="stat-description">
                        Still to be completed
                    </div>

                </div>


                <!-- COMPLETED -->

                <div class="stat-card completed">

                    <div class="stat-icon">
                        ✓
                    </div>

                    <h3>
                        Completed Tasks
                    </h3>

                    <div class="stat-number">
                        {{ $completedTasks }}
                    </div>

                    <div class="stat-description">
                        Tasks finished
                    </div>

                </div>

            </div>


            <!-- =========================
                 DASHBOARD GRID
            ========================== -->

            <div class="dashboard-grid">


                <!-- =====================
                     TASK TABLE
                ====================== -->

                <div class="task-panel">


                    <div class="panel-header">


                        <div class="panel-title">

                            <span class="panel-icon">
                                ☷
                            </span>

                            <h2>
                                My Tasks
                            </h2>

                        </div>


                        <div class="search-box">

                            <input
                                type="text"
                                id="taskSearch"
                                placeholder="Search tasks..."
                            >

                        </div>

                    </div>


                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>
                                        #
                                    </th>

                                    <th>
                                        Task
                                    </th>

                                    <th>
                                        Description
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Due Date
                                    </th>

                                    <th>
                                        Actions
                                    </th>

                                </tr>

                            </thead>


                            <tbody id="taskTable">


                                @forelse($tasks as $task)

                                    <tr>

                                        <td>
                                            {{ $task->id }}
                                        </td>


                                        <td>

                                            <div class="task-name">

                                                {{ $task->task_name }}

                                            </div>

                                        </td>


                                        <td>

                                            <div class="description">

                                                {{ $task->description }}

                                            </div>

                                        </td>


                                        <td>

                                            @if($task->status === 'Completed')

                                                <span class="status status-completed">

                                                    ✓ Completed

                                                </span>

                                            @else

                                                <span class="status status-pending">

                                                    ◷ Pending

                                                </span>

                                            @endif

                                        </td>


                                        <td>

                                            {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}

                                        </td>


                                        <td>

                                            <div class="actions">


                                                <a
                                                    href="{{ route('tasks.edit', $task->id) }}"
                                                    class="btn btn-edit"
                                                >
                                                    Edit
                                                </a>


                                                <form
                                                    action="{{ route('tasks.destroy', $task->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this task?')"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="btn btn-delete"
                                                    >
                                                        Delete
                                                    </button>

                                                </form>


                                            </div>

                                        </td>

                                    </tr>


                                @empty

                                    <tr>

                                        <td
                                            colspan="6"
                                            class="empty"
                                        >

                                            No tasks found.

                                            <br><br>

                                            <a
                                                href="{{ route('tasks.create') }}"
                                                class="btn btn-edit"
                                            >
                                                + Create Your First Task
                                            </a>

                                        </td>

                                    </tr>

                                @endforelse


                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- =====================
                     RIGHT SIDE
                ====================== -->

                <div class="side-column">


                    <!-- QUICK ACTIONS -->

                    <div class="side-card">

                        <div class="side-card-header">

                            ⚡ Quick Actions

                        </div>


                        <div class="side-card-body">


                            <a
                                href="{{ route('tasks.create') }}"
                                class="quick-action primary"
                            >

                                ＋ Add New Task

                            </a>


                            <a
                                href="{{ route('tasks.index') }}"
                                class="quick-action"
                            >

                                ☷ View All Tasks

                            </a>


                            <a
                                href="{{ route('tasks.index') }}"
                                class="quick-action"
                            >

                                ✓ View Completed Tasks

                            </a>

                        </div>

                    </div>


                    <!-- RECENT ACTIVITY -->

                    <div class="side-card">

                        <div class="side-card-header">

                            ◷ Recent Activity

                        </div>


                        <div class="side-card-body">


                            @forelse($tasks->sortByDesc('created_at')->take(4) as $activity)

                                <div class="activity-item">

                                    <div class="activity-title">

                                        <span class="activity-dot"></span>

                                        Added "{{ $activity->task_name }}"

                                    </div>


                                    <div class="activity-date">

                                        {{ $activity->created_at->format('M d, Y • h:i A') }}

                                    </div>

                                </div>

                            @empty

                                <div class="activity-item">

                                    No recent activity.

                                </div>

                            @endforelse


                        </div>

                    </div>


                </div>

            </div>


        </section>

    </main>

</div>


<!-- =========================
     SEARCH
========================= -->

<script>

    const searchInput =
        document.getElementById('taskSearch');

    const rows =
        document.querySelectorAll('#taskTable tr');


    searchInput.addEventListener('keyup', function () {

        const search =
            this.value.toLowerCase();


        rows.forEach(function (row) {

            const text =
                row.textContent.toLowerCase();


            if (text.includes(search)) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    });

</script>

</body>
</html>
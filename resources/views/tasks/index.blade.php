<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Personal Task Manager</title>

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
        input {
            font-family: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
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
            font-size: 22px;
            font-weight: bold;

            background:
                linear-gradient(145deg, #4d9cff, #1764d1);

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
            max-width: 1500px;

            margin: auto;

            padding: 30px;
        }

        .breadcrumb {
            margin-bottom: 12px;

            color: #8fa1b7;

            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }


        /* =========================================================
           WELCOME
        ========================================================= */

        .welcome {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 25px;

            margin-bottom: 22px;
            padding: 30px;

            overflow: hidden;

            color: white;

            border: 1px solid rgba(255,255,255,.13);
            border-radius: 22px;

            background:
                linear-gradient(
                    135deg,
                    rgba(34, 101, 184, .92),
                    rgba(18, 49, 86, .92)
                );

            box-shadow:
                0 22px 50px rgba(0,0,0,.30),
                inset 1px 1px 0 rgba(255,255,255,.16);

            backdrop-filter: blur(18px);
        }

        .welcome::after {
            content: "";

            position: absolute;

            width: 240px;
            height: 240px;

            right: -70px;
            top: -110px;

            border-radius: 50%;

            background: rgba(255,255,255,.08);

            pointer-events: none;
        }

        .welcome h1 {
            position: relative;
            z-index: 1;

            margin-bottom: 8px;

            font-size: 30px;
            line-height: 1.2;
        }

        .welcome p {
            position: relative;
            z-index: 1;

            color: #c5d8ed;

            font-size: 14px;
        }

        .date-box {
            position: relative;
            z-index: 1;

            min-width: 150px;

            text-align: right;

            color: #b9d1e8;

            font-size: 12px;
        }

        .date-box strong {
            display: block;

            margin-top: 5px;

            color: white;

            font-size: 14px;
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .alert {
            margin-bottom: 20px;
            padding: 13px 17px;

            border: 1px solid rgba(72, 211, 145, .20);
            border-radius: 12px;

            color: #9af3c7;

            background: rgba(40, 180, 120, .12);

            font-size: 13px;
        }


        /* =========================================================
           STATISTICS
        ========================================================= */

        .stats {
            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 18px;

            margin-bottom: 22px;
        }

        .stat-card {
            position: relative;

            min-height: 145px;

            padding: 24px;

            overflow: hidden;

            border-radius: 20px;

            box-shadow:
                0 18px 35px rgba(0,0,0,.25),
                inset 1px 1px 0 rgba(255,255,255,.20);

            transition: transform .25s ease, box-shadow .25s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 25px 45px rgba(0,0,0,.32),
                inset 1px 1px 0 rgba(255,255,255,.25);
        }

        .stat-card::after {
            content: "";

            position: absolute;

            width: 150px;
            height: 150px;

            right: -50px;
            bottom: -75px;

            border-radius: 50%;

            background: rgba(255,255,255,.08);
        }

        .stat-card.total {
            color: white;

            background:
                linear-gradient(145deg, #2488ee, #1755a9);
        }

        .stat-card.pending {
            color: white;

            background:
                linear-gradient(145deg, #c89129, #755015);
        }

        .stat-card.completed {
            color: white;

            background:
                linear-gradient(145deg, #24b978, #126343);
        }

        .stat-icon {
            position: relative;
            z-index: 1;

            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin-bottom: 13px;

            border-radius: 13px;

            color: white;

            background: rgba(255,255,255,.17);

            border: 1px solid rgba(255,255,255,.18);

            font-size: 20px;

            box-shadow:
                3px 4px 9px rgba(0,0,0,.18),
                inset 1px 1px 3px rgba(255,255,255,.20);
        }

        .stat-card h3,
        .stat-number,
        .stat-description {
            position: relative;
            z-index: 1;
        }

        .stat-card h3 {
            margin-bottom: 5px;

            font-size: 12px;
            font-weight: normal;

            opacity: .85;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
        }

        .stat-description {
            margin-top: 5px;

            font-size: 10px;

            opacity: .75;
        }


        /* =========================================================
           DASHBOARD GRID
        ========================================================= */

        .dashboard-grid {
            display: grid;

            grid-template-columns: minmax(0, 1fr) 310px;

            gap: 22px;

            align-items: start;
        }


        /* =========================================================
           GLASS PANELS
        ========================================================= */

        .task-panel,
        .side-card {
            border: 1px solid rgba(255,255,255,.13);

            background:
                rgba(239, 245, 252, .94);

            box-shadow:
                0 20px 45px rgba(0,0,0,.27),
                inset 1px 1px 0 rgba(255,255,255,.70);

            backdrop-filter: blur(18px);
        }

        .task-panel {
            min-width: 0;

            padding: 25px;

            border-radius: 22px;

            overflow: hidden;
        }


        /* =========================================================
           PANEL HEADER
        ========================================================= */

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin-bottom: 20px;
        }

        .panel-title {
            display: flex;
            align-items: center;

            gap: 10px;
        }

        .panel-title h2 {
            color: #14253b;

            font-size: 21px;
        }

        .panel-icon {
            color: #2678d8;

            font-size: 22px;
        }

        .search-box {
            flex-shrink: 0;
        }

        .search-box input {
            width: 200px;

            min-height: 41px;

            padding: 10px 14px;

            border: 1px solid #d3dce7;
            border-radius: 10px;

            outline: none;

            color: #203047;

            background: white;

            font-size: 13px;

            box-shadow:
                inset 1px 1px 4px rgba(0,0,0,.05);
        }

        .search-box input:focus {
            border-color: #3889e7;

            box-shadow:
                0 0 0 3px rgba(56,137,231,.12);
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
            overflow-y: hidden;

            border-radius: 12px;

            -webkit-overflow-scrolling: touch;
        }

        table {
            width: 100%;

            min-width: 700px;

            border-collapse: collapse;
        }

        thead {
            background:
                linear-gradient(135deg, #e8f0f8, #dbe7f3);
        }

        th {
            padding: 13px 12px;

            color: #52647a;

            text-align: left;

            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .5px;

            white-space: nowrap;
        }

        td {
            padding: 15px 12px;

            border-bottom: 1px solid #dce4ec;

            color: #3e4e61;

            font-size: 13px;

            vertical-align: middle;
        }

        tbody tr {
            transition: background .2s ease;
        }

        tbody tr:hover {
            background: #f2f7fc;
        }

        .task-name {
            min-width: 120px;

            color: #172b44;

            font-weight: bold;
        }

        .description {
            max-width: 250px;

            color: #6c7b8d;

            line-height: 1.5;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status {
            display: inline-block;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 10px;
            font-weight: bold;

            white-space: nowrap;
        }

        .status-pending {
            color: #825c14;

            background: #fff0c9;

            border: 1px solid #f3d88f;
        }

        .status-completed {
            color: #137047;

            background: #d8f6e8;

            border: 1px solid #a9e7ca;
        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .actions {
            display: flex;
            align-items: center;

            gap: 6px;

            flex-wrap: wrap;
        }

        .actions form {
            margin: 0;
        }

        .btn {
            min-height: 36px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            padding: 8px 12px;

            border: none;
            border-radius: 9px;

            font-size: 11px;
            font-weight: bold;

            text-decoration: none;

            cursor: pointer;

            white-space: nowrap;

            transition:
                transform .2s ease,
                box-shadow .2s ease,
                background .2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-edit {
            color: white;

            background:
                linear-gradient(145deg, #348ee9, #1760bb);

            box-shadow:
                3px 5px 9px rgba(24,87,160,.25);
        }

        .btn-edit:hover {
            background:
                linear-gradient(145deg, #247fdc, #1255aa);
        }

        .btn-delete {
            color: white;

            background:
                linear-gradient(145deg, #e35f67, #ad303b);

            box-shadow:
                3px 5px 9px rgba(150,40,50,.20);
        }

        .btn-delete:hover {
            background:
                linear-gradient(145deg, #d84d56, #992a34);
        }


        /* =========================================================
           SIDE COLUMN
        ========================================================= */

        .side-column {
            display: flex;

            flex-direction: column;

            gap: 20px;

            min-width: 0;
        }

        .side-card {
            overflow: hidden;

            border-radius: 20px;
        }

        .side-card-header {
            padding: 17px 20px;

            color: white;

            background:
                linear-gradient(135deg, #1d68bd, #123f79);

            font-size: 14px;
            font-weight: bold;
        }

        .side-card-body {
            padding: 18px;
        }


        /* =========================================================
           QUICK ACTIONS
        ========================================================= */

        .quick-action {
            display: block;

            width: 100%;

            min-height: 45px;

            margin-bottom: 10px;
            padding: 13px;

            border: 1px solid #d8e1eb;
            border-radius: 10px;

            color: #33455a;

            background: #f6f9fc;

            text-align: left;
            text-decoration: none;

            font-size: 12px;
            font-weight: 600;

            transition: .2s ease;
        }

        .quick-action:last-child {
            margin-bottom: 0;
        }

        .quick-action:hover {
            color: #1762b9;

            background: #eaf3fc;

            transform: translateY(-2px);
        }

        .quick-action.primary {
            color: white;

            border: none;

            background:
                linear-gradient(145deg, #318eea, #155cb5);

            text-align: center;

            box-shadow:
                4px 6px 12px rgba(26,95,174,.22);
        }

        .quick-action.primary:hover {
            color: white;

            background:
                linear-gradient(145deg, #257ed6, #124fa0);
        }


        /* =========================================================
           ACTIVITY
        ========================================================= */

        .activity-item {
            padding: 13px 0;

            border-bottom: 1px solid #dce3ea;

            overflow-wrap: anywhere;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-title {
            margin-bottom: 5px;

            color: #394b60;

            font-size: 11px;
            line-height: 1.5;
        }

        .activity-date {
            color: #8795a5;

            font-size: 9px;
        }

        .activity-dot {
            width: 8px;
            height: 8px;

            display: inline-block;

            margin-right: 6px;

            border-radius: 50%;

            background: #2385e2;

            box-shadow:
                0 0 7px rgba(35,133,226,.50);
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty {
            padding: 35px 15px;

            color: #7b8999;

            text-align: center;

            font-size: 13px;
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
                padding: 25px 20px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .side-column {
                display: grid;

                grid-template-columns: repeat(2, minmax(0, 1fr));
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
                padding: 22px 16px;
            }

            .welcome {
                padding: 25px;
            }

            .welcome h1 {
                font-size: 26px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .stat-card.total {
                grid-column: span 2;
            }

            .side-column {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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

                margin-bottom: 0;

                min-height: 42px;

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
                padding: 17px 12px;
            }

            .welcome {
                display: block;

                padding: 21px;

                border-radius: 17px;
            }

            .welcome h1 {
                font-size: 22px;
            }

            .welcome p {
                font-size: 12px;
            }

            .date-box {
                margin-top: 15px;

                text-align: left;
            }

            .stats {
                grid-template-columns: 1fr;

                gap: 12px;
            }

            .stat-card.total {
                grid-column: auto;
            }

            .stat-card {
                min-height: 120px;

                padding: 20px;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;

                gap: 16px;
            }

            .task-panel {
                padding: 16px;

                border-radius: 17px;
            }

            .panel-header {
                display: block;
            }

            .panel-title h2 {
                font-size: 19px;
            }

            .search-box {
                width: 100%;

                margin-top: 12px;
            }

            .search-box input {
                width: 100%;

                min-height: 43px;
            }

            .table-wrapper {
                width: 100%;

                overflow-x: auto;
            }

            table {
                min-width: 700px;
            }

            .side-column {
                display: grid;

                grid-template-columns: 1fr;

                gap: 15px;
            }

            .side-card {
                border-radius: 17px;
            }

            .btn {
                min-height: 39px;

                padding: 9px 12px;
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
                padding: 14px 9px;
            }

            .welcome {
                padding: 18px;
            }

            .welcome h1 {
                font-size: 20px;
            }

            .task-panel {
                padding: 13px;
            }

            .side-card-body {
                padding: 14px;
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

            .welcome h1 {
                font-size: 19px;
            }

            .task-panel {
                padding: 11px;
            }

            .stat-card {
                padding: 16px;
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

            ✦

        </div>

    </aside>


    <!-- MAIN -->

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


            <!-- STATISTICS -->

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


            <!-- DASHBOARD GRID -->

            <div class="dashboard-grid">


                <!-- TASK TABLE -->

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
                                aria-label="Search tasks"
                            >

                        </div>

                    </div>


                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Task</th>

                                    <th>Description</th>

                                    <th>Status</th>

                                    <th>Due Date</th>

                                    <th>Actions</th>

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


                <!-- RIGHT SIDE -->

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


<!-- SEARCH -->

<script>

    const searchInput =
        document.getElementById('taskSearch');

    const rows =
        document.querySelectorAll('#taskTable tr');


    if (searchInput) {

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

    }

</script>

</body>
</html>
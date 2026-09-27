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

        html {
            width: 100%;
            min-height: 100%;
            overflow-x: hidden;
        }

        body {
            width: 100%;
            min-height: 100vh;

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

            overflow-x: hidden;
        }

        a,
        button,
        input {
            font-family: inherit;
        }

        img {
            max-width: 100%;
        }


        /* =========================================================
           APPLICATION
        ========================================================= */

        .app {
            min-height: 100vh;
            display: flex;
            width: 100%;
        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .sidebar {
            width: 240px;

            background: rgba(28, 47, 32, 0.97);
            color: white;

            padding: 28px 18px;

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;

            z-index: 100;

            overflow-y: auto;
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

            flex: 0 0 43px;

            border-radius: 50%;

            background: #71844a;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
        }

        .brand h2 {
            font-size: 17px;
            line-height: 1.3;
        }

        .brand p {
            font-size: 10px;

            color: #c7d0c4;

            margin-top: 4px;

            line-height: 1.4;
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

            min-height: 46px;
        }

        .navigation a:hover,
        .navigation a.active {
            background: #566c37;
        }

        .nav-icon {
            width: 22px;

            flex: 0 0 22px;

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


        /* =========================================================
           MAIN
        ========================================================= */

        .main {
            margin-left: 240px;

            width: calc(100% - 240px);

            min-height: 100vh;

            min-width: 0;
        }


        /* =========================================================
           TOP BAR
        ========================================================= */

        .topbar {
            min-height: 75px;

            background: rgba(31, 53, 36, 0.96);

            color: white;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            padding: 15px 38px;
        }

        .topbar-title {
            font-size: 18px;

            font-weight: bold;

            line-height: 1.3;
        }

        .system-status {
            font-size: 12px;

            color: #c8d5b9;

            white-space: nowrap;
        }


        /* =========================================================
           CONTENT
        ========================================================= */

        .content {
            width: 100%;

            max-width: 1400px;

            margin: 0 auto;

            padding: 35px 30px;
        }

        .breadcrumb {
            font-size: 12px;

            color: #e0e5dc;

            margin-bottom: 10px;
        }


        /* =========================================================
           WELCOME
        ========================================================= */

        .welcome {
            background: rgba(248,247,238,0.96);

            border-radius: 18px;

            padding: 28px 30px;

            margin-bottom: 22px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

            box-shadow: 0 12px 35px rgba(0,0,0,0.18);
        }

        .welcome h1 {
            font-size: 30px;

            color: #263126;

            margin-bottom: 8px;

            line-height: 1.2;
        }

        .welcome p {
            color: #697067;

            font-size: 14px;

            line-height: 1.5;
        }

        .date-box {
            text-align: right;

            color: #4e5d48;

            font-size: 13px;

            flex-shrink: 0;
        }

        .date-box strong {
            display: block;

            color: #273528;

            font-size: 14px;

            margin-top: 4px;
        }


        /* =========================================================
           STAT CARDS
        ========================================================= */

        .stats {
            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

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

            min-width: 0;
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


        /* =========================================================
           MAIN GRID
        ========================================================= */

        .dashboard-grid {
            display: grid;

            grid-template-columns: minmax(0, 1fr) 310px;

            gap: 22px;

            align-items: start;

            min-width: 0;
        }


        /* =========================================================
           TASK PANEL
        ========================================================= */

        .task-panel {
            background: rgba(248,247,238,0.97);

            border-radius: 18px;

            padding: 25px;

            box-shadow: 0 12px 35px rgba(0,0,0,0.20);

            min-width: 0;

            overflow: hidden;
        }

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

            min-width: 0;
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

            flex-shrink: 0;
        }

        .search-box input {
            width: 190px;

            min-height: 40px;

            padding: 10px 13px;

            border: 1px solid #d1d1c4;

            border-radius: 8px;

            outline: none;

            background: white;

            font-size: 13px;
        }

        .search-box input:focus {
            border-color: #657b45;
        }


        /* =========================================================
           TABLE
        ========================================================= */

        .table-wrapper {
            width: 100%;

            max-width: 100%;

            overflow-x: auto;

            overflow-y: hidden;

            -webkit-overflow-scrolling: touch;

            border-radius: 8px;
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

            white-space: nowrap;
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

            min-width: 120px;
        }

        .description {
            color: #6c736b;

            max-width: 250px;

            line-height: 1.5;
        }


        /* =========================================================
           STATUS
        ========================================================= */

        .status {
            display: inline-block;

            padding: 6px 12px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: bold;

            white-space: nowrap;
        }

        .status-pending {
            background: #e1ded1;

            color: #655f4e;
        }

        .status-completed {
            background: #c8dec6;

            color: #2d5a37;
        }


        /* =========================================================
           ACTIONS
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
            border: none;

            border-radius: 7px;

            padding: 8px 11px;

            min-height: 36px;

            font-size: 11px;

            font-weight: bold;

            cursor: pointer;

            text-decoration: none;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            white-space: nowrap;
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


        /* =========================================================
           SIDE PANEL
        ========================================================= */

        .side-column {
            display: flex;

            flex-direction: column;

            gap: 20px;

            min-width: 0;
        }

        .side-card {
            background: rgba(248,247,238,0.97);

            border-radius: 16px;

            overflow: hidden;

            box-shadow: 0 12px 30px rgba(0,0,0,0.18);

            min-width: 0;
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


        /* =========================================================
           QUICK ACTIONS
        ========================================================= */

        .quick-action {
            display: block;

            width: 100%;

            padding: 13px;

            min-height: 44px;

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

        .quick-action:last-child {
            margin-bottom: 0;
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


        /* =========================================================
           ACTIVITY
        ========================================================= */

        .activity-item {
            padding: 14px 0;

            border-bottom: 1px solid #dfded3;

            overflow-wrap: anywhere;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-title {
            font-size: 12px;

            color: #384238;

            margin-bottom: 5px;

            line-height: 1.5;
        }

        .activity-date {
            font-size: 10px;

            color: #858b83;

            line-height: 1.4;
        }

        .activity-dot {
            width: 9px;

            height: 9px;

            display: inline-block;

            border-radius: 50%;

            background: #55743d;

            margin-right: 7px;
        }


        /* =========================================================
           EMPTY STATE
        ========================================================= */

        .empty {
            padding: 35px 15px;

            text-align: center;

            color: #7b8179;

            font-size: 14px;
        }


        /* =========================================================
           ALERT
        ========================================================= */

        .alert {
            background: #dcebd7;

            color: #315a36;

            padding: 13px 17px;

            border-radius: 9px;

            margin-bottom: 20px;

            font-size: 13px;

            line-height: 1.5;
        }


        /* =========================================================
           LARGE TABLET / SMALL LAPTOP
        ========================================================= */

        @media (max-width: 1150px) {

            .sidebar {
                width: 220px;
            }

            .main {
                margin-left: 220px;

                width: calc(100% - 220px);
            }

            .content {
                padding: 30px 22px;
            }

            .dashboard-grid {
                grid-template-columns: minmax(0, 1fr);
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

                padding: 22px 14px;
            }

            .main {
                margin-left: 190px;

                width: calc(100% - 190px);
            }

            .brand {
                padding-left: 7px;
                padding-right: 7px;
            }

            .brand h2 {
                font-size: 15px;
            }

            .brand p {
                font-size: 9px;
            }

            .navigation {
                margin-top: 22px;
            }

            .navigation a {
                padding: 12px 10px;

                font-size: 13px;

                gap: 10px;
            }

            .topbar {
                padding: 14px 22px;
            }

            .content {
                padding: 25px 18px;
            }

            .welcome {
                padding: 24px;
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

            html,
            body {
                width: 100%;

                max-width: 100%;

                overflow-x: hidden;
            }

            .app {
                display: block;

                width: 100%;

                min-height: 100vh;
            }


            /* MOBILE SIDEBAR */

            .sidebar {
                position: relative;

                left: auto;
                top: auto;
                bottom: auto;

                width: 100%;

                height: auto;

                padding: 15px;

                overflow: visible;
            }

            .brand {
                padding: 4px 4px 15px;

                gap: 10px;
            }

            .brand-icon {
                width: 38px;
                height: 38px;

                flex: 0 0 38px;

                font-size: 18px;
            }

            .brand h2 {
                font-size: 15px;

                line-height: 1.25;
            }

            .brand p {
                font-size: 9px;

                margin-top: 3px;
            }


            /* MOBILE NAVIGATION */

            .navigation {
                width: 100%;

                margin-top: 12px;

                display: flex;

                gap: 7px;

                overflow-x: auto;

                padding-bottom: 4px;

                -webkit-overflow-scrolling: touch;

                scrollbar-width: thin;
            }

            .navigation a {
                flex: 0 0 auto;

                margin-bottom: 0;

                padding: 10px 12px;

                min-height: 42px;

                border-radius: 8px;

                font-size: 12px;

                gap: 7px;
            }

            .nav-icon {
                width: auto;

                flex: 0 0 auto;

                font-size: 16px;
            }

            .sidebar-bottom {
                display: none;
            }


            /* MAIN */

            .main {
                width: 100%;

                margin-left: 0;

                min-height: auto;
            }


            /* TOPBAR */

            .topbar {
                min-height: 60px;

                height: auto;

                padding: 13px 15px;

                gap: 8px;
            }

            .topbar-title {
                font-size: 15px;

                line-height: 1.3;
            }

            .system-status {
                font-size: 9px;

                white-space: nowrap;
            }


            /* CONTENT */

            .content {
                width: 100%;

                padding: 18px 12px;
            }

            .breadcrumb {
                font-size: 9px;

                margin-bottom: 8px;
            }


            /* WELCOME */

            .welcome {
                display: block;

                padding: 19px;

                border-radius: 14px;

                margin-bottom: 16px;
            }

            .welcome h1 {
                font-size: 22px;

                line-height: 1.25;

                margin-bottom: 7px;
            }

            .welcome p {
                font-size: 13px;

                line-height: 1.5;
            }

            .date-box {
                text-align: left;

                margin-top: 15px;

                font-size: 12px;
            }

            .date-box strong {
                font-size: 13px;
            }


            /* ALERT */

            .alert {
                font-size: 12px;

                padding: 12px 14px;

                margin-bottom: 16px;
            }


            /* STATS */

            .stats {
                grid-template-columns: 1fr;

                gap: 12px;

                margin-bottom: 16px;
            }

            .stat-card.total {
                grid-column: auto;
            }

            .stat-card {
                min-height: 115px;

                padding: 19px;

                border-radius: 14px;
            }

            .stat-icon {
                width: 36px;
                height: 36px;

                margin-bottom: 11px;

                font-size: 18px;
            }

            .stat-card h3 {
                font-size: 12px;
            }

            .stat-number {
                font-size: 28px;
            }

            .stat-description {
                font-size: 10px;
            }


            /* DASHBOARD GRID */

            .dashboard-grid {
                grid-template-columns: 1fr;

                gap: 16px;

                width: 100%;
            }


            /* TASK PANEL */

            .task-panel {
                width: 100%;

                padding: 16px;

                border-radius: 14px;
            }

            .panel-header {
                display: block;

                margin-bottom: 15px;
            }

            .panel-title {
                width: 100%;
            }

            .panel-title h2 {
                font-size: 19px;
            }

            .panel-icon {
                font-size: 20px;
            }


            /* SEARCH */

            .search-box {
                width: 100%;

                margin-top: 12px;
            }

            .search-box input {
                width: 100%;

                min-height: 43px;

                font-size: 14px;
            }


            /* MOBILE TABLE */

            .table-wrapper {
                width: 100%;

                max-width: 100%;

                overflow-x: auto;

                overflow-y: hidden;

                -webkit-overflow-scrolling: touch;

                border-radius: 7px;
            }

            table {
                min-width: 700px;
            }

            th {
                padding: 11px 10px;

                font-size: 10px;
            }

            td {
                padding: 12px 10px;

                font-size: 12px;
            }

            .task-name {
                min-width: 120px;
            }

            .description {
                max-width: 220px;
            }


            /* BUTTONS */

            .actions {
                gap: 6px;

                flex-wrap: wrap;
            }

            .btn {
                min-height: 38px;

                padding: 9px 12px;

                font-size: 11px;
            }


            /* SIDE COLUMN */

            .side-column {
                display: grid;

                grid-template-columns: 1fr;

                gap: 14px;

                width: 100%;
            }

            .side-card {
                width: 100%;

                border-radius: 14px;
            }

            .side-card-header {
                padding: 15px 17px;

                font-size: 14px;
            }

            .side-card-body {
                padding: 15px;
            }


            /* QUICK ACTIONS */

            .quick-action {
                min-height: 46px;

                padding: 12px;

                font-size: 13px;
            }


            /* ACTIVITY */

            .activity-item {
                padding: 12px 0;
            }
        }


        /* =========================================================
           SMALL PHONES
        ========================================================= */

        @media (max-width: 480px) {

            .sidebar {
                padding: 12px;
            }

            .brand {
                gap: 8px;

                padding-bottom: 12px;
            }

            .brand-icon {
                width: 36px;
                height: 36px;

                flex-basis: 36px;

                font-size: 17px;
            }

            .brand h2 {
                font-size: 14px;
            }

            .brand p {
                font-size: 8px;
            }

            .navigation a {
                padding: 9px 10px;

                min-height: 40px;

                font-size: 11px;
            }

            .topbar {
                padding: 12px;

                align-items: flex-start;

                flex-direction: column;

                gap: 5px;
            }

            .topbar-title {
                font-size: 14px;
            }

            .system-status {
                font-size: 9px;
            }

            .content {
                padding: 15px 9px;
            }

            .welcome {
                padding: 17px;

                border-radius: 13px;
            }

            .welcome h1 {
                font-size: 20px;
            }

            .welcome p {
                font-size: 12px;
            }

            .stat-card {
                padding: 17px;
            }

            .task-panel {
                padding: 13px;

                border-radius: 13px;
            }

            .panel-title h2 {
                font-size: 18px;
            }

            .side-card-body {
                padding: 13px;
            }
        }


        /* =========================================================
           EXTRA SMALL PHONES
        ========================================================= */

        @media (max-width: 360px) {

            .brand h2 {
                font-size: 13px;
            }

            .brand p {
                font-size: 7px;
            }

            .navigation {
                gap: 5px;
            }

            .navigation a {
                padding: 8px 9px;

                font-size: 10px;
            }

            .nav-icon {
                font-size: 14px;
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
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<div class="app">

    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

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


    <!-- =========================================================
         MAIN
    ========================================================== -->

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


            <!-- =================================================
                 WELCOME
            ================================================== -->

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


            <!-- =================================================
                 SUCCESS MESSAGE
            ================================================== -->

            @if(session('success'))

                <div class="alert">

                    ✓ {{ session('success') }}

                </div>

            @endif


            <!-- =================================================
                 STATISTICS
            ================================================== -->

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


            <!-- =================================================
                 DASHBOARD GRID
            ================================================== -->

            <div class="dashboard-grid">


                <!-- =================================================
                     TASK TABLE
                ================================================== -->

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


                <!-- =================================================
                     RIGHT SIDE
                ================================================== -->

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


<!-- =========================================================
     SEARCH
========================================================= -->

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
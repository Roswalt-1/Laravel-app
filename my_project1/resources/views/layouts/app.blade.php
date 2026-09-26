<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Task Manager')</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }

        .topbar {
            background-color: #4f46e5;
            color: white;
            padding: 20px;
        }

        .topbar h1 {
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 0 15px;
        }

        .box {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 20px;
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
            background-color: #f9f9f9;
        }

        .status {
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 13px;
            color: white;
        }

        .status-pending {
            background-color: orange;
        }

        .status-completed {
            background-color: green;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-blue {
            background-color: #4f46e5;
        }

        .btn-red {
            background-color: #e11d48;
        }

        .btn-gray {
            background-color: #999;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .alert {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="topbar">
        <h1>Personal Task Manager(BSIT-SEC7)</h1>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

</body>
</html>
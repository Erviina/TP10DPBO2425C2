<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Event Organiser</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #fff7fa; /* soft pink background */
        }

        /* HEADER TITLE */
        header {
            background: #ffb7d5; /* pastel pink */
            color: #ffffff;
            padding: 22px;
            text-align: center;
            border-bottom: 3px solid #ff94c6;
            box-shadow: 0 2px 5px rgba(255, 182, 193, 0.4);
        }

        /* NAVIGATION */
        nav {
            background: #ffe4ef;
            padding: 12px 0;
            text-align: center;
            border-bottom: 1px solid #f8c7d7;
        }

        nav a {
            margin: 0 12px;
            text-decoration: none;
            font-weight: bold;
            color: #cc5f8d;
            padding: 5px 8px;
            border-radius: 5px;
            transition: 0.2s ease;
        }

        nav a:hover {
            background: #ffcfdf;
            color: #9a3e63;
        }

        /* MAIN CONTAINER */
        .container {
            max-width: 900px;
            background: white;
            margin: 30px auto;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(255, 182, 193, 0.3);
            border: 1px solid #ffd6e8;
        }

        /* TABLE */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 15px;
            border-radius: 8px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid #ffd2e1;
        }

        th {
            background: #ffe5ef;
            padding: 10px;
            color: #9a3e63;
            font-weight: bold;
        }

        td {
            padding: 9px;
            color: #5a3b48;
        }

        /* FORM */
        form {
            margin-top: 15px;
        }

        input, select {
            padding: 9px;
            width: 100%;
            margin-top: 5px;
            border: 1px solid #ffb7d5;
            border-radius: 6px;
            background: #fff0f6;
        }

        button {
            margin-top: 10px;
            padding: 10px 14px;
            border: none;
            background: #ff9ac6;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #e277a8;
        }

        /* ACTION LINKS */
        .actions a {
            color: #cc5f8d;
            text-decoration: none;
            font-weight: bold;
        }

        .actions a:hover {
            text-decoration: underline;
            color: #9a3e63;
        }

        /* Button Tambah */
    .btn-add {
        background: #ffb3d9;
        color: white;
        padding: 8px 12px;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-add:hover {
        background: #ff9ccf;
    }

    /* Button Edit */
    .btn-edit {
        background: #ff9ac6;
        color: white;
        padding: 6px 10px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-edit:hover {
        background: #e277a8;
    }

    /* Button Hapus */
    .btn-delete {
        background: #ff7faa;
        color: white;
        padding: 6px 10px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-delete:hover {
        background: #d9668d;
    }


    </style>
</head>

<body>

<header>
    <h1>Event Organiser</h1>
</header>

<nav>
    <a href="index.php?page=events">Events</a>
    <a href="index.php?page=clients">Clients</a>
    <a href="index.php?page=bookings">Bookings</a>
    <a href="index.php?page=staffs">Staff</a>
</nav>

<div class="container">

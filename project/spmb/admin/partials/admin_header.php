<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SPMB SMK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f4f7f9; font-family: 'Segoe UI', sans-serif; }
        .admin-navbar {
            background-color: #1E90FF;
            color: white;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .admin-navbar a {
            color: white;
            text-decoration: none;
            margin-right: 15px;
            font-weight: 500;
        }
        .admin-navbar a:hover {
            text-decoration: underline;
        }
        .container-admin {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }
    </style>
</head>
<body>
<nav class="admin-navbar d-flex align-items-center">
    <a href="admin_dashboard.php" class="me-3 fw-bold">Dashboard</a>
    <a href="admin_smk.php">Kelola SMK</a>
    <a href="admin_jurusan.php">Kelola Jurusan</a>
    <a href="admin_users.php">Kelola Pendaftar</a>
    <a href="logout.php" class="ms-auto">Logout</a>
</nav>

<div class="container-admin">

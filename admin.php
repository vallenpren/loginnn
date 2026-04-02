<?php
session_start();
// Pastikan hanya ADMIN yang bisa akses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php?pesan=gagal");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard">
        <h1>Halo 👋, <?php echo $_SESSION['username']; ?></h1>
        <p>Email: <?php echo $_SESSION['email']; ?></p>
        <span class="role-badge role-admin">ADMINISTRATOR</span>
        <p style="margin-top: 1rem;">Selamat datang di halaman kontrol pusat.</p>
        <a href="logout.php" class="logout-link">LOGOUT</a>
    </div>
</body>
</html>

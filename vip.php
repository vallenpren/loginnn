<?php
session_start();
// Pastikan hanya VIP yang bisa akses
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'vip') {
    header("Location: index.php?pesan=gagal");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>VIP Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="dashboard">
        <h1>Halo 💎, <?php echo $_SESSION['username']; ?></h1>
        <p>Email: <?php echo $_SESSION['email']; ?></p>
        <span class="role-badge role-vip">VIP MEMBER</span>
        <p style="margin-top: 1rem;">Selamat datang di halaman eksklusif VIP!</p>
        <a href="logout.php" class="logout-link">LOGOUT</a>
    </div>
</body>
</html>

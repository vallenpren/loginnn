<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') header("Location: admin.php");
    if ($_SESSION['role'] == 'user') header("Location: user.php");
    if ($_SESSION['role'] == 'vip') header("Location: vip.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Login System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
            <div class="alert">Email atau Password Salah!</div>
        <?php endif; ?>
        <form action="proses_login.php" method="POST">
            <div class="input-box">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="admin@gmail.com" required autocomplete="off">
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="admin123" required autocomplete="off">
            </div>
            <button type="submit" class="btn-login">MASUK</button>
        </form>
    </div>
</body>
</html>

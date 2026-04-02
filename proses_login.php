<?php
session_start();
include 'koneksi.php';

$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = $_POST['password'];

// 1. Cari user berdasarkan email saja
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

// 2. Cek apakah email ditemukan
if (mysqli_num_rows($query) > 0) {
    
    // 3. Verifikasi password hash dengan password inputan
    if (password_verify($password, $data['password'])) {
        
        // Simpan ke Session jika benar
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['role'] = $data['role'];

        // Redirect sesuai Role
        if ($data['role'] == "admin") {
            header("Location: admin.php");
        } else if ($data['role'] == "user") {
            header("Location: user.php");
        } else if ($data['role'] == "vip") {
            header("Location: vip.php");
        }
        exit();
    } else {
        // Password salah
        header("Location: index.php?pesan=gagal");
    }
} else {
    // Email tidak terdaftar
    header("Location: index.php?pesan=gagal");
}
?>

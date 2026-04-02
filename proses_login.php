<?php
session_start();
include 'koneksi.php';

// Masukan dari form
$email = $_POST['email'];
$password = $_POST['password'];

// Cari user di database
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data = mysqli_fetch_assoc($query);

    // Simpan di Session
    $_SESSION['username'] = $data['username'];
    $_SESSION['email']    = $data['email'];
    $_SESSION['role']     = $data['role'];

    // Cek Role dan Redirect
    if ($data['role'] == "admin") {
        header("Location: admin.php");
    } else if ($data['role'] == "user") {
        header("Location: user.php");
    } else if ($data['role'] == "vip") {
        header("Location: vip.php");
    } else {
        header("Location: index.php?pesan=gagal");
    }
} else {
    header("Location: index.php?pesan=gagal");
}
?>

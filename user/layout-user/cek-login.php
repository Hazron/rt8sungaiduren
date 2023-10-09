<?php
// auth.php

// Mulai session
session_start();

// Periksa apakah pengguna belum login
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    // Jika belum login, redirect ke halaman login
    header("location: ../auth/login.php");
    exit;
}

// Koneksi ke database
$host = 'localhost'; // Ganti dengan host Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda
$database = 'db-rt'; // Ganti dengan nama database Anda

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Ambil peran (role) pengguna dari database
$username = $_SESSION["email"]; // Ganti dengan nama pengguna yang Anda gunakan
$sql = "SELECT role FROM warga WHERE email = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $role = $row['role'];

    // Periksa peran pengguna
    if ($role !== "user") {
        // Jika bukan user, larang akses
        echo "Anda tidak memiliki izin akses ke halaman ini.";
        exit;
    }
} else {
    // Pengguna tidak ditemukan di database, handle sesuai kebutuhan Anda
    echo "Pengguna tidak ditemukan di database.";
    exit;
}

// Tutup koneksi database
$conn->close();
?>

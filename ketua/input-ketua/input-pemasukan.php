<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "db-rt");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengambil data dari formulir HTML
$bulan = $_POST['bulan'];
$jumlah_pemasukan = $_POST['pemasukan'];
$catatan = $_POST['catatan'];

// Query SQL untuk memasukkan data
$sql = "INSERT INTO pemasukan_kas (bulan, jumlah, catatan) 
        VALUES ('$bulan', $jumlah_pemasukan, '$catatan')";

if ($conn->query($sql) === TRUE) {
    echo "Data pemasukan berhasil dimasukkan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
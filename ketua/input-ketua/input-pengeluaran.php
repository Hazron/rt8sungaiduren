<?php
// Koneksi ke database (sesuaikan dengan pengaturan database Anda)
$conn = new mysqli("localhost", "root", "", "db-rt");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil nilai dari formulir
$jenis = $_POST['jenis'];
$judul = $_POST['judul'];
$pengeluaran = $_POST['pengeluaran'];
$catatan = $_POST['catatan'];

// Buat perintah SQL untuk melakukan INSERT
$sql = "INSERT INTO pengeluaran_kas (jenis, judul, pengeluaran, catatan) VALUES ('$jenis', '$judul', $pengeluaran, '$catatan')";

// Eksekusi perintah SQL
if ($conn->query($sql) === TRUE) {
    echo "Data pengeluaran berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>

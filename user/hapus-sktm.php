<?php
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

// Periksa apakah parameter "id" telah diterima dari URL
if (isset($_GET["id_surat"])) {
    $id_surat = $_GET["id_surat"];

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM surat_tidakmampu WHERE id_surat = $id_surat";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
} else {
    echo "ID tidak valid atau tidak diberikan.";
}
?>

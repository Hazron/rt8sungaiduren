<?php
// Koneksi ke database (sesuaikan dengan pengaturan database Anda)
$koneksi = mysqli_connect("localhost", "root", "", "db-rt");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_surat"])) {
    $id_surat = $_GET["id_surat"];

    // Query SQL untuk menghapus data berdasarkan ID Surat
    $query = "DELETE FROM surat_kematian WHERE id_surat = $id_surat";

    if (mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman sebelumnya setelah penghapusan berhasil
        header("Location: surat-ketua.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>

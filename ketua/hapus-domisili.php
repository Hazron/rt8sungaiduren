<?php
if (isset($_GET["id_domisili"])) {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Ambil ID Domisili yang akan dihapus dari parameter GET
    $id_domisili = $_GET["id_domisili"];

    // Hapus data dari database
    $query = "DELETE FROM surat_domilisi WHERE id_domisili = $id_domisili";

    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman sebelumnya setelah penghapusan berhasil
        header("Location: surat-ketua.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
} else {
    echo "ID Domisili tidak ditemukan.";
}
?>

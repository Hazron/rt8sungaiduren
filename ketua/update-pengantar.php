<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Ambil data dari form
    $edit_id = $_POST["edit_id"];
    $nomorSurat = $_POST["nomorSurat"];

    // Query SQL untuk mengupdate data surat pengantar
    $query = "UPDATE surat_pengantar SET nomor_surat = '$nomorSurat', status = 'disetujui' WHERE id_pengantar = $edit_id";

    if (mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman sebelumnya atau halaman sukses
        header("Location: surat-ketua.php"); // Ganti dengan halaman yang sesuai
        exit;
    } else {
        echo "Gagal melakukan update: " . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>

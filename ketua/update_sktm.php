<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Ambil data dari formulir
    $edit_id = $_POST["edit_id"];
    $nomorSurat = $_POST["nomorSurat"];

    // Update data di database
    $query = "UPDATE surat_tidakmampu SET nomor_surat = '$nomorSurat', status_surat = 'disetujui' WHERE id_surat = $edit_id";

    if (mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman sebelumnya setelah update berhasil
        header("Location: surat-ketua.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>

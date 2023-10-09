<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Ambil data dari formulir
    $edit_id = $_POST["edit_id"];
    $nomorSurat = $_POST["nomorSurat"];
    $status = 'disetujui';

    // Update data di database
    $query = "UPDATE surat_kematian SET nomor_surat = '$nomorSurat', status = '$status', time_update = NOW() WHERE id_surat = $edit_id";

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

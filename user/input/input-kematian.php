<?php
// Sambungkan ke database (ganti dengan informasi koneksi Anda)
$koneksi = new mysqli("localhost", "root", "", "db-rt");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Ambil data dari formulir
$idKeluarga = $_POST['id_keluarga'];
$tempatMeninggal = $_POST['tempatMeninggal'];
$tanggalMeninggal = $_POST['tanggalMeninggal'];
$jamMeninggal = $_POST['jamMeninggal'];
$tempatPemakaman = $_POST['tempatpemakaman'];

// Query untuk mengambil data anggota keluarga yang meninggal
$queryAnggota = "SELECT nama, tanggal_lahir, id, id_keluarga FROM warga WHERE nama = '$idKeluarga'";
$resultAnggota = $koneksi->query($queryAnggota);

if ($resultAnggota->num_rows > 0) {
    $rowAnggota = $resultAnggota->fetch_assoc();
    $anggotaMeninggal = $rowAnggota['nama'];
    $tanggalLahir = $rowAnggota['tanggal_lahir'];
    $idWarga = $rowAnggota['id'];
    $idKeluarga = $rowAnggota['id_keluarga'];
} else {
    // Data anggota keluarga tidak ditemukan, Anda dapat menghandlenya sesuai kebutuhan Anda
    $anggotaMeninggal = "";
    $tanggalLahir = "";
    $idWarga = "";
    $idKeluarga = "";
}

// Query INSERT untuk menyimpan data ke dalam tabel surat_kematian
$queryInsert = "INSERT INTO surat_kematian (nomor_surat, anggota_meninggal, tanggal_lahir, tempat_meninggal, tanggal_meninggal, jam_meninggal, tempat_pemakaman, id_warga, id_keluarga, upload, time_update, status) VALUES ('', '$anggotaMeninggal', '$tanggalLahir', '$tempatMeninggal', '$tanggalMeninggal', '$jamMeninggal', '$tempatPemakaman', '$idWarga', '$idKeluarga', NOW(), '', 'diproses')";

if ($koneksi->query($queryInsert) === TRUE) {
    // Data berhasil disimpan
    echo "Data berhasil disimpan.";
} else {
    // Terjadi kesalahan dalam penyimpanan data
    echo "Error: " . $queryInsert . "<br>" . $koneksi->error;
}

// Tutup koneksi ke database
$koneksi->close();
?>

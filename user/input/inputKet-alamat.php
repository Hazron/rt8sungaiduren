<?php
// Sambungkan ke database (ganti dengan informasi koneksi Anda)
$koneksi = new mysqli("localhost", "root", "", "db-rt");

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Ambil data dari formulir
$namaPemohon = $_POST['id_keluarga'];


// Query untuk mengambil NIK berdasarkan nama pemohon
$queryNik = "SELECT nik_warga FROM warga WHERE nama = '$namaPemohon'";
$resultNik = $koneksi->query($queryNik);

if ($resultNik->num_rows > 0) {
    $rowNik = $resultNik->fetch_assoc();
    $nikPemohon = $rowNik['nik_warga'];
} else {
    // NIK tidak ditemukan, Anda dapat menghandlenya sesuai kebutuhan Anda
    $nikPemohon = "";
}

// Query untuk mengambil alamat berdasarkan id_keluarga
$queryAlamat = "SELECT alamat_keluarga FROM keluarga WHERE id_keluarga = (SELECT id_keluarga FROM warga WHERE nama = '$namaPemohon')";
$resultAlamat = $koneksi->query($queryAlamat);

if ($resultAlamat->num_rows > 0) {
    $rowAlamat = $resultAlamat->fetch_assoc();
    $alamatPemohon = $rowAlamat['alamat_keluarga'];
} else {
    // Alamat tidak ditemukan, Anda dapat menghandlenya sesuai kebutuhan Anda
    $alamatPemohon = "";
}

// Query INSERT untuk menyimpan data ke dalam tabel surat_pengantar
$queryInsert = "INSERT INTO surat_domilisi (nomor_surat, nama_pemohon, nik_pemohon, alamat_keluarga, id_keluarga, id_warga, upload, update_surat, status) VALUES ('', '$namaPemohon', '$nikPemohon', (SELECT alamat_keluarga FROM keluarga WHERE id_keluarga = (SELECT id_keluarga FROM warga WHERE nama = '$namaPemohon')), (SELECT id_keluarga FROM warga WHERE nama = '$namaPemohon'), (SELECT id FROM warga WHERE nama = '$namaPemohon'), now(), '', 'diproses')";

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

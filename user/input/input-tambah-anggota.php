<?php
// Pastikan ini adalah file proses-tambah-anggota.php yang sesuai

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan dari modal
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $nik_warga = $_POST["nik"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $tempat_lahir = $_POST["tempat_lahir"];
    $agama = $_POST["agama"];
    $status_keluarga = $_POST["status_keluarga"];
    $pekerjaan = $_POST["pekerjaan"];
    $id_keluarga = $_POST["id_keluarga"];
    $no_telepon = $_POST["no_telepon"];

    // Selanjutnya, tambahkan data ke dalam tabel anggota keluarga di database Anda
    // Gunakan koneksi ke database yang sesuai
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Query SQL untuk menambahkan anggota keluarga
    $query = "INSERT INTO warga (email, password, nama, nik_warga, jenis_kelamin, tanggal_lahir, tempat_lahir, agama, status_keluarga, pekerjaan, id_keluarga, no_telepon, role) VALUES ('$email', '$password', '$nama', '$nik_warga', '$jenis_kelamin', '$tanggal_lahir', '$tempat_lahir', '$agama', '$status_keluarga', '$pekerjaan', '$id_keluarga', '$no_telepon', 'user')";
    
    if (mysqli_query($koneksi, $query)) {
        // Jika penambahan berhasil, kembalikan ke halaman sebelumnya atau halaman yang Anda inginkan
        header("Location: ../data-keluarga.php"); // Ganti dengan halaman yang sesuai
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Error: " . mysqli_error($koneksi);
    }
    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>

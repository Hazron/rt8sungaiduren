<?php
// Pastikan ini adalah file edit-warga.php yang sesuai
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Tangkap data yang dikirim dari form modal
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nik = $_POST["nik"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $status_keluarga = $_POST["status_keluarga"];
    $agama = $_POST["agama"];
    $pekerjaan = $_POST["pekerjaan"];
    $tempatLahir = $_POST["tempat_lahir"];
    $tanggalLahir = $_POST["tanggal_lahir"];

    // Query SQL untuk melakukan UPDATE data warga
    $query = "UPDATE warga SET nama = '$nama', email = '$email', password = '$password', nik_warga = '$nik', jenis_kelamin = '$jenis_kelamin', tanggal_lahir = '$tanggalLahir' , tempat_lahir = '$tempatLahir' , status_keluarga = '$status_keluarga', agama = '$agama', pekerjaan = '$pekerjaan' WHERE id = $id";

    if (mysqli_query($koneksi, $query)) {
        // Jika UPDATE berhasil, kembalikan ke halaman sebelumnya atau halaman yang Anda inginkan
        header("Location: ../data-keluarga.php"); // Ganti dengan halaman yang sesuai
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Error: " . mysqli_error($koneksi);
    }
    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>

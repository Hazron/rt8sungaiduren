<?php
// Koneksi ke database (sesuaikan dengan pengaturan database Anda)
$koneksi = mysqli_connect("localhost", "root", "", "db-rt");

// Periksa apakah ada pengiriman data POST dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"]; // Password tidak di-hash
    $nik = $_POST["nik"];
    $alamat = $_POST["alamat"];
    $notelp = $_POST["notelp"];

    // Query SQL untuk menyimpan data ke dalam tabel "keluarga"
    $sql_keluarga = "INSERT INTO keluarga (nik_keluarga, kepala_keluarga, alamat_keluarga, nomor_telepon, anggota_keluarga)
                    VALUES ('$nik', '$nama', '$alamat', '$notelp', '$email')";
    
    // Eksekusi query SQL untuk tabel "keluarga"
    if (mysqli_query($koneksi, $sql_keluarga)) {
        // Ambil ID keluarga yang baru saja ditambahkan
        $id_keluarga = mysqli_insert_id($koneksi);

        // Query SQL untuk menyimpan data ke dalam tabel "warga"
        $sql_warga = "INSERT INTO warga (email, password, nama, nik_warga, status_keluarga, id_keluarga, no_telepon, Tanggal_input, role)
                    VALUES ('$email', '$password', '$nama', NULL, 'Kepala Keluarga', '$id_keluarga', '$notelp', NOW(), 'user')";
        
        // Eksekusi query SQL untuk tabel "warga"
        if (mysqli_query($koneksi, $sql_warga)) {
            echo "Registrasi berhasil. Data telah disimpan.";
        } else {
            echo "Error: " . $sql_warga . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Error: " . $sql_keluarga . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>

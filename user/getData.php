
<?php
/*
// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
$koneksi = new mysqli("localhost", "username", "password", "nama_database");

// Ambil nama dari permintaan POST
$namaPemohon = $_POST['nama'];

// Query untuk mengambil data berdasarkan nama
$query = "SELECT * FROM warga WHERE nama = '$namaPemohon'";
$result = $koneksi->query($query);

if ($result->num_rows > 0) {
    // Data ditemukan, kirimkan dalam format JSON
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    // Data tidak ditemukan
    echo json_encode(array("error" => "Data tidak ditemukan"));
}

// Tutup koneksi ke database
$koneksi->close(); 
?>

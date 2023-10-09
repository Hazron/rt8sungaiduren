<?php
// Pastikan Anda sudah mengatur koneksi ke database sebelumnya
$conn = new mysqli("localhost", "root", "", "db-rt");

if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $nama_barang = $_POST['nama_barang'];
    $kondisi = $_POST['kondisi'];
    $jumlah = $_POST['jumlah_barang'];

    // Validasi input kosong
    if (empty($nama_barang) || empty($kondisi) || empty($jumlah)) {
        echo "Semua kolom input harus diisi!";
    } else {
        // Perintah SQL untuk menyimpan data ke dalam tabel Event
        $sql = "INSERT INTO inventaris (id_barang, nama_barang, kondisi, jumlah_barang) 
                VALUES (NULL,'$nama_barang', '$kondisi', '$jumlah')";

        // Eksekusi perintah SQL
        if ($conn->query($sql) === TRUE) {
            // Jika data berhasil disimpan, Anda dapat melakukan redirect atau menampilkan pesan sukses
            header("Location: ../invent-ketua.php"); // Ganti "index.php" dengan halaman tujuan yang sesuai
            exit();
        } else {
            // Jika terjadi error, Anda dapat menampilkan pesan error
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Tutup koneksi
    $conn->close();
}
?>
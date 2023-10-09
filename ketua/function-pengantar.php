<?php 
function ditolak_pengantar($id_pengantar) {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Query SQL untuk mengupdate status surat pengantar menjadi "ditolak"
    $query = "UPDATE surat_pengantar SET status = 'ditolak' WHERE id_pengantar = $id_pengantar";

    if (mysqli_query($koneksi, $query)) {
        // Tutup koneksi ke database
        mysqli_close($koneksi);
        return true; // Berhasil ditolak
    } else {
        // Gagal melakukan update
        mysqli_close($koneksi);
        return false;
    }
}

function ditolak_domisili($id_domisili) {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Query SQL untuk mengupdate status surat domisili menjadi "ditolak"
    $query = "UPDATE surat_domilisi SET status = 'ditolak' WHERE id_domisili = $id_domisili";

    if (mysqli_query($koneksi, $query)) {
        // Tutup koneksi ke database
        mysqli_close($koneksi);
        return true; // Berhasil ditolak
    } else {
        // Gagal melakukan update
        mysqli_close($koneksi);
        return false;
    }
}

function ditolak_sktm($id_surat) {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Query SQL untuk mengupdate status surat SKTM menjadi "ditolak"
    $query = "UPDATE surat_tidakmampu SET status_surat = 'ditolak' WHERE id_surat = $id_surat";

    if (mysqli_query($koneksi, $query)) {
        // Tutup koneksi ke database
        mysqli_close($koneksi);
        return true; // Berhasil ditolak
    } else {
        // Gagal melakukan update
        mysqli_close($koneksi);
        return false;
    }
}

function ditolak_meninggal($No) {
    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

    // Query SQL untuk mengupdate status surat kematian menjadi "ditolak"
    $query = "UPDATE surat_kematian SET status = 'ditolak' WHERE id_surat = $No";

    if (mysqli_query($koneksi, $query)) {
        // Tutup koneksi ke database
        mysqli_close($koneksi);
        return true; // Berhasil ditolak
    } else {
        // Gagal melakukan update
        mysqli_close($koneksi);
        return false;
    }
}

?>
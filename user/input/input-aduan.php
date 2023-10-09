<?php
// Koneksi ke database
$servername = "localhost"; // Ganti sesuai dengan server Anda
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "db-rt"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Mengambil data dari formulir
$nama_pengaju = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];

// Mengunggah file lampiran (gambar)
$target_dir = "../upload/aduan/"; // Direktori untuk menyimpan lampiran
$target_file = $target_dir . basename($_FILES["lampiran"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
}

// Check file size (maksimal 5MB)
if ($_FILES["lampiran"]["size"] > 5000000) {
    echo "Maaf, file terlalu besar. Maksimal ukuran file adalah 5MB.";
    $uploadOk = 0;
}

// Allow certain image file formats (JPEG, PNG, GIF)
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Maaf, hanya file gambar (JPG, JPEG, PNG, GIF) yang diperbolehkan.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Maaf, file tidak dapat diunggah.";
} else {
    if (move_uploaded_file($_FILES["lampiran"]["tmp_name"], $target_file)) {
        // Insert data ke database
        $sql = "INSERT INTO aduan_warga (id_aduan, nomor_surat ,nama_pengaju, deskripsi, lampiran, status_aduan) VALUES (NULL,  NULL, '$nama_pengaju', '$deskripsi', '$target_file', 'diproses')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Aduan warga berhasil disimpan ke database.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        echo "File " . htmlspecialchars(basename($_FILES["lampiran"]["name"])) . " telah berhasil diunggah.";
    } else {
        echo "Maaf, ada kesalahan saat mengunggah file.";
    }
}

// Tutup koneksi ke database
$conn->close();
?>

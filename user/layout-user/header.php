<!DOCTYPE html>
<html lang="en">
<style>
    /*    
        .card:hover {
  transition: transform 0.3s ease-in-out;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
} */
    .green-bg {
        background-color: #28a745;
        color: #fff;
    }

    .nomor {
        font-size: 24px;
        font-weight: bold;
    }
    a {
        text-decoration: none; /* Menghapus underline */
        color: #000; /* Ubah warna teks menjadi hitam */
    }

    /* Mengubah gaya kursor saat mengarahkan ke tautan */
    a:hover {
        color:#000;
        cursor: pointer; /* Mengubah kursor menjadi tangan */
    }
    
</style>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Tambahkan meta tag viewport -->
    <!-- Link ke stylesheet Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Link ke stylesheet kustom Anda -->
    <link href="../asset/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?=$style?>">
    <!-- Link ke font awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>Halaman - Dashboard</title>
</head>
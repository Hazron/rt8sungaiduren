<?php 
require_once "../config.php";
require_once "../user/layout-user/cek-login.php";
require_once "../user/layout-user/header.php";
require_once "../user/layout-user/navbar.php";
require_once "../user/layout-user/sidebar.php"
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Halaman Layanan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <!-- Content Container -->
            <div class="container text" style="border: 1px solid #000; border-radius: 5px;">
                <div class="row gx-1">
                    <div class="col-md-8 text-left">
                        <div class="p-2">Selamat Datang di Portal Layanan Masyarakat RT 05</div>
                        <h2 class="p-2 text-muted">Administrasi Surat, Peminjaman Barang, Bayar uang kas
                            <br> dengan mudah</h2>
                        <div class="p-2">Silakan Pilih layanan yang telah tersedia</div>
                        <div class="p-2">Jika Anda Baru daftar, silakan perbaiki data keluarga anda <a href="data-keluarga.php">klik disini</a></div>
                    </div>
                    <div class="col-md-4">
                        <img src="../asset/assets/img/img.png" alt="Gambar Contoh" class="img-fluid" width="300"
                            height="300">
                    </div>
                </div>
            </div>
            <br>

            <!-- Three Cards -->
            <div class="row mt-5">
                <div class="col-md-3">
                    <!-- Tambahkan tautan ke halaman yang sesuai di sini -->
                    <div class="card h-100" style="width: 300px;">
                        <a href="layanan-user.php">
                            <img src="../asset/assets/img/surat-removebg-preview.png" class="card-img-top"
                                alt="Card Image" style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Administrasi Surat</h5>
                                <p class="card-text">Surat Keterangan Tidak Mampu, Surat Peminjaman, Surat Pengantar,
                                    Surat Keterangan</p>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Tambahkan tautan ke halaman yang sesuai di sini -->
                    <div class="card h-100" style="width: 300px;">
                        <a href="../user/pinjam-user.php">

                            <img src="../asset/assets/img/pinjamm.png" class="card-img-top" alt="Card Image"
                                style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Peminjaman Barang (soon)</h5>
                                <p class="card-text">Peminjaman Peralatan Rukun Tetangga dengan keperluan pribadi</p>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Tambahkan tautan ke halaman yang sesuai di sini -->
                    <div class="card h-100" style="width: 300px;">
                        <a href="../user/kas-user.php">

                            <img src="../asset/assets/img/nabung.png" class="card-img-top" alt="Card Image"
                                style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Uang Kas RT</h5>
                                <p class="card-text">Laporan pemasukan dan pengeluaran keuangan Kas RT</p>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Tambahkan tautan ke halaman yang sesuai di sini -->
                    <div class="card h-100" style="width: 300px;">
                        <a href="../user/gudang-user.php">

                            <img src="../asset/assets/img/gudang.png" class="card-img-top" alt="Card Image"
                                style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Gudang RT</h5>
                                <p class="card-text">Inventaris Peralatan Rukun Tetangga</p>
                            </div>
                    </div>
                    </a>
                </div>
            </div>

            <!-- Tambahkan dua card lagi di sini -->
            <div class="row mt-3">
                <div class="col-md-3">
                    <!-- Tambahkan tautan ke halaman yang sesuai di sini -->
                    <div class="card h-100" style="width: 300px;">
                        <a href="../user/aduanWarga-user.php">

                            <img src="../asset/assets/img/keluh-removebg-preview.png" class="card-img-top"
                                alt="Card Image" style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Aduan & Keluhan Masyarakat</h5>
                                <p class="card-text">Layanan Pengaduan dan Keluhan Masyarakat</p>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Tambahkan tautan ke halaman yang sesuai di sini -->
                    <div class="card h-100" style="width: 300px;">
                        <a href="../user/wajibLapor-user.php">

                            <img src="../asset/assets/img/icon-05.png" class="card-img-top" alt="Card Image"
                                style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Laporan Tamu Nginap (soon)</h5>
                                <p class="card-text">Tamu Wajib lapor 24Jam/7hari</p>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Tambahkan tautan ke halaman yang sesuai di sini -->
                    <div class="card h-100" style="width: 300px;">
                        <a href="https://cekbansos.kemensos.go.id/">

                            <img src="../asset/assets/img/bansod.png" class="card-img-top" alt="Card Image"
                                style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Cek Bansos</h5>
                                <p class="card-text">Kunjungi Website Resmi Kementrian Sosial</p>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <!-- Tambahkan tautan ke halaman yang sesuai di sini -->
                    <div class="card h-100" style="width: 300px;">
                        <a href="../user/kritik-user.php">

                            <img src="../asset/assets/img/kritkikk.png" class="card-img-top" alt="Card Image"
                                style="height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Kritik dan saran layanan masyarakat (soon)</h5>
                                <p class="card-text">Kritik terhadap sarana layanan di RT 05</p>
                            </div>
                    </div>
                    </a>
                </div>
            </div>



        </div>
        <?php 
    require_once "layout-user/footer.php";
?>
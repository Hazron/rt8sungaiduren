<?php 
require_once "../config.php";
require_once "cek-role.php";

require_once "../ketua/layout-ketua/header.php";
require_once "../ketua/layout-ketua/navbar.php";
require_once "../ketua/layout-ketua/sidebar.php"
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tabel kas RT 5</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index-ketua.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Tabel kas</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Uang kas RT 5 adalah dana yang dikumpulkan dari sumbangan warga untuk kepentingan bersama dalam
                    lingkungan kami.
                    Dana ini digunakan untuk menjaga kebersihan dan keamanan wilayah, pemeliharaan fasilitas umum,
                    serta mendukung berbagai kegiatan sosial dan kebersamaan di antara warga. Setiap sumbangan dari
                    warga sangat berarti dalam menjaga dan memperbaiki kualitas hidup di lingkungan RT 5, dan kami
                    berharap dukungan dan partisipasi aktif dari seluruh warga untuk memastikan bahwa dana ini digunakan
                    dengan bijak demi kesejahteraan bersama <br>
                    akan diupdate tiap bulan pertanggal 1
                    .
                </div>
            </div>
            <div class="row">
            <?php
                    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                    $conn = new mysqli("localhost", "root", "", "db-rt");

                    // Periksa koneksi
                    if ($conn->connect_error) {
                        die("Koneksi ke database gagal: " . $conn->connect_error);
                    }

                    // Perintah SQL untuk mengambil total uang pengeluaran
                    $sql = "SELECT SUM(jumlah) AS jumlah FROM pemasukan_kas";

                    // Eksekusi perintah SQL
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $total_pemasukan = $row["jumlah"];
                        
                    } else {
                        $total_pemasukan = 0;
                    }

                    // Tutup koneksi
                    $conn->close();
                    ?>
                    
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">UANG PEMASUKAN (Perbulan)
                            <div class="bg-pudar text-right p-2">
                                <span class="nomor">Rp<?php echo number_format($total_pemasukan, 0, ',', '.'); ?></span>
                            </div>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">

                        </div>
                    </div>
                </div>
                <?php
                    // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                    $conn = new mysqli("localhost", "root", "", "db-rt");

                    // Periksa koneksi
                    if ($conn->connect_error) {
                        die("Koneksi ke database gagal: " . $conn->connect_error);
                    }

                    // Perintah SQL untuk mengambil total uang pengeluaran
                    $sql = "SELECT SUM(pengeluaran) AS pengeluaran FROM pengeluaran_kas";

                    // Eksekusi perintah SQL
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $total_pengeluaran = $row["pengeluaran"];
                    } else {
                        $total_pengeluaran = 0;
                    }

                    // Tutup koneksi
                    $conn->close();
                    ?>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">UANG PENGELUARAN
                            <div class="bg-pudar text-right p-2">
                                <span
                                    class="nomor">Rp<?php echo number_format($total_pengeluaran, 0, ',', '.'); ?></span>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        </div>
                    </div>
                </div>
            </div>
            <!--pemasukkan-->
            <form action="../ketua/input-ketua/input-pemasukan.php" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5">Input Pemasukan Kas (Input dalam Perbulan)</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end">Simpan</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                                <div class="mb-3 row">
                                    <label for="bulan" class="col-sm-2 col-form-label">Bulan</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="bulan" name="bulan"
                                            class="form-control border-0 border-bottom" maxlength="200"
                                            placeholder="Masukkan Pemasukan bulan Ke berapa">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="judul" name="catatan"
                                            class="form-control border-0 border-bottom" maxlength="200"
                                            placeholder="Masukkan catatan opsional">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Pemasukan (Rp)</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="pemasukan" name="pemasukan"
                                            class="form-control border-0 border-bottom" maxlength="255"
                                            placeholder="Masukkan Jumlah pemasukan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--pengeluaran-->
            <form action="../ketua/input-ketua/input-pengeluaran.php" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5">Input Pengeluaran Kas</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end">Simpan</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                                <div class="mb-3 row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Jenis</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="jenis" name="jenis"
                                            class="form-control border-0 border-bottom" maxlength="255"
                                            placeholder="Masukkan Jenis Pengeluaran">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="judul" name="judul"
                                            class="form-control border-0 border-bottom" maxlength="255"
                                            placeholder="Masukkan Judul Pengeluaran">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Pengeluaran (Rp)</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="jenis" name="pengeluaran"
                                            class="form-control border-0 border-bottom" maxlength="255"
                                            placeholder="Masukkan Jumlah Pengeluaran">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jumlah_barang" class="col-sm-2 col-form-label">Catatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="jumlah_barang" name="catatan"
                                            class="form-control border-0 border-bottom" min="1"
                                            placeholder="Masukkan Jumlah Barang">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL KAS PENGELUARAN
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Jenis</th>
                            <th>Judul</th>
                            <th>Pengeluaran (Rp)</th>
                            <th>Catatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi data tabel di sini -->
                        <?php
                                // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                                $conn = new mysqli("localhost", "root", "", "db-rt");

                                // Periksa koneksi
                                if ($conn->connect_error) {
                                    die("Koneksi ke database gagal: " . $conn->connect_error);
                                }

                                // Perintah SQL untuk mengambil data dari tabel kas_pemasukan
                                $sql = "SELECT * FROM pengeluaran_kas";

                                // Eksekusi perintah SQL
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["jenis"] . "</td>";
                                        echo "<td>" . $row["judul"] . "</td>";
                                        echo "<td>" . number_format($row["pengeluaran"], 0, ',', '.') . "</td>";
                                        echo "<td>" . $row["catatan"] . "</td>";
                                        echo '<td><button data-toggle="modal" data-target="#detailModal">DETAIL</button></td>';
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>Tidak ada data kas pemasukan.</td></tr>";
                                }

                                    // Tutup koneksi
                                    $conn->close();
                                    ?>
                        <!-- Tambahkan data lainnya sesuai kebutuhan -->
                    </tbody>
                </table>

                <!--batas-->
            </div>
    </main>
    <?php 
    require_once "layout-ketua/footer.php";
?>
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
            <h1 class="mt-4">Halaman Utama</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <!-- CARD -->
            <div class="row justify-content-end ">
                <!-- Tambahkan kelas justify-content-end di sini -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card h-100">
                        <div class="card-content">
                            <!--cardbody-->
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa-solid fa-address-card font-large-3"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <?php 
                                        $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

                                        // Query SQL untuk menghitung jumlah 'diproses' dari tabel surat_pengantar
                                        $query = "SELECT COUNT(*) AS jumlah_diproses FROM surat_pengantar WHERE status = 'diproses'";
                                        $result = mysqli_query($koneksi, $query);
                                        
                                        // Ambil hasil kueri
                                        $row = mysqli_fetch_assoc($result);
                                        $jumlahDiproses = $row['jumlah_diproses'];
                                        
                                        // Tutup koneksi ke database
                                        mysqli_close($koneksi);?>
                                        <h3><?php echo $jumlahDiproses;?> Permintaan</h3>
                                        <span>SURAT PENGANTAR YANG PERLU DIPERIKSA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card h-100">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa-solid fa-location-pin font-large-3"></i>
                                    </div>
                                    <div class="media-body text-right">
                                    <?php
                                            // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                                            $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

                                            // Query SQL untuk mengambil jumlah permintaan yang perlu diperiksa dari tabel surat_domisili
                                            $query = "SELECT COUNT(*) AS total_permintaan FROM surat_domilisi WHERE status = 'diproses'";
                                            $result = mysqli_query($koneksi, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $total_permintaan = $row['total_permintaan'];

                                            // Tutup koneksi ke database
                                            mysqli_close($koneksi);
                                            ?>
                                        <h3><?php echo $total_permintaan; ?> Permintaan</h3>
                                            <span>SURAT DOMISILI YANG PERLU DIPERIKSA</span>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card h-100">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                    <i class="fa-solid fa-hand-holding-hand font-large-3"></i>
                                    </div>
                                    <?php
                                        // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                                        $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

                                        // Query SQL untuk mengambil jumlah permintaan dari tabel surat_tidakmampu
                                        $query = "SELECT COUNT(*) AS total_permintaan FROM surat_tidakmampu";
                                        $result = mysqli_query($koneksi, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        $total_permintaan = $row['total_permintaan'];

                                        // Tutup koneksi ke database
                                        mysqli_close($koneksi);
                                        ?>

                                    <div class="media-body text-right">
                                        <h3><?php echo $total_permintaan; ?> Permintaan</h3>
                                        <span>SURAT KETERANGAN TIDAK MAMPU YANG PERLU DIPERIKSA</span>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card h-100">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="fa-solid fa-heart-crack font-large-3"></i>
                                    </div>
                                    <?php
                                        // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                                        $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

                                        // Query SQL untuk mengambil jumlah permintaan dari tabel surat_kematian
                                        $query = "SELECT COUNT(*) AS total_permintaan FROM surat_kematian";
                                        $result = mysqli_query($koneksi, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        $total_permintaan = $row['total_permintaan'];

                                        // Tutup koneksi ke database
                                        mysqli_close($koneksi);
                                        ?>
                                    <div class="media-body text-right">
                                    <h3><?php echo $total_permintaan; ?> Permintaan</h3>
                                        <span>SURAT KEMATIAN YANG PERLU DIPERIKSA</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


           



        </div>
    </main>


    <?php 
    require_once "layout-ketua/footer.php";
?>
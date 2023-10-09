<?php 
require_once "../config.php";
$head = "User | KAS_RT";
require_once "../user/layout-user/cek-login.php";
require_once "../user/layout-user/header.php";
require_once "../user/layout-user/navbar.php";
require_once "../user/layout-user/sidebar.php"
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Form Aduan Warga RT 5</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../user/index-user.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Form Aduan Warga</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Form aduan dan keluhan warga adalah sebuah mekanisme yang memungkinkan
                    warga untuk mengkomunikasikan permasalahan, keprihatinan, atau saran
                    terkait dengan lingkungan dan layanan di sekitar mereka. Ini merupakan
                    alat yang sangat penting dalam membangun partisipasi aktif warga dalam
                    memperbaiki kualitas hidup dalam komunitas mereka.
                    .
                </div>
            </div>

            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <!-- Card Bootstrap -->
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="mb-0">Form Aduan Warga</h4>
                            </div>
                            <div class="card-body">
                                <!-- Formulir Aduan -->
                                <form action=".../input/input-aduan.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="lampiran">Lampiran</label>
                                        <input type="file" class="form-control" id="lampiran" name="lampiran">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi Aduan</label>
                                        <textarea class="form-control" id="deskripsi" rows="4"
                                            placeholder="Tuliskan Deskripsi Aduan" name="deskripsi"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Kirim Aduan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <?php 
    require_once "layout-user/footer.php";
    ?>
</div>
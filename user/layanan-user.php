<?php 
require_once "../config.php";

$head = "User | Layanan";
$style = "../style.css";
require_once "../user/layout-user/cek-login.php";
require_once "../user/layout-user/header.php";
require_once "../user/layout-user/navbar.php";
require_once "../user/layout-user/sidebar.php";
require '../vendor/autoload.php';

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Halaman Layanan Surat Menyurat</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../user/index-user.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Laman Surat Menyurat</li>
            </ol>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="card card-block" data-toggle="modal" data-target="#suratPengantar">
                        <img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg"
                            alt="Photo of sunset">
                        <h5 class="card-title mt-3 mb-3">Surat Pengantar dari RT</h5>
                        <p class="card-text">Guna lanjut tindak lanjut ke tingkat selanjutnya dari ketua RT.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-block" data-toggle="modal" data-target="#suratDomisili">
                        <img src="https://static.pexels.com/photos/7357/startup-photos.jpg" alt="Photo of sunset">
                        <h5 class="card-title  mt-3 mb-3">Surat Keterangan Domisili</h5>
                        <p class="card-text">Memberikan keterangan domisili kepada yang bersangkutan dari ketua RT</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-block" data-toggle="modal" data-target="#suratTidakMampu">
                        <img src="https://static.pexels.com/photos/262550/pexels-photo-262550.jpeg"
                            alt="Photo of sunset">
                        <h5 class="card-title  mt-3 mb-3">Surat tanda tidak mampu</h5>
                        <p class="card-text">Memberikan keterangan tidak mampu kepada warga RT 5 dari ketua RT
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card card-block" data-toggle="modal" data-target="#suratKematian">
                        <img src="https://static.pexels.com/photos/262550/pexels-photo-262550.jpeg"
                            alt="Photo of sunset">
                        <h5 class="card-title  mt-3 mb-3">Surat Keterangan Kematian</h5>
                        <p class="card-text">This is a company that builds websites, web apps and e-commerce solutions.
                        </p>
                    </div>
                </div>
            </div>

            <!--MODAL SURAT PENGANTAR-->
            <div class="modal fade" id="suratPengantar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Permintaan Surat</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi formulir permintaan surat di sini -->
                            <form method="POST" action="../user/input/input-pengantar.php"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nikPemohon">Nama Pemohon</label>
                                    <?php
                                    // Ambil id_keluarga dari session (sesuaikan dengan session Anda)
                                        $id_keluarga = $_SESSION["id_keluarga"];

                                        // Query untuk mengambil semua id_keluarga yang sama
                                        $sql = "SELECT nama FROM warga WHERE id_keluarga = $id_keluarga";
                                        $result = $conncet->query($sql);

                                        // Buat dropdown HTML
                                        echo '<select name="id_keluarga" id="id_keluarga" class="form-control">';
                                        while ($row = $result->fetch_assoc()) {
                                            $nama = $row['nama'];
                                            echo "<option value='$nama'>$nama</option>";
                                        }
                                        echo '</select>';
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <textarea class="form-control" id="keperluanPengantar" rows="4"
                                        placeholder="Masukkan keperluan Anda" name="keperluan"></textarea>
                                </div>
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="accept" >KIRIM KE RT</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--BATAS #SURAT PENGANTAR-->
            

            <!--modal 2-->





            <!--BATAS AWAL MODAL SURAT KETERANGAN DOMISILI-->
            <div class="modal fade" id="suratDomisili" tabindex="-1" role="dialog" aria-labelledby="suratDomisiliLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="suratDomisiliLabel">Form Permintaan Surat Keterangan Domisili
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi formulir permintaan surat -->
                            <form method="POST" action="../user/input/inputKet-alamat.php">
                                <div class="form-group">
                                    <label for="anggota_keluarga">Anggota Keluarga Pemohon</label>
                                    <?php
                                    // Ambil id_keluarga dari session (sesuaikan dengan session Anda)
                                        $id_keluarga = $_SESSION["id_keluarga"];

                                        // Query untuk mengambil semua id_keluarga yang sama
                                        $sql = "SELECT nama FROM warga WHERE id_keluarga = $id_keluarga";
                                        $result = $conncet->query($sql);

                                        // Buat dropdown HTML
                                        echo '<select name="id_keluarga" id="id_keluarga" class="form-control">';
                                        while ($row = $result->fetch_assoc()) {
                                            $nama = $row['nama'];
                                            echo "<option value='$nama'>$nama</option>";
                                        }
                                        echo '</select>';
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamatPemohon">Alamat Pemohon</label>
                                    <input type="text" class="form-control" id="alamatPemohonDomisili"
                                        value="Sistem akan memasukkan alamat sekarang anda" readonly>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim ke Ketua RT</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--BATAS AKHIR MODAL SURAT KETERANGAN DOMISILI-->

            <!--BATAS AWAL MODAL SURAT TANDA TIDAK MAMPU WARGA-->
            <div class="modal fade" id="suratTidakMampu" tabindex="-1" role="dialog"
                aria-labelledby="suratTidakMampuLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="suratTidakMampuLabel">Form Permintaan Surat Keterangan Tidak
                                Mampu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi formulir permintaan surat di sini -->
                            <form method="POST" action="../user/input/input-sktm.php">
                                <div class="form-group">
                                    <label for="Anggota_Keluarga_Pemohon">Anggota Keluarga Pemohon</label>
                                    <?php
                                    // Ambil id_keluarga dari session (sesuaikan dengan session Anda)
                                        $id_keluarga = $_SESSION["id_keluarga"];

                                        // Query untuk mengambil semua id_keluarga yang sama
                                        $sql = "SELECT nama FROM warga WHERE id_keluarga = $id_keluarga";
                                        $result = $conncet->query($sql);

                                        // Buat dropdown HTML
                                        echo '<select name="id_keluarga" id="id_keluarga" class="form-control">';
                                        while ($row = $result->fetch_assoc()) {
                                            $nama = $row['nama'];
                                            echo "<option value='$nama'>$nama</option>";
                                        }
                                        echo '</select>';
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamatPemohon">Alamat Pemohon</label>
                                    <input type="text" class="form-control" id="alamatPemohonDomisili"
                                        value="Sistem akan memasukkan alamat sekarang anda" readonly>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim ke Ketua RT</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--BATAS AKHIR MODAL SURAT TANDA TIDAK MAMPU-->

            <!--BATAS AWAL MODAL SURAT KETERANGAN KEMATIAN-->
            <div class="modal fade" id="suratKematian" tabindex="-1" role="dialog" aria-labelledby="suratDomisiliLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="suratKematianLabel">Form Permintaan Surat Keterangan Kematian
                                Anggota Keluarga</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Isi formulir permintaan surat -->
                            <form method="POST" action="../user/input/input-kematian.php">
                                <div class="form-group">
                                    <label for="anggota_meninggal">Anggota Keluarga Meninggal</label>
                                    <?php
                                    // Ambil id_keluarga dari session (sesuaikan dengan session Anda)
                                        $id_keluarga = $_SESSION["id_keluarga"];

                                        // Query untuk mengambil semua id_keluarga yang sama
                                        $sql = "SELECT nama FROM warga WHERE id_keluarga = $id_keluarga";
                                        $result = $conncet->query($sql);

                                        // Buat dropdown HTML
                                        echo '<select name="id_keluarga" id="id_keluarga" class="form-control">';
                                        while ($row = $result->fetch_assoc()) {
                                            $nama = $row['nama'];
                                            echo "<option value='$nama'>$nama</option>";
                                        }
                                        echo '</select>';
                                        ?>
                                </div>
                                <div class="form-group">
                                    <label for="tanggallahir">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tanggallahir" 
                                        value="Sistem akan memasukkan tanggal lahir bersangkutan" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggalMeninggal">Tanggal Meninggal</label>
                                    <input type="date" class="form-control" id="alamatPemohonDomisili" name="tanggalMeninggal">
                                </div>
                                <div class="form-group">
                                    <label for="tempatMeninggal">Tempat Meninggal</label>
                                    <input type="text" class="form-control" id="JamMeninggal"
                                        placeholder="Masukkan tempat meninggal ex:RS Abdul Manap" name="tempatMeninggal">
                                </div>
                                <div class="form-group">
                                    <label for="jamMeninggal">Jam Meninggal</label>
                                    <input type="time" class="form-control" id="JamMeninggal"
                                        placeholder="Masukkan Jam Meninggal anggota keluarga" name="jamMeninggal">
                                </div>
                                <div class="form-group">
                                    <label for="tempatPemakaman">Tempat Pemakaman</label>
                                    <input type="text" class="form-control" id="alamatPemohonDomisili"
                                        placeholder="Masukkan Tempat Pemakaman" name="tempatpemakaman">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim ke Ketua RT</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
            <!--BATAS AKHIR MODAL SURAT KETERANGAN KEMATIAN-->
        </div>
    </main>

    <?php 
    require_once "layout-user/footer.php";
    ?>
</div>
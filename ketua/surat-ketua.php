<?php 
require_once "../config.php";
require_once "cek-role.php";
require_once "../ketua/layout-ketua/header.php";
require_once "../ketua/layout-ketua/navbar.php";
require_once "../ketua/layout-ketua/sidebar.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Surat Menyurat RT</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index-ketua.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Surat RT</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Halaman dashboard layanan surat menyurat untuk Ketua RT dirancang khusus untuk membantu Ketua RT
                    dalam mengelola dan memantau keluar masuk permintaan surat menyurat dari warga RT 5. <br>
                    Melalui dashboard ini, Ketua RT dapat mengawasi permintaan surat-surat seperti surat keterangan,
                    surat izin, atau surat lainnya yang diajukan oleh warga RT.
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL SURAT PENGANTAR
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id_pengantar</th>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>NIK Pemohon</th>
                            <th>Alamat Pemohon</th>
                            <th>Keperluan</th>
                            <th>Tanggal Permohonan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
        $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

        // Query untuk mengambil data dari tabel
        $query = "SELECT id_pengantar, nama_pemohon, nik_pemohon, alamat_pemohon, keperluan, id_keluarga, upload, status FROM surat_pengantar";
        $result = mysqli_query($koneksi, $query);

        $no = 1; // Untuk menghitung nomor urut

        // Loop untuk mengisi data ke dalam tabel
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td hidden>" . $row['id_pengantar'] . "</td>"; // Kolom id_pengantar yang sembunyi
            echo "<td>" . $no . "</td>"; // Nomor urut
            echo "<td>" . $row['nama_pemohon'] . "</td>";
            echo "<td>" . $row['nik_pemohon'] . "</td>";
            echo "<td>" . $row['alamat_pemohon'] . "</td>";
            echo "<td>" . $row['keperluan'] . "</td>";
            echo "<td>" . $row['upload'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            ?>
            <?php
                echo "<td>";
                    if ($row['status'] === 'disetujui && ditolak' ) {
                        echo '<a href="hapus-pengantar.php?id_pengantar='. $row['id_pengantar'].'">HAPUS?</a>';
                    } else {
                        echo '<a href="#editPengantar'. $row['id_pengantar'].'" data-toggle="modal" data-target="#editPengantar' . $row['id_pengantar'] . '">SETUJUIN?</a>';
                        echo '<a href="menolak-pengantar.php?id_pengantar='. $row['id_pengantar'].'">| MENOLAK?</a>';
                    }
                        echo "</td>";
                    ?>
                    <div class="modal fade" id="editPengantar<?php echo $row['id_pengantar']; ?>" tabindex="-1"
                            aria-labelledby="editDomisiliLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editPengantarLabel">Edit Nomor Surat Pengantar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="update-pengantar.php">
                                            <input type="hidden" name="edit_id"
                                                value="<?php echo $row['id_pengantar']; ?>">
                                            <div class="mb-3">
                                                <label for="nomorSurat" class="form-label">Nomor Surat:</label>
                                                <input type="text" class="form-control" id="nomorSurat"
                                                    name="nomorSurat" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
            echo "</tr>";
            
            $no++; // Tambah nomor urut
        }

        // Tutup koneksi ke database
        mysqli_close($koneksi);
        ?>
                    </tbody>
                </table>
            </div>
            <!--BATAS BAWAH PENGANTAR-->
            <!--Surat Domisili DONE-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL SURAT DOMISILI
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id_domisili</th>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>NIK Pemohon</th>
                            <th>Alamat Pemohon</th>
                            <th>Keluarga Dari</th>
                            <th>Tanggal Permohonan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                        $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

                        // Query untuk mengambil data dari tabel
                        $query = "SELECT * FROM surat_domilisi"; // Ganti "nama_tabel" dengan nama tabel Anda
                        $result = mysqli_query($koneksi, $query);

                        $no = 1; // Untuk menghitung nomor urut

                        // Loop untuk mengisi data ke dalam tabel
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td hidden>" . $row['id_domisili'] . "</td>"; // Kolom id_domisili yang sembunyi
                            echo "<td>" . $no . "</td>"; // Nomor urut
                            echo "<td>" . $row['nama_pemohon'] . "</td>";
                            echo "<td>" . $row['nik_pemohon'] . "</td>";
                            echo "<td>" . $row['alamat_keluarga'] . "</td>";
                            echo "<td>";
                            $id_keluarga = $row['id_keluarga'];
                            $query_keluarga = "SELECT kepala_keluarga FROM keluarga WHERE id_keluarga = $id_keluarga";
                            $result_keluarga = mysqli_query($koneksi, $query_keluarga);
                            $kepala_keluarga = mysqli_fetch_assoc($result_keluarga)['kepala_keluarga'];
                            echo $kepala_keluarga;
                            echo "</td>";

                            echo "<td>" . $row['upload'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            ?>
                        <?php
                                    echo "<td>";
                                    if ($row['status'] === 'disetujui') {
                                        echo '<a href="hapus-domisili.php?id_domisili=' . $row['id_domisili'] . '">HAPUS?</a>';
                                    } else {
                                        echo '<a href="#editDomisili' . $row['id_domisili'] . '" data-toggle="modal" data-target="#editDomisili' . $row['id_domisili'] . '">SETUJUIN?</a>';
                                        echo '<a href="menolak-pengantar.php?id_domisili='. $row['id_domisili'].'">| MENOLAK?</a>';

                                    }
                                    echo "</td>";
                                    ?>
                        <!--MODAL EDIT-->
                        <div class="modal fade" id="editDomisili<?php echo $row['id_domisili']; ?>" tabindex="-1"
                            aria-labelledby="editDomisiliLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editDomisiliLabel">Edit Nomor Surat Domisili</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="update-domisili.php">
                                            <input type="hidden" name="edit_id"
                                                value="<?php echo $row['id_domisili']; ?>">
                                            <div class="mb-3">
                                                <label for="nomorSurat" class="form-label">Nomor Surat:</label>
                                                <input type="text" class="form-control" id="nomorSurat"
                                                    name="nomorSurat" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            echo "</tr>";
                            $no++; // Tambah nomor urut
                        }
                        // Tutup koneksi ke database
                        mysqli_close($koneksi);
                        ?>
                    </tbody>
                </table>
            </div>

            <!--TABEL SKTM DONE-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL SURAT KETERANGAN TIDAK MAMPU
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id_surat</th>
                            <th>No</th>
                            <th>Nama Pemohon</th>
                            <th>Alamat_Pemohon</th>
                            <th>Tanggal Permohonan</th>
                            <th>Dari Keluarga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                            $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

                            // Query untuk mengambil data dari tabel surat_tidak_mampu
                            $query = "SELECT * FROM surat_tidakmampu";
                            $result = mysqli_query($koneksi, $query);

                            $no = 1; // Untuk menghitung nomor urut

                            // Loop untuk mengisi data ke dalam tabel
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td hidden>" . $row['id_surat'] . "</td>"; // Kolom id_surat yang sembunyi
                                echo "<td>" . $no . "</td>"; // Nomor urut
                                echo "<td>" . $row['nama_pemohon'] . "</td>";
                                
                                // Mengambil alamat_keluarga dari tabel keluarga berdasarkan id_keluarga
                                $id_keluarga = $row['id_keluarga'];
                                $query_alamat_keluarga = "SELECT alamat_keluarga FROM keluarga WHERE id_keluarga = $id_keluarga";
                                $result_alamat_keluarga = mysqli_query($koneksi, $query_alamat_keluarga);
                                $alamat_keluarga = mysqli_fetch_assoc($result_alamat_keluarga)['alamat_keluarga'];

                                echo "<td>" . $alamat_keluarga . "</td>";
                                echo "<td>" . $row['upload'] . "</td>";

                                $query_keluarga = "SELECT kepala_keluarga FROM keluarga WHERE id_keluarga = $id_keluarga";
                                $hasil_keluarga = mysqli_query($koneksi, $query_keluarga);
                                $kepala_keluarga = mysqli_fetch_assoc($hasil_keluarga )['kepala_keluarga'];
                                echo "<td>". $kepala_keluarga. "</td>";
                                echo "<td>" . $row['status_surat'] . "</td>";
                                ?>
                        <?php
                                    echo "<td>";
                                    if ($row['status_surat'] === 'disetujui') {
                                        echo '<a href="hapus-sktm.php?id_surat=' . $row['id_surat'] . '">HAPUS?</a>';
                                    } else {
                                        echo '<a href="#editSktm' . $row['id_surat'] . '" data-toggle="modal" data-target="#editSktm' . $row['id_surat'] . '">SETUJUIN?</a>';
                                        echo '<a href="menolak-pengantar.php?id_surat='. $row['id_surat'].'">| MENOLAK?</a>';
                                    }
                                    echo "</td>";
                                ?>
                        <!-- Modal untuk Edit -->
                        <div class="modal fade" id="editSktm<?php echo $row['id_surat']; ?>" tabindex="-1"
                            aria-labelledby="editSktmLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSktmLabel">Edit Nomor Surat
                                            <?php echo $row['nama_pemohon']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="update_sktm.php">
                                            <input type="hidden" name="edit_id" value="<?php echo $row['id_surat']; ?>">
                                            <div class="mb-3">
                                                <label for="nomorSurat" class="form-label">Nomor Surat:</label>
                                                <input type="text" class="form-control" id="nomorSurat"
                                                    name="nomorSurat" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                echo "</tr>";
                                $no++; // Tambah nomor urut
                            }

                        // Tutup koneksi ke database
                        mysqli_close($koneksi);
                        ?>
                    </tbody>
                </table>
            </div>

            <!--tabel kematian DONE-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL SURAT KETERANGAN KEMATIAN
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id_surat</th>
                            <th>No</th>
                            <th>Anggota Keluarga Meninggal</th>
                            <th>Tanggal Meninggal</th>
                            <th>Tempat Pemakaman</th>
                            <th>Dari Keluarga</th>
                            <th>Tanggal Pemohon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
            $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

            // Query SQL untuk mengambil data dari tabel surat_kematian dengan informasi tambahan dari tabel keluarga
            $query = "SELECT sk.id_surat AS 'No', 
                                sk.anggota_meninggal AS 'Anggota Keluarga Meninggal',
                                sk.tanggal_lahir AS 'Tanggal Lahir',
                                sk.tempat_meninggal AS 'Tempat Meninggal',
                                sk.tanggal_meninggal AS 'Tanggal Meninggal',
                                sk.jam_meninggal AS 'Jam Meninggal',
                                sk.tempat_pemakaman AS 'Tempat Pemakaman',
                                k.kepala_keluarga AS 'Dari Keluarga',
                                sk.upload AS 'Tanggal Permohonan',
                                sk.status AS 'Status'
                        FROM surat_kematian sk
                        JOIN keluarga k ON sk.id_keluarga = k.id_keluarga";

            $result = mysqli_query($koneksi, $query);

            $no = 1; // Untuk menghitung nomor urut

            // Loop untuk mengisi data ke dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td hidden>" . $row['Anggota Keluarga Meninggal'] . "</td>"; // Kolom No yang sembunyi
                echo "<td>" . $no . "</td>"; // Nomor urut
                echo "<td>" . $row['Anggota Keluarga Meninggal'] . "</td>";
                echo "<td>" . $row['Tanggal Meninggal'] . "</td>";
                echo "<td>" . $row['Tempat Pemakaman'] . "</td>";
                echo "<td>" . $row['Dari Keluarga'] . "</td>";
                echo "<td>" . $row['Tanggal Permohonan'] . "</td>";
                echo "<td>" . $row['Status'] . "</td>";
                ?>
                        <td>
                            <?php
                        if ($row['Status'] === 'disetujui') {
                            echo '<a href="hapus-meninggal.php?id_surat='.$row['No'].'">HAPUS</a>';
                        } else {
                            echo '<a href="#editModal' . $row['No'] . '" data-toggle="modal" data-target="#editModal' . $row['No'] . '">SETUJUIN</a>';
                            echo '<a href="menolak-pengantar.php?id_surat='. $row['No'].'">| MENOLAK?</a>';
                        }
                    ?>
                        </td>
                        <?php
                echo "</tr>";

                // MODAL SURAT MENINGGAL
                echo '<div class="modal fade" id="editModal' . $row['No'] . '" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">';
                echo '    <div class="modal-dialog">';
                echo '        <div class="modal-content">';
                echo '            <div class="modal-header">';
                echo '                <h5 class="modal-title" id="editModalLabel">Edit Nomor Surat</h5>';
                echo '                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                echo '            </div>';
                echo '            <div class="modal-body">';
                echo '                <form method="POST" action="update-meninggal.php">';
                echo '                    <input type="hidden" name="edit_id" value="' . $row['No'] . '">';
                echo '                    <div class="mb-3">';
                echo '                        <label for="nomorSurat" class="form-label">Nomor Surat:</label>';
                echo '                        <input type="text" class="form-control" id="nomorSurat" name="nomorSurat" required>';
                echo '                    </div>';
                echo '                    <button type="submit" class="btn btn-primary">Konfirmasi</button>';
                echo '                </form>';
                echo '            </div>';
                echo '        </div>';
                echo '    </div>';
                echo '</div>';

                $no++; // Tambah nomor urut
            }
            ?>



                    </tbody>
                </table>
            </div>
            <!-- Tutup koneksi ke database -->
            <?php
mysqli_close($koneksi);
?>





        </div>
    </main>
    <?php 
    require_once "layout-ketua/footer.php";
?>
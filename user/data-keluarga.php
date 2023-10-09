<?php 
require_once "../config.php";
require_once "../user/layout-user/cek-login.php";
require_once "../user/layout-user/header.php";
require_once "../user/layout-user/navbar.php";
require_once "../user/layout-user/sidebar.php";
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Keluarga</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../user/index-user.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Tabel Keluarga Anda</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL DATA KELUARGA <br>
                    email dan password disarankan diberi kepala keluarga. opsional diberikan yang memahaminya <br>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Anggota Keluarga</button>
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Status Keluarga</th>
                            <th>Agama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Koneksi ke database (sesuaikan dengan pengaturan database Anda)
                        $koneksi = mysqli_connect("localhost", "root", "", "db-rt");

                        // Sesuaikan dengan id_keluarga yang ingin Anda tampilkan
                        $id_keluarga = $_SESSION["id_keluarga"];

                        // Query SQL untuk mengambil data warga berdasarkan id_keluarga
                        $query = "SELECT * FROM warga WHERE id_keluarga = $id_keluarga";
                        $result = mysqli_query($koneksi, $query);

                        // Loop untuk mengisi data ke dalam tabel
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td hidden>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['password'] . "</td>";
                            echo "<td>" . $row['nik_warga'] . "</td>";
                            echo "<td>" . $row['jenis_kelamin'] . "</td>";
                            echo "<td>" . $row['status_keluarga'] . "</td>";
                            echo "<td>" . $row['agama'] . "</td>";
                        ?>
                            <td><button class="btn btn-info btn-edit" data-bs-toggle="modal" data-bs-target="#editModal_<?php echo $row['id']; ?>">Edit</button> | <a href='hapus-warga.php?id=<?php echo $row['id']; ?>'>Hapus</a></td>
                        <?php
                        echo "</tr>";
                    }
                    // Tutup koneksi ke database
                    mysqli_close($koneksi);
                    ?>
                    </tbody>
                </table>
                <?php
                    // Fetch the data again for creating edit modals
                    $koneksi = mysqli_connect("localhost", "root", "", "db-rt");
                    $result = mysqli_query($koneksi, $query);

                    // Loop to create edit modals
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <!-- Modal Edit Data Warga -->
                    <div class="modal fade" id="editModal_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel_<?php echo $row['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel_<?php echo $row['id']; ?>">Edit Data Warga</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="../user/input/edit-warga.php">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama:</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password:</label>
                                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">NIK :</label>
                                            <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $row['nik_warga']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Jenis Kelamin:</label>
                                            <input type="text" class="form-control" id="jeniskelamin" name="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Tanggal Lahir :</label>
                                            <input type="text" class="form-control" id="tanggallahir" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Pempat Lahir :</label>
                                            <input type="text" class="form-control" id="tempatlahir" name="tempat_lahir" value="<?php echo $row['tempat_lahir']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Agama :</label>
                                            <input type="text" class="form-control" id="agama" name="agama" value="<?php echo $row['agama']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Status Keluarga :</label>
                                            <input type="text" class="form-control" id="statuskeluarga" name="status_keluarga" value="<?php echo $row['status_keluarga']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Pekerjaan :</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $row['pekerjaan']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">No Urut Keluarga :</label>
                                            <input readonly type="text" class="form-control" id="id_keluarga" name="id_keluarga" value="<?php echo $row['id_keluarga']; ?>">
                                        </div>
                                        <!-- Add other input fields here -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" id="editSave">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                    // Tutup koneksi ke database
                    mysqli_close($koneksi);
                ?>
                <!--Modal Tambah Anggota Keluarga-->
                <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahModalLabel">Edit Data Warga</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="../user/input/input-tambah-anggota.php">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama:</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">!Email:</label>
                                        <small class="form-text text-muted">Input Password untuk anggota keluarga ini dapat mengedit.</small>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Opsional">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">!Password:</label>
                                        <small class="form-text text-muted">Input Password untuk anggota keluarga ini dapat mengedit.</small>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Opsional">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK:</label>
                                        <input type="text" class="form-control" id="nik" name="nik" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin:</label>
                                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir:</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir:</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                    </div>
                                    <div class="mb-3">
                                        <label for="agama" class="form-label">Agama:</label>
                                        <input type="text" class="form-control" id="agama" name="agama">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status_keluarga" class="form-label">Status Keluarga:</label>
                                        <select class="form-select" id="status_keluarga" name="status_keluarga">
                                            <!-- Tambahkan opsi-opsi status keluarga yang sesuai -->
                                            <option value="Suami">Suami</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Famili Lain">Famili Lain</option>
                                            <!-- Pastikan tidak ada opsi "Kepala Keluarga" -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pekerjaan" class="form-label">Pekerjaan:</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="id_keluarga" class="form-label">ID Keluarga:</label>
                                        <input type="text" class="form-control" id="id_keluarga" name="id_keluarga"
                                            value="<?php echo $_SESSION['id_keluarga']; ?>" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_telepon" class="form-label">Nomor Telepon:</label>
                                        <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Opsional">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                        </div>



                    
        </div>
</div>
</main>
<?php 
require_once "../user/layout-user/footer.php";
?>
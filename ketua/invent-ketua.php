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
            <h1 class="mt-4">Halaman Gudang RT 5</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../ketua/index-ketua.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Gudang RT</li>
            </ol>


            <form action="../ketua/input-ketua/input-invent.php" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5">Tambah Inventaris</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end">Simpan</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">

                                <div class="mb-3 row">
                                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="nama_barang" name="nama_barang"
                                            class="form-control border-0 border-bottom" maxlength="255"
                                            placeholder="Masukkan Nama Barang">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                                    <div class="col-sm-10">
                                        <select id="kondisi" name="kondisi" class="form-control">
                                            <option value="baik">Baik</option>
                                            <option value="rusak">Rusak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jumlah_barang" class="col-sm-2 col-form-label">Jumlah Barang</label>
                                    <div class="col-sm-10">
                                        <input type="number" id="jumlah_barang" name="jumlah_barang"
                                            class="form-control border-0 border-bottom" min="1"
                                            placeholder="Masukkan Jumlah Barang">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Tabel untuk menampilkan data Inventaris -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <input type="hidden" id="id_barang" name="id_barang" value="">

                    <?php
                    // Koneksi ke database
                    $conn = new mysqli("localhost", "root", "", "db-rt");

                    // Perintah SQL untuk mengambil data dari tabel Inventaris
                    $sql = "SELECT * FROM inventaris";

                    // Eksekusi perintah SQL
                    $result = $conn->query($sql);

                    // Cek apakah ada data yang ditemukan
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $count . "</th>";
                            echo "<td hidden>" . $row["id_barang"]. "</td>";
                            echo "<td>" . $row["nama_barang"] . "</td>";
                            echo "<td>" . $row["kondisi"] . "</td>";
                            echo "<td>" . $row["jumlah_barang"] . "</td>";
                            ?>
                    <td><button data-toggle="modal" data-target="#detailModal"
                            data-id="<?php echo $row["id_barang"]; ?> " name="data_id" id="data_id">DETAIL</button></td>
                    <?php
                            echo "</tr>";
                            $count++;
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data inventaris yang ditemukan.</td></tr>";
                    }

                    // Tutup koneksi
                    $conn->close();
                    ?>
                </tbody>
            </table>
            <!--batas-->
        </div>
    </main>
    <!--MODAL DETAIL-->
   



    <?php 
    require_once "layout-ketua/footer.php";
?>
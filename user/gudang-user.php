<?php 
require_once "../config.php";
$head = "User | Gudang_RT";
require_once "../user/layout-user/cek-login.php";
require_once "../user/layout-user/header.php";
require_once "../user/layout-user/navbar.php";
require_once "../user/layout-user/sidebar.php"
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../user/index-user.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Gudang RT</li>
            </ol>

            <div class="card mb-4">
                <div class="card-body">
                Gudang RT adalah tempat penyimpanan atau gudang yang biasanya 
                digunakan dalam lingkungan perumahan atau kompleks perumahan yang 
                dikelola oleh ketua Rukun Tetangga (RT). Fungsi utama dari gudang 
                RT adalah untuk menyimpan peralatan dan barang-barang yang digunakan
                dalam kegiatan-kegiatan komunitas, seperti alat-alat kebersihan, 
                peralatan olahraga, perlengkapan acara, atau bahkan dokumen-dokumen penting terkait administrasi RT.
                <br>
                bagi warga ingin meminjam barang dari RT dapat mengkunjungi rumah ketua RT
                .
                </div>
            </div>

            <!-- Tabel untuk menampilkan data Inventaris -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $conn = new mysqli("localhost", "root", "", "db-rt");

                    // Perintah SQL untuk mengambil data dari tabel Inventaris
                    $sql = "SELECT * FROM Inventaris";

                    // Eksekusi perintah SQL
                    $result = $conn->query($sql);

                    // Cek apakah ada data yang ditemukan
                    if ($result->num_rows > 0) {
                        $count = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<th scope='row'>" . $count . "</th>";
                            echo "<td>" . $row["id_barang"] . "</td>";
                            echo "<td>" . $row["nama_barang"] . "</td>";
                            echo "<td>" . $row["kondisi"] . "</td>";
                            echo "<td>" . $row["jumlah_barang"] . "</td>";
                            echo "<td><button>Detail</button></td>";
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
        </div>
    </main>

<?php 
    require_once "layout-user/footer.php";
    ?>
</div>
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
            <h1 class="mt-4">Data Surat Keluarga</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../user/index-user.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Tabel Surat Keluarga Anda</li>
            </ol>
        <!--container-->
        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL SURAT PENGANTAR <br>
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id_pengantar</th>
                            <th>Nama_pemohon</th>
                            <th>Nomor Surat (akan terbit jika disetujui)</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Keperluan</th>
                            <th>Status Surat</th>
                            <th>FILE PDF</th>
                            <th>Waktu Memohon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Perform a database query to fetch the data for a specific id_keluarga
                        $id_keluarga = $_SESSION["id_keluarga"];
                        $query = "SELECT * FROM surat_pengantar WHERE id_keluarga = $id_keluarga";
                        $result = mysqli_query($conncet, $query);

                        // Loop through the query results and generate table rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td hidden>" . $row['id_pengantar'] . "</td>";
                            echo "<td>" . $row['nama_pemohon'] . "</td>";
                            echo "<td>" . $row['nomor_surat'] . "</td>";
                            echo "<td>" . $row['nik_pemohon'] . "</td>";
                            echo "<td>" . $row['alamat_pemohon'] . "</td>";
                            echo "<td>" . $row['keperluan'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>";    
                            if ($row['status'] == 'diproses') {
                                // Display a link for "Disetujui"
                                echo "<a href='setujui.php?id_pengantar=" . $row['id_pengantar'] . "'></a>";
                            } elseif ($row['status'] == 'disetujui') {
                                // Display a link for "Print"
                                echo "<a href='print-pengantar.php?id_pengantar=" . $row['id_pengantar'] . "&nama_pemohon=" . $row['nama_pemohon'] . "'>Print</a>";
                            }
                            "</td>";
                            echo "<td>" . $row['upload'] . "</td>";
                            echo "<td> <a href='hapus-pengantar.php?id=" . $row['id_pengantar'] . "'>Hapus</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
        </div>

        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL SURAT DOMISILI <br>
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id_pengantar</th>
                            <th>Nama_pemohon</th>
                            <th>Nomor Surat (akan terbit jika disetujui)</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Status Surat</th>
                            <th>Waktu Memohon</th>
                            <th>FILE PDF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Perform a database query to fetch the data for a specific id_keluarga
                        $id_keluarga = $_SESSION["id_keluarga"];
                        $query = "SELECT * FROM surat_domilisi WHERE id_keluarga = $id_keluarga";
                        $result = mysqli_query($conncet, $query);

                        // Loop through the query results and generate table rows
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td hidden>" . $row['id_domisili'] . "</td>";
                            echo "<td>" . $row['nama_pemohon'] . "</td>";
                            echo "<td>" . $row['nomor_surat'] . "</td>";
                            echo "<td>" . $row['nik_pemohon'] . "</td>";
                            echo "<td>" . $row['alamat_keluarga'] . "</td>";
                            echo "<td>" . $row['status'] . "</td>";
                            echo "<td>" . $row['upload'] . "</td>";
                            echo "<td>";    
                                    if ($row['status'] == 'diproses') {
                                        // Display a link for "Disetujui"
                                        echo "<a href='setujui.php?id=" . $row['id_domisili'] . "'></a>";
                                    } elseif ($row['status'] == 'disetujui') {
                                        // Display a link for "Print"
                                        echo "<a href='print-domisili.php?id_domisili=" . $row['id_domisili'] . "&nama_pemohon=" . $row['nama_pemohon'] . "'>Print</a>";
                                    }
                                    "</td>";
                            echo "<td> <a href='hapus-domisili.php?id=" . $row['id_domisili'] . "'>Hapus</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL SURAT KETERANGAN TIDAK MAMPU <br>
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id_surat</th>
                            <th>Nama_pemohon</th>
                            <th>Nomor Surat (akan terbit jika disetujui)</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Status Surat</th>
                            <th>Waktu Memohon</th>
                            <th>FILE PDF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Perform a database query to fetch the data for a specific id_keluarga
                        $id_keluarga = $_SESSION["id_keluarga"];
                        $query = "SELECT st.*, w.nik_warga FROM surat_tidakmampu st
                                INNER JOIN warga w ON st.id_warga = w.id
                                WHERE st.id_keluarga = $id_keluarga";
                        $result = mysqli_query($conncet, $query);

                        // Loop through the query results and generate table rows
                        if (mysqli_num_rows($result) === 0) {
                            echo "<tr><td colspan='9'>Keluarga Anda belum memohon Surat Keterangan Tidak Mampu.</td></tr>";
                        } else {
                            // Loop through the query results and generate table rows
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td hidden>" . $row['id_surat'] . "</td>";
                                echo "<td>" . $row['nama_pemohon'] . "</td>";
                                echo "<td>" . $row['nomor_surat'] . "</td>";
                                echo "<td>" . $row['nik_warga'] . "</td>";
                                echo "<td>" . $row['alamat'] . "</td>";
                                echo "<td>" . $row['status_surat'] . "</td>";
                                echo "<td>" . $row['upload'] . "</td>";
                                echo "<td>";    
                                if ($row['status_surat'] == 'diproses') {
                                    // Display a link for "Disetujui"
                                    echo "<a href='setujui.php?id=" . $row['id_surat'] . "'></a>";
                                } elseif ($row['status_surat'] == 'disetujui') {
                                    // Display a link for "Print"
                                    echo "<a href='print-SKTM.php?id_surat=" . $row['id_surat'] . "&nama_pemohon=" . $row['nama_pemohon'] . "'>Print</a>";
                                }
                                "</td>";
                                echo "<td><a href='hapus-sktm.php?id_surat=" . $row['id_surat'] . "'>Hapus</a></td>";
                            echo "</tr>";
                            }
                        }
                    ?>
                    </tbody>
                </table>
        </div>
        <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    TABEL SURAT KEMATIAN <br>
                </div>
                <table class="table table-bordered table-striped mt-3">
                    <thead>
                        <tr>
                            <th hidden>id_surat</th>
                            <th>Anggota Meninggal</th>
                            <th>Nomor Surat (akan terbit jika disetujui)</th>
                            <th>NIK</th>
                            <th>Tanggal Meninggal</th>
                            <th>Status Surat</th>
                            <th>Waktu Mengajukan</th>
                            <th>FILE PDF</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // Perform a database query to fetch the data for a specific id_keluarga
                        $id_keluarga = $_SESSION["id_keluarga"];
                        $query = "SELECT sk.*, w.nik_warga FROM surat_kematian sk
                                INNER JOIN warga w ON sk.id_warga = w.id
                                WHERE sk.id_keluarga = $id_keluarga";
                        $result = mysqli_query($conncet, $query);

                        // Check if there are no records
                        if (mysqli_num_rows($result) === 0) {
                            echo "<tr><td colspan='9'>Keluarga Anda tidak memohon pembuatan surat.</td></tr>";
                        } else {
                            // Loop through the query results and generate table rows
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                    echo "<td hidden>" . $row['id_surat'] . "</td>";
                                    echo "<td>" . $row['anggota_meninggal'] . "</td>";
                                    echo "<td>" . $row['nomor_surat'] . "</td>";
                                    echo "<td>" . $row['nik_warga'] . "</td>";
                                    echo "<td>" . $row['tanggal_meninggal'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td>" . $row['upload'] . "</td>";
                                    echo "<td>";    
                                    if ($row['status'] == 'diproses') {
                                        // Display a link for "Disetujui"
                                        echo "<a href='setujui.php?id=" . $row['id_surat'] . "'></a>";
                                    } elseif ($row['status'] == 'disetujui') {
                                        // Display a link for "Print"
                                        echo "<a href='print-kematian.php?id_surat=" . $row['id_surat'] . "&anggota_meninggal=" . $row['anggota_meninggal'] . "'>Print</a>";
                                    }
                                    "</td>";
                                    echo "<td><a href='hapus-meninggal.php?id_surat=" . $row['id_surat'] . "'>Hapus</a></td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                    </tbody>
                </table>
        </div>





        <!--container-->
        </div>
</main>
<?php 
require_once "../user/layout-user/footer.php";
?>
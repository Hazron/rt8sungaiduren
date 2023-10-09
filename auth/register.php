<?php 
session_start();
require_once "../config.php";
$head = "REGISTER";
require_once "../user/layout-user/header.php";
?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Keluarga Baru</h3>
                                    <h5 class="text-center font-weight-light my-4">Khusus Kepala Keluarga</h5></div>
                                    <div class="card-body">
                                        <form method="POST" action="proses-register.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputnama" name="nama" type="text" placeholder="Masukkan Nama Anda" />
                                                <label for="inputEmail">Nama Anda</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="Masukkan Email untuk Login" />
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="password" type="password" placeholder="Masukkan Pasword untuk Login" />
                                                <label for="inputEmail">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="nik" type="text" placeholder="Masukkan Email untuk Login" />
                                                <label for="inputEmail">NIK Keluarga</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="alamat" type="text" placeholder="Masukkan Email untuk Login" />
                                                <label for="inputEmail">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="notelp" type="text" placeholder="Masukkan Email untuk Login" />
                                                <label for="inputEmail">Nomor Telepon Rumah</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <button type="submit">REGISTER</button>
                                            </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">FORM LOGIN</a></div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Hazron 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

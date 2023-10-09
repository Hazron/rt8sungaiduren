<?php
session_start();
require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember = isset($_POST["remember"]) ? true : false;

    // Query untuk memeriksa apakah pengguna dengan email yang sesuai ada dalam tabel "warga"
    $sql = "SELECT * FROM warga WHERE email = '$email'";
    $result = $conncet->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $role = $row['role'];

        // Verifikasi kata sandi yang diinput dengan kata sandi yang disimpan (gunakan password_verify)
            // Pengguna berhasil login
            $_SESSION["logged_in"] = true;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $row['id'];
            $_SESSION["nama"] = $row['nama'];
            $_SESSION["nik"] = $row['nik'];
            $_SESSION["status_keluarga"] = $row['status_keluarga'];
            $_SESSION["pekerjaan"] = $row['pekerjaan'];
            $_SESSION["no_telepon"] = $row['no_telepon'];
            $_SESSION["id_keluarga"] = $row['id_keluarga'];

            if ($remember) {
                // Jika "Remember Password" dicentang, atur cookie sesuai kebutuhan
                // Contoh: setcookie("user_email", $email, time() + 3600, "/");
            }

            // Periksa peran pengguna dan arahkan sesuai peran
            if ($role === "ketua") {
                header("location: ../ketua/index-ketua.php");
            } elseif ($role === "user") {
                header("location: ../user/index-user.php");
            }
            exit;
        }
    }

    // Gagal login
    $error_message = "Email atau kata sandi salah. Silakan coba lagi.";

?>

<?php
session_start();
session_unset();
session_destroy();
header("location: ../landing/index.php"); // Ganti dengan halaman login atau halaman lain yang sesuai
exit;
?>
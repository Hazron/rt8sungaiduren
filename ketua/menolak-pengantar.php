<?php
include("function-pengantar.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id_pengantar"])) {
        $id_pengantar = $_GET["id_pengantar"];
        if (ditolak_pengantar($id_pengantar)) {
            header("Location: surat-ketua.php");
            exit;
        } else {
            echo "Gagal menolak surat pengantar.";
        }
    } elseif (isset($_GET["id_domisili"])) {
        $id_domisili = $_GET["id_domisili"];
        if (ditolak_domisili($id_domisili)) {
            header("Location: surat-ketua.php");
            exit;
        } else {
            echo "Gagal menolak surat domisili.";
        }
    } elseif (isset($_GET["id_surat"])) {
        $id_surat = $_GET["id_surat"];
        if (ditolak_sktm($id_surat)) {
            header("Location: surat-ketua.php");
            exit;
        } else {
            echo "Gagal menolak surat SKTM.";
        }
    } elseif (isset($_GET["No"])) {
        $No = $_GET["No"];
        if (ditolak_meninggal($No)) {
            header("Location: surat-ketua.php");
            exit;
        } else {
            echo "Gagal menolak surat kematian.";
        }
    } else {
        echo "Parameter yang diperlukan tidak ditemukan.";
    }
} else {
    echo "Akses tidak sah.";
}
?>

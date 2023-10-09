<?php
require_once('tcpdf/tcpdf.php'); // Include the TCPDF library
require_once('../config.php'); // Include the database connection script

// Get the 'id_surat' from the query string
if (isset($_GET['id_surat'])) {
    $id_surat = $_GET['id_surat'];
} else {
    // Handle the case where 'id_surat' is not provided
    die('Invalid request');
}

// Query database to get data for the given 'id_surat'
$query = "SELECT * FROM surat_kematian WHERE id_surat = $id_surat";
$query = "SELECT sk.*, w.nama AS nama_warga, w.nik_warga AS nomor_ktp, w.jenis_kelamin, w.tempat_lahir AS tempat_lahir_warga, w.tanggal_lahir AS tanggal_lahir_warga, w.pekerjaan, w.agama, k.alamat_keluarga, k.kepala_keluarga AS keluarga_dari
          FROM surat_kematian AS sk
          JOIN warga AS w ON sk.id_warga = w.id
          JOIN keluarga AS k ON w.id_keluarga = k.id_keluarga
          WHERE sk.id_surat = $id_surat";
$result = mysqli_query($conncet, $query); // Corrected the variable name to $connect

if (!$result) {
    die('Error fetching data from the database: ' . mysqli_error($conncet)); // Corrected the variable name to $connect
}

if (mysqli_num_rows($result) == 0) {
    die('Data not found for the given ID surat');
}

$row = mysqli_fetch_assoc($result);

// Sanitize the 'anggota_meninggal' for the filename
$filename = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $row['anggota_meninggal']) . '_Surat_Kematian.pdf';

// Extend TCPDF to create custom headers and footers
class MYPDF extends TCPDF {
    public function Header() {
        // Set font for the header
    }

    public function Footer() {
        $this->SetY(-15);
        $this->SetFont('helvetica', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->getPageNumGroupAlias() . '/' . $this->getPageGroupAlias(), 0, false, 'C', 0, '', 0, false, 'T');
    }
}

// Create PDF object with 3x3x3x3 padding
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set margins for padding (3x3x3x3)
$pdf->SetMargins(20, 20, 20, 20); // Custom margins for a formal format

// Add a page
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 16); // Menggunakan font bold (B)

// Margin atas sebesar 3 cm (30 mm)
$pdf->SetY(30);

// Kop surat rata tengah
$pdf->Cell(0, 10, 'RUKUN TETANGGA 08', 0, false, 'C', 0, '', 0, false, 'M');
$pdf->Ln(5); // Move down after kop surat
$pdf->SetFont('helvetica', 'B', 14); // Menggunakan font bold (B)
$pdf->Cell(0, 10, 'KELURAHAN SIMPANG SUNGAI DUREN KECAMATAN JAMBI LUAR KOTA', 0, false, 'C', 0, '', 0, false, 'M');
$pdf->Ln(5); // Move down after kop surat

// Tambahkan garis horizontal setelah baris "KOTA JAMBI, PROVINSI JAMBI"
$yPos = $pdf->GetY(); // Simpan posisi Y saat ini
$pdf->SetFont('helvetica', 'B', 16); // Menggunakan font bold (B)
$pdf->Cell(0, 10, 'KOTA JAMBI, PROVINSI JAMBI', 0, false, 'C', 0, '', 0, false, 'M');
$pdf->SetY($yPos); // Kembalikan posisi Y ke sebelumnya
$pdf->Line(10, $yPos + 5, 200, $yPos + 5); // Gambar garis horizontal persis di bawah teks
$pdf->Ln(10); // Move down after kop surat

// Tambahkan teks "SURAT KETERANGAN MENINGGAL DUNIA"
$pdf->Cell(0, 10, 'SURAT KETERANGAN MENINGGAL DUNIA', 0, false, 'C');
$pdf->Ln(10); // Move down after judul surat

// Tambahkan teks "No Surat  :"
$pdf->SetFont('helvetica', '', 11);
$pdf->Cell(0, 10, 'No Surat  :'.$row['nomor_surat'], 0, false, 'C');
$pdf->Ln(10); // Move down after nomor surat

// Content goes here (formal format)
$pdf->SetFont('helvetica', '', 11);
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 10, 'Dengan hormat,', 0, 'L');
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 10, 'Berdasarkan data yang kami miliki, dengan ini kami sampaikan Surat Keterangan Kematian:', 0, 'L');
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 5, 'Nama Lengkap             : ' . $row['anggota_meninggal'], 0, 'L');
$pdf->MultiCell(0, 5, 'Nomor KTP                : ' . $row['nomor_ktp'], 0, 'L');
$pdf->MultiCell(0, 5, 'Jenis Kelamin            : ' . $row['jenis_kelamin'], 0, 'L');
$pdf->MultiCell(0, 5, 'Tempat Lahir             : ' . $row['tempat_lahir_warga'], 0, 'L');
$pdf->MultiCell(0, 5, 'Tanggal Lahir(TH/BL/TG)            : ' . $row['tanggal_lahir_warga'], 0, 'L');
$pdf->MultiCell(0, 5, 'Pekerjaan                : ' . $row['pekerjaan'], 0, 'L');
$pdf->MultiCell(0, 5, 'Agama                    : ' . $row['agama'], 0, 'L');
$pdf->MultiCell(0, 5, 'Alamat                   : JL.JAMBIBULIAN RT8 KEL.SIMPANG S.DUREN ' . $row['alamat_keluarga'], 0, 'L');
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 6, 'Adalah Benar Warga kami di lingkungan RT.05 yang telah Meninggal Dunia pada :', 0, 'L');
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 6, 'Tanggal Meninggal            : ' . $row['tanggal_meninggal'], 0, 'L');
$pdf->MultiCell(0, 6, 'Jam Meninggal                : ' . $row['jam_meninggal'], 0, 'L');
$pdf->MultiCell(0, 6, 'Tempat Meninggal             : ' . $row['tempat_meninggal'], 0, 'L');
$pdf->MultiCell(0, 6, 'Tempat Pemakaman             : ' . $row['tempat_pemakaman'], 0, 'L');
$pdf->MultiCell(0, 6, 'Keluarga dari                : ' . $row['keluarga_dari'], 0, 'L');
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 6, 'Demikian surat ini dibuat untuk dipergunakan sebagaimana mestinya.', 0, 'L');
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 6, 'Hormat Kami,', 0, 'R');
$pdf->Ln(18); // Spacing
$pdf->MultiCell(0, 6, 'ANDREAS', 0, 'R'); // Tanda tangan atau nama Anda
$pdf->MultiCell(0, 6, 'Ketua RT.05', 0, 'R');

// Output the PDF as a download with the dynamic filename
$pdf->Output($filename, 'D');
?>

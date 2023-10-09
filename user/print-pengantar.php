<?php
require_once('tcpdf/tcpdf.php'); // Include the TCPDF library
require_once('../config.php'); // Include the database connection script

// Get the 'id_surat' from the query string
if (isset($_GET['id_pengantar'])) {
    $id_pengantar = $_GET['id_pengantar'];
} else {
    // Handle the case where 'id_surat' is not provided
    die('Invalid request');
}

// Query database to get data for the given 'id_surat'
// Query database to get data for the given 'id_surat' - Surat Tidak Mampu
$query_surat_pengantar = "SELECT * FROM surat_pengantar WHERE id_pengantar = $id_pengantar";
$query_surat_pengantar = "SELECT sp.*, w.nama AS nama_warga, w.nik_warga AS nomor_ktp, w.jenis_kelamin, w.tempat_lahir AS tempat_lahir_warga, w.tanggal_lahir AS tanggal_lahir_warga, w.pekerjaan, w.agama, k.alamat_keluarga, k.kepala_keluarga AS keluarga_dari
    FROM surat_pengantar AS sp
    JOIN warga AS w ON sp.id_warga = w.id
    JOIN keluarga AS k ON w.id_keluarga = k.id_keluarga
    WHERE sp.id_pengantar = $id_pengantar";

$result = mysqli_query($conncet, $query_surat_pengantar); // Menggunakan variabel $connect yang benar

if (!$result) {
    die('Error fetching data from the database: ' . mysqli_error($conncet));
}

if (mysqli_num_rows($result) == 0) {
    die('Data not found for the given ID surat');
}

$row = mysqli_fetch_assoc($result);


// Sanitize the 'anggota_meninggal' for the filename
$filename = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $row['nama_pemohon']) . '_SURAT_PENGANTAR.pdf';

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
$pdf->Cell(0, 10, 'SURAT PENGANTAR RT08', 0, false, 'C');
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
$pdf->MultiCell(0, 10, 'Yang bertanda tangan dibawah ini Ketua RT.08 Kelurahan Simpang Duren Kecamatan Jambi Luar Kota, Kota Jambi Provinsi Jambi. Dengan ini menerangkan bahwa :', 0, 'L');
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 5, 'Nama Lengkap             : ' . $row['nama_pemohon'], 0, 'L'); // nama pemohon dari tabel surat_tidakmampu
$pdf->MultiCell(0, 5, 'Nomor KTP                : ' . $row['nomor_ktp'], 0, 'L'); // nik warga dari tabel warga
$pdf->MultiCell(0, 5, 'Jenis Kelamin            : ' . $row['jenis_kelamin'], 0, 'L'); // jenis kelamin dari tabel warga
$pdf->MultiCell(0, 5, 'Tempat Lahir             : ' . $row['tempat_lahir_warga'], 0, 'L'); // tempat_lahir dari tabel warga
$pdf->MultiCell(0, 5, 'Tanggal Lahir            : ' . $row['tanggal_lahir_warga'], 0, 'L'); // tanggal_lahir dari tabel warga
$pdf->MultiCell(0, 5, 'Pekerjaan                : ' . $row['pekerjaan'], 0, 'L'); // pekerjaan dari tabel warga
$pdf->MultiCell(0, 5, 'Agama                    : ' . $row['agama'], 0, 'L'); // agama dari tabel warga
$pdf->MultiCell(0, 6, 'Keluarga dari                : ' . $row['keluarga_dari'], 0, 'L'); // kepala_keluarga dari tabel keluarga
$pdf->MultiCell(0, 6, 'Warga Negara                : Indonesia ' , 0, 'L'); // kepala_keluarga dari tabel keluarga
$pdf->MultiCell(0, 5, 'Alamat                   : RT.08 Kelurahan Simpang Duren Kecamatan Jambi Luar Kota, Kota Jambi ' . $row['alamat_keluarga'], 0, 'L'); 
$pdf->MultiCell(0, 5, 'Maksud dan Keperluan                    : ' . $row['keperluan'], 0, 'L'); // agama dari tabel warga
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 6, 'Adalah benar warga RT08. Demikian surat pengantar ini dikeluarkan agar warga kami dapat digunakan sebagaimana semestinya.', 0, 'L');
$pdf->MultiCell(0, 6, 'Demikian surat pengantar ini dikeluarkan agar warga kami untuk dapat digunakan sebagaimana semestinya.', 0, 'L');
$pdf->Ln(4); // Spacing
$pdf->MultiCell(0, 6, 'Hormat Kami,', 0, 'R');
$pdf->Ln(18); // Spacing
$pdf->MultiCell(0, 6, 'Muhammad Taufik', 0, 'R'); // Tanda tangan atau nama Anda
$pdf->MultiCell(0, 6, 'Ketua RT.08', 0, 'R');

// Output the PDF as a download with the dynamic filename
$pdf->Output($filename, 'D');
?>

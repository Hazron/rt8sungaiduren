<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// ... (previous code) ...

// Check if the request to approve a Surat Pengantar was made
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $surat_id = $_GET['id'];

    // Update the status to "Disetujui"
    $updateQuery = "UPDATE surat_pengantar SET status = 'disetujui' WHERE id_pengantar = $surat_id";
    mysqli_query($conncet, $updateQuery);

    // Fetch the data for generating the PDF
    $query = "SELECT * FROM surat_pengantar WHERE id_pengantar = $surat_id";
    $result = mysqli_query($koneksi, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Create a new TCPDF instance
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Surat Pengantar');
        $pdf->SetSubject('Surat Pengantar');
        $pdf->SetKeywords('Surat, Pengantar');

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Add content to the PDF
        $pdf->Cell(0, 10, 'Surat Pengantar', 0, 1, 'C');
        $pdf->Ln();
        $pdf->Cell(0, 10, 'Nomor Surat: ' . $row['id_pengantar'], 0, 1);
        $pdf->Cell(0, 10, 'Nama Pemohon: ' . $row['nama_pemohon'], 0, 1);
        $pdf->Cell(0, 10, 'NIK Pemohon: ' . $row['nik_pemohon'], 0, 1);
        // Add more content as needed

        // Output the PDF as a file (you can also use 'I' to display in the browser)
        $pdf->Output('surat_pengantar.pdf', 'D');
    }
}

// ... (rest of your code) ...
?>

<?php
require_once("../../assets/lib/fpdf/fpdf.php");
require_once("../../config/koneksi.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
      // Logo
      $this->Image('../../assets/img/kominfo.PNG',20,10);

        // Arial bold 15
        $this->SetFont('Times','B',15);
        // Move to the right
        // $this->Cell(60);
        // Title
        $this->Cell(308,8,'DINAS KOMUNIKASI DAN INFORMASI',0,1,'C');
        $this->Cell(308,8,'KOTA  MOJOKERTO',0,1,'C');
        $this->Cell(308,8,'JAWA TIMUR',0,1,'C');
        // Line break
        $this->Ln(5);

        $this->SetFont('Times','BU',12);
        for ($i=0; $i < 10; $i++) {
            $this->Cell(308,0,'',1,1,'C');
        }

        $this->Ln(1);

        $this->Cell(308,8,'DATA SURAT MASUK',0,1,'C');
        $this->Ln(2);

        $this->SetFont('Times','B',9);

        // header tabel
        $this->cell(8,10,'NO.',1,0,'C');
        $this->cell(30,10,'TANGGAL SURAT',1,0,'C');
        $this->cell(50,10,'NOMOR SURAT',1,0,'C');
        $this->cell(20,10,'TANGGAL',1,0,'C');
        $this->cell(80,10,'PERIHAL',1,0,'C');
        $this->cell(70,10,'NAMA PENGIRIM',1,0,'C');
        $this->cell(50,10,'KETERANGAN',1,0,'C');
        $this->ln(10);
   }


    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// ambil dari database
$query = "SELECT * from surat";
$hasil = mysqli_query($db, $query);
$data_surat = array();
while ($row = mysqli_fetch_assoc($hasil)) {
  $data_surat[] = $row;
}


$pdf = new PDF('L', 'mm', [216, 330]);
$pdf->AliasNbPages();
$pdf->AddPage();

// set font
$pdf->SetFont('Times','',9);

// set penomoran
$nomor = 1;

foreach ($data_surat as $surat) {
    $pdf->cell(8, 7, $nomor++ . '.', 1, 0, 'C');
    $pdf->cell(30, 7, strtoupper($surat['tgl_surat'] != '0000-00-00') ? date('d-m-Y', strtotime($surat['tgl_surat'])) : '', 1, 0, 'C');
    $pdf->cell(50, 7, substr(strtoupper($surat['nmr_surat']),0 , 17), 1, 0, 'L');
    $pdf->cell(20, 7, strtoupper($surat['tanggal']!= '0000-00-00') ? date('d-m-Y', strtotime($surat['tanggal'])) : '', 1, 0, 'C');
    $pdf->cell(80, 7, substr($surat['perihal'], 0, 200), 1, 0, 'L');
    $pdf->cell(70, 7, strtoupper($surat['nama']), 1, 0, 'L');
    $pdf->cell(50, 7, substr(strtoupper($surat['keterangan']), 0, 20), 1, 0, 'L');
    $pdf->ln(7.2);

}

$pdf->Output();
?>

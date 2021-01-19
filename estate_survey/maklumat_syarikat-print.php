<?php 

$htmlcontent = "<h2>Maklumat Syarikat</h2><table><tr><td width='38'><b>1.1</b></td><td colspan='2'><b>Jenis Syarikat</b></td></tr><tr></table>";

require_once('../print/mypdf.class.php');

$pdf = new MyPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->remove_header = 1;
$pdf->remove_footer = 1;
$pdf->init();
$pdf->SetTitle('Maklumat Syarikat');
$pdf->SetSubject('Responden Estet');
// default header/footer
$pdf->setPrintHeader();
$pdf->setPrintFooter();

$pdf->AddPage();
$pdf->writeHTML($htmlcontent, true, 0, true, 0);
$pdf->Output('cetak/maklumat-syarikat.pdf', 'I');
?>
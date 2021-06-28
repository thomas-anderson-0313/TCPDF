<?php
require_once('tcpdf.php');
require_once("includes/config.php");


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Set font
		$this->SetFont('helvetica', 'B', 20);
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 9);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Ezzytech Computer Systems');
$pdf->SetTitle('Motor Assessment Fee Note');
$pdf->SetSubject('Motor Assessment Fee Note');
$pdf->SetKeywords('Motor Assessment Fee Note');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('', '', 10);

// add a page
$pdf->AddPage();
// -- set new background ---
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'watermark1.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$rid=intval($_GET['rid']);
$count = "SELECT * from feenotes where ReportType='assessment' AND ReportId=$rid";
foreach ($dbh->query($count) as $row) {

$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);
   
$pdf->SetFont ('','',10); $pdf->Cell(10,19,'',0,1);	
$pdf->Cell(70,20,'',0,0); $pdf->SetFont ('','BU',17); $pdf->Cell(10,15,'FEE NOTE',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',10); $pdf->Cell(1,5,'To:',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(57,5,$row['Customer'],$complex_cell_border); $pdf->Cell(10,0,'',0,0);
$pdf->SetFont ('','B',10); $pdf->Cell(1,5,'Pin No:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(16,0,'',$complex_cell_border); $pdf->Cell(67,5,'A006133660J',$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',10); $pdf->Cell(1,5,'Date:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(13,0,'',$complex_cell_border); $pdf->Cell(57,5,$row['ReportDate'],$complex_cell_border);
$pdf->Cell(0,5,'',0,1);


$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100))); 
   
$pdf->SetFont ('','',11); $pdf->Cell(10,5,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(200,5,'',0,0); $pdf->Cell(2,0,'',$complex_cell_border); $pdf->Cell(100,5,'',0,1);

$pdf->SetFont ('','',11); $pdf->Cell(10,3,'',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(88,8,'Our Ref: '.$row['Ref'],1,0); $pdf->SetFont ('','B',11); $pdf->Cell(87,8,'Claim No: '.$row['ClaimNo'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(88,8,'Insured: '.$row['Insured'],1,0); $pdf->SetFont ('','B',11); $pdf->Cell(87,8,'Make: '.$row['Make'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(88,8,'Registration No: '.$row['RegistrationNo'],1,0); $pdf->SetFont ('','B',11); $pdf->Cell(87,8,'',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(88,8,'Repairer: '.$row['Repairer'],1,0); $pdf->SetFont ('','B',11); $pdf->Cell(87,8,'',1,1);
$pdf->SetFont ('','B',11); $pdf->Cell(130,5,'',0,1);


$pdf->SetFont ('','',11); $pdf->Cell(10,3,'',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(13,8,'QTY',1,0); $pdf->Cell(80,8,'DESCRIPTION ',1,0); $pdf->Cell(40,8,'UNIT PRICE(KSH)',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,'AMOUNT (KSH)','1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(13,8,'1',1,0); $pdf->Cell(80,8,'Professional Fees',1,0); $pdf->MultiCell(40,8,number_format($row['Fee'],2,'.',','),'1','L',0,0); $pdf->SetFont ('','',11); $pdf->MultiCell(42,8,number_format($row['Fee'],2,'.',','),'1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(13,8,$row['Mileageqty'],1,0); $pdf->Cell(80,8,$row['MileageDesc'],1,0); $pdf->SetFont ('','',11); $pdf->MultiCell(40,8,number_format($row['FeeNoteMileageunit'],2,'.',','),'1','L',0,0); $pdf->MultiCell(42,8,number_format($row['FeeNoteMileage'],2,'.',','),'1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(13,8,$row['Photographqty'],1,0); $pdf->Cell(80,8,'Photographs',1,0); $pdf->SetFont ('','',11); $pdf->MultiCell(40,8,number_format($row['Photographunit'],2,'.',','),'1','L',0,0); $pdf->MultiCell(42,8,number_format($row['Photograph'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,'Subtotal ',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteSubTotal'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,$row['VatDesc'],1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteVat'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,'Total Charges Kshs. ',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteTotal'],2,'.',','),'1','R',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(130,20,'',0,1);
}

$pdf->SetXY(17, 190);
$rid=intval($_GET['rid']);
$count = "SELECT * from assessments where id=$rid";
foreach ($dbh->query($count) as $row) {

$pdf->Cell(5,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,5,$row['FeeNoteNo'],0,0);
$pdf->Image('assessmentimages/'.$row['Image4'], '', '',57, 82, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->MultiCell(0,0,'',0,1);
}

//Close and output PDF document
$pdf->Output('Assessment_Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

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
$pdf->SetTitle('Valuation Report');
$pdf->SetSubject('Valuation Report');
$pdf->SetKeywords('Valuation Report');

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
$img_file = K_PATH_IMAGES.'watermark.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$rid=intval($_GET['rid']);
$count = "SELECT * from valuations where id=$rid";

foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','',11); $pdf->Cell(25,26,'',0,0); $pdf->Cell(120,23,'',0,0);
$pdf->SetFont ('','',11); $pdf->Cell(10,26,'',0,0); $pdf->Cell(10,23,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(20,7,'Your Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(60,7,$row['YourRef'],0,0);

$pdf->SetFont ('','B',11); $pdf->Cell(20,7,'Our Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(60,7,$row['OurRef'],0,0);
//to give alternate background fill  color to rows//

$pdf->Cell(11,8,'',0,1);
$pdf->SetFont ('','B',11);
$pdf->MultiCell(70,0,$row['Address'],0,1);
$pdf->Cell(10,1,'',0,1);
}

$pdf->SetFont ('','B',11); $pdf->MultiCell(130,0,'Dear Sir/Madam,',0,1);
$pdf->Cell(10,3,'',0,1);


$pdf->SetFont ('','BU',11); $pdf->Cell(65,13,'',0,0); $pdf->MultiCell(130,0,'VALUATION REPORT',0,1);
$pdf->Cell(0,3,'',0,1);

$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);

$rid=intval($_GET['rid']);
$count = "SELECT * from valuations where id=$rid";

foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(37,5,'Place of inspection: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(35,0,'',$complex_cell_border); $pdf->Cell(105,5,$row['PlaceOfInspection'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(16,5,'Insured: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(60,5,$row['Insured'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,'Phone No: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(71,5,$row['PhoneNo'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Make: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(40,5,$row['Make'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Type: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(40,5,$row['Type'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(17,5,'Reg. No: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(41,5,$row['RegNo'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(45,5,'Date of first registration:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(30,5,$row['DateOfFirstRegistration'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(35,5,'Odometer reading:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(57,5,$row['Odometer'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(40,5,'Year of Manufacture:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(40,5,$row['Year'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(25,5,'Coach Work:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(62,5,$row['CoachWork'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(23,5,'Chassis No. ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(50,5,$row['ChasisNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(21,5,'Engine No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(73,5,$row['EngineNo'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(15,5,'Colour:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(30,5,$row['Color'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(23,5,'Mechanical:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(99,5,$row['Mechanical'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(10,5,'Tyre:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(162,5,$row['Tyre'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(15,5,'Brakes:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(50,5,$row['Brakes'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(17,5,'Steering:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(85,5,$row['Steering'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(15,5,'Extras:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(157,5,$row['Extras'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(30,5,'Assessed value:',0,0); $pdf->SetFont ('','B',10); $pdf->Cell(1,5,'',$complex_cell_border); $pdf->Cell(147,5,$row['ValuationValue'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(60,0,'',0,0); $pdf->Cell(53,2,'General Condition/Remarks',0,0);  $pdf->Cell(0,0,'',0,1);

$pdf->SetFont ('','',11);
foreach ($dbh->query($count) as $row) {

$html = $row['Remarks'];
$pdf->writeHTML($html, true, false, true, true, '');

}

//to give alternate background fill  color to rows//
}

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(130,1,'',0,1);
$pdf->SetFont ('','',11); $pdf->Cell(5,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(5,0,'',0,0); $pdf->Cell(45,0,'PREPARED BY:',0,0);
$pdf->Image('signatureimages/'.$row['Signature'], '', '', 20, 10, '', '', 'T', true, 150, '', false, false, 0, false, false, false); $pdf->Cell(10,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(5,10,'',0,0); $pdf->Cell(5,0,'',0,0); $pdf->Cell(15,0,$row['User'],0,1);

$pdf->Cell(5,15,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(5,0,'',0,0); $pdf->Cell(12,10,'Date:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,10,$row['ValuationDate'],0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(5,0,'',0,1);
}


$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));
$pdf->Cell(200,0,'',0,0); $pdf->Cell(200,0,'',$complex_cell_border); $pdf->Cell(100,0,'',0,1); 


$pdf->AddPage();
$rid=intval($_GET['rid']);
$count = "SELECT * from valuationimages where ReportId=$rid";
$pdf->SetFont('','B',11);
/// each record is one row  ///
foreach ($dbh->query($count) as $row1) {
$pdf->Image('valuationimages/'.$row1['Image1'], '', '', 87, 63, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,0);
$pdf->Image('valuationimages/'.$row1['Image2'], '', '', 87, 63, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,1);
$pdf->Cell(0,1,'',0,1);
$pdf->SetFont ('','',11); $pdf->Cell(93,8,$row1['Desc1'],0,0);
$pdf->SetFont ('','',11); $pdf->Cell(93,8,$row1['Desc2'],0,1);
$pdf->Cell(0,8,'',0,1);
}

$rid=intval($_GET['rid']);
$count = "SELECT * from valuationimagesdoc where ReportId=$rid";
$pdf->SetFont('','B',11);
/// each record is one row  ///
foreach ($dbh->query($count) as $row1) {
$pdf->Image('valuationimages/'.$row1['Image'], '', '', 400, 550, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(8,80,'',0,1);
}

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
$count = "SELECT * from feenotes where ReportType='valuation' AND ReportId=$rid";
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
$count = "SELECT * from valuations where id=$rid";
foreach ($dbh->query($count) as $row) {
$pdf->Cell(13,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(18,5,'',0,0);
$pdf->Cell(13,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(18,5,'',0,0);
$pdf->Image('valuationimages/'.$row['Image4'], '', '',57, 70, '', '', 'T', false, 300, '', false, false, 1, false, false, false); $pdf->MultiCell(0,0,'',0,1);
}
//Close and output PDF document
$pdf->Output('Valuation_Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

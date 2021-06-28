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
$pdf->SetTitle('ERP');
$pdf->SetSubject('Supplementary Report');
$pdf->SetKeywords('Supplementary Report');

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
$count = "SELECT * from supplementary where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(200,20,'',0,1);	
$pdf->SetFont ('','B',11); $pdf->Cell(60,20,'',0,0); $pdf->MultiCell(130,0,'SUPPLEMENTARY REPORT',0,1);
$pdf->Cell(200,5,'',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(175,8,'Our Ref: '.$row['Ref'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Claim No: '.$row['ClaimNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Date: '.$row['Date'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Date of Instruction: '.$row['AssessmentDate'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Date of Assessment: '.$row['AssessmentDate'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Instructions by: '.$row['InstructionsBy'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Insurer: '.$row['Customer'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','BU',11); $pdf->Cell(175,8,'Insurance Details',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Policy No: '.$row['PolicyNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Sum Insured: '.$row['SumInsured'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Insured: '.$row['Insured'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Excess: '.$row['ClaimNo'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(175,8,'Vehicle Details: ',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Registration No: '.$row['RegistrationNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Make: '.$row['Make'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Model/Type: '.$row['Model'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Chassis No: '.$row['ChasisNo'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Year of Manufature: '.$row['Year'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Engine Type/No: '.$row['EngineType'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Mileage: '.$row['Mileage'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Colour: '.$row['Color'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Repairer: '.$row['Repairer'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'',1,1);



}

$pdf->Cell(5,8,'',0,1);
$pdf->Cell(5,8,'',0,0); $pdf->SetFont ('','BU',12); $pdf->Cell(200,8,'Repair Details and Replacement Parts  ' .$row['RegistrationNo'],0,1);
$pdf->Cell(10,1,'',0,1); $pdf->SetFont ('','',11);

$rid=intval($_GET['rid']);
$count = "SELECT * from supplementaryparts where ReportId=$rid"; 
 
$width_cell=array(10,10,60,52,52);
$pdf->SetFont('','B',11);

// Header starts ///  
$pdf->Cell(3,7,'',0,0); $pdf->Cell($width_cell[1],7,'Qty','1','R',1,0,0); // Second header column
$pdf->Cell($width_cell[2],7,'Description','1','R',1,0,0); // Second header column
$pdf->MultiCell($width_cell[3],7,'Unit Price','1','R',0,0); // Third header column 
$pdf->MultiCell($width_cell[4],7,'Total','1','R',0,1); // Fourth header column



//// header ends ///////
$pdf->SetFont('','',11);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(3,7,'',0,0); $pdf->Cell($width_cell[1],7,$row['Quantity'],1,0);
$pdf->Cell($width_cell[2],7,$row['Description'],1,0);
$pdf->MultiCell($width_cell[3],7,$row['UnitCost'],'1','R',0,0);
$pdf->MultiCell($width_cell[4],7,$row['Total'],'1','R',0,1);
}


$pdf->Cell(10,10,'',0,1); 
$rid=intval($_GET['rid']);
$count = "SELECT * from supplementary where id=$rid";
foreach ($dbh->query($count) as $row) {
$html = $row['ReportDetails'];
$pdf->writeHTML($html, false, false, true, true, '');


$pdf->Cell(10,10,'',0,1); 
$pdf->Cell(10,0,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(20,0,'Assessor:',0,0); $pdf->Cell(50,5,$row['Assessor'],0,0); $pdf->Cell(30,0,'Signature/Stamp:',0,0);
$pdf->Cell(5,5,'',0,0); $pdf->Image('signatureimages/'.$row['Signature'], '', '', 20, 10, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
}



$pdf->AddPage();
$rid=intval($_GET['rid']);
$count = "SELECT * from supplementaryimages where ReportId=$rid";
$pdf->SetFont('','B',11);
/// each record is one row  ///
foreach ($dbh->query($count) as $row1) {
$pdf->Image('supplementaryimages/'.$row1['Image1'], '', '', 87, 63, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,0);
$pdf->Image('supplementaryimages/'.$row1['Image2'], '', '', 87, 63, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,1);
$pdf->Cell(0,1,'',0,1);
$pdf->SetFont ('','',11); $pdf->Cell(93,8,$row1['Desc1'],0,0);
$pdf->SetFont ('','',11); $pdf->Cell(93,8,$row1['Desc2'],0,1);
$pdf->Cell(0,8,'',0,1);
}


$rid=intval($_GET['rid']);
$count = "SELECT * from supplementaryimagesdoc where ReportId=$rid";
$pdf->SetFont('','B',11);
/// each record is one row  ///
foreach ($dbh->query($count) as $row1) {
$pdf->Image('supplementaryimages/'.$row1['Image'], '', '', 400, 550, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(8,80,'',0,1);
}


//Close and output PDF document
$pdf->Output('Supplementary_Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

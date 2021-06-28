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
$pdf->SetAuthor('Code_Pro Sys');
$pdf->SetTitle('ERP');
$pdf->SetSubject('Motor Assessment Report');
$pdf->SetKeywords('Motor Assessment Report');

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



$count = "SELECT * from assessments WHERE AssessmentDate BETWEEN 16-01-2020 AND 18-04-2020 ";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','',11); $pdf->Cell(25,15,'',0,0); $pdf->Cell(120,15,'',0,0);
$pdf->SetFont ('','',11); $pdf->Cell(10,15,'',0,0); $pdf->Cell(10,15,'',0,1);
$pdf->SetFont ('','',11); $pdf->Cell(20,5,'Our ref No:',0,0); $pdf->Cell(120,5,$row['Ref'],0,0);
$pdf->SetFont ('','',11); $pdf->Cell(10,5,'Date:',0,0); $pdf->Cell(10,5,$row['AssessmentDate'],0,1);
//to give alternate background fill  color to rows//

$pdf->Cell(2,8,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(178,8,'Cost of spare parts',1,1);
 
 
$width_cell=array(10,68,11,23,33,33);
$pdf->SetFont('','B',11);

// Header starts /// 
$pdf->Cell(2,5,'',0,0); $pdf->Cell($width_cell[0],6,'NO.','1','R',1,0,true); // First header column 
$pdf->Cell($width_cell[1],6,'DESCRIPTION','1','R',1,0,true); // Second header column
$pdf->Cell($width_cell[2],6,'QTY',1,0,true); // Second header column
$pdf->Cell($width_cell[3],6,'UNIT-PRICE',1,0,true); // Third header column 
$pdf->MultiCell($width_cell[4],6,'AMOUNT','1','R',0,0); // Fourth header column
$pdf->MultiCell($width_cell[5],6,'TOTALS(KSH)','1','R',0,1); // Fourth header column


//// header ends ///////
$pdf->SetFont('','',11);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,5,'',0,0); $pdf->Cell($width_cell[0],5,$row['AssessmentDate'],1,0);
$pdf->Cell($width_cell[1],5,$row['AssessmentDate'],1,0);
$pdf->Cell($width_cell[2],5,$row['AssessmentDate'],1,0);
$pdf->MultiCell($width_cell[3],5,number_format($row['id'],2,'.',','),'1','R',0,0);
$pdf->MultiCell($width_cell[4],5,number_format($row['id'],2,'.',','),'1','R',0,0);
$pdf->MultiCell($width_cell[5],5,'','1','R',0,1);
}

$pdf->SetFont ('','',11); $pdf->Cell(10,70,'',0,1);

$pdf->Image('images/sign.jpg', '', '', 60, 20, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
$pdf->SetFont ('','B',11); $pdf->Cell(130,25,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(15,0,'John Wanyoike,',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(15,0,'Principal Assessor.',0,0);
/// regards ///
}

//Close and output PDF document
$pdf->Output('Assessment_Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

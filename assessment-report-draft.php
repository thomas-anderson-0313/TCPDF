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
$pdf->SetTitle('Motor Assessment Report');
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

$rid=intval($_GET['rid']);
$count = "SELECT * from assessmentdrafts where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','',11); $pdf->Cell(25,23,'',0,0); $pdf->Cell(120,23,'',0,0);
$pdf->SetFont ('','',11); $pdf->Cell(10,23,'',0,0); $pdf->Cell(10,23,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,'Your Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(50,5,$row['ClaimNo'],0,0); 
$pdf->SetFont ('','B',15); $pdf->Cell(70,5,'REVISED REPORT',0,0);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Date:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,5,$row['AssessmentDate'],0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(18,10,'Our Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(120,10,$row['Ref'],0,0);
//to give alternate background fill  color to rows//

$pdf->Cell(11,10,'',0,1);
$pdf->SetFont ('','B',11); $pdf->MultiCell(70,0,$row['Address'],0,1);
$pdf->Cell(10,2,'',0,1);

$pdf->SetFont ('','B',11); $pdf->MultiCell(130,0,'Dear Sir/Madam,',0,1);
$pdf->Cell(10,2,'',0,1);
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','BU',11); $pdf->MultiCell(180,5,$row['Intro'],0,1); $pdf->SetFont ('','',11);
//to give alternate background fill  color to rows//
}

$pdf->Cell(10,1,'',0,1);
foreach ($dbh->query($count) as $row) {

$html = $row['IntroInfo'];
$pdf->writeHTML($html, true, false, true, true, '');

}

$pdf->Cell(10,3,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->MultiCell(130,0,'ACCIDENT STATUS:',0,1);
$pdf->Cell(10,2,'',0,1);
foreach ($dbh->query($count) as $row) {
$pdf->SetTextColor(); $pdf->SetFont ('','',11); $pdf->MultiCell(0,5,$row['AccidentCondition'],0,1);
//to give alternate background fill  color to rows//
}

$pdf->Cell(10,3,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->MultiCell(130,0,'REMARKS:',0,1);
$pdf->Cell(10,1,'',0,1); $pdf->SetFont ('','',11);
foreach ($dbh->query($count) as $row) {
$html = $row['Remarks'];
$pdf->writeHTML($html, true, false, true, true, '');
//to give alternate background fill  color to rows//

$pdf->Cell(10,1,'',0,1);
$pdf->SetFont ('','B',11); $pdf->MultiCell(130,0,'Yours faithfully,',0,1);
$pdf->Cell(10,1,'',0,1);
$pdf->Image('images/sign.jpg', '', '', 40, 30, '', '', 'T', true, 150, '', false, false, 0, false, false, false);
$pdf->SetFont ('','B',11); $pdf->Cell(130,30,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(15,0,'George Onzere,',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(15,0,'(PRINCIPAL ASSESSOR)',0,0);
}


$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'watermark2.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();


$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);

$pdf->SetFont ('','B',11); $pdf->Cell(16,5,'Our Ref: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(8,0,'',$complex_cell_border); $pdf->Cell(40,5,$row['Ref'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(55,8,'',0,0); $pdf->MultiCell(130,0,'SUMMARY OF VEHICLE REPAIR',0,1);
$pdf->Cell(10,2,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(65,8,'',0,0); $pdf->MultiCell(130,0,'ESTIMATION REPORT',0,1);
$pdf->Cell(10,2,'',0,1);

   
foreach ($dbh->query($count) as $row) {	
$pdf->SetFont ('','B',11); $pdf->Cell(21,5,'Insured by: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(60,5,$row['Customer'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,'Policy No: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(8,0,'',$complex_cell_border); $pdf->Cell(64,5,$row['PolicyNo'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,3,'',0,1);
//to give alternate background fill  color to rows//
}


foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,'Claim No: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(20,0,'',$complex_cell_border); $pdf->Cell(46,5,$row['ClaimNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(17,5,'Insured: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(16,0,'',$complex_cell_border); $pdf->Cell(59,5,$row['Insured'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(28,5,'Insured Value: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(12,0,'',$complex_cell_border); $pdf->Cell(46,5,$row['SumInsured'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(16,5,'Excess: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(17,0,'',$complex_cell_border); $pdf->Cell(59,5,$row['Excess'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(38,5,'Pre-Accident Value: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(2,0,'',$complex_cell_border); $pdf->Cell(46,5,$row['PreAccidentValue'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(28,5,'Salvage Value: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(59,5,$row['SalvageValue'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(25,5,'Propelled by: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(15,0,'',$complex_cell_border); $pdf->Cell(46,5,$row['PropelledBy'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(28,5,'Transmission: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(59,5,$row['Transmission'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}

$pdf->SetFont ('','',11); $pdf->MultiCell(130,2,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(130,0,'VEHICLE DETAILS',0,1);
$pdf->Cell(0,1,'',0,1);
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(32,5,'Registration No: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(45,5,$row['RegistrationNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Make: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(27,0,'',$complex_cell_border); $pdf->Cell(53,5,$row['Make'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,1,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(25,5,'Vehicle Type: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(17,0,'',$complex_cell_border); $pdf->Cell(45,5,$row['VehicleType'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(14,5,'Model:  ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(25,0,'',$complex_cell_border); $pdf->Cell(53,5,$row['Model'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(22,5,'Chassis No: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(55,5,$row['ChasisNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,'Engine No: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(19,0,'',$complex_cell_border); $pdf->Cell(53,5,$row['EngineType'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(15,5,'Colour: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(27,0,'',$complex_cell_border); $pdf->Cell(45,5,$row['Color'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(35,5,'Recorded Mileage: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(52,5,$row['Mileage'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(40,5,'Year of manufacture: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(2,0,'',$complex_cell_border); $pdf->Cell(45,5,$row['Year'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(15,5,'Brakes: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(25,0,'',$complex_cell_border); $pdf->Cell(52,5,$row['Brakes'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(30,5,'Mode of delivery: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(12,0,'',$complex_cell_border); $pdf->Cell(45,5,$row['ModeOfDelivery'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(40,5,'Survey carried out at: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(48,5,$row['Survey'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(21,5,'Paint work: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(21,0,'',$complex_cell_border); $pdf->Cell(45,5,$row['PaintWork'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(17,5,'Steering: ',0,0); $pdf->SetFont ('','',11);$pdf->Cell(23,0,'',$complex_cell_border);  $pdf->Cell(52,5,$row['Steering'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
//to give alternate background fill  color to rows//
}

$pdf->SetFont ('','B',11); $pdf->Cell(130,2,'',0,1);
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(24,6,'Tyres: FRHS',0,0); $pdf->SetFont ('','',11); $pdf->Cell(2,6,'',$complex_cell_border); $pdf->Cell(30,6,$row['FRHS'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(11,6,'FLHS',0,0); $pdf->SetFont ('','',11); $pdf->Cell(2,6,'',$complex_cell_border); $pdf->Cell(30,6,$row['FLHS'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(11,6,'RRHS',0,0); $pdf->SetFont ('','',11); $pdf->Cell(2,6,'',$complex_cell_border); $pdf->Cell(30,6,$row['RRHS'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(11,6,'RLHS',0,0); $pdf->SetFont ('','',11); $pdf->Cell(2,6,'',$complex_cell_border); $pdf->Cell(25,6,$row['RLHS'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
//to give alternate background fill  color to rows//
}

$rid=intval($_GET['rid']);
$count = "SELECT * from costofrepairssummaryrevised where ReportIdSummary=$rid"; 
 
$width_cell=array(78,50,50);
$pdf->SetFont('','B',11);

// Header starts /// 

$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));
$pdf->Cell(200,0,'',0,0); $pdf->Cell(200,0,'',$complex_cell_border); $pdf->Cell(100,0,'',0,1); 

$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'SUMMARY OF ESTIMATES',1,0); // Second header column
$pdf->Cell($width_cell[1],7,'COST-IN-KSHS.',1,0,true); // Second header column
$pdf->Cell($width_cell[2],7,'COST-IN-CTS.',1,1,true); // Third header column 


//// header ends ///////
$pdf->SetFont('','',11);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,$row['DescriptionSummary'],1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['TotalSummary'],0,'.',','),'1','R',0,0);
$pdf->Cell($width_cell[1],7,'00',1,1,true);
}


$rid=intval($_GET['rid']);
$count = "SELECT * from assessmentdrafts where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$width_cell=array(78,50,50);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11); $pdf->Cell($width_cell[0],7,'Replacement parts',1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['Net'],0,'.',','),'1','R',0,0);
$pdf->Cell($width_cell[2],7,'00',1,1,true);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'Sub Total',1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['SubTotal'],0,'.',','),'1','R',0,0); $pdf->SetFont('','',11);
$pdf->Cell($width_cell[2],7,'00',1,1,true);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11);  $pdf->Cell($width_cell[0],7,$row['PartsVatDesc'],1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['Vat'],0,'.',','),'1','R',0,0);
$pdf->Cell($width_cell[2],7,'00',1,1,true);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'Total Repair Cost',1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['GrandTotal'],0,'.',','),'1','R',0,0); $pdf->SetFont('','',11);
$pdf->Cell($width_cell[2],7,'00',1,1,true);
}


// ---------------------------------------------------------
// add a page
$pdf->AddPage();
// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = K_PATH_IMAGES.'watermark2.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$pdf->SetFont ('','',11); $pdf->Cell(18,5,'',0,0); $pdf->Cell(110,5,'',0,0);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,5,$row['Ref'],0,1);

$pdf->SetFont ('','',11); $pdf->Cell(18,5,'',0,0); $pdf->Cell(110,5,'',0,0);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Date:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,5,$row['AssessmentDate'],0,1);


$pdf->Cell(2,8,'',0,1);

$rid=intval($_GET['rid']);
$count = "SELECT * from costofrepairsrevised where ReportId=$rid"; 
 
$width_cell=array(10,10,77,43,38);
$pdf->SetFont('','B',11);

// Header starts /// 
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'NO.','1','R',1,0,true); // First header column 
$pdf->Cell($width_cell[1],7,'QTY','1','R',1,0,true); // Second header column
$pdf->Cell($width_cell[2],7,'REPLACEMENT-PARTS',1,0,true); // Second header column
$pdf->Cell($width_cell[3],7,'UNIT-PRICE',1,0,true); // Third header column 
$pdf->MultiCell($width_cell[4],7,'AMOUNT','1','R',0,1); // Fourth header column


//// header ends ///////
$pdf->SetFont('','',11);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,$row['Number'],1,0);
$pdf->Cell($width_cell[1],7,$row['Quantity'],1,0);
$pdf->Cell($width_cell[2],7,$row['Description'],1,0);
$pdf->MultiCell($width_cell[3],7,number_format($row['UnitCost'],2,'.',','),'1','R',0,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['Total'],2,'.',','),'1','R',0,1);
}


$rid=intval($_GET['rid']);
$count = "SELECT * from assessmentdrafts where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$width_cell=array(10,10,77,43,38);
$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'Total',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['CostTotal'],2,'.',','),'1','R',0,1);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,$row['DiscountDetails'],1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['Discount'],2,'.',','),'1','R',0,1);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'Total Parts',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['Net'],2,'.',','),'1','R',0,1);
}


$rid=intval($_GET['rid']);
$count = "SELECT * from costofrepairssummaryrevised where ReportIdSummary=$rid"; 
foreach ($dbh->query($count) as $row) {

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,$row['DescriptionSummary'],1,0);
$pdf->Cell($width_cell[3],7,'',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['TotalSummary'],2,'.',','),'1','R',0,1);

}

$rid=intval($_GET['rid']);
$count = "SELECT * from assessmentdrafts where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'SUB TOTAL',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['SubTotal'],2,'.',','),'1','R',0,1);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,$row['PartsVatDesc'],1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['Vat'],2,'.',','),'1','R',0,1);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'TOTAL REPAIR COST',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['GrandTotal'],2,'.',','),'1','R',0,1);
}


$rid=intval($_GET['rid']);
$count = "SELECT * from assessmentdrafts where id=$rid";
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(130,5,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(130,5,'REMARKS:',0,1);
$pdf->SetFont ('','B',11);
$html = $row['ReplaceParts'];
$pdf->writeHTML($html, true, false, true, true, '');
$pdf->SetFont ('','B',11); $pdf->MultiCell(10,0,'',0,0);



$pdf->SetFont ('','BU',11); $pdf->Cell(130,5,'PRE-ACCIDENT DAMAGES/CONDITION NOTED:',0,1);
$pdf->SetFont ('','',11);

$html = $row['Defects'];
$pdf->MultiCell(2,0,'',0,0); $pdf->writeHTML($html, true, false, true, false, ''); 
$pdf->SetFont ('','B',11); $pdf->MultiCell(10,0,'',0,0);

$pdf->SetFont ('','BU',11); $pdf->Cell(130,5,'Parts/areas that were damaged and can be repaired were noted as follows:',0,1);
$pdf->SetFont ('','',11);

$html = $row['Repair'];
$pdf->MultiCell(2,0,'',0,0); $pdf->writeHTML($html, true, false, true, false, '');
$pdf->SetFont ('','B',11); $pdf->MultiCell(10,0,'',0,0);
$pdf->SetFont ('','U',11); $pdf->Cell(130,5,'(This Estimate is subject to parts replacing availability)',0,1);	
$pdf->Cell(0,5,'',0,1);


$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);
   
   
$pdf->SetFont ('','B',11); $pdf->Cell(33,5,"Repairer's name: ",0,0); $pdf->Cell(2,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(60,5,$row['Repairer'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(30,5,'Contact Person: ',0,0); $pdf->Cell(7,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(47,5,$row['ContactPerson'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,2,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(60,5,'Have Repairs been authorised?: ',0,0); $pdf->Cell(18,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(63,5,$row['RepairsAuthorised'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,4,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(75,5,'Estimate time for completion of repairs:',0,0); $pdf->Cell(2,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(64,5,$row['Duration'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);

$pdf->Cell(0,2,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(80,5,'Garage competency to carry out repairs',0,0); $pdf->SetFont ('','',11); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,2,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(24,5,'Competent: ',0,0); $pdf->Cell(13,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(54,5,$row['GarageCompetency'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,4,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(25,5,'Incompetent: ',0,0); $pdf->Cell(12,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(54,5,$row['GarageInCompetency'],$complex_cell_border); $pdf->Cell(5,5,'',0,0);
$pdf->Cell(3,1,'',0,0); $pdf->Image('signatureimages/'.$row['Signature'], '', '', 40, 30, '', '', 'T', false, 300, '', false, false, 0, false, false, false); $pdf->Cell(100,20,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(35,5,"Assessor's name:",0,0); $pdf->Cell(2,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(54,5,$row['AssessorsName'],$complex_cell_border);


$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));
$pdf->Cell(200,0,'',0,0); $pdf->Cell(200,0,'',$complex_cell_border); $pdf->Cell(100,0,'',0,1); 
}

$pdf->AddPage();
$rid=intval($_GET['rid']);
$count = "SELECT * from assessmentimages where ReportId=$rid";
$pdf->SetFont('','B',11);
/// each record is one row  ///
foreach ($dbh->query($count) as $row1) {
$pdf->Image('assessmentimages/'.$row1['Image1'], '', '', 87, 63, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,0);
$pdf->Image('assessmentimages/'.$row1['Image2'], '', '', 87, 63, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,1);
$pdf->Cell(0,1,'',0,1);
$pdf->SetFont ('','',11); $pdf->Cell(93,8,$row1['Desc1'],0,0);
$pdf->SetFont ('','',11); $pdf->Cell(93,8,$row1['Desc2'],0,1);
$pdf->Cell(0,8,'',0,1);
}

$rid=intval($_GET['rid']);
$count = "SELECT * from assessmentimagesdoc where ReportId=$rid";
$pdf->SetFont('','B',11);
/// each record is one row  ///
foreach ($dbh->query($count) as $row1) {
$pdf->Image('assessmentimages/'.$row1['Image'], '', '', 400, 550, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(8,80,'',0,1);
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
$count = "SELECT * from assessmentdrafts where id=$rid";
foreach ($dbh->query($count) as $row) {

$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);
   
$pdf->SetFont ('','',10); $pdf->Cell(10,19,'',0,1);	
$pdf->Cell(70,20,'',0,0); $pdf->SetFont ('','B',17); $pdf->Cell(10,15,'FEE NOTE',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',10); $pdf->Cell(18,5,'Policy No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(57,5,$row['PolicyNo'],$complex_cell_border);
$pdf->SetFont ('','B',10); $pdf->Cell(9,5,'Date:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(16,0,'',$complex_cell_border); $pdf->Cell(67,5,$row['AssessmentDate'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',10); $pdf->Cell(15,5,'Our Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(13,0,'',$complex_cell_border); $pdf->Cell(57,5,$row['Ref'],$complex_cell_border);
$pdf->SetFont ('','B',10); $pdf->Cell(17,5,'Claim No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(8,0,'',$complex_cell_border); $pdf->Cell(67,5,$row['ClaimNo'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',10); $pdf->Cell(18,5,'Insurance:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(57,5,$row['Customer'],$complex_cell_border);
$pdf->SetFont ('','B',10); $pdf->Cell(15,5,'Insured:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(67,5,$row['Insured'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);

$pdf->SetFont ('','',11); $pdf->Cell(10,5,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->MultiCell(130,10,'VEHICLE PARTICULARS:',0,1);
 
foreach ($dbh->query($count) as $row) {
$pdf->SetTextColor(); $pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Make:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(16,0,'',$complex_cell_border); $pdf->Cell(59,5,$row['Make'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(38,5,'Year of Manufacture:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(43,5,$row['Year'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',11); $pdf->Cell(16,5,'Reg No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(12,0,'',$complex_cell_border); $pdf->Cell(60,5,$row['RegistrationNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(16,5,'Mileage:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(65,5,$row['Mileage'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',11); $pdf->Cell(14,5,'Colour:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(14,0,'',$complex_cell_border); $pdf->Cell(59,5,$row['Color'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(17,5,'Location:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(64,5,$row['Survey'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
}


$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100))); 
   
$pdf->SetFont ('','',11); $pdf->Cell(10,5,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(200,5,'SUMMARY CHARGES',0,0); $pdf->Cell(2,0,'',$complex_cell_border); $pdf->Cell(100,5,'',0,1);


$pdf->SetFont ('','',11); $pdf->Cell(10,3,'',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(133,8,'DESCRIPTION ',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,'AMOUNT (KSH)','1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(133,8,'Professional Services Rendered: Assessment ',1,0); $pdf->SetFont ('','',11); $pdf->MultiCell(42,8,number_format($row['Fee'],2,'.',','),'1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(133,8,$row['MileageDesc'],1,0); $pdf->SetFont ('','',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteMileage'],2,'.',','),'1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(133,8,'Photographs',1,0); $pdf->SetFont ('','',11); $pdf->MultiCell(42,8,number_format($row['Photograph'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,'Subtotal ',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteSubTotal'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,$row['VatDesc'],1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteVat'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,'Total Charges Kshs. ',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteTotal'],2,'.',','),'1','R',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(130,20,'',0,1);

$pdf->SetXY(17, 190);
$pdf->Cell(8,5,'NO:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(18,5,$row['FeeNoteNo'],0,0);
$pdf->Image('assessmentimages/'.$row['Image4'], '', '',57, 70, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->MultiCell(0,0,'',0,1);
}

//Close and output PDF document
$pdf->Output('Assessment_Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

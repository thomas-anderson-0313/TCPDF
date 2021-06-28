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
$count = "SELECT * from assessments where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(200,20,'',0,1);	
$pdf->SetFont ('','B',11); $pdf->Cell(60,20,'',0,0); $pdf->MultiCell(130,0,'MOTOR ASSESSMENT REPORT',0,1);
$pdf->Cell(200,5,'',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(175,8,'Our Ref: '.$row['Ref'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Claim No: '.$row['ClaimNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Date: '.$row['AssessmentDate'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Date of Instruction: '.$row['InstructionsDate'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Date of Assessment: '.$row['AssessmentDate1'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Instructions by: '.$row['InstructionsBy'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Insurer: '.$row['Customer'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','BU',11); $pdf->Cell(175,8,'Insurance Details',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Policy No: '.$row['PolicyNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Sum Insured: '.$row['SumInsured'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Insured: '.$row['Insured'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Excess: '.$row['Excess'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(175,8,'Vehicle Details',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Registration No: '.$row['RegistrationNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Make: '.$row['Make'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Model/Type: '.$row['Model'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Chassis No: '.$row['ChasisNo'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Year of Manufature: '.$row['Year'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Engine Type/No: '.$row['EngineType'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Mileage: '.$row['Mileage'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Colour: '.$row['Color'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Repairer: '.$row['Repairer'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','BU',11); $pdf->Cell(175,8,'Pre-accident Condition',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Brakes: '.$row['Brakes'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Paint work: '.$row['PaintWork'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(50,8,'Tyers(%wear): RHF: '.$row['FRHS'],1,0); $pdf->Cell(38,8,'RHR: '.$row['FLHS'],1,0); $pdf->Cell(43,8,'LHF: '.$row['RRHS'],1,0); 
$pdf->Cell(44,8,'LHR: '.$row['RLHS'],1,1);
$pdf->Cell(0,2,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->MultiCell(130,0,'Summary-Cost of Repairs',0,1);

$rid=intval($_GET['rid']);
$count = "SELECT * from costofrepairssummary where ReportIdSummary=$rid"; 
 
$width_cell=array(90,35,50);
$pdf->SetFont('','B',11);

// Header starts /// 

$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));
$pdf->Cell(200,0,'',0,0); $pdf->Cell(200,0,'',$complex_cell_border); $pdf->Cell(100,0,'',0,1); 


//// header ends ///////
$pdf->SetFont('','',11);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,$row['DescriptionSummary'],1,0);
$pdf->Cell($width_cell[1],7,'',1,0,true); $pdf->MultiCell($width_cell[2],7,number_format($row['TotalSummary'],2,'.',','),'1','R',0,1);

}


$rid=intval($_GET['rid']);
$count = "SELECT * from assessments where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$width_cell=array(90,35,50);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11); $pdf->Cell($width_cell[0],7,'Replacement parts',1,0);
$pdf->Cell($width_cell[1],7,'',1,0,true); $pdf->MultiCell($width_cell[2],7,number_format($row['Net'],2,'.',','),'1','R',0,1);


$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'Sub Total',1,0);
$pdf->Cell($width_cell[1],7,'',1,0,true); $pdf->MultiCell($width_cell[2],7,number_format($row['SubTotal'],2,'.',','),'1','R',0,1); $pdf->SetFont('','',11);


$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11);  $pdf->Cell($width_cell[0],7,$row['PartsVatDesc'],1,0);
$pdf->Cell($width_cell[1],7,'',1,0,true); $pdf->MultiCell($width_cell[2],7,number_format($row['Vat'],2,'.',','),'1','R',0,1);


$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'Grand Total',1,0);
$pdf->Cell($width_cell[1],7,'',1,0,true); $pdf->MultiCell($width_cell[2],7,number_format($row['GrandTotal'],2,'.',','),'1','R',0,1); $pdf->SetFont('','',11);

}   

$pdf->Cell(0,2,'',0,1);

$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);


   
foreach ($dbh->query($count) as $row) {	
$pdf->SetFont ('','B',11); $pdf->Cell(35,5,'Repair Authorized: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(60,5,$row['RepairsAuthorised'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}


foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,'Salvage Value: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(20,0,'',$complex_cell_border); $pdf->Cell(46,5,$row['SalvageValue'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(35,5,'Pre-accident Value: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(50,5,$row['PreAccidentValue'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,15,'',0,1);
//to give alternate background fill  color to rows//
}

$pdf->SetFont ('','BU',11); $pdf->Cell(105,10,'Point and direction of Impact for Motor Vehicle. Reg. No. ',0,0); $pdf->Cell(20,10,$row['RegistrationNo'],0,1);
$pdf->Cell(4,5,'',0,0); $pdf->Image('assessmentimages/'.$row['Image3'], '', '', 90, 50, '', '', 'T', false, 300, '', false, false, 0, false, false, false);
$pdf->SetFont ('','B',11); $pdf->Cell(130,50,'',0,1);
}

$rid=intval($_GET['rid']);
$count = "SELECT * from assessments where id=$rid";
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(130,5,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(130,5,'Details of damages sustained in the logical order',0,1);
$pdf->SetFont ('','',11);
$html = $row['AccidentCondition'];
$pdf->writeHTML($html, true, false, true, true, '');
$pdf->SetFont ('','B',11); $pdf->MultiCell(10,0,'',0,0);

$pdf->SetFont ('','BU',11); $pdf->Cell(130,5,'Cost of Repairs',0,1);
$pdf->SetFont ('','',11);

$html = $row['Repair'];
$pdf->MultiCell(2,0,'',0,0); $pdf->writeHTML($html, true, false, true, false, ''); 
$pdf->SetFont ('','B',11); $pdf->MultiCell(10,0,'',0,0);

$pdf->SetFont ('','BU',11); $pdf->Cell(130,5,'Remarks:',0,1);
$pdf->SetFont ('','',11);

$html = $row['Remarks'];
$pdf->MultiCell(2,0,'',0,0); $pdf->writeHTML($html, true, false, true, false, '');
$pdf->SetFont ('','B',11); $pdf->MultiCell(10,0,'',0,0);
$pdf->Cell(0,5,'',0,1);

$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));
$pdf->Cell(200,0,'',0,0); $pdf->Cell(200,0,'',$complex_cell_border); $pdf->Cell(100,0,'',0,1); 
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
$img_file = K_PATH_IMAGES.'';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$pdf->SetFont ('','BU',12); $pdf->Cell(130,5,'Repair Details and Replacement Parts - ' .$row['RegistrationNo'],0,1);
$pdf->Cell(0,5,'',0,1);

$rid=intval($_GET['rid']);
$count = "SELECT * from costofrepairs where ReportId=$rid"; 
 
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
$count = "SELECT * from assessments where id=$rid";

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
$pdf->Cell($width_cell[3],7,'Sub Parts Total',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['Net'],2,'.',','),'1','R',0,1);
}


$rid=intval($_GET['rid']);
$count = "SELECT * from costofrepairssummary where ReportIdSummary=$rid"; 
foreach ($dbh->query($count) as $row) {

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,$row['DescriptionSummary'],1,0);
$pdf->Cell($width_cell[3],7,'',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['TotalSummary'],2,'.',','),'1','R',0,1);

}

$rid=intval($_GET['rid']);
$count = "SELECT * from assessments where id=$rid";

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
$pdf->Cell($width_cell[3],7,'Grand Total',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['GrandTotal'],2,'.',','),'1','R',0,1);
}

$pdf->Cell(0,8,'',0,1);

$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);


// create some HTML content
$html = '<div style="page-break-inside:avoid;">
<p><u>Special Note to the Repair Garage.</u></p>
<table cellspacing="0" cellpadding="6" border="1">
<tr><td>1.  The repair estimate is limited to work rendered necessary as a direct result of the accident.</td></tr>
<tr><td>2.  Any supplementary damage must be duly authorized by the assessor before commencing it.</td></tr>
<tr><td>3.  Any vehicle under repairs following assessment should not be released to the insured/owner without the express authority of the insurer.</td></tr>
<tr><td>4.  Vehicles once repaired must be re-inspected before release.</td></tr>
<tr><td>5.  All parts removed for replacement must be kept under safe custody of the repairer until collected by the insurers at a minimum time possible.</td></tr>
</table>
</div>';

// output the HTML content
$pdf->writeHTML($html, true, 0, true, 0);

$pdf->SetFont ('','',11);
$pdf->Cell(120,5,"Signed in full knowledge of the above conditions and as an indication of compliance with the same",0,1);
$pdf->Cell(100,5,'',0,1); 
 
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,"Repairer: ",0,0); $pdf->Cell(2,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(60,5,$row['Repairer'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(30,5,'Contact Person: ',0,0); $pdf->Cell(7,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(47,5,$row['ContactPerson'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(35,5,'Duration of repairs:',0,0); $pdf->Cell(5,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(70,5,$row['Duration'],$complex_cell_border); 
$pdf->Cell(64,5,'',$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(10,5,'(Subject to parts availability)                                                                 (Garage Stamp)',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,"Signature:",0,0); $pdf->Cell(2,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(60,5,'',$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(10,5,"Date:",0,0); $pdf->Cell(2,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(54,5,$row['AssessmentDate'],$complex_cell_border); $pdf->Cell(0,10,'',0,1);
$pdf->Cell(110,5,'',0,0); $pdf->Image('signatureimages/'.$row['Signature'], '', '', 20, 10, '', '', 'T', false, 300, '', false, false, 0, false, false, false); $pdf->Cell(100,1,'',0,1);

$pdf->SetFont ('','B',11); $pdf->Cell(20,5,"Assessor:",0,0); $pdf->Cell(2,5,'',$complex_cell_border); $pdf->SetFont ('','',11); $pdf->Cell(54,5,$row['AssessorsName'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,"Signature/Stamp:",0,0); 


$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));
$pdf->Cell(200,0,'',0,0); $pdf->Cell(200,0,'',$complex_cell_border); $pdf->Cell(100,0,'',0,1); 




$pdf->AddPage();
// test fitbox with all alignment combinations


$horizontal_alignments = array('L', 'C', 'R');
$vertical_alignments = array('T', 'M', 'B');
$x = 10;
$y = 15;
$w = 90;
$h = 90;
// test all combinations of alignments

for ($i = 0; $i < 1; ++$i) {

	$fitbox = $horizontal_alignments[$i];

	$x = 10;

	for ($j = 0; $j < 1; ++$j) {

		$fitbox[1] = $vertical_alignments[$j];
		$rid=intval($_GET['rid']);
        $count = "SELECT * from assessmentimages where ReportId=$rid";
        foreach ($dbh->query($count) as $row1) {
		$pdf->Image('assessmentimages/'.$row1['Image1'], $x, $y, $w, $h, '', '', 'CM', true, 150, '', false, false, 1, $fitbox, false, false);
	    $pdf->SetFont ('','',11); $pdf->Cell(90,120,$row1['Desc1'],0,0);

		$x += 100; // new column
	}	
	$y += 100; // new row
}
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

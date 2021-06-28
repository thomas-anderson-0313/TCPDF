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
$pdf->SetTitle('Reinspection Report');
$pdf->SetSubject('Reinspection Report');
$pdf->SetKeywords('MReinspection Report');

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
$count = "SELECT * from reinspections where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(200,20,'',0,1);	
$pdf->SetFont ('','B',11); $pdf->Cell(60,20,'',0,0); $pdf->MultiCell(130,0,'RE-INSPECTION REPORT',0,1);
$pdf->Cell(200,5,'',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(175,8,'Our Ref: '.$row['Ref'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Claim No: '.$row['ClaimNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Date: '.$row['Date'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Instructions by: '.$row['InstructionsBy'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Insurer: '.$row['Customer'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','BU',11); $pdf->Cell(175,8,'Insurance Details',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Policy No: '.$row['PolicyNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Sum Insured: '.$row['SumInsured'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Insured: '.$row['Insured'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Excess: '.$row['Excess'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(175,8,'Vehicle Details: ',1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Registration No: '.$row['RegistrationNo'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Make: '.$row['Make'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Model/Type: '.$row['Model'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Chassis No: '.$row['ChasisNo'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Year of Manufature: '.$row['Year'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Engine Type/No: '.$row['EngineType'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Mileage: '.$row['CurrentMileage'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'Colour: '.$row['Color'],1,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(88,8,'Repairer: '.$row['Repairer'],1,0); $pdf->SetFont ('','',11); $pdf->Cell(87,8,'',1,1);
}

$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));


$pdf->SetFont ('','BU',11); $pdf->Cell(200,10,'Repair Details and Replacement Parts  '.$row['RegistrationNo'],0,0); $pdf->Cell(2,0,'',$complex_cell_border); $pdf->Cell(100,10,'',0,1);

										
$Astatus=$row['Imported'];
if($Astatus==1){
	
$rid=$row['AssessmentReportId'];
$count = "SELECT * from costofrepairs where ReportId=$rid"; 
 
$width_cell=array(10,10,78,45,32);
$pdf->SetFont('','B',11);

// Header starts /// 
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'NO.','1','R',1,0,true); // First header column 
$pdf->Cell($width_cell[1],7,'QTY','1','R',1,0,true); // Second header column
$pdf->Cell($width_cell[2],7,'REPLACEMENT-PARTS',1,0,true); // Second header column
$pdf->Cell($width_cell[3],7,'REMARK',1,0,true); // Third header column 
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
$pdf->Cell($width_cell[3],7,$row['Remarks'],1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['Total'],2,'.',','),'1','R',0,1);
}

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$width_cell=array(10,10,78,45,32);
$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'Parts Total',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['TotalParts'],2,'.',','),'1','R',0,1);
}


$rid=$row['AssessmentReportId'];
$count = "SELECT * from costofrepairssummary where ReportIdSummary=$rid"; 
foreach ($dbh->query($count) as $row) {

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,$row['DescriptionSummary'],1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['TotalSummary'],2,'.',','),'1','R',0,1);

}


} else{ 

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspectionremarks where ReportId=$rid"; 
 
$width_cell=array(10,10,78,45,32);
$pdf->SetFont('','B',11);

// Header starts /// 
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'NO.','1','R',1,0,true); // First header column 
$pdf->Cell($width_cell[1],7,'QTY','1','R',1,0,true); // Second header column
$pdf->Cell($width_cell[2],7,'REPLACEMENT PARTS',1,0); // Second header column
$pdf->Cell($width_cell[3],7,'REMARKS',1,0); // Third header column 
$pdf->MultiCell($width_cell[4],7,'AMOUNT','1','R',0,1); // Fourth header column


//// header ends ///////
$pdf->SetFont('','',11);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,$row['No'],1,0);
$pdf->Cell($width_cell[1],7,$row['Qty'],1,0);
$pdf->Cell($width_cell[2],7,$row['Description'],1,0);
$pdf->Cell($width_cell[3],7,$row['Remark'],1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['Amount'],2,'.',','),'1','R',0,1);
}



$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$width_cell=array(10,10,78,45,32);
$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'Parts Total',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['TotalParts'],2,'.',','),'1','R',0,1);
}


$rid=intval($_GET['rid']);
$count = "SELECT * from reinspectionrepair where ReportId=$rid"; 
foreach ($dbh->query($count) as $row) {

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,$row['Description'],1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['Total'],2,'.',','),'1','R',0,1);

}

}

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'Sub Total',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['SubTotal'],2,'.',','),'1','R',0,1);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,$row['PartsVatDesc'],1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['PartsVat'],2,'.',','),'1','R',0,1);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'Grand Total',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['GrandTotal'],2,'.',','),'1','R',0,1);
}
$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";
foreach ($dbh->query($count) as $row) {
	
$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);

$pdf->SetFont ('','',11);  $pdf->Cell(0,3,'',0,1);


$html = $row['Remarks'];
$pdf->writeHTML($html, true, false, true, true, '');
$pdf->SetFont ('','B',11); $pdf->MultiCell(10,0,'',0,0);
   
$pdf->Cell(0,3,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(28,5,"Scrap Weight: ",0,0); $pdf->SetFont ('','',11); $pdf->Cell(30,5,$row['ScrapWeight'],0,0); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);

$pdf->SetFont ('','B',11); $pdf->Cell(21,5,'Assessor:',0,0); $pdf->Cell(40,5,$row['PreparedBy'],$complex_cell_border); $pdf->Cell(30,0,'',0,0); $pdf->SetFont ('','',11);
$pdf->SetFont ('','B',11); $pdf->Cell(6,5,'Signature/Stamp:',0,0);
$pdf->Cell(30,15,'',0,0); $pdf->Image('signatureimages/'.$row['Signature'], '', '', 20, 10, '', '', 'T', false, 300, '', false, false, 0, false, false, false); $pdf->Cell(0,0,'',0,1);
}


$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));
$pdf->Cell(200,0,'',0,0); $pdf->Cell(200,0,'',$complex_cell_border); $pdf->Cell(100,0,'',0,1);  

$pdf->AddPage();
$rid=intval($_GET['rid']);
$count = "SELECT * from reinspectionimages where ReportId=$rid";
$pdf->SetFont('','B',11);
/// each record is one row  ///
foreach ($dbh->query($count) as $row1) {
$pdf->Image('reinspectionimages/'.$row1['Image1'], '', '', 87, 63, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,0);
$pdf->Image('reinspectionimages/'.$row1['Image2'], '', '', 87, 63, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,1);
$pdf->Cell(0,1,'',0,1);
$pdf->SetFont ('','',11); $pdf->Cell(93,8,$row1['Desc1'],0,0);
$pdf->SetFont ('','',11); $pdf->Cell(93,8,$row1['Desc2'],0,1);
$pdf->Cell(0,8,'',0,1);
}

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspectionimagesdoc where ReportId=$rid";
$pdf->SetFont('','B',11);
/// each record is one row  ///
foreach ($dbh->query($count) as $row1) {
$pdf->Image('reinspectionimages/'.$row1['Image'], '', '', 400, 550, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->Cell(8,80,'',0,1);
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
$count = "SELECT * from feenotes where ReportType='reinspection' AND ReportId=$rid";
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
$count = "SELECT * from reinspections where id=$rid";
foreach ($dbh->query($count) as $row) {
$pdf->Cell(13,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(18,5,'',0,0);
$pdf->Image('reinspectionimages/'.$row['Image6'], '', '',57, 70, '', '', 'T', true, 150, '', false, false, 1, false, false, false); $pdf->MultiCell(0,0,'',0,1);

}
//Close and output PDF document
$pdf->Output('Re-Inspection_Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

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
$pdf->SetFont ('','',11); $pdf->Cell(25,23,'',0,0); $pdf->Cell(120,23,'',0,0);
$pdf->SetFont ('','',11); $pdf->Cell(10,23,'',0,0); $pdf->Cell(10,23,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,'Your Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(110,5,$row['ClaimNo'],0,0);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Date:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,5,$row['Date'],0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(20,15,'Our Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(120,15,$row['Ref'],0,0);
//to give alternate background fill  color to rows//

$pdf->SetFont ('','B',11);
$pdf->Cell(11,15,'',0,1);
$pdf->MultiCell(70,0,$row['Address'],0,1);
$pdf->Cell(10,6,'',0,1);

$pdf->SetFont ('','B',11); $pdf->MultiCell(130,0,'Dear Sir/Madam,',0,1);
$pdf->Cell(10,5,'',0,1);
}

$pdf->SetFont ('','BU',11); $pdf->Cell(65,11,'',0,0); $pdf->MultiCell(130,0,'RE INSPECTION REPORT',0,1);
$pdf->Cell(0,5,'',0,1);

$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);

foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(22,5,'Insured by: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(75,5,$row['Customer'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(10,5,'P/No: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(61,5,$row['PolicyNo'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(20,5,'Claim No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(13,0,'',$complex_cell_border); $pdf->Cell(68,5,$row['ClaimNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(17,5,'Insured: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(15,0,'',$complex_cell_border); $pdf->Cell(45,5,$row['Insured'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(23,5,'Chassis No. ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(68,5,$row['ChasisNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(31,5,'Current Mileage: ',0,0); $pdf->SetFont ('','',11); $pdf->Cell(2,0,'',$complex_cell_border); $pdf->Cell(44,5,$row['CurrentMileage'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(30,5,'Registration No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(3,0,'',$complex_cell_border); $pdf->Cell(37,5,$row['RegistrationNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(40,5,'Year of manufacture:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(20,5,$row['Year'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Color:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(26,5,$row['Color'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}
foreach ($dbh->query($count) as $row) {
$pdf->SetFont ('','B',11); $pdf->Cell(25,5,'Vehicle Type:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(35,5,$row['VehicleType'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Make:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(30,5,$row['Make'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(13,5,'Model:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(48,5,$row['Model'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
//to give alternate background fill  color to rows//
}

$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));


$pdf->SetFont ('','BU',11); $pdf->Cell(200,10,'SUMMARY OF REPAIR ESTIMATE',0,0); $pdf->Cell(2,0,'',$complex_cell_border); $pdf->Cell(100,10,'',0,1);


$rid=intval($_GET['rid']);
$count = "SELECT * from reinspectionremarks where ReportId=$rid"; 
 
$width_cell=array(10,10,78,45,33);
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
$width_cell=array(10,10,78,45,33);
$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'Total',1,0);
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

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";

/// each record is one row  ///
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'SUB TOTAL',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['SubTotal'],2,'.',','),'1','R',0,1);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'+16% VAT',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['PartsVat'],2,'.',','),'1','R',0,1);

$pdf->Cell(2,7,'',0,0); $pdf->SetFont('','B',11); $pdf->Cell($width_cell[0],7,'','1','R',1,0,true); 
$pdf->Cell($width_cell[1],7,'',1,0);
$pdf->Cell($width_cell[2],7,'',1,0);
$pdf->Cell($width_cell[3],7,'TOTAL REPAIR COST',1,0);
$pdf->MultiCell($width_cell[4],7,number_format($row['GrandTotal'],2,'.',','),'1','R',0,1);
}


$pdf->AddPage();
 
$width_cell=array(96,40,40);
$pdf->SetFont('','B',11);

// Header starts /// 

$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));

$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'SUMMARY OF ESTIMATES','1','R',1,0,true); // Second header column
$pdf->Cell($width_cell[1],7,'COST-IN-KSHS.',1,0,true); // Second header column
$pdf->Cell($width_cell[2],7,'COST-IN-CTS.',1,1,true); // Third header column 


//// header ends ///////
$pdf->SetFont('','B',11);
$pdf->SetFillColor(235,236,236); // Background color of header 
$fill=false; // to give alternate background fill color to rows 

/// each record is one row  ///
$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'Initial Amount Awarded – VAT not inclusive',1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['SubTotal'],0,'.',','),'1','R',0,0);
$pdf->Cell($width_cell[1],7,'00',1,1,true);
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'Replacement parts ',1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['TotalParts'],0,'.',','),'1','R',0,0);
$pdf->Cell($width_cell[1],7,'00',1,1,true);
}

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspectionsummary where ReportId=$rid";
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,$row['Description'],1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['Total'],0,'.',','),'1','R',0,0);
$pdf->Cell($width_cell[1],7,'00',1,1,true);
}

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";
foreach ($dbh->query($count) as $row) {
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'+16% VAT ',1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['PartsVat'],0,'.',','),'1','R',0,0);
$pdf->Cell($width_cell[1],7,'00',1,1,true);
$pdf->Cell(2,7,'',0,0); $pdf->Cell($width_cell[0],7,'Current Total Repair Cost',1,0);
$pdf->MultiCell($width_cell[2],7,number_format($row['GrandTotal'],0,'.',','),'1','R',0,0);
$pdf->Cell($width_cell[1],7,'00',1,1,true);
}

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";
foreach ($dbh->query($count) as $row) {
	
$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);	
$pdf->Cell(0,7,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(32,5,"Repairer's name: ",0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(136,5,$row['Repairer'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(17,5,'Address:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(25,0,'',$complex_cell_border); $pdf->Cell(136,5,$row['RepairerAddress'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,2,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(80,11,'',0,0); $pdf->MultiCell(50,0,'Remarks',0,1);$pdf->SetFont ('','',11);

$html = $row['Remarks'];
$pdf->Cell(0,2,'',0,1);
$pdf->writeHTML($html, true, false, true, true, '');
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont ('','',11); $pdf->Cell(90,5,'Yours faithfully,',0,0);
$pdf->SetFont ('','B',11); $pdf->Cell(25,5,'Prepared by:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(64,5,$row['PreparedBy'],0,0); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(120,15,'',0,0); $pdf->Image('images/sign.jpg', '', '', 40, 30, '', '', 'T', false, 300, '', false, false, 0, false, false, false); $pdf->Cell(0,0,'',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(80,5,"George Onzere",0,1); 
$pdf->SetFont ('','B',11); $pdf->Cell(40,5,'Principal Assessor',0,1);
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
$pdf->Image('reinspectionimages/'.$row1['Image1'], '', '', 87, 63, '', '', 'T', false, 300, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,0);
$pdf->Image('reinspectionimages/'.$row1['Image2'], '', '', 87, 63, '', '', 'T', false, 300, '', false, false, 1, false, false, false); $pdf->Cell(5,60,'',0,1);
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
$pdf->Image('reinspectionimages/'.$row1['Image'], '', '', 400, 550, '', '', 'T', false, 300, '', false, false, 1, false, false, false); $pdf->Cell(8,80,'',0,1);
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
$img_file = K_PATH_IMAGES.'watermark.jpg';
$pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

$rid=intval($_GET['rid']);
$count = "SELECT * from reinspections where id=$rid";
foreach ($dbh->query($count) as $row) {

$complex_cell_border = array(
   'B' => array('width' => 0.5, 'color' => array(0,0,0,100), 'dash' => 2, 'cap' => 'butt'),);
   
$pdf->SetFont ('','',10); $pdf->Cell(10,15,'',0,1);	
$pdf->Cell(70,20,'',0,0); $pdf->SetFont ('','B',17); $pdf->Cell(10,15,'FEE NOTE',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',10); $pdf->Cell(18,5,'Policy No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(6,0,'',$complex_cell_border); $pdf->Cell(61,5,$row['PolicyNo'],$complex_cell_border);
$pdf->SetFont ('','B',10); $pdf->Cell(10,5,'Date:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(17,0,'',$complex_cell_border); $pdf->Cell(65,5,$row['Date'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',10); $pdf->Cell(15,5,'Our Ref:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(8,0,'',$complex_cell_border); $pdf->Cell(62,5,$row['Ref'],$complex_cell_border);
$pdf->SetFont ('','B',10); $pdf->Cell(17,5,'Claim No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(65,5,$row['ClaimNo'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',10); $pdf->Cell(18,5,'Insurance:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(62,5,$row['Customer'],$complex_cell_border);
$pdf->SetFont ('','B',10); $pdf->Cell(15,5,'Insured:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(12,0,'',$complex_cell_border); $pdf->Cell(65,5,$row['Insured'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);

$pdf->SetFont ('','',11); $pdf->Cell(10,5,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->MultiCell(130,10,'VEHICLE PARTICULARS:',0,1);
 
foreach ($dbh->query($count) as $row) {
$pdf->SetTextColor(); $pdf->SetFont ('','B',11); $pdf->Cell(12,5,'Make:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(40,5,$row['Make'],$complex_cell_border);
$pdf->SetTextColor(); $pdf->SetFont ('','B',11); $pdf->Cell(22,5,'Type/Model:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(5,0,'',$complex_cell_border); $pdf->Cell(30,5,$row['Model'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(37,5,'Year of Manufacture:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(17,5,$row['Year'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',11); $pdf->Cell(16,5,'Reg No.',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(61,5,$row['RegistrationNo'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(16,5,'Mileage:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(10,0,'',$complex_cell_border); $pdf->Cell(65,5,$row['CurrentMileage'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetTextColor(); $pdf->SetFont ('','B',11); $pdf->Cell(14,5,'Colour:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(12,0,'',$complex_cell_border); $pdf->Cell(61,5,$row['Color'],$complex_cell_border);
$pdf->SetFont ('','B',11); $pdf->Cell(17,5,'Location:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(9,0,'',$complex_cell_border); $pdf->Cell(65,5,$row['RepairerAddress'],$complex_cell_border); $pdf->Cell(0,0,'',0,1);
$pdf->Cell(0,5,'',0,1);
}

$complex_cell_border = array(
   'L' => array('width' => 0.3, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0,0,0,100)));

$pdf->SetFont ('','',11); $pdf->Cell(10,5,'',0,1);
$pdf->SetFont ('','BU',11); $pdf->Cell(200,5,'SUMMARY CHARGES',0,0); $pdf->Cell(2,0,'',$complex_cell_border); $pdf->Cell(100,5,'',0,1);

$pdf->SetFont ('','',11); $pdf->Cell(10,7,'',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(133,8,'DESCRIPTION ',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,'AMOUNT (KSH)','1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(133,8,'Professional Services Rendered: Reinspection ',1,0); $pdf->SetFont ('','',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteFee'],2,'.',','),'1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(133,8,'Mileage covered in: @30/- per km ',1,0); $pdf->SetFont ('','',11); $pdf->MultiCell(42,8,number_format($row['AddMileage'],2,'.',','),'1','R',0,1);
$pdf->Cell(2,5,'',0,0); $pdf->SetFont ('','',11); $pdf->Cell(133,8,'Photograph',1,0); $pdf->SetFont ('','',11); $pdf->MultiCell(42,8,number_format($row['Photograph'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,'Subtotal',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteSubTotal'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,'Misc+16% VAT',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['Vat'],2,'.',','),'1','R',0,1);
$pdf->Cell(95,5,'',0,0); $pdf->SetFont ('','B',11); $pdf->Cell(40,8,'Total Charges KShs ',1,0); $pdf->SetFont ('','B',11); $pdf->MultiCell(42,8,number_format($row['FeeNoteTotal'],2,'.',','),'1','R',0,1);
$pdf->SetFont ('','B',11); $pdf->Cell(130,20,'',0,1);


$pdf->SetXY(17, 190);
$pdf->Cell(8,5,'NO:',0,0); $pdf->SetFont ('','',11); $pdf->Cell(18,5,$row['FeeNoteRefNo'],0,0);
$pdf->Image('reinspectionimages/'.$row['Image6'], '', '',57, 70, '', '', 'T', false, 300, '', false, false, 1, false, false, false); $pdf->MultiCell(0,0,'',0,1);

}
//Close and output PDF document
$pdf->Output('Re-Inspection_Report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

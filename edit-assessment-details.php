<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:create-assessment');
}
else{ 

if(isset($_POST['submit']))
  {
$customer=$_POST['customer'];
$user=$_POST['user'];
$assessmentdate=$_POST['assessmentdate'];
$ref=$_POST['ref'];
$policyno=$_POST['policyno'];
$insured=$_POST['insured'];
$claimno=$_POST['claimno'];
$suminsured=$_POST['suminsured'];
$excess=$_POST['excess'];
$registrationno=$_POST['registrationno'];
$enginetype=$_POST['enginetype'];
$color=$_POST['color'];
$brakes=$_POST['brakes'];
$paintwork=$_POST['paintwork'];
$replaceparts=$_POST['replaceparts'];
$repair=$_POST['repair'];
$garagecompetency=$_POST['garagecompetency'];
$garageincompetency=$_POST['garageincompetency'];
$duration=$_POST['duration'];
$defects=$_POST['defects'];
$model=$_POST['model'];
$make=$_POST['make'];
$chasisno=$_POST['chasisno'];
$assessorsname=$_POST['assessorsname'];
$contactperson=$_POST['contactperson'];
$repairsauthorised=$_POST['repairsauthorised'];
$repairer=$_POST['repairer'];
$preaccidentvalue=$_POST['preaccidentvalue'];
$propelledby=$_POST['propelledby'];
$salvagevalue=$_POST['salvagevalue'];
$transmission=$_POST['transmission'];
$modeofdelivery=$_POST['modeofdelivery'];
$survey=$_POST['survey'];
$vehicletype=$_POST['vehicletype'];
$mileage=$_POST['mileage'];
$year=$_POST['year'];
$frhs=$_POST['frhs'];
$flhs=$_POST['flhs'];
$rrhs=$_POST['rrhs'];
$rlhs=$_POST['rlhs'];
$intro=$_POST['intro'];
$introinfo=$_POST['introinfo'];
$remarks=$_POST['remarks'];
$instructionsby=$_POST['instructionsby'];
$accidentcondition=$_POST['accidentcondition'];
$feenotemileage=$_POST['feenotemileage'];
$mileagedesc=$_POST['mileagedesc'];
$feenoteno=$_POST['feenoteno'];
$fee=$_POST['fee'];
$photograph=$_POST['photograph'];
$feenotevat=$_POST['feenotevat'];
$feenotesubtotal=$_POST['feenotesubtotal'];
$feenotetotal=$_POST['feenotetotal'];
$vatdesc=$_POST['vatdesc'];
$id=intval($_GET['id']);

$sql="UPDATE assessments set Customer=:customer,User=:user,AssessmentDate=:assessmentdate,Ref=:ref,PolicyNo=:policyno,Insured=:insured,
ClaimNo=:claimno,SumInsured=:suminsured,Excess=:excess,RegistrationNo=:registrationno,EngineType=:enginetype,Color=:color,Brakes=:brakes,
PaintWork=:paintwork,ReplaceParts=:replaceparts,Repair=:repair,GarageCompetency=:garagecompetency,GarageInCompetency=:garageincompetency,Duration=:duration,Defects=:defects,
Model=:model,Make=:make,ChasisNo=:chasisno,AssessorsName=:assessorsname,ContactPerson=:contactperson,RepairsAuthorised=:repairsauthorised,
Repairer=:repairer,PreAccidentValue=:preaccidentvalue,PropelledBy=:propelledby,
SalvageValue=:salvagevalue,Transmission=:transmission,ModeOfDelivery=:modeofdelivery,Survey=:survey,VehicleType=:vehicletype,Mileage=:mileage,
Year=:year,FRHS=:frhs,FLHS=:flhs,RRHS=:rrhs,RLHS=:rlhs,Intro=:intro,IntroInfo=:introinfo,Remarks=:remarks,InstructionsBy=:instructionsby,AccidentCondition=:accidentcondition,
FeeNoteMileage=:feenotemileage,MileageDesc=:mileagedesc,FeeNoteNo=:feenoteno,Fee=:fee,Photograph=:photograph,FeeNoteVat=:feenotevat,FeeNoteSubTotal=:feenotesubtotal,FeeNoteTotal=:feenotetotal,VatDesc=:vatdesc where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':assessmentdate',$assessmentdate,PDO::PARAM_STR);
$query->bindParam(':ref',$ref,PDO::PARAM_STR);
$query->bindParam(':policyno',$policyno,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':claimno',$claimno,PDO::PARAM_STR);
$query->bindParam(':suminsured',$suminsured,PDO::PARAM_STR);
$query->bindParam(':excess',$excess,PDO::PARAM_STR);
$query->bindParam(':registrationno',$registrationno,PDO::PARAM_STR);
$query->bindParam(':enginetype',$enginetype,PDO::PARAM_STR);
$query->bindParam(':color',$color,PDO::PARAM_STR);
$query->bindParam(':brakes',$brakes,PDO::PARAM_STR);
$query->bindParam(':paintwork',$paintwork,PDO::PARAM_STR);
$query->bindParam(':replaceparts',$replaceparts,PDO::PARAM_STR);
$query->bindParam(':repair',$repair,PDO::PARAM_STR);
$query->bindParam(':garagecompetency',$garagecompetency,PDO::PARAM_STR);
$query->bindParam(':garageincompetency',$garageincompetency,PDO::PARAM_STR);
$query->bindParam(':duration',$duration,PDO::PARAM_STR);
$query->bindParam(':defects',$defects,PDO::PARAM_STR);
$query->bindParam(':model',$model,PDO::PARAM_STR);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':chasisno',$chasisno,PDO::PARAM_STR);
$query->bindParam(':assessorsname',$assessorsname,PDO::PARAM_STR);
$query->bindParam(':contactperson',$contactperson,PDO::PARAM_STR);
$query->bindParam(':repairsauthorised',$repairsauthorised,PDO::PARAM_STR);
$query->bindParam(':repairer',$repairer,PDO::PARAM_STR);
$query->bindParam(':preaccidentvalue',$preaccidentvalue,PDO::PARAM_STR);
$query->bindParam(':propelledby',$propelledby,PDO::PARAM_STR);
$query->bindParam(':salvagevalue',$salvagevalue,PDO::PARAM_STR);
$query->bindParam(':transmission',$transmission,PDO::PARAM_STR);
$query->bindParam(':modeofdelivery',$modeofdelivery,PDO::PARAM_STR);
$query->bindParam(':survey',$survey,PDO::PARAM_STR);
$query->bindParam(':vehicletype',$vehicletype,PDO::PARAM_STR);
$query->bindParam(':mileage',$mileage,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':frhs',$frhs,PDO::PARAM_STR);
$query->bindParam(':flhs',$flhs,PDO::PARAM_STR);
$query->bindParam(':rrhs',$rrhs,PDO::PARAM_STR);
$query->bindParam(':rlhs',$rlhs,PDO::PARAM_STR);
$query->bindParam(':intro',$intro,PDO::PARAM_STR);
$query->bindParam(':introinfo',$introinfo,PDO::PARAM_STR);
$query->bindParam(':remarks',$remarks,PDO::PARAM_STR);
$query->bindParam(':instructionsby',$instructionsby,PDO::PARAM_STR);
$query->bindParam(':accidentcondition',$accidentcondition,PDO::PARAM_STR);
$query->bindParam(':feenotemileage',$feenotemileage,PDO::PARAM_STR);
$query->bindParam(':mileagedesc',$mileagedesc,PDO::PARAM_STR);
$query->bindParam(':feenoteno',$feenoteno,PDO::PARAM_STR);
$query->bindParam(':fee',$fee,PDO::PARAM_STR);
$query->bindParam(':photograph',$photograph,PDO::PARAM_STR);
$query->bindParam(':feenotevat',$feenotevat,PDO::PARAM_STR);
$query->bindParam(':feenotesubtotal',$feenotesubtotal,PDO::PARAM_STR);
$query->bindParam(':feenotetotal',$feenotetotal,PDO::PARAM_STR);
$query->bindParam(':vatdesc',$vatdesc,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();
{
$msg="Report updated successfully";
}

}
?>



<?php
if(isset($_POST['submit']))
  {	  	  
$customer1=$_POST['customer1'];
$reportdate1=$_POST['reportdate1'];
$ref1=$_POST['ref1'];
$insured1=$_POST['insured1'];
$claimno1=$_POST['claimno1'];
$registrationno1=$_POST['registrationno1'];
$make1=$_POST['make1'];
$repairer1=$_POST['repairer1'];

$id=intval($_GET['id']);
$sql="UPDATE feenotes set Customer=:customer1,ReportDate=:reportdate1,FeeNoteNo=:ref1,Insured=:insured1,
ClaimNo=:claimno1,RegistrationNo=:registrationno1,Make=:make1,Repairer=:repairer1 where ReportId=:id AND ReportType='assessment' ";

$query = $dbh->prepare($sql);
$query->bindParam(':customer1',$customer1,PDO::PARAM_STR);
$query->bindParam(':reportdate1',$reportdate1,PDO::PARAM_STR);
$query->bindParam(':ref1',$ref1,PDO::PARAM_STR);
$query->bindParam(':insured1',$insured1,PDO::PARAM_STR);
$query->bindParam(':claimno1',$claimno1,PDO::PARAM_STR);
$query->bindParam(':registrationno1',$registrationno1,PDO::PARAM_STR);
$query->bindParam(':make1',$make1,PDO::PARAM_STR);
$query->bindParam(':repairer1',$repairer1,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();
{
$msg="Report updated successfully";
}

}
?>


<?php
if(isset($_POST['submitfeenote2']))
  {
	  
$mileageqty=$_POST['mileageqty'];
$feenotemileageunit=$_POST['feenotemileageunit'];
$photographqty=$_POST['photographqty'];
$photographunit=$_POST['photographunit'];	  	  
$customer=$_POST['customer'];
$reportdate=$_POST['reportdate'];
$regdate=$_POST['regdate'];
$ref=$_POST['ref'];
$insured=$_POST['insured'];
$claimno=$_POST['claimno'];
$registrationno=$_POST['registrationno'];
$make=$_POST['make'];
$repairer=$_POST['repairer'];
$feenotemileage=$_POST['feenotemileage'];
$mileagedesc=$_POST['mileagedesc'];
$feenoteno=$_POST['feenoteno'];
$fee=$_POST['fee'];
$photograph=$_POST['photograph'];
$feenotevat=$_POST['feenotevat'];
$feenotesubtotal=$_POST['feenotesubtotal'];
$feenotetotal=$_POST['feenotetotal'];
$vatdesc=$_POST['vatdesc'];
$branch=$_POST['branch'];
$branchcode=$_POST['branchcode'];
$yearr=$_POST['yearr'];
$month=$_POST['month'];
$reportid=$_POST['reportid'];
$reporttype=$_POST['reporttype'];
$pstatus=$_POST['pstatus'];

$sql="INSERT INTO feenotes (Mileageqty,FeeNoteMileageunit,Photographqty,Photographunit,Customer,ReportDate,RegDate,Ref,Insured,ClaimNo,
RegistrationNo,Make,Repairer,FeeNoteMileage,mileagedesc,FeeNoteNo,Fee,Photograph,FeeNoteVat,FeeNoteSubTotal,FeeNoteTotal,VatDesc,
Branch,BranchCode,YEARR,MONTH,ReportId,ReportType,Pstatus) 
VALUES(:mileageqty,:feenotemileageunit,:photographqty,:photographunit,:customer,:reportdate,:regdate,:ref,:insured,:claimno,:registrationno,:make,
:repairer,:feenotemileage,:mileagedesc,:feenoteno,:fee,:photograph,:feenotevat,:feenotesubtotal,:feenotetotal,:vatdesc,:branch,:branchcode,:yearr,:month,:reportid,:reporttype,:pstatus)";

$query = $dbh->prepare($sql);
$query->bindParam(':mileageqty',$mileageqty,PDO::PARAM_STR);
$query->bindParam(':feenotemileageunit',$feenotemileageunit,PDO::PARAM_STR);
$query->bindParam(':photographqty',$photographqty,PDO::PARAM_STR);
$query->bindParam(':photographunit',$photographunit,PDO::PARAM_STR);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':reportdate',$reportdate,PDO::PARAM_STR);
$query->bindParam(':regdate',$regdate,PDO::PARAM_STR);
$query->bindParam(':ref',$ref,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':claimno',$claimno,PDO::PARAM_STR);
$query->bindParam(':registrationno',$registrationno,PDO::PARAM_STR);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':repairer',$repairer,PDO::PARAM_STR);
$query->bindParam(':feenotemileage',$feenotemileage,PDO::PARAM_STR);
$query->bindParam(':mileagedesc',$mileagedesc,PDO::PARAM_STR);
$query->bindParam(':feenoteno',$feenoteno,PDO::PARAM_STR);
$query->bindParam(':fee',$fee,PDO::PARAM_STR);
$query->bindParam(':photograph',$photograph,PDO::PARAM_STR);
$query->bindParam(':feenotevat',$feenotevat,PDO::PARAM_STR);
$query->bindParam(':feenotesubtotal',$feenotesubtotal,PDO::PARAM_STR);
$query->bindParam(':feenotetotal',$feenotetotal,PDO::PARAM_STR);
$query->bindParam(':vatdesc',$vatdesc,PDO::PARAM_STR);
$query->bindParam(':branch',$branch,PDO::PARAM_STR);
$query->bindParam(':branchcode',$branchcode,PDO::PARAM_STR);
$query->bindParam(':yearr',$yearr,PDO::PARAM_STR);
$query->bindParam(':month',$month,PDO::PARAM_STR);
$query->bindParam(':reportid',$reportid,PDO::PARAM_STR);
$query->bindParam(':reporttype',$reporttype,PDO::PARAM_STR);
$query->bindParam(':pstatus',$pstatus,PDO::PARAM_STR);

$query->execute();
{
$msg="Updated posted successfully";
}

}
?>



<?php
if(isset($_POST['submitfeenote2']))
  {
	  
$fstatus=$_POST['fstatus'];
$id=intval($_GET['id']);

$sql="UPDATE assessments set Fstatus=:fstatus where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':fstatus',$fstatus,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();
{
$msg="Updated posted successfully";
}

}
?>



<?php
if(isset($_POST['submitfeenote']))
  {
	  
$mileageqty=$_POST['mileageqty'];
$feenotemileageunit=$_POST['feenotemileageunit'];
$photographqty=$_POST['photographqty'];
$photographunit=$_POST['photographunit'];	  	  
$customer=$_POST['customer'];
$reportdate=$_POST['reportdate'];
$regdate=$_POST['regdate'];
$ref=$_POST['ref'];
$insured=$_POST['insured'];
$claimno=$_POST['claimno'];
$registrationno=$_POST['registrationno'];
$make=$_POST['make'];
$repairer=$_POST['repairer'];
$feenotemileage=$_POST['feenotemileage'];
$mileagedesc=$_POST['mileagedesc'];
$feenoteno=$_POST['feenoteno'];
$fee=$_POST['fee'];
$photograph=$_POST['photograph'];
$feenotevat=$_POST['feenotevat'];
$feenotesubtotal=$_POST['feenotesubtotal'];
$feenotetotal=$_POST['feenotetotal'];
$vatdesc=$_POST['vatdesc'];
$branch=$_POST['branch'];
$branchcode=$_POST['branchcode'];
$yearr=$_POST['yearr'];
$month=$_POST['month'];


$id=intval($_GET['id']);

$sql="UPDATE feenotes set Mileageqty=:mileageqty,FeeNoteMileageunit=:feenotemileageunit,Photographqty=:photographqty,
Photographunit=:photographunit,Customer=:customer,ReportDate=:reportdate,RegDate=:regdate,Ref=:ref,Insured=:insured,
ClaimNo=:claimno,RegistrationNo=:registrationno,Make=:make,Repairer=:repairer,FeeNoteMileage=:feenotemileage,
MileageDesc=:mileagedesc,FeeNoteNo=:feenoteno,Fee=:fee,Photograph=:photograph,FeeNoteVat=:feenotevat,
FeeNoteSubTotal=:feenotesubtotal,FeeNoteTotal=:feenotetotal,VatDesc=:vatdesc,Branch=:branch,BranchCode=:branchcode,
YEARR=:yearr,MONTH=:month where ReportId=:id AND ReportType='assessment'";

$query = $dbh->prepare($sql);
$query->bindParam(':mileageqty',$mileageqty,PDO::PARAM_STR);
$query->bindParam(':feenotemileageunit',$feenotemileageunit,PDO::PARAM_STR);
$query->bindParam(':photographqty',$photographqty,PDO::PARAM_STR);
$query->bindParam(':photographunit',$photographunit,PDO::PARAM_STR);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':reportdate',$reportdate,PDO::PARAM_STR);
$query->bindParam(':regdate',$regdate,PDO::PARAM_STR);
$query->bindParam(':ref',$ref,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':claimno',$claimno,PDO::PARAM_STR);
$query->bindParam(':registrationno',$registrationno,PDO::PARAM_STR);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':repairer',$repairer,PDO::PARAM_STR);
$query->bindParam(':feenotemileage',$feenotemileage,PDO::PARAM_STR);
$query->bindParam(':mileagedesc',$mileagedesc,PDO::PARAM_STR);
$query->bindParam(':feenoteno',$feenoteno,PDO::PARAM_STR);
$query->bindParam(':fee',$fee,PDO::PARAM_STR);
$query->bindParam(':photograph',$photograph,PDO::PARAM_STR);
$query->bindParam(':feenotevat',$feenotevat,PDO::PARAM_STR);
$query->bindParam(':feenotesubtotal',$feenotesubtotal,PDO::PARAM_STR);
$query->bindParam(':feenotetotal',$feenotetotal,PDO::PARAM_STR);
$query->bindParam(':vatdesc',$vatdesc,PDO::PARAM_STR);
$query->bindParam(':branch',$branch,PDO::PARAM_STR);
$query->bindParam(':branchcode',$branchcode,PDO::PARAM_STR);
$query->bindParam(':yearr',$yearr,PDO::PARAM_STR);
$query->bindParam(':month',$month,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();
{
$msg="Feenote Updated successfully";
}

}
?>


<?php
if(isset($_POST['submitsup']))
  {
$customer=$_POST['customer'];
$user=$_POST['user'];
$ref=$_POST['ref'];
$insured=$_POST['insured'];
$claimno=$_POST['claimno'];
$registrationno=$_POST['registrationno'];
$instructionsby=$_POST['instructionsby'];
$instructionsdate=$_POST['instructionsdate'];
$policyno=$_POST['policyno'];
$suminsured=$_POST['suminsured'];
$excess=$_POST['excess'];
$make=$_POST['make'];
$model=$_POST['model'];
$chasisno=$_POST['chasisno'];
$year=$_POST['year'];
$enginetype=$_POST['enginetype'];
$mileage=$_POST['mileage'];
$color=$_POST['color'];
$repairer=$_POST['repairer'];
$assessorsname=$_POST['assessorsname'];
$signature=$_POST['signature'];

$sql="INSERT INTO supplementary (Customer,User,Ref,Insured,ClaimNo,RegistrationNo,InstructionsBy,AssessmentDate,PolicyNo,SumInsured,Excess,
Make,Model,ChasisNo,Year,EngineType,Mileage,Color,Repairer,Assessor,Signature) 
VALUES(:customer,:user,:ref,:insured,:claimno,:registrationno,:instructionsby,:instructionsdate,:policyno,:suminsured,:excess,:make,:model,:chasisno,
:year,:enginetype,:mileage,:color,:repairer,:assessorsname,:signature)";
$query = $dbh->prepare($sql);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':ref',$ref,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':claimno',$claimno,PDO::PARAM_STR);
$query->bindParam(':registrationno',$registrationno,PDO::PARAM_STR);
$query->bindParam(':instructionsby',$instructionsby,PDO::PARAM_STR);
$query->bindParam(':instructionsdate',$instructionsdate,PDO::PARAM_STR);
$query->bindParam(':policyno',$policyno,PDO::PARAM_STR);
$query->bindParam(':suminsured',$suminsured,PDO::PARAM_STR);
$query->bindParam(':excess',$excess,PDO::PARAM_STR);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':model',$model,PDO::PARAM_STR);
$query->bindParam(':chasisno',$chasisno,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':enginetype',$enginetype,PDO::PARAM_STR);
$query->bindParam(':mileage',$mileage,PDO::PARAM_STR);
$query->bindParam(':color',$color,PDO::PARAM_STR);
$query->bindParam(':repairer',$repairer,PDO::PARAM_STR);
$query->bindParam(':assessorsname',$assessorsname,PDO::PARAM_STR);
$query->bindParam(':signature',$signature,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Posted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>


<?php
if(isset($_POST['submitsup']))
  {
	  
$imported2=$_POST['imported2'];
$id=intval($_GET['id']);

$sql="UPDATE assessments set Imported2=:imported2 where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':imported2',$imported2,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();
{
$msg="Updated posted successfully";
}

}
?>


<?php
if(isset($_POST['submitreinspection']))
  {
$customer=$_POST['customer'];
$user=$_POST['user'];
$ref=$_POST['ref'];
$insured=$_POST['insured'];
$claimno=$_POST['claimno'];
$registrationno=$_POST['registrationno'];
$instructionsby=$_POST['instructionsby'];
$policyno=$_POST['policyno'];
$suminsured=$_POST['suminsured'];
$excess=$_POST['excess'];
$make=$_POST['make'];
$model=$_POST['model'];
$chasisno=$_POST['chasisno'];
$year=$_POST['year'];
$enginetype=$_POST['enginetype'];
$mileage=$_POST['mileage'];
$color=$_POST['color'];
$repairer=$_POST['repairer'];
$signature=$_POST['signature'];
$imported=$_POST['imported'];
$reportid=$_POST['reportid'];

$sql="INSERT INTO reinspections (Customer,User,Ref,Insured,ClaimNo,RegistrationNo,InstructionsBy,PolicyNo,SumInsured,Excess,
Make,Model,ChasisNo,Year,EngineType,Mileage,Color,Repairer,Signature,Imported,AssessmentReportId) 
VALUES(:customer,:user,:ref,:insured,:claimno,:registrationno,:instructionsby,:policyno,:suminsured,:excess,:make,:model,:chasisno,
:year,:enginetype,:mileage,:color,:repairer,:signature,:imported,:reportid)";
$query = $dbh->prepare($sql);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':ref',$ref,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':claimno',$claimno,PDO::PARAM_STR);
$query->bindParam(':registrationno',$registrationno,PDO::PARAM_STR);
$query->bindParam(':instructionsby',$instructionsby,PDO::PARAM_STR);
$query->bindParam(':policyno',$policyno,PDO::PARAM_STR);
$query->bindParam(':suminsured',$suminsured,PDO::PARAM_STR);
$query->bindParam(':excess',$excess,PDO::PARAM_STR);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':model',$model,PDO::PARAM_STR);
$query->bindParam(':chasisno',$chasisno,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':enginetype',$enginetype,PDO::PARAM_STR);
$query->bindParam(':mileage',$mileage,PDO::PARAM_STR);
$query->bindParam(':color',$color,PDO::PARAM_STR);
$query->bindParam(':repairer',$repairer,PDO::PARAM_STR);
$query->bindParam(':signature',$signature,PDO::PARAM_STR);
$query->bindParam(':imported',$imported,PDO::PARAM_STR);
$query->bindParam(':reportid',$reportid,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Posted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>


<?php
if(isset($_POST['submitreinspection']))
  {
	  
$imported=$_POST['imported'];
$id=intval($_GET['id']);

$sql="UPDATE assessments set Imported=:imported where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':imported',$imported,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();
{
$msg="Updated posted successfully";
}

}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <title>Ascend ERP System</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">  
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet"> 
  	<!-- Bootstrap file input -->
	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script> 

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check-availability.php",
data:'feenoteno='+$("#feenoteno").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</head>

<body id="page-top">
    <div class="preloader">
    <span class="preloader-spin"></span>
    </div>
    <div class="site">
      <?php include('includes/header.php');?>

  <div id="wrapper">

    <!-- Sidebar -->
<?php include('includes/sidenav.php');?>

    <div id="content-wrapper"><br><br><br>

      <div class="container-fluid">

<form method="post" onSubmit="return valid();">
<?php if($error){?><div style="margin-bottom:15px; color:red;"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div><?php } 
else if($msg){?><div style="margin-bottom:15px; color:green;"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?> 

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">			  
			  <select class="form-control" name="customer" id="customer" required>

				      	<option selected style="display: none;" value="<?php echo htmlentities($result->Customer);?>"><?php echo htmlentities($result->Customer);?></option>
<?php $sql = "SELECT * from customers";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>
				      	<option value="<?php echo ($result->Name);?>"><?php echo ($result->Name);?><?php }}?></option>
			  </select>
              </div>
			  
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?> 			  
              <div class="col-md-2">
                <div class="form-label-group">				
                  <input type="text" id="firstName" name="user" class="form-control" value="<?php echo htmlentities($result->User);?>" autofocus="autofocus" readonly>
                  <label for="firstName">Report Created By</label>
                </div>
				</div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="date" name="assessmentdate" class="form-control" value="<?php echo htmlentities($result->AssessmentDate);?>">
                  <label for="date">Assessment Date</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="ref" name="ref" class="form-control" value="<?php echo htmlentities($result->Ref);?>">
                  <label for="ref">Our Ref:</label>
                </div>
              </div><?php }}?>
			  
			  
			  <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submit" id="submit" ><i class="fas fa-fw fa-folder"> </i> Update</button>
<?php
$Astatus=($result->Imported2);?>
<?php if($Astatus==1){
?>	
			  
<?php } else{ ?>   
			  <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submitsup" id="submitsup"  ><i class="fas fa-plus"> </i> Save Supple...</button>
<?php } ?>
			  
<?php
$Astatus=($result->Imported);?>
<?php if($Astatus==1){
?>	
			  
<?php } else{ ?> 
    <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submitreinspection" id="submitreinspection"  ><i class="fas fa-plus"> </i> Save Reinspec..</button>

<?php } ?>


<?php 
$username=$_SESSION['alogin'];
$sql ="SELECT * FROM users WHERE UserName=:username";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo ""; }}?>	
		
<?php										
$Astatus=($result->Status);?>
<?php if($Astatus==1){
?>			  
			  
			  <a style="padding:5px;" class="btn btn-danger" href="assessments-admin"><<-Back</a>
			  
<?php } else{ ?> 			  
 
             <a style="padding:5px;" class="btn btn-danger" href="assessments"><<-Back</a>
			  
<?php } ?>
</div>
          </div>
		  
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
		  <h5 style="color:green; padding:10px;"><strong>Edit Motor Assessment Report</strong></h5>
		  <hr>
              <div class="form-row">

              <div style="background-color:#f2f2f2;" class="col-md-3"><p style="margin-top:10px; color:red;">Insurance Details</p>

			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="policyno" name="policyno" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->PolicyNo);?>" required>
                  <label for="policyno">Policy No.</label>
                </div>
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="insured" name="insured" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Insured);?>" required>
                  <label for="insured">Insured</label>
                </div>
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="claimno" name="claimno" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->ClaimNo);?>" required>
                  <label for="claimno">Claim No.</label>
                </div>
              </div>
			  <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="suminsured" name="suminsured" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->SumInsured);?>" required>
                  <label for="suminsured">Insured Value</label>
                </div>
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="excess" name="excess" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Excess);?>" required>
                  <label for="excess">Excess</label>
                </div>
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="preaccidentvalue" name="preaccidentvalue" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->PreAccidentValue);?>"required>
                  <label for="preaccidentvalue">Pre Accident Value</label>
                </div>
              </div>
			  <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="salvagevalue" name="salvagevalue" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->SalvageValue);?>" required>
                  <label for="salvagevalue">Salvage Value</label>
                </div>
              </div>
 </div>


    <div style="margin-bottom:10px;" class="col-8">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Vehicle Details</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="true">Report Details</a>
            </li>
            <li <?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<?php $vstatus=($result->Fstatus);?>
<?php if($vstatus==1){ echo "hidden";} elseif($vstatus==0) { echo ""; }else{ echo "";}?> class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Add Fee Note</a>
            </li>
			<li 
			<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<?php $vstatus=($result->Fstatus);?>
<?php if($vstatus==0){ echo "hidden";} elseif($vstatus==1) { echo ""; }else{ echo "";}?> class="nav-item">
                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Four" aria-selected="false">Fee Note</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="registration" name="registrationno" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->RegistrationNo);?>" required>
                  <label for="registration">Registration No.</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="model" name="model" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->Model);?>" required>
                  <label for="model">Model/Type</label>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="frhs" name="frhs" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->FRHS);?>" required>
                  <label for="frhs">FRHS</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="flhs" name="flhs" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->FLHS);?>" required>
                  <label for="flhs">FLHS</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="rrhs" name="rrhs" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->RRHS);?>" required>
                  <label for="rrhs">RRHS</label>
                </div>
              </div>
            </div>
          </div>
		    <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="enginetype" name="enginetype" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->EngineType);?>" required>
                  <label for="enginetype">Engine Type/No.</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="make" name="make" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->Make);?>" required>
                  <label for="make">Make</label>
                </div>
              </div>
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="year" name="year" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Year);?>"  required>
                  <label for="year">Year Of Man.</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="rlhs" name="rlhs" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->RLHS);?>" required>
                  <label for="rlhs">RLHS</label>
                </div>
              </div>
            </div>
          </div>
		            <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="coluor" name="color" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Color);?>" required>
                  <label for="coluor">Colour</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="chasisno" name="chasisno" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->ChasisNo);?>" required>
                  <label for="chasisno">Chassis No.</label>
                </div>
              </div>
			  <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="repairsauthorised" name="repairsauthorised" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->RepairsAuthorised);?>" required>
                  <label for="repairsauthorised">Repairs Authorised</label>
                </div>
              </div>
            </div>
          </div>
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="brakes" name="brakes" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Brakes);?>" required>
                  <label for="brakes">Brakes: </label>
                </div>
              </div>

			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="mileage" name="mileage" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Mileage);?>" required>
                  <label for="mileage">Mileage</label>
                </div>
              </div>
			  <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="repairer" name="repairer" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Repairer);?>" required>
                  <label for="repairer">Repairer </label>
                </div>
              </div>
            </div>
          </div>
		  
		 <div class="form-group">
            <div class="form-row">
              <div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="propelledby" name="propelledby" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->PropelledBy);?>">
                  <label for="propelledby">Propelled By</label>
                </div>
              </div>
			  <div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="transmission" name="transmission" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Transmission);?>">
                  <label for="transmission">Transmission</label>
                </div>
              </div>
			  <div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="vehicletype" name="vehicletype" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->VehicleType);?>">
                  <label for="vehicletype">Vehicle type</label>
                </div>
              </div>
			    <div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="modeofdelivery" name="modeofdelivery" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->ModeOfDelivery);?>">
                  <label for="modeofdelivery">Mode of Delivery</label>
                </div>
              </div>
            </div>
          </div>
		  
		  	<div class="form-group">
            <div class="form-row">

              <div hidden class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="survey" name="survey" class="form-control" placeholder="Steering" value="<?php echo htmlentities($result->Survey);?>">
                  <label for="survey">Survey carried out at</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="paint" name="paintwork" class="form-control" placeholder="" autofocus="autofocus" value="<?php echo htmlentities($result->PaintWork);?>" required>
                  <label for="paint">Paint work</label>
                </div>
              </div>
			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="duration" name="duration" class="form-control" placeholder="" autofocus="autofocus" value="<?php echo htmlentities($result->Duration);?>" required>
                  <label for="duration">Repair Duration</label>
                </div>
              </div>

            </div>
          </div>
		  
		  	<div class="form-group">
            <div class="form-row">
			<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="assessorsname" name="assessorsname" class="form-control" placeholder="Duration" autofocus="autofocus" value="<?php echo htmlentities($result->AssessorsName);?>" readonly required>
                  <label for="assessorsname">Assessor's Name</label>
                </div>
            </div>
			<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="contactperson" name="contactperson" class="form-control" placeholder="Duration" autofocus="autofocus" value="<?php echo htmlentities($result->ContactPerson);?>" required>
                  <label for="contactperson">Contact Person</label>
                </div>
            </div>
			
			<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="instructionsby" name="instructionsby" value="<?php echo htmlentities($result->InstructionsBy);?>" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="instructionsby">Instructions By</label>
                </div>
              </div>
			<div hidden class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="imported" name="imported" value="1" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="imported">Imported</label>
                </div>
              </div>
			<div hidden class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="imported2" name="imported2" value="1" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="imported2">Imported</label>
                </div>
              </div>
			<div hidden class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="reportid" name="reportid" value="<?php echo htmlentities($result->id);?>" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="reportid">Report Id</label>
                </div>
              </div>
			<div hidden class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="instructionsdate" name="instructionsdate" value="<?php echo htmlentities($result->AssessmentDate);?>" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="instructionsdate">Date of Instructions</label>
                </div>
              </div>
			<div hidden class="col-md-4">
			<textarea style="width:690px;" class="form-control" rows="4" cols="70" id="address" name="address"><?php echo htmlentities($result->Address);?></textarea>
            </div>				
			</div>
			</div>
		  
		    <div class="form-group">
            <div class="form-row">  
			  
			<div hidden style="padding:7px;" class="form-label-group"><p style="color:red;">Parts Remarks</p>
            <textarea style="width:690px;" class="form-control" rows="1" cols="70" id="replaceparts" name="replaceparts"><?php echo htmlentities($result->ReplaceParts);?></textarea>
            </div>
			
			<div hidden style="padding:7px;" class="form-label-group"><p style="color:red;">Pre-accident damages/condition noted</p>
            <textarea style="width:690px;" class="form-control" rows="1" cols="70" id="defects" name="defects"><?php echo htmlentities($result->Defects);?></textarea>
            </div>
			
			<div hidden style="margin-left:10px;" class="form-group">
			<p style="padding:7px; color:red;">Garage competency to carry out repairs</p>
            <div class="form-row">
			
			
			<div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="garagecompetency" name="garagecompetency" value="<?php echo htmlentities($result->GarageCompetency);?>" class="form-control" placeholder="Duration" autofocus="autofocus">
                  <label for="garagecompetency">Competent:</label>
                </div>
            </div>
			
			<div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="garageincompetency" name="garageincompetency" value="<?php echo htmlentities($result->GarageInCompetency);?>" class="form-control" placeholder="Duration" autofocus="autofocus">
                  <label for="garageincompetency">Incompetent:</label>
                </div>
            </div></div></div>
			  

            </div>
            </div>

			
            </div>
			
			
		<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
		   
		   			  
			<div style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">Cost of Repairs:</p>
            <textarea style="width:690px;" class="form-control" rows="1" cols="70" id="repair" name="repair"><?php echo htmlentities($result->Repair);?></textarea>
            </div>
		  	<div hidden style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">Report Title</p>
            <textarea style="width:690px;" class="form-control" rows="1" cols="50" name="intro" id="intro"><?php echo htmlentities($result->Intro);?></textarea>
            </div>
			<div hidden style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">Report Details</p>
            <textarea style="width:690px;" class="form-control" rows="5" cols="50" name="introinfo" id="introinfo"><?php echo htmlentities($result->IntroInfo);?></textarea>
            </div>
            <div style="padding-bottom:10px;"><p style="color:red;">Accident Status</p>
            <textarea style="width:690px;" class="form-control" rows="2" cols="50" name="accidentcondition" id="accidentcondition"><?php echo htmlentities($result->AccidentCondition);?></textarea>
            </div>
            <div style="padding-bottom:10px;"><p style="color:red;">Remarks</p>
            <textarea style="width:690px;" class="form-control" rows="2" cols="50" name="remarks" id="remarks"><?php echo htmlentities($result->Remarks);?></textarea>
            </div> 
			<input hidden type="text" id="signature" name="signature" class="form-control" placeholder="signature" value="<?php 
$email=$_SESSION['alogin'];
$sql ="SELECT Signature FROM Users WHERE UserName=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{
	 echo htmlentities($result->Signature); }}?>" autofocus="autofocus" readonly>
	 
<div hidden >
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>			
<input type="text" id="reportdate1" name="reportdate1" value="<?php echo htmlentities($result->AssessmentDate);?>" class="form-control" readonly>
<input type="text" id="ref1" name="ref1" value="<?php echo htmlentities($result->Ref);?>" class="form-control" readonly>
<input type="text" id="claimno1" name="claimno1" value="<?php echo htmlentities($result->ClaimNo);?>" class="form-control" readonly>
<input type="text" id="insured1" name="insured1" value="<?php echo htmlentities($result->Insured);?>" class="form-control" readonly>
<input type="text" id="registrationno1" name="registrationno1" value="<?php echo htmlentities($result->RegistrationNo);?>" class="form-control" readonly>
<input type="text" id="make1" name="make1" value="<?php echo htmlentities($result->Make);?>" class="form-control" readonly>
<input type="text" id="repairer1" name="repairer1" value="<?php echo htmlentities($result->Repairer);?>" class="form-control" readonly>
<input type="text" id="customer1" name="customer1" value="<?php echo htmlentities($result->Customer);?>" class="form-control" readonly>	
<?php }}?>
</div>	 		
</form>	
		   
		   
		   
		   
		   
          </div>


<div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
		   <form method="post" onSubmit="return valid();">
		   <div class="form-group">
            <div class="form-row">
			<div class="col-md-5">
			<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
                <div class="form-label-group">				
                  <input type="text" id="feenoteno" name="feenoteno" value="<?php echo htmlentities($result->Ref);?>" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="feenoteno">Fee Note Number</label>
				  <span id="user-availability-status" style="font-size:12px; padding-left:10px;"></span>
</div> <?php }} ?>
            </div>
	
			<div style="width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate();" id="vat" name="vat">
			<option value="0.14">14% VAT</option>
			<option value="0.16">16% VAT</option>			
            <option value="0">0% VAT</option>			
			</select>
            </div>
			<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="vatdesc" name="vatdesc" class="form-control" value="14% VAT" placeholder="Last name" value="" required>
                  <label for="vatdesc">VAT Description</label>
                </div>
            </div>
            </div></div>

			<div class="form-group">
			<div class="form-row">
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="mileageqty" name="mileageqty" oninput="calculate5();" value="" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileageqty">QTY</label>
                </div>
			  </div>
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="mileagedesc" name="mileagedesc" value="Mileage" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileagedesc">Mileage Description</label>
                </div>
			  </div>			  
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotemileageunit" name="feenotemileageunit" oninput="calculate5();" class="form-control" placeholder="feenotemileage" value="30" autofocus="autofocus">
                  <label for="feenotemileageunit">Unit Cost(Ksh)</label>
                </div>
			  </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotemileage" name="feenotemileage" oninput="calculate();" class="form-control" placeholder="feenotemileage" value="" autofocus="autofocus">
                  <label for="feenotemileage">Total(Ksh)</label>
                </div>
			  </div></div></div>
			<div class="form-group">
              <div class="form-row">
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="photographqty" name="photographqty" oninput="calculate6();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Photographqty);?>" autofocus="autofocus">
                  <label for="photographqty">QTY</label>
                </div>
              </div>
			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photographdesc" name="photographdesc" oninput="calculate();" class="form-control" placeholder="First name" value="Photographs" autofocus="autofocus">
                  <label for="photographdesc">Photograph Desciption</label>
                </div>
			  </div>
			  

			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photographunit" name="photographunit" oninput="calculate6();" class="form-control" placeholder="First name" value="60" autofocus="autofocus">
                  <label for="photographunit">Unit Cost (Ksh)</label>
                </div>
			  </div>
			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photograph" name="photograph" oninput="calculate();" class="form-control" placeholder="First name" value="" autofocus="autofocus">
                  <label for="photograph">Total Cost (Ksh)</label>
                </div>
              </div>
			  </div>
              </div>
			  
			<div class="form-group">
            <div class="form-row">
				<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="fee" name="fee" oninput="calculate();" class="form-control" placeholder="First name" value="" autofocus="autofocus">
                  <label for="fee">Service fee</label>
                </div>
              </div>			  
			</div></div>

           <div class="form-group">
            <div class="form-row">
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="subtotal" name="feenotesubtotal" value="" oninput="calculate();" class="form-control" placeholder="Last name" readonly>
                  <label for="subtotal">Sub Total</label>
                </div>
              </div>
			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotevat" name="feenotevat" oninput="calculate();" value="" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="feenotevat">VAT</label>
                </div>
              </div>

            </div>
            </div>

           <div class="form-group">
            <div class="form-row">
			  
			<div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="feenotetotal" name="feenotetotal" oninput="calculate();" value="" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="feenotetotal">Fee Note Total</label>
                </div>
            </div>
            </div>
			<div hidden class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="fimage" name="fimage" value="<?php echo htmlentities($result->Image4);?>" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="fimage">Fee Note Image</label>
                </div>
            </div>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>			
<input hidden type="text" id="reportdate" name="reportdate" value="<?php echo htmlentities($result->AssessmentDate);?>" class="form-control" readonly>
<input hidden type="text" id="regdate" name="regdate" value="<?php echo htmlentities($result->RegDate);?>" class="form-control" readonly>
<input hidden type="text" id="ref" name="ref" value="<?php echo htmlentities($result->Ref);?>" class="form-control" readonly>
<input hidden type="text" id="claimno" name="claimno" value="<?php echo htmlentities($result->ClaimNo);?>" class="form-control" readonly>
<input hidden type="text" id="insured" name="insured" value="<?php echo htmlentities($result->Insured);?>" class="form-control" readonly>
<input hidden type="text" id="registrationno" name="registrationno" value="<?php echo htmlentities($result->RegistrationNo);?>" class="form-control" readonly>
<input hidden type="text" id="make" name="make" value="<?php echo htmlentities($result->Make);?>" class="form-control" readonly>
<input hidden type="text" id="repairer" name="repairer" value="<?php echo htmlentities($result->Repairer);?>" class="form-control" readonly>
<input hidden type="text" id="customer" name="customer" value="<?php echo htmlentities($result->Customer);?>" class="form-control" readonly>	
<input hidden type="text" id="branch" name="branch" value="<?php echo htmlentities($result->Branch);?>" class="form-control" readonly>
<input hidden type="text" id="branchcode" name="branchcode" value="<?php echo htmlentities($result->BranchCode);?>" class="form-control" readonly>
<input hidden type="text" id="yearr" name="yearr" value="<?php echo htmlentities($result->YEARR);?>" class="form-control" readonly>
<input hidden type="text" id="month" name="month" value="<?php echo htmlentities($result->MONTH);?>" class="form-control" readonly>		
<input hidden type="text" id="reportid" name="reportid" value="<?php echo htmlentities($result->id);?>" class="form-control" readonly>		
<input hidden type="text" id="reporttype" name="reporttype" value="assessment" class="form-control" readonly>	
<input hidden type="text" id="pstatus" name="pstatus" value="Not paid" class="form-control" readonly>
<input hidden type="text" id="fstatus" name="fstatus" value="1" class="form-control" readonly>	
			
            </div>
			<button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" id="submit2" name="submitfeenote2"  ><i class="fas fa-fw fa-folder"> </i> Save</button>
            </form>
</div>

  
		   <div class="tab-pane fade p-4" id="four" role="tabpanel" aria-labelledby="four-tab">

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
		   <form method="post" onSubmit="return valid();">
		   <div class="form-group">
            <div class="form-row">
			<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenoteno1" name="feenoteno" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Ref);?>" autofocus="autofocus">
<label for="feenoteno1">Fee Note No.</label><?php }}?>
                </div>
            </div>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from feenotes where ReportType='assessment' AND ReportId=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>	
			<div style="width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate2();" id="vat2" name="vat">
			<option value="0.14">14% VAT</option>
			<option value="0.16">16% VAT</option>
            <option value="0">0% VAT</option>			
			</select>
            </div>
			<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="vatdesc" name="vatdesc" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->VatDesc);?>" required>
                  <label for="vatdesc">VAT Description</label>
                </div>
            </div>
            </div></div>
			<div class="form-group">
			<div class="form-row">
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="mileageqty2" name="mileageqty" oninput="calculate3();" value="<?php echo htmlentities($result->Mileageqty);?>" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileageqty2">Mileage(KM)</label>
                </div>
			  </div>
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="mileagedesc" name="mileagedesc" value="Mileage" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileagedesc">Mileage Description</label>
                </div>
			  </div>			  
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotemileageunit2" name="feenotemileageunit" oninput="calculate3();" class="form-control" placeholder="feenotemileage" value="<?php echo htmlentities($result->FeeNoteMileageunit);?>" autofocus="autofocus">
                  <label for="feenotemileageunit2">Unit Cost(Ksh)</label>
                </div>
			  </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotemileage2" name="feenotemileage" oninput="calculate2();" class="form-control" placeholder="feenotemileage" value="<?php echo htmlentities($result->FeeNoteMileage);?>" autofocus="autofocus">
                  <label for="feenotemileage2">Mileage Total(Ksh)</label>
                </div>
			  </div></div></div>
			<div class="form-group">
              <div class="form-row">
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="photographqty2" name="photographqty" oninput="calculate4();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Photographqty);?>" autofocus="autofocus">
                  <label for="photographqty2">QTY</label>
                </div>
              </div>
			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photographdesc" name="photographdesc" oninput="calculate();" class="form-control" placeholder="First name" value="Photographs" autofocus="autofocus">
                  <label for="photographdesc">Photograph Desciption</label>
                </div>
			  </div>
			  

			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photographunit2" name="photographunit" oninput="calculate4();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Photographunit);?>" autofocus="autofocus">
                  <label for="photographunit2">Unit Cost (Ksh)</label>
                </div>
			  </div>
			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photograph2" name="photograph" oninput="calculate2();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Photograph);?>" autofocus="autofocus">
                  <label for="photograph2">Total Cost (Ksh)</label>
                </div>
              </div>
			  </div>
              </div>
			  
			<button style="margin-left:500px;" type="button" onclick="calculate2()">Calculate</button>
			<div class="form-group">
            <div class="form-row">
				<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="fee2" name="fee" oninput="calculate2();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Fee);?>" autofocus="autofocus">
                  <label for="fee2">Service fee</label>
                </div>
              </div>			  
			</div></div>

           <div class="form-group">
            <div class="form-row">
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="subtotal2" name="feenotesubtotal" value="<?php echo htmlentities($result->FeeNoteSubTotal);?>" oninput="calculate2();" class="form-control" placeholder="Last name" readonly>
                  <label for="subtotal2">Sub Total</label>
                </div>
              </div>
			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotevat2" name="feenotevat" oninput="calculate2();" value="<?php echo htmlentities($result->FeeNoteVat);?>" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="feenotevat2">VAT</label>
                </div>
              </div>

            </div>
            </div>

           <div class="form-group">
            <div class="form-row">
			  
			<div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="feenotetotal2" name="feenotetotal" oninput="calculate2();" value="<?php echo htmlentities($result->FeeNoteTotal);?>" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="feenotetotal2">Fee Note Total</label>
                </div>
            </div>
            </div>
			<div hidden class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="fimage" name="fimage" value="<?php echo htmlentities($result->Image4);?>" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="fimage">Fee Note Image</label>
                </div>
            </div>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessments where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>			
<input hidden type="text" id="reportdate" name="reportdate" value="<?php echo htmlentities($result->AssessmentDate);?>" class="form-control" readonly>
<input hidden type="text" id="regdate" name="regdate" value="<?php echo htmlentities($result->RegDate);?>" class="form-control" readonly>
<input hidden type="text" id="ref" name="ref" value="<?php echo htmlentities($result->Ref);?>" class="form-control" readonly>
<input hidden type="text" id="claimno" name="claimno" value="<?php echo htmlentities($result->ClaimNo);?>" class="form-control" readonly>
<input hidden type="text" id="insured" name="insured" value="<?php echo htmlentities($result->Insured);?>" class="form-control" readonly>
<input hidden type="text" id="registrationno" name="registrationno" value="<?php echo htmlentities($result->RegistrationNo);?>" class="form-control" readonly>
<input hidden type="text" id="make" name="make" value="<?php echo htmlentities($result->Make);?>" class="form-control" readonly>
<input hidden type="text" id="repairer" name="repairer" value="<?php echo htmlentities($result->Repairer);?>" class="form-control" readonly>
<input hidden type="text" id="customer" name="customer" value="<?php echo htmlentities($result->Customer);?>" class="form-control" readonly>	
<input hidden type="text" id="branch" name="branch" value="<?php echo htmlentities($result->Branch);?>" class="form-control" readonly>
<input hidden type="text" id="branchcode" name="branchcode" value="<?php echo htmlentities($result->BranchCode);?>" class="form-control" readonly>
<input hidden type="text" id="yearr" name="yearr" value="<?php echo htmlentities($result->YEARR);?>" class="form-control" readonly>
<input hidden type="text" id="month" name="month" value="<?php echo htmlentities($result->MONTH);?>" class="form-control" readonly>		
<input hidden type="text" id="reportid" name="reportid" value="<?php echo htmlentities($result->id);?>" class="form-control" readonly>		
<input hidden type="text" id="reporttype" name="reporttype" value="assessment" class="form-control" readonly>		
			
            </div>
			<button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submitfeenote"  ><i class="fas fa-fw fa-folder"> </i> Update Feenote</button>
            </form>
	
	   
          </div>
		
        </div>
        </div>
        </div>
</div>
</div>
<?php }}}}}}}} ?>


      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
      <?php include('includes/footer.php');?>
      </footer>

    </div>
    <!-- /.content-wrapper -->

    </div></div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
  
											<div style="padding-top:35px;" class="modal fade" id="pdfModal<?php echo htmlentities($result->id);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
											<div style="padding:15px;">

		  
                                            </div>
                                            </div>
                                            </div>
											</div>  

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script src="js/active.js"></script>
  
<script>
    function calculate() {
        var myBox1 = document.getElementById('feenotemileage').value; 
        var myBox2 = document.getElementById('fee').value;
		var myBox3 = document.getElementById('photograph').value;
        var results = document.getElementById('subtotal'); 
        var myResult = Number(myBox1) + Number(myBox2) + Number(myBox3);
          document.getElementById('subtotal').value = myResult;
        var myBox4 = document.getElementById('subtotal').value; 
        var myBox5 = document.getElementById('vat').value;
        var results = document.getElementById('feenotevat'); 
        var myResult = myBox5 * myBox2;
          document.getElementById('feenotevat').value = myResult;
		var myBox6 = document.getElementById('feenotevat').value;
        var myResult = Number(myBox6) + Number(myBox4);		
	      document.getElementById('feenotetotal').value = myResult;

    }
</script>

<script>
    function calculate2() {
        var myBox1 = document.getElementById('feenotemileage2').value; 
        var myBox2 = document.getElementById('fee2').value;
		var myBox3 = document.getElementById('photograph2').value;
        var results = document.getElementById('subtotal2'); 
        var myResult = Number(myBox1) + Number(myBox2) + Number(myBox3);
          document.getElementById('subtotal2').value = myResult;
        var myBox4 = document.getElementById('subtotal2').value; 
        var myBox5 = document.getElementById('vat2').value;
        var results = document.getElementById('feenotevat2'); 
        var myResult = myBox5 * myBox2;
          document.getElementById('feenotevat2').value = myResult;
		var myBox6 = document.getElementById('feenotevat2').value;
        var myResult = Number(myBox6) + Number(myBox4);		
	      document.getElementById('feenotetotal2').value = myResult;

    }
</script>


<script>
    function calculate3() {
        var myBox1 = document.getElementById('mileageqty2').value; 
        var myBox2 = document.getElementById('feenotemileageunit2').value;
        var myResult = myBox2 * myBox1;
          document.getElementById('feenotemileage2').value = myResult;

    }
</script>

<script>
    function calculate4() {
        var myBox1 = document.getElementById('photographqty2').value; 
        var myBox2 = document.getElementById('photographunit2').value;
        var myResult = myBox2 * myBox1;
          document.getElementById('photograph2').value = myResult;

    }
</script>

<script>
    function calculate5() {
        var myBox1 = document.getElementById('mileageqty').value; 
        var myBox2 = document.getElementById('feenotemileageunit').value;
        var myResult = myBox2 * myBox1;
          document.getElementById('feenotemileage').value = myResult;

    }
</script>

<script>
    function calculate6() {
        var myBox1 = document.getElementById('photographqty').value; 
        var myBox2 = document.getElementById('photographunit').value;
        var myResult = myBox2 * myBox1;
          document.getElementById('photograph').value = myResult;

    }
</script>

</body>

</html>
<?php }}} }} }}?>

<!-- This software belongs to Evans Mutai Mwendwa 0792019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
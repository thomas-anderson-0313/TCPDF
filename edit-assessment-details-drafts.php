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
$steering=$_POST['steering'];
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

$sql="UPDATE assessmentdrafts set Customer=:customer,User=:user,AssessmentDate=:assessmentdate,Ref=:ref,PolicyNo=:policyno,Insured=:insured,
ClaimNo=:claimno,SumInsured=:suminsured,Excess=:excess,RegistrationNo=:registrationno,EngineType=:enginetype,Color=:color,Brakes=:brakes,
PaintWork=:paintwork,ReplaceParts=:replaceparts,Repair=:repair,GarageCompetency=:garagecompetency,GarageInCompetency=:garageincompetency,Duration=:duration,Defects=:defects,
Model=:model,Make=:make,ChasisNo=:chasisno,AssessorsName=:assessorsname,ContactPerson=:contactperson,RepairsAuthorised=:repairsauthorised,
Steering=:steering,Repairer=:repairer,PreAccidentValue=:preaccidentvalue,PropelledBy=:propelledby,
SalvageValue=:salvagevalue,Transmission=:transmission,ModeOfDelivery=:modeofdelivery,Survey=:survey,VehicleType=:vehicletype,Mileage=:mileage,
Year=:year,FRHS=:frhs,FLHS=:flhs,RRHS=:rrhs,RLHS=:rlhs,Intro=:intro,IntroInfo=:introinfo,Remarks=:remarks,AccidentCondition=:accidentcondition,
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
$query->bindParam(':steering',$steering,PDO::PARAM_STR);
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
$sql ="SELECT * from assessmentdrafts where id=:id";
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
              <div class="col-md-2">			  
              <input type="text" id="customer" name="customer" class="form-control" value="<?php echo htmlentities($result->Customer);?>" autofocus="autofocus" readonly>
              </div>
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
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submit" id="submit"  ><i class="fas fa-fw fa-folder"> </i> Update</button>
			  <button hidden class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submitdraft" id="submitdraft"  ><i class="fas fa-fw fa-folder"> </i> Save Copy</button>
			  <button class="btn btn-primary btn-sm" type="reset" style="margin-right:10px;" ><i class="fa fa-bolt"> </i> Reset</button>
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
			  
			  <a style="padding:10px;" class="btn btn-danger" href="assessment-drafts"><<-Back</a>
			  
<?php } else{ ?> 			  
 
             <a style="padding:10px;" class="btn btn-danger" href="assessment-drafts"><<-Back</a>
			  
<?php } ?>
</div>
          </div>
		  
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentdrafts where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
		  <h5 style="color:green; padding:10px;"><strong>Edit Motor Assessment Report (Revised)</strong></h5>
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
            <li class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Fee Note</a>
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
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="steering" class="form-control" placeholder="Steering" value="<?php echo htmlentities($result->Steering);?>" required>
                  <label for="lastName">Steering</label>
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
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="propelledby" name="propelledby" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->PropelledBy);?>"  required>
                  <label for="propelledby">Propelled By</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="transmission" name="transmission" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Transmission);?>" required>
                  <label for="transmission">Transmission</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="vehicletype" name="vehicletype" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->VehicleType);?>" required>
                  <label for="vehicletype">Vehicle type</label>
                </div>
              </div>
			    <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="modeofdelivery" name="modeofdelivery" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->ModeOfDelivery);?>" required>
                  <label for="modeofdelivery">Mode of Delivery</label>
                </div>
              </div>
            </div>
          </div>
		  
		  	<div class="form-group">
            <div class="form-row">

              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="survey" name="survey" class="form-control" placeholder="Steering" value="<?php echo htmlentities($result->Survey);?>" required>
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
                  <input type="text" id="assessorsname" name="assessorsname" class="form-control" placeholder="Duration" autofocus="autofocus" value="<?php echo htmlentities($result->AssessorsName);?>" required>
                  <label for="assessorsname">Assessor's Name</label>
                </div>
            </div>
			<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="contactperson" name="contactperson" class="form-control" placeholder="Duration" autofocus="autofocus" value="<?php echo htmlentities($result->ContactPerson);?>" required>
                  <label for="contactperson">Contact Person</label>
                </div>
            </div>	
			<div hidden class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="address" name="address" class="form-control" placeholder="Duration" autofocus="autofocus" value="<?php echo htmlentities($result->Address);?>" required>
                  <label for="address">Address</label>
                </div>
            </div>			
			</div>
			</div>
		  
		    <div class="form-group">
            <div class="form-row">  
			  
			<div style="padding:7px;" class="form-label-group"><p style="color:red;">Parts Remarks</p>
            <textarea style="width:690px;" class="form-control" rows="1" cols="70" id="replaceparts" name="replaceparts"><?php echo htmlentities($result->ReplaceParts);?></textarea>
            </div>
			
			<div style="padding:7px;" class="form-label-group"><p style="color:red;">Pre-accident damages/condition noted</p>
            <textarea style="width:690px;" class="form-control" rows="1" cols="70" id="defects" name="defects"><?php echo htmlentities($result->Defects);?></textarea>
            </div>
			  
			<div style="padding:7px;" class="form-label-group"><p style="color:red;">Parts/Areas that were damaged and can be repaired were noted as follows:</p>
            <textarea style="width:690px;" class="form-control" rows="1" cols="70" id="repair" name="repair"><?php echo htmlentities($result->Repair);?></textarea>
            </div>
			
			<div style="margin-left:10px;" class="form-group">
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
		   
		  	<div style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">Report Title</p>
            <textarea style="width:690px;" class="form-control" rows="1" cols="50" name="intro" id="intro"><?php echo htmlentities($result->Intro);?></textarea>
            </div>
			<div style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">Report Details</p>
            <textarea style="width:690px;" class="form-control" rows="5" cols="50" name="introinfo" id="introinfo"><?php echo htmlentities($result->IntroInfo);?></textarea>
            </div>
            <div style="padding-bottom:10px;"><p style="color:red;">Accident Status</p>
            <textarea style="width:690px;" class="form-control" rows="2" cols="50" name="accidentcondition" id="accidentcondition"><?php echo htmlentities($result->AccidentCondition);?></textarea>
            </div>
            <div style="padding-bottom:10px;"><p style="color:red;">Remarks</p>
            <textarea style="width:690px;" class="form-control" rows="2" cols="50" name="remarks" id="remarks"><?php echo htmlentities($result->Remarks);?></textarea>
            </div> 
          </div>
			
			
			
			
              
		   <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
		   <div class="form-group">
            <div class="form-row">
			<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenoteno" name="feenoteno" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->FeeNoteNo);?>" autofocus="autofocus">
                  <label for="feenoteno">Fee Note No.</label>
                </div>
            </div>
			<div style="width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate();" id="vat" name="vat">
			<option disabled selected style="display: none;"value="">Select VAT</option>
			<option value="0.16">16% VAT</option>
			<option value="0.14">14% VAT</option>
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
				<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="fee" name="fee" oninput="calculate();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Fee);?>" autofocus="autofocus">
                  <label for="fee">Service fee</label>
                </div>
              </div>
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="mileagedesc" name="mileagedesc" value="<?php echo htmlentities($result->MileageDesc);?>" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileagedesc">Mileage Description(KM)</label>
                </div>
			  </div>			  
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotemileage" name="feenotemileage" oninput="calculate();" class="form-control" placeholder="feenotemileage" value="<?php echo htmlentities($result->FeeNoteMileage);?>" autofocus="autofocus">
                  <label for="feenotemileage">Mileage Covered(Ksh)</label>
                </div>
			  </div>

			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photograph" name="photograph" oninput="calculate();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Photograph);?>" autofocus="autofocus">
                  <label for="photograph">Photograph</label>
                </div>
              </div>
            </div></div>

           <div class="form-group">
            <div class="form-row">
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="subtotal" name="feenotesubtotal" value="<?php echo htmlentities($result->FeeNoteSubTotal);?>" oninput="calculate();" class="form-control" placeholder="Last name" readonly>
                  <label for="subtotal">Sub Total</label>
                </div>
              </div>
			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotevat" name="feenotevat" oninput="calculate();" value="<?php echo htmlentities($result->FeeNoteVat);?>" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="feenotevat">VAT</label>
                </div>
              </div>

            </div>
            </div>

           <div class="form-group">
            <div class="form-row">
			  
			<div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="feenotetotal" name="feenotetotal" oninput="calculate();" value="<?php echo htmlentities($result->FeeNoteTotal);?>" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="feenotetotal">Fee Note Total</label>
                </div>
            </div>
            </div>
            </div>			
		   </form>		   
          </div>
		
        </div>
        </div>
        </div>
</div>
</div>
<?php }}}} ?>
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
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>

</body>

</html>
<?php } ?>

<!-- This software belongs to Evans Mutai Mwendwa 0792019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
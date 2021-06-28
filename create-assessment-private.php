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
$assessmentdate1=$_POST['assessmentdate1'];
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
$repair=$_POST['repair'];
$duration=$_POST['duration'];
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
$instructionsby=$_POST['instructionsby'];
$instructionsdate=$_POST['instructionsdate'];
$vehicletype=$_POST['vehicletype'];
$mileage=$_POST['mileage'];
$year=$_POST['year'];
$frhs=$_POST['frhs'];
$flhs=$_POST['flhs'];
$rrhs=$_POST['rrhs'];
$rlhs=$_POST['rlhs'];
$remarks=$_POST['remarks'];
$accidentcondition=$_POST['accidentcondition'];
$feenotemileage=$_POST['feenotemileage'];
$photograph=$_POST['photograph'];
$feenoteno=$_POST['feenoteno'];
$fee=$_POST['fee'];
$feenotevat=$_POST['feenotevat'];
$feenotesubtotal=$_POST['feenotesubtotal'];
$feenotetotal=$_POST['feenotetotal'];
$yearr=$_POST['yearr'];
$month=$_POST['month'];
$regdate=$_POST['regdate'];
$vatdesc=$_POST['vatdesc'];
$signature=$_POST['signature'];
$branch=$_POST['branch'];
$branchcode=$_POST['branchcode'];
$mileagedesc=$_POST['mileagedesc'];

$sql="INSERT INTO assessments (Customer,User,AssessmentDate,AssessmentDate1,Ref,PolicyNo,Insured,ClaimNo,SumInsured,Excess,RegistrationNo,EngineType,Color,Brakes,PaintWork,Repair,Duration,Model,Make,ChasisNo,AssessorsName,ContactPerson,RepairsAuthorised,Repairer,PreAccidentValue,PropelledBy,SalvageValue,InstructionsBy,InstructionsDate,VehicleType,Mileage,Year,FRHS,FLHS,RRHS,RLHS,Remarks,AccidentCondition,FeeNoteMileage,Photograph,FeeNoteNo,Fee,FeeNoteVat,FeeNoteSubTotal,FeeNoteTotal,YEARR,MONTH,RegDate,VatDesc,Signature,Branch,BranchCode,MileageDesc) 
VALUES(:customer,:user,:assessmentdate,:assessmentdate1,:ref,:policyno,:insured,:claimno,:suminsured,:excess,:registrationno,:enginetype,:color,:brakes,:paintwork,:repair,:duration,:model,:make,:chasisno,:assessorsname,:contactperson,:repairsauthorised,:repairer,:preaccidentvalue,:propelledby,:salvagevalue,:instructionsby,:instructionsdate,:vehicletype,:mileage,:year,:frhs,:flhs,:rrhs,:rlhs,:remarks,:accidentcondition,:feenotemileage,:photograph,:feenoteno,:fee,:feenotevat,:feenotesubtotal,:feenotetotal,:yearr,:month,:regdate,:vatdesc,:signature,:branch,:branchcode,:mileagedesc)";
$query = $dbh->prepare($sql);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':assessmentdate',$assessmentdate,PDO::PARAM_STR);
$query->bindParam(':assessmentdate1',$assessmentdate1,PDO::PARAM_STR);
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
$query->bindParam(':repair',$repair,PDO::PARAM_STR);
$query->bindParam(':duration',$duration,PDO::PARAM_STR);
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
$query->bindParam(':instructionsby',$instructionsby,PDO::PARAM_STR);
$query->bindParam(':instructionsdate',$instructionsdate,PDO::PARAM_STR);
$query->bindParam(':vehicletype',$vehicletype,PDO::PARAM_STR);
$query->bindParam(':mileage',$mileage,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':frhs',$frhs,PDO::PARAM_STR);
$query->bindParam(':flhs',$flhs,PDO::PARAM_STR);
$query->bindParam(':rrhs',$rrhs,PDO::PARAM_STR);
$query->bindParam(':rlhs',$rlhs,PDO::PARAM_STR);
$query->bindParam(':remarks',$remarks,PDO::PARAM_STR);
$query->bindParam(':accidentcondition',$accidentcondition,PDO::PARAM_STR);
$query->bindParam(':feenotemileage',$feenotemileage,PDO::PARAM_STR);
$query->bindParam(':photograph',$photograph,PDO::PARAM_STR);
$query->bindParam(':feenoteno',$feenoteno,PDO::PARAM_STR);
$query->bindParam(':fee',$fee,PDO::PARAM_STR);
$query->bindParam(':feenotevat',$feenotevat,PDO::PARAM_STR);
$query->bindParam(':feenotesubtotal',$feenotesubtotal,PDO::PARAM_STR);
$query->bindParam(':feenotetotal',$feenotetotal,PDO::PARAM_STR);
$query->bindParam(':yearr',$yearr,PDO::PARAM_STR);
$query->bindParam(':month',$month,PDO::PARAM_STR);
$query->bindParam(':regdate',$regdate,PDO::PARAM_STR);
$query->bindParam(':vatdesc',$vatdesc,PDO::PARAM_STR);
$query->bindParam(':signature',$signature,PDO::PARAM_STR);
$query->bindParam(':branch',$branch,PDO::PARAM_STR);
$query->bindParam(':branchcode',$branchcode,PDO::PARAM_STR);
$query->bindParam(':mileagedesc',$mileagedesc,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Report posted successfully";
header("refresh:3;assessments"); // redirects image view page after 5 seconds.
}
else 
{
$error="Something went wrong. Please try again";
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
	
		<!-- Datepicker-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="css/jquery-1.12.4.js"></script>
  <script src="css/jquery-ui.js"></script>

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
<?php if($error){?><div style="margin-bottom:15px; color:red;"><?php echo htmlentities($error); ?> </div><?php } 
else if($msg){?><div style="margin-bottom:15px; color:green;"><?php echo htmlentities($msg); ?> </div><?php }?>
          <div class="form-group">
            <div class="form-row">
			  <div class="col-md-3">
			  <div class="form-label-group">
                  <input type="text" id="firstName" name="customer" id="customer" class="form-control" placeholder="firstName">
				<label for="firstName">Customer Name</label>  
              </div></div>
              <div class="col-md-2">
                <div class="form-label-group">
				
                  <input type="text" id="firstName" name="user" class="form-control" placeholder="First name" value="<?php 
$email=$_SESSION['alogin'];
$sql ="SELECT UserName FROM Users WHERE UserName=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{
	 echo htmlentities($result->UserName); }}?>" autofocus="autofocus" readonly>
                  <label for="firstName">Report Created By</label>
                </div>
				
</div>
			  <div class="col-md-2">
                  <input type="text" id="datepicker" name="assessmentdate" class="form-control" placeholder="Select date" readonly required>
              </div>
			  
<?php $sql = "SELECT Ref from assessments order by id Desc Limit 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ }} 
?>			  
			  			  
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="ref" name="ref" class="form-control" placeholder="ref" required>
                  <label for="ref">Our Ref</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submit" id="submit"  ><i class="fas fa-fw fa-folder"> </i> Save</button>
			  <button class="btn btn-primary btn-sm" type="reset" style="margin-right:10px;" ><i class="fa fa-bolt"> </i> Reset</button>
			  <a style="padding:10px;" class="btn btn-danger" href="javascript:history.back()"><<-Back</a>
            </div>
          </div>
		  <h5 style="color:green; padding:10px;"><strong>Create Motor Assessment Report</strong></h5>
		  <hr>
              <div class="form-row">

              <div style="background-color:#f2f2f2;" class="col-md-3"><p style="margin-top:10px; color:red;">Insurance Details</p>

			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="policyno" name="policyno" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="policyno">Policy No.</label>
                </div>
				
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="insured" name="insured" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="insured">Insured</label>
                </div>
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="claimno" name="claimno" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="claimno">Claim No.</label>
                </div>
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="suminsured" name="suminsured" class="form-control" placeholder="First name" value="KSh. " autofocus="autofocus" required>
                  <label for="suminsured">Insured Value</label>
                </div>
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="excess" name="excess" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="excess">Excess</label>
                </div>
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="preaccidentvalue" name="preaccidentvalue" class="form-control" value="KSh. " placeholder="First name" autofocus="autofocus" required>
                  <label for="preaccidentvalue">Pre Accident Value</label>
                </div>
              </div>
			  <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="salvagevalue" name="salvagevalue" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="salvagevalue">Salvage Value</label>
                </div>
              </div>
			  <div style="padding-top:10px;" class="form-label-group" hidden>
		    <select class="form-control" name="address" id="address" class="select">
			<option disabled selected style="display: none;"value="">Select Insurance Address*</option>
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
			<option value="<?php echo ($result->Address);?>"><?php echo ($result->Name);?><?php }}?></option>
			</select>
            </div><br>
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
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Garage Details</a>
            </li>
			<li hidden class="nav-item">
                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Four" aria-selected="false">Fee Note</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">

          <div class="form-group">
            <div class="form-row">
			
			
<?php
$month = date("yy-m-d");
?>
			  <input style="width:100px;" type="text" id="regdate" name="regdate" value="<?php echo $month;?>" hidden>
				  
				  
				  
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="registration" name="registrationno" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="registration">Registration No.</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="make" name="make" class="form-control" placeholder="Last name" required>
                  <label for="make">Make</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="model" name="model" class="form-control" placeholder="Last name" required>
                  <label for="model">Model/Type</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="year" name="year" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="year">Year Of Man.</label>
                </div>
              </div>
            </div>
          </div>
		    <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="enginetype" name="enginetype" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="enginetype">Engine Type/No.</label>
                </div>
              </div>

			    <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="frhs" name="frhs" class="form-control" placeholder="Last name" required>
                  <label for="frhs">RHF</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="flhs" name="flhs" class="form-control" placeholder="Last name" required>
                  <label for="flhs">RHR</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="rrhs" name="rrhs" class="form-control" placeholder="Last name" required>
                  <label for="rrhs">LHF</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="rlhs" name="rlhs" class="form-control" placeholder="Last name" required>
                  <label for="rlhs">LHR</label>
                </div>
              </div>
            </div>
          </div>
		            <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="coluor" name="color" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="coluor">Colour</label>
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="chasisno" name="chasisno" class="form-control" placeholder="Last name" required>
                  <label for="chasisno">Chassis No.</label>
                </div>
              </div>
<div style="padding-left:5px;" class="checkbox checkbox-inline"> Repairs Authorised
		    <select class="form-control" name="repairsauthorised" id="repairsauthorised" required>
			<option value="AUTHORIZED">AUTHORIZED</option>
			<option value="NOT AUTHORIZED">NOT AUTHORIZED</option>
						
			</select>
</div>
            </div>
          </div>
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="brakes" name="brakes" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="brakes">Brakes </label>
                </div>
              </div>
              <div class="col-md-3" hidden>
                <div class="form-label-group">
                  <input type="text" id="lastName" name="steering" class="form-control" placeholder="Steering">
                  <label for="lastName">Steering</label>
                </div>
              </div>
			  <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="mileage" name="mileage" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="mileage">Mileage</label>
                </div>
              </div>
			  <div class="col-md-3" hidden>
                <div class="form-label-group">
                  <input type="text" id="propelledby" name="propelledby" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="propelledby">Propelled By</label>
                </div>
              </div>
            </div>
          </div>
		  
		 <div class="form-group">
            <div class="form-row">
			  <div class="col-md-3" hidden>
                <div class="form-label-group">
                  <input type="text" id="transmission" name="transmission" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="transmission">Transmission</label>
                </div>
              </div>
			  <div hidden class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="vehicletype" name="vehicletype" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="vehicletype">Vehicle type</label>
                </div>
              </div>
			  	<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="paint" name="paintwork" class="form-control" placeholder="Paint Work" autofocus="autofocus" required>
                  <label for="paint">Paint work</label>
                </div>
              </div>
            </div>
          </div>
		  

		  
		    <div class="form-group">
            <div class="form-row">  
			<div hidden>
			<?php
$month = date("M");
?>
				  <input style="width:100px;" type="text" id="month" name="month" value="<?php echo $month;?>" >	
<?php
$year = date("Y");
?>
				  <input style="width:100px;" type="text" id="yearr" name="yearr" value="<?php echo $year;?>" >
			  
            </div>
            </div>
            </div>

			
            </div>
			
			
		<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">


                <div hidden class="form-label-group">
                  <input type="text" name="intro" id="intro" value="REF: ASSESSMENT REPORT FOR VEHICLE REG. NO. XXXX" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="intro">Report Title</label>
                </div><br>

			<p style="padding-left:10px; color:red;" hidden> Report Details</p>
			<div style="padding-bottom:10px;" class="form-label-group" hidden>
            <textarea style="width:690px;" class="form-control" rows="10" cols="60" name="introinfo" id="introinfo">We thank you for the above instructions which we received from <strong>XXXX</strong> on <strong>XXXX.</strong> We went to the premises of <strong>XXXX</strong> where we carried out the assessment of the above mentioned vehicle.<br><br>

The total estimated repair cost is <strong>KSH. XXXX</strong> and is  in our opinion without prejudice a fair and reasonable estimated cost of restoring this vehicle back to its pre-accident condition.</textarea>
            </div>
			
			<p style="padding-left:10px; color:red;"> Details of damages sustained in the logical order</p>
			    <div class="form-label-group">
                  <textarea style="width:690px;" class="form-control" rows="10" cols="60" name="accidentcondition" id="accidentcondition">
				  The vehicle suffered a moderate front impact biased </textarea>
                </div><br>
							  
			    <p style="padding-left:10px; color:red;">Cost of Repairs</p>
				<div class="form-label-group">
				  <textarea id="repair" name="repair" style="width:690px;" class="form-control" rows="10" cols="60">The estimated total repair cost is <span style="font-weight: bold;">KSh. XXXX/- </span>VAT Inclusive which is deemed fair and reasonable to restore the vehicle back to its pre-accident condition. this is 6.4% of the pre-accident value.</textarea>
                </div><br>
				
				<p style="padding-left:10px; color:red;"> Remarks</p>
			    <div class="form-label-group">
				<textarea style="width:690px;" class="form-control" rows="10" cols="60" name="remarks" id="remarks">
				<ol><li><span style="font-weight: bold;">Replace:</span></li><li><span style="font-weight: bold;">Repair:</span></li><li><span style="font-weight: bold;">Paint:</span></li><li><span style="font-weight: bold;">Pre-accident condition and defects noted:</span></li><li><span style="font-weight: bold;">Parts Source: </span>Open market or Dealer</li><li><span style="font-weight: bold;">Mode of delivery: </span>Towed/Driven<br></li></ol></textarea>                
                </div><br>	
				
				
				<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="instructionsby" name="instructionsby" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="instructionsby">Instructions By</label>
                </div>
              </div><br>
			  	<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="instructionsdate" name="instructionsdate" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="instructionsdate">Date of Instructions</label>
                </div>
              </div><br>
			  <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="assessmentdate1" name="assessmentdate1" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="assessmentdate1">Date of Assessment</label>
                </div>
              </div>
			
          </div>
		  
		   <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
		  	<div class="form-group">
            <div class="form-row">
			  <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="repairer" name="repairer" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="repairer">Repairer </label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="duration" name="duration" class="form-control" placeholder="Duration" autofocus="autofocus" required>
                  <label for="duration">Repair Duration</label>
                </div>
              </div>

              <div class="col-md-4" hidden>
                <div class="form-label-group">
                  <input type="text" id="survey" name="survey" class="form-control" placeholder="Steering">
                  <label for="survey">Survey carried out at</label>
                </div>
              </div>			  
            </div>
          </div>
		  
		  	<div class="form-group">
            <div class="form-row">
			<div class="col-md-3" hidden>
                <div class="form-label-group">
                  <input type="text" id="modeofdelivery" name="modeofdelivery" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="modeofdelivery">Mode of Delivery</label>
                </div>
              </div>
			<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="contactperson" name="contactperson" class="form-control" placeholder="Duration" autofocus="autofocus" required>
                  <label for="contactperson">Contact Person</label>
                </div>
            </div>
			<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="assessorsname" name="assessorsname" class="form-control" value="F. Mwaniki" placeholder="Duration" autofocus="autofocus" readonly required>
                  <label for="assessorsname">Assessor's Name</label>
                </div>
            </div>		
			</div>
			</div>
			
			<div hidden class="form-group">
			<p style="padding:7px; color:red;">Garage competency to carry out repairs</p>
            <div class="form-row">

			<div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="garagecompetency" name="garagecompetency" class="form-control" placeholder="Duration" autofocus="autofocus">
                  <label for="garagecompetency">Competent:</label>
                </div>
            </div>
			
			<div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="garageincompetency" name="garageincompetency" class="form-control" placeholder="Duration" autofocus="autofocus">
                  <label for="garageincompetency">Incompetent:</label>
                </div>
            </div>
			</div></div></div>
			              
		   <div hidden class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="four-tab">
           <div class="form-group">
            <div class="form-row">		


			
			<div class="col-md-5">

                <div class="form-label-group">
<?php 
$email=$_SESSION['alogin'];
$sql ="SELECT Branch FROM Users WHERE UserName=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{
$x=($result->Branch);
$sql ="SELECT FeeNoteNo FROM assessments WHERE Branch=$x ORDER BY id DESC LIMIT 1";
$query= $dbh -> prepare($sql);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $data)
	{
    
$namba1=($data->FeeNoteNo);
$namba2=1;
$namba3=$namba1+$namba2;
 }}
 }}?>				
                  <input type="text" id="feenoteno" name="feenoteno" onBlur="checkAvailability()" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="feenoteno">Fee Note Number_<?php echo $namba3; ?></label>
				  <span id="user-availability-status" style="font-size:12px; padding-left:10px;"></span>
                </div>
            </div>
			<div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="branch" name="branch" class="form-control" value="<?php 
$email=$_SESSION['alogin'];
$sql ="SELECT Branch FROM Users WHERE UserName=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{
	 echo htmlentities($result->Branch); }}?>" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="branch">Branch</label>
                </div>
            </div>
			
			
			
			<div  hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="branchcode" name="branchcode" class="form-control" value="<?php $branchcode=($result->Branch);?>
<?php if($branchcode==1){
echo "NO.";} elseif($branchcode==2) { echo "NO.M."; } elseif($branchcode==3) { echo "NO.E."; } elseif($branchcode==4) { echo "NO.K."; } else{ echo "N/A";
}?>" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="branchcode">Branch Code</label>
                </div>
            </div>			
						
			<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="vatdesc" name="vatdesc" value="VAT" class="form-control" placeholder="Last name">
                  <label for="vatdesc">VAT Description</label>
                </div>
            </div>
			<div style="width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate();" id="vat" name="vat">
			<option value="0.16">16% VAT</option>
			<option value="0.14">14% VAT</option>
            <option value="0">0% VAT</option>			
			</select>
            </div>
			</div></div>
			
           <div class="form-group">
            <div class="form-row">
				<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="fee" name="fee" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="fee">Service fee</label>
                </div>
              </div>
		      <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="mileagedesc" name="mileagedesc" value="Mileage" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileagedesc">Mileage Description(KM)</label>
                </div>
			  </div>			  
		      <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="feenotemileage" name="feenotemileage" oninput="calculate();" class="form-control" placeholder="feenotemileage" autofocus="autofocus">
                  <label for="feenotemileage">Mileage Covered(Ksh)</label>
                </div>
			  </div></div></div>
			<div class="form-group">
            <div class="form-row">
			<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photograph" name="photograph" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="photograph">Photograph</label>
                </div>
              </div>
            </div></div>

            

           <div class="form-group">
            <div class="form-row">
			   <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="subtotal" name="feenotesubtotal" oninput="calculate();" class="form-control" placeholder="Last name">
                  <label for="subtotal">Sub Total</label>
                </div>
              </div>
		  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="feenotevat" name="feenotevat" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="feenotevat">VAT</label>
                </div>
              </div>

            </div>
            </div>

           <div class="form-group">
            <div class="form-row">
			 <div hidden class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="pstatus" name="pstatus" value="Not Paid" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="pstatus">Pstatus</label>
                </div>
              </div> 
			<div class="col-md-7">
                <div class="form-label-group">
                  <input type="text" id="feenotetotal" name="feenotetotal" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="feenotetotal">Fee Note Total</label>
                </div>
            </div>
            </div>
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

			
		   </form>		   
          </div>
        </div>
        </div>
</div>
</div>
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

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  <script src="js/active.js"></script>
  
<script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:"dd-mm-yy"});
  } );
</script>


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

<script>
$(function () {
    var select = $('select.select');
    select.change(function () {
        select.not(this).val(this.value);
    });
});
</script>


</body>

</html>
<?php } ?>

<!-- This software belongs to Evans Mutai Mwendwa 0792019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
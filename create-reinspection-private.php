<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:create-reinspection');
}
else{ 

if(isset($_POST['submit']))
  {
$customer=$_POST['customer'];
$ref=$_POST['ref'];
$date=$_POST['date'];
$instructionsby=$_POST['instructionsby'];
$suminsured=$_POST['suminsured'];
$excess=$_POST['excess'];
$enginetype=$_POST['enginetype'];
$scrapweight=$_POST['scrapweight'];
$policyno=$_POST['policyno'];
$claimno=$_POST['claimno'];
$insured=$_POST['insured'];
$chasisno=$_POST['chasisno'];
$currentmileage=$_POST['currentmileage'];
$registrationno=$_POST['registrationno'];
$year=$_POST['year'];
$color=$_POST['color'];
$vehicletype=$_POST['vehicletype'];
$make=$_POST['make'];
$model=$_POST['model'];
$repairer=$_POST['repairer'];
$preparedby=$_POST['preparedby'];
$feenoterefno=$_POST['feenoterefno'];
$feenotefee=$_POST['feenotefee'];
$addmileage=$_POST['addmileage'];
$mileagedesc=$_POST['mileagedesc'];
$photograph=$_POST['photograph'];
$vat=$_POST['vat'];
$feenotesubtotal=$_POST['feenotesubtotal'];
$feenotetotal=$_POST['feenotetotal'];
$user=$_POST['user'];
$yearr=$_POST['yearr'];
$month=$_POST['month'];
$regdate=$_POST['regdate'];
$vatdesc=$_POST['vatdesc'];
$signature=$_POST['signature'];
$branch=$_POST['branch'];
$branchcode=$_POST['branchcode'];

$sql="INSERT INTO reinspections (Customer,Ref,Date,InstructionsBy,SumInsured,Excess,EngineType,ScrapWeight,PolicyNo,ClaimNo,Insured,ChasisNo,CurrentMileage,RegistrationNo,Year,Color,VehicleType,Make,Model,Repairer,PreparedBy,FeeNoteRefNo,FeeNoteFee,AddMileage,MileageDesc,Photograph,Vat,FeeNoteSubTotal,FeeNoteTotal,User,YEARR,MONTH,RegDate,VatDesc,Signature,Branch,BranchCode) 
VALUES(:customer,:ref,:date,:instructionsby,:suminsured,:excess,:enginetype,:scrapweight,:policyno,:claimno,:insured,:chasisno,:currentmileage,:registrationno,:year,:color,:vehicletype,:make,:model,:repairer,:preparedby,:feenoterefno,:feenotefee,:addmileage,:mileagedesc,:photograph,:vat,:feenotesubtotal,:feenotetotal,:user,:yearr,:month,:regdate,:vatdesc,:signature,:branch,:branchcode)";
$query = $dbh->prepare($sql);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':ref',$ref,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':instructionsby',$instructionsby,PDO::PARAM_STR);
$query->bindParam(':suminsured',$suminsured,PDO::PARAM_STR);
$query->bindParam(':excess',$excess,PDO::PARAM_STR);
$query->bindParam(':enginetype',$enginetype,PDO::PARAM_STR);
$query->bindParam(':scrapweight',$scrapweight,PDO::PARAM_STR);
$query->bindParam(':policyno',$policyno,PDO::PARAM_STR);
$query->bindParam(':claimno',$claimno,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':chasisno',$chasisno,PDO::PARAM_STR);
$query->bindParam(':currentmileage',$currentmileage,PDO::PARAM_STR);
$query->bindParam(':registrationno',$registrationno,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':color',$color,PDO::PARAM_STR);
$query->bindParam(':vehicletype',$vehicletype,PDO::PARAM_STR);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':model',$model,PDO::PARAM_STR);
$query->bindParam(':repairer',$repairer,PDO::PARAM_STR);
$query->bindParam(':preparedby',$preparedby,PDO::PARAM_STR);
$query->bindParam(':feenoterefno',$feenoterefno,PDO::PARAM_STR);
$query->bindParam(':feenotefee',$feenotefee,PDO::PARAM_STR);
$query->bindParam(':addmileage',$addmileage,PDO::PARAM_STR);
$query->bindParam(':mileagedesc',$mileagedesc,PDO::PARAM_STR);
$query->bindParam(':photograph',$photograph,PDO::PARAM_STR);
$query->bindParam(':vat',$vat,PDO::PARAM_STR);
$query->bindParam(':feenotesubtotal',$feenotesubtotal,PDO::PARAM_STR);
$query->bindParam(':feenotetotal',$feenotetotal,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':yearr',$yearr,PDO::PARAM_STR);
$query->bindParam(':month',$month,PDO::PARAM_STR);
$query->bindParam(':regdate',$regdate,PDO::PARAM_STR);
$query->bindParam(':vatdesc',$vatdesc,PDO::PARAM_STR);
$query->bindParam(':signature',$signature,PDO::PARAM_STR);
$query->bindParam(':branch',$branch,PDO::PARAM_STR);
$query->bindParam(':branchcode',$branchcode,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Report posted successfully";
header("refresh:3;re-inspections"); // redirects image view page after 5 seconds.
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
url: "check_availability.php",
data:'feenoterefno='+$("#feenoterefno").val(),
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
                  <input type="text" id="datepicker" name="date" class="form-control" placeholder="Select date" readonly required>
              </div>
<?php $sql = "SELECT Ref from reinspections order by id Desc Limit 1";
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
		  <h5 style="color:green; padding:10px;"><strong>Create Re-Inspection Report</strong></h5>
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
                  <input type="text" id="suminsured" name="suminsured" class="form-control" value="KSh. " placeholder="First name" autofocus="autofocus" required>
                  <label for="suminsured">Sum Insured</label>
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
                  <input type="text" id="claimno" name="claimno" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="claimno">Claim No.</label>
                </div>
				
              </div>

			  <div hidden style="padding-top:10px;" class="form-label-group">
		    <select class="form-control" name="address" id="address">
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

    <div style="margin-bottom:8px;" class="col-8">
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
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="true">Garage Details</a>
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
				<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="vehicletype" name="vehicletype" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="vehicletype">Vehicle Type</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="make" name="make" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="make">Make</label>
                </div>
              </div>
			  <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="model" name="model" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="model">Model</label>
                </div>
              </div>
			  

			</div></div>
					    <div class="form-group">
            <div class="form-row">
			<div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="chasisno" name="chasisno" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="chasisno">Chassis No</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="currentmileage" name="currentmileage" class="form-control" placeholder="Last name" required>
                  <label for="currentmileage">Current Mileage</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="registrationno" name="registrationno" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="registrationno">Reg. No</label>
                </div>
              </div>

            </div>
            </div>
		    <div class="form-group">
            <div class="form-row">
			 <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="year" name="year" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="year">Year of Manufacture</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="color" name="color" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="color">Colour</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="enginetype" name="enginetype" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="enginetype">Engine Type</label>
                </div>
              </div>
<?php
$month = date("yy-m-d");
?>
				  <input style="width:100px;" type="text" id="regdate" name="regdate" value="<?php echo $month;?>" hidden>

            </div>
          </div>
		</div>
		<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
			  
			<div style="padding:9px;" class="form-label-group"><p style="color:red;">Remarks</p>
            <textarea style="width:690px;" class="form-control" rows="2" cols="90" id="remarks" name="remarks">This is to certify that the above mentioned vehicle has been satisfactorily repaired as per the instructions.
Kindly therefore settle the garage’s invoice amounting to <strong>Ksh XXXX</strong></textarea>
            </div>
			<div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="preparedby" name="preparedby" class="form-control" value="F. Mwaniki" placeholder="Last name" readonly required>
                  <label for="preparedby">Assessor</label>
                </div>
            </div><br>
			<div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="instructionsby" name="instructionsby" class="form-control" placeholder="Last name" required>
                  <label for="instructionsby">Instructions by</label>
                </div>
            </div>
		
		</div>
          <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">



			
			<div class="form-group">
            <div class="form-row">
			  <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="repairer" name="repairer" class="form-control" placeholder="Last name" required>
                  <label for="repairer">Repairer Name</label>
                </div>
              </div>
			  
			  <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="scrapweight" name="scrapweight" class="form-control" placeholder="Last name">
                  <label for="scrapweight">Scrap Weight</label>
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
			
			
			<br><br><br><br><br>	
            </div>
              
		<div class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="four-tab">

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
$sql ="SELECT FeeNoteRefNo FROM reinspections WHERE Branch=$x ORDER BY id DESC LIMIT 1";
$query= $dbh -> prepare($sql);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $data)
	{
    
$namba1=($data->FeeNoteRefNo);
$namba2=1;
$namba3=$namba1+$namba2;
 }}
 }}?>				
                  <input type="text" id="feenoterefno" name="feenoterefno" onBlur="checkAvailability()" value="" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="feenoterefno">Fee Note Number_<?php echo $namba3; ?></label>
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

			
			<div style="width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate();" id="vatt" name="vatt">
			<option value="0.16">16% VAT</option>
			<option value="0.14">14% VAT</option>
            <option value="0">0% VAT</option>			
			</select>
            </div>
			<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="vatdesc" name="vatdesc" value="VAT" class="form-control" placeholder="Last name">
                  <label for="vatdesc">VAT Description</label>
                </div>
            </div>
			</div></div>

           <div class="form-group">
            <div class="form-row">
				<div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="feenotefee" name="feenotefee" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="feenotefee">Service fee</label>
                </div>
              </div>
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="mileagedesc" name="mileagedesc" value="Mileage" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileagedesc">Mileage Description(KM)</label>
                </div>
			  </div>			  
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="addmileage" name="addmileage" oninput="calculate();" class="form-control" placeholder="feenotemileage" autofocus="autofocus">
                  <label for="addmileage">Mileage Covered(Ksh)</label>
                </div>
			  </div>

			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photograph" name="photograph" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="photograph">Photograph</label>
                </div>
              </div>
            </div></div>

           <div class="form-group">
            <div class="form-row">
			   <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="subtotal" name="feenotesubtotal" oninput="calculate();" class="form-control" placeholder="Last name">
                  <label for="subtotal">Sub Total</label>
                </div>
              </div>
			  
			  <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="vat" name="vat" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="vat">VAT</label>
                </div>
              </div>

            </div>
            </div>

           <div class="form-group">
            <div class="form-row">
			  
			<div class="col-md-6">
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
    function calculate() {
        var myBox1 = document.getElementById('addmileage').value; 
        var myBox2 = document.getElementById('feenotefee').value;		
		var myBox3 = document.getElementById('photograph').value;
        var results = document.getElementById('subtotal'); 
        var myResult = Number(myBox1) + Number(myBox2) + Number(myBox3);
          document.getElementById('subtotal').value = myResult;
        var myBox4 = document.getElementById('feenotefee').value; 
        var myBox5 = document.getElementById('vatt').value;
        var results = document.getElementById('vat'); 
        var myResult = myBox5 * myBox4;
          document.getElementById('vat').value = myResult;
		var myBox6 = document.getElementById('vat').value;
        var myResult = Number(myBox6) + Number(myBox4) + Number(myBox1) + Number(myBox3);		
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
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat:"dd-mm-yy"});
  } );
</script>

</body>

</html>
<?php } ?>
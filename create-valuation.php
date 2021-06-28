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
$yourref=$_POST['yourref'];
$ourref=$_POST['ourref'];
$insurer=$_POST['insurer'];
$valuationdate=$_POST['valuationdate'];
$placeofinspection=$_POST['placeofinspection'];
$insured=$_POST['insured'];
$phoneno=$_POST['phoneno'];
$make=$_POST['make'];
$type=$_POST['type'];
$regno=$_POST['regno'];
$dateoffirstregistration=$_POST['dateoffirstregistration'];
$odometer=$_POST['odometer'];
$year=$_POST['year'];
$coachwork=$_POST['coachwork'];
$chasisno=$_POST['chasisno'];
$engineno=$_POST['engineno'];
$color=$_POST['color'];
$mechanical=$_POST['mechanical'];
$tyre=$_POST['tyre'];
$brakes=$_POST['brakes'];
$steering=$_POST['steering'];
$extras=$_POST['extras'];
$valuationvalue=$_POST['valuationvalue'];
$remarks=$_POST['remarks'];
$user=$_POST['user'];
$feenotemileage=$_POST['feenotemileage'];
$mileagedesc=$_POST['mileagedesc'];
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

$sql="INSERT INTO valuations(YourRef,OurRef,Insurer,ValuationDate,PlaceOfInspection,Insured,PhoneNo,Make,Type,RegNo,DateOfFirstRegistration,Odometer,Year,CoachWork,ChasisNo,EngineNo,Color,Mechanical,Tyre,Brakes,Steering,Extras,ValuationValue,Remarks,User,FeeNoteMileage,MileageDesc,Photograph,FeeNoteNo,Fee,FeeNoteVat,FeeNoteSubTotal,FeeNoteTotal,YEARR,MONTH,RegDate,VatDesc,Signature,Branch,BranchCode) 
VALUES(:yourref,:ourref,:insurer,:valuationdate,:placeofinspection,:insured,:phoneno,:make,:type,:regno,:dateoffirstregistration,:odometer,:year,:coachwork,:chasisno,:engineno,:color,:mechanical,:tyre,:brakes,:steering,:extras,:valuationvalue,:remarks,:user,:feenotemileage,:mileagedesc,:photograph,:feenoteno,:fee,:feenotevat,:feenotesubtotal,:feenotetotal,:yearr,:month,:regdate,:vatdesc,:signature,:branch,:branchcode)";
$query = $dbh->prepare($sql);
$query->bindParam(':yourref',$yourref,PDO::PARAM_STR);
$query->bindParam(':ourref',$ourref,PDO::PARAM_STR);
$query->bindParam(':insurer',$insurer,PDO::PARAM_STR);
$query->bindParam(':valuationdate',$valuationdate,PDO::PARAM_STR);
$query->bindParam(':placeofinspection',$placeofinspection,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':phoneno',$phoneno,PDO::PARAM_STR);
$query->bindParam(':make',$make,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':regno',$regno,PDO::PARAM_STR);
$query->bindParam(':dateoffirstregistration',$dateoffirstregistration,PDO::PARAM_STR);
$query->bindParam(':odometer',$odometer,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':coachwork',$coachwork,PDO::PARAM_STR);
$query->bindParam(':chasisno',$chasisno,PDO::PARAM_STR);
$query->bindParam(':engineno',$engineno,PDO::PARAM_STR);
$query->bindParam(':color',$color,PDO::PARAM_STR);
$query->bindParam(':mechanical',$mechanical,PDO::PARAM_STR);
$query->bindParam(':tyre',$tyre,PDO::PARAM_STR);
$query->bindParam(':brakes',$brakes,PDO::PARAM_STR);
$query->bindParam(':steering',$steering,PDO::PARAM_STR);
$query->bindParam(':extras',$extras,PDO::PARAM_STR);
$query->bindParam(':valuationvalue',$valuationvalue,PDO::PARAM_STR);
$query->bindParam(':remarks',$remarks,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':feenotemileage',$feenotemileage,PDO::PARAM_STR);
$query->bindParam(':mileagedesc',$mileagedesc,PDO::PARAM_STR);
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
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Report posted successfully";
header("refresh:3;valuations"); // redirects image view page after 5 seconds.
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

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check-avvailability.php",
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
              <div class="col-md-2">
			  
				      <select class="form-control" name="insurer" id="insurer" required>

				      	<option disabled selected style="display: none;"value="">Insurance Co.</option>
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
                  <input type="text" id="datepicker" name="valuationdate" class="form-control" placeholder="Select date" readonly required>
              </div>
<?php $sql = "SELECT OurRef from valuations order by id Desc Limit 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{ }} 
?>			  
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="ourref" name="ourref" class="form-control" placeholder="ourref" required>
                  <label for="ourref">Our Ref </label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submit" id="submit"  ><i class="fas fa-fw fa-folder"> </i> Save</button>
			  <button class="btn btn-primary btn-sm" type="reset" style="margin-right:10px;" ><i class="fa fa-bolt"> </i> Reset</button>
			  <a style="padding:10px;" class="btn btn-danger" href="javascript:history.back()"><<-Back</a>
            </div>
          </div>
		<h5 style="color:green; padding:10px;"><strong>Create Valuation Report</strong></h5>
		  <hr>
    <div class="form-row">
              <div style="background-color:#f2f2f2;" class="col-md-3"><p style="margin-top:10px; color:red;">Insurance Details</p>

			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="yourref" name="yourref" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="yourref">Your Ref</label>
                </div>
				
              </div>
			  	<div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="insured" name="insured" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="insured">Insured</label>
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
			<li hidden class="nav-item">
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="true">Fee Note</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
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
			<?php
$month = date("yy-m-d");
?>
				  <input style="width:100px;" type="text" id="regdate" name="regdate" value="<?php echo $month;?>" hidden>

              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="make" name="make" class="form-control" placeholder="Last name" required>
                  <label for="make">Make</label>
                </div>
              </div>
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="type" name="type" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="type">Type</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="regno" name="regno" class="form-control" placeholder="Last name" required>
                  <label for="regno">Registration No.</label>
                </div>
              </div>
            </div>
          </div>
		  
		  	<div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="dateoffirstregistration" name="dateoffirstregistration" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="dateoffirstregistration">Date of first registration</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="odometer" name="odometer" class="form-control" placeholder="Last name" required>
                  <label for="odometer">Odometer reading</label>
                </div>
              </div>
			   <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="year" name="year" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="year">Year of manufacture</label>
                </div>
              </div>

            </div>
          </div>
		  
		  		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="chasisno" name="chasisno" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="chasisno">Chassis No.</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="engineno" name="engineno" class="form-control" placeholder="Last name" required>
                  <label for="engineno">Engine No.</label>
                </div>
              </div>
			   <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="color" name="color" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="color">Colour</label>
                </div>
              </div>
            </div>
          </div>
		  
		  	<div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="tyre" name="tyre" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="tyre">Tyre</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="brakes" name="brakes" class="form-control" placeholder="Last name" required>
                  <label for="brakes">Brakes</label>
                </div>
              </div>
			   <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="steering" name="steering" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="steering">Steering</label>
                </div>
              </div>
            </div>
          </div>
		  	<div class="form-group">
            <div class="form-row">
			<div class="col-md-4">
               <div class="form-label-group">
                  <input type="text" id="mechanical" name="mechanical" class="form-control" placeholder="Last name" required>
                  <label for="mechanical">Mechanical</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="coachwork" name="coachwork" class="form-control" placeholder="Last name" required>
                  <label for="coachwork">Coach work</label>
                </div>
              </div>
			</div></div>
		</div>
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
		  
		  	<div class="form-group">
            <div class="form-row">
			    <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="placeofinspection" name="placeofinspection" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="placeofinspection">Place of inspection</label>
                </div>
              </div>
			    <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="phoneno" name="phoneno" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="phoneno">Phone No.</label>
                </div>
              </div>
	
            </div>
          </div>
		  	<div style="padding-bottom:10px;"><p style="color:red;">Extras</p>
            <textarea class="form-control" rows="1" cols="50" name="extras" id="assessedvalue"></textarea>
            </div>
			<div style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">General Condition/Remarks</p>
            <textarea class="form-control" rows="2" cols="50" name="remarks" id="remarks">Good and serviceable </textarea>
            </div>
            <div style="padding-bottom:10px;"><p style="color:red;">Valuation Value</p>
            <textarea class="form-control" rows="1" cols="50" name="valuationvalue" id="valuationvalue">Ksh. (Amount in words XXXX) </textarea>
            </div>

        </div>	

		<div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
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
$sql ="SELECT FeeNoteNo FROM valuations WHERE Branch=$x ORDER BY id DESC LIMIT 1";
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
                  <input type="text" id="feenoteno" name="feenoteno" onBlur="checkAvailability()" value="" class="form-control" placeholder="First name" autofocus="autofocus">
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

			<div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="branchcode" name="branchcode" class="form-control" value="<?php $branchcode=($result->Branch);?>
<?php if($branchcode==1){
echo "NO.";} elseif($branchcode==2) { echo "NO.M."; } elseif($branchcode==3) { echo "NO.E."; } elseif($branchcode==4) { echo "NO.K."; } else{ echo "N/A";
}?>" placeholder="First name" autofocus="autofocus" readonly>
                  <label for="branchcode">Branch Code</label>
                </div>
            </div>
			
			<div hidden style="width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate();" id="vat" name="vat">
			<option value="0.16">16% VAT</option>
			<option value="0.14">14% VAT</option>	
            <option value="0">0% VAT</option>			
			</select>
            </div>
			<div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="vatdesc" name="vatdesc" value="VAT" class="form-control" placeholder="Last name">
                  <label for="vatdesc">VAT Description</label>
                </div>
            </div>			
            </div></div>			
           <div hidden class="form-group">
            <div class="form-row">
				<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="fee" name="fee" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="fee">Service fee</label>
                </div>
              </div>
		      <div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="mileagedesc" name="mileagedesc" value="Mileage" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileagedesc">Mileage Description(KM)</label>
                </div>
			  </div>			  
		      <div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="feenotemileage" name="feenotemileage" oninput="calculate();" class="form-control" placeholder="feenotemileage" autofocus="autofocus">
                  <label for="feenotemileage">Mileage Covered (Ksh)</label>
                </div>
			  </div>

			  <div hidden class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="photograph" name="photograph" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="photograph">Photograph</label>
                </div>
              </div>
            </div></div>

           <div hidden class="form-group">
            <div class="form-row">
			   <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="subtotal" name="feenotesubtotal" oninput="calculate();" class="form-control" placeholder="Last name">
                  <label for="subtotal">Sub Total</label>
                </div>
              </div>
			  
			  <div hidden class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="feenotevat" name="feenotevat" oninput="calculate();" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="feenotevat">VAT</label>
                </div>
              </div>

            </div>
            </div>

           <div hidden class="form-group">
            <div class="form-row">
			  
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
	 
		</div></form>
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
        var myBox4 = document.getElementById('fee').value; 
        var myBox5 = document.getElementById('vat').value;
        var results = document.getElementById('feenotevat'); 
        var myResult = myBox5 * myBox4;
          document.getElementById('feenotevat').value = myResult;
		var myBox6 = document.getElementById('feenotevat').value;
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

</body>

</html>
<?php } ?>
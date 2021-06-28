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
$feenoteno=$_POST['feenoteno'];
$fee=$_POST['fee'];
$photograph=$_POST['photograph'];
$feenotevat=$_POST['feenotevat'];
$feenotesubtotal=$_POST['feenotesubtotal'];
$feenotetotal=$_POST['feenotetotal'];
$vatdesc=$_POST['vatdesc'];
$id=intval($_GET['id']);

$sql="UPDATE valuations set YourRef=:yourref,OurRef=:ourref,Insurer=:insurer,ValuationDate=:valuationdate,
PlaceOfInspection=:placeofinspection,Insured=:insured,PhoneNo=:phoneno,Make=:make,Type=:type,RegNo=:regno,DateOfFirstRegistration=:dateoffirstregistration,
Odometer=:odometer,Year=:year,CoachWork=:coachwork,ChasisNo=:chasisno,EngineNo=:engineno,Color=:color,Mechanical=:mechanical,Tyre=:tyre,
Brakes=:brakes,Steering=:steering,Extras=:extras,ValuationValue=:valuationvalue,Remarks=:remarks,User=:user, 
FeeNoteMileage=:feenotemileage,MileageDesc=:mileagedesc,FeeNoteNo=:feenoteno,Fee=:fee,Photograph=:photograph,FeeNoteVat=:feenotevat,FeeNoteSubTotal=:feenotesubtotal,FeeNoteTotal=:feenotetotal,VatDesc=:vatdesc where id=:id";

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
$query->bindParam(':feenoteno',$feenoteno,PDO::PARAM_STR);
$query->bindParam(':fee',$fee,PDO::PARAM_STR);
$query->bindParam(':photograph',$photograph,PDO::PARAM_STR);
$query->bindParam(':feenotevat',$feenotevat,PDO::PARAM_STR);
$query->bindParam(':feenotesubtotal',$feenotesubtotal,PDO::PARAM_STR);
$query->bindParam(':feenotetotal',$feenotetotal,PDO::PARAM_STR);
$query->bindParam(':vatdesc',$vatdesc,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();
$msg="Report updated successfully";
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

$sql="UPDATE valuations set Fstatus=:fstatus where id=:id";

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
YEARR=:yearr,MONTH=:month where ReportId=:id AND ReportType=:valuation";

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
$msg="Feenote updated successfully";
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

</head>

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

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from valuations where id=:id";
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
			  <select class="form-control" name="insurer" id="insurer" required>

				      	<option selected style="display: none;" value="<?php echo htmlentities($result->Insurer);?>"><?php echo htmlentities($result->Insurer);?></option>
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
                  <input type="text" id="firstName" name="user" class="form-control" value="<?php echo htmlentities($result->User);?>" autofocus="autofocus" readonly>
                  <label for="firstName">Report Created By</label>
                </div>
				</div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="date" name="valuationdate" class="form-control" value="<?php echo htmlentities($result->ValuationDate);?>">
                  <label for="date">Assessment Date</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="ourref" name="ourref" class="form-control" value="<?php echo htmlentities($result->OurRef);?>">
                  <label for="ourref">Serial No:</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submit" id="submit"  ><i class="fas fa-fw fa-folder"> </i> Update</button>
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
			  
			  <a style="padding:10px;" class="btn btn-danger" href="valuations-admin"><<-Back</a>
			  
<?php } else{ ?> 			  
 
             <a style="padding:10px;" class="btn btn-danger" href="valuations"><<-Back</a>
			  
<?php } ?>
            </div>
          </div>
		<h5 style="color:green; padding:10px;"><strong>Edit Valuation Report</strong></h5>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from valuations where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
		  <hr>
              <div class="form-row">

    <div style="margin-bottom:10px;" class="col-11">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Report Details</a>
            </li>
			<li 
			<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from valuations where id=:id";
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
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="true">Add Fee Note</a>
            </li>
			<li 
			<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from valuations where id=:id";
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
                  <input type="text" id="yourref" name="yourref" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->YourRef);?>"required>
                  <label for="yourref">Your Ref</label>
                </div>
              </div>
			    <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="placeofinspection" name="placeofinspection" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->PlaceOfInspection);?>" required>
                  <label for="placeofinspection">Place of inspection</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="insured" name="insured" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->Insured);?>"required>
                  <label for="insured">Insured</label>
                </div>
              </div>
            </div>
          </div>
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="phoneno" name="phoneno" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->PhoneNo);?>" required>
                  <label for="phoneno">Phone No.</label>
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
                  <input type="text" id="type" name="type" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Type);?>" required>
                  <label for="type">Type</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="regno" name="regno" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->RegNo);?>" required>
                  <label for="regno">Registration No.</label>
                </div>
              </div>
            </div>
          </div>
		  
		  	<div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="dateoffirstregistration" name="dateoffirstregistration" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->DateOfFirstRegistration);?>" required>
                  <label for="dateoffirstregistration">Date of first registration</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="odometer" name="odometer" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->Odometer);?>" required>
                  <label for="odometer">Odometer reading</label>
                </div>
              </div>
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="year" name="year" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Year);?>" required>
                  <label for="year">Year of manufacture</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="coachwork" name="coachwork" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->CoachWork);?>" required>
                  <label for="coachwork">Coach work</label>
                </div>
              </div>
            </div>
          </div>
		  
		  		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="chasisno" name="chasisno" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->ChasisNo);?>" required>
                  <label for="chasisno">Chassis No.</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="engineno" name="engineno" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->EngineNo);?>" required>
                  <label for="engineno">Engine No.</label>
                </div>
              </div>
			   <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="color" name="color" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Color);?>" required>
                  <label for="color">Colour</label>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="mechanical" name="mechanical" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->Mechanical);?>" required>
                  <label for="mechanical">Mechanical</label>
                </div>
              </div>
            </div>
          </div>
		  
		  		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="tyre" name="tyre" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Tyre);?>" required>
                  <label for="tyre">Tyre</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="brakes" name="brakes" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->Brakes);?>" required>
                  <label for="brakes">Brakes</label>
                </div>
              </div>
			   <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="steering" name="steering" class="form-control" placeholder="First name" autofocus="autofocus" value="<?php echo htmlentities($result->Steering);?>" required>
                  <label for="steering">Steering</label>
                </div>
              </div>
            </div>
          </div>
		  
		    <div style="padding-bottom:10px;"><p style="color:red;">Extras</p>
            <textarea class="form-control" rows="1" cols="50" name="extras" id="assessedvalue"><?php echo htmlentities($result->Extras);?></textarea>
            </div>
			<div style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">General Condition/Remarks</p>
            <textarea class="form-control" rows="2" cols="50" name="remarks" id="remarks"><?php echo htmlentities($result->Remarks);?></textarea>
            </div>
            <div style="padding-bottom:10px;"><p style="color:red;">Valuation Value</p>
            <textarea class="form-control" rows="1" cols="50" name="valuationvalue" id="valuationvalue"><?php echo htmlentities($result->ValuationValue);?></textarea>
            </div>			
            </div></form>	





<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
		   <form method="post" onSubmit="return valid();">
		   <div class="form-group">
            <div class="form-row">
			<div class="col-md-3">

                <div class="form-label-group">
			<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from valuations where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>					
                  <input type="text" id="feenoteno" name="feenoteno" value="<?php echo htmlentities($result->OurRef);?>" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="feenoteno">Fee Note Number</label>
				  <span id="user-availability-status" style="font-size:12px; padding-left:10px;"></span>
                </div>
            </div> <?php }} ?>
	
			<div style="width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate();" id="vat" name="vat">
			<option value="0.14">14% VAT</option>
			<option value="0.16">16% VAT</option>			
            <option value="0">0% VAT</option>			
			</select>
            </div>
			<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="vatdesc" name="vatdesc" class="form-control" placeholder="Last name" value="14% VAT" required>
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
                  <label for="feenotemileage">Mileage Total(Ksh)</label>
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
$sql ="SELECT * from valuations where id=:id";
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
<input hidden type="text" id="reporttype" name="reporttype" value="valuation" class="form-control" readonly>	
<input hidden type="text" id="pstatus" name="pstatus" value="1" class="form-control" readonly>
<input hidden type="text" id="fstatus" name="fstatus" value="1" class="form-control" readonly>	
			
            </div>
			<button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" id="submit2" name="submitfeenote2"  ><i class="fas fa-fw fa-folder"> </i> Save</button>
            </form>
</div>


<div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from valuations where id=:id";
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
			<div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="feenoteno" name="feenoteno" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->OurRef);?>" autofocus="autofocus" >
                  <label for="feenoteno">Fee Note No.</label>
                </div>
</div><?php }}?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from feenotes where ReportType='valuation' AND ReportId=:id";
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
			<div class="col-md-2">
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
                  <label for="mileageqty2">QTY</label>
                </div>
			  </div>
		      <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="mileagedesc" name="mileagedesc" value="Mileage" class="form-control" placeholder="mileagedesc" autofocus="autofocus">
                  <label for="mileagedesc">Mileage Description</label>
                </div>
			  </div>			  
		      <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="feenotemileageunit2" name="feenotemileageunit" oninput="calculate3();" class="form-control" placeholder="feenotemileage" value="<?php echo htmlentities($result->FeeNoteMileageunit);?>" autofocus="autofocus">
                  <label for="feenotemileageunit2">Unit Cost(Ksh)</label>
                </div>
			  </div>
			  <div class="col-md-2">
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
			  
              
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="photographunit2" name="photographunit" oninput="calculate4();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Photographunit);?>" autofocus="autofocus">
                  <label for="photographunit2">Unit Cost (Ksh)</label>
                </div>
			  </div>
			  
			  
			  <div class="col-md-2">
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
				<div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="fee2" name="fee" oninput="calculate2();" class="form-control" placeholder="First name" value="<?php echo htmlentities($result->Fee);?>" autofocus="autofocus">
                  <label for="fee2">Service fee</label>
                </div>
              </div></div></div>

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
$sql ="SELECT * from valuations where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>			
<input hidden type="text" id="reportdate" name="reportdate" value="<?php echo htmlentities($result->Date);?>" class="form-control" readonly>
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
<input hidden type="text" id="reporttype" name="reporttype" value="valuation" class="form-control" readonly>			
			
			
            </div>
			<button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submitfeenote"  ><i class="fas fa-fw fa-folder"> </i> Update Feenote</button>
			</form>
            </div>
</div>			
        </div>
        </div>
        </div>
</div>
</div>
      <!-- /.container-fluid -->
<?php }} }} }} }}?>
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
<?php } }} }} }}?>
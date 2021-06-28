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
$address=$_POST['address'];
$intro=$_POST['intro'];
$reportdetails=$_POST['reportdetails'];
$insured=$_POST['insured'];
$claimno=$_POST['claimno'];
$user=$_POST['user'];

$sql="INSERT INTO supplementaries (Customer,Ref,Date,Address,Intro,ReportDetails,Insured,ClaimNo,User) 
VALUES(:customer,:ref,:date,:address,:intro,:reportdetails,:insured,:claimno,:user)";
$query = $dbh->prepare($sql);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':ref',$ref,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':intro',$intro,PDO::PARAM_STR);
$query->bindParam(':reportdetails',$reportdetails,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':claimno',$claimno,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Report posted successfully";
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
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-2">
			  
				      <select class="form-control" name="customer" id="customer" required>

				      	<option disabled selected style="display: none;"value="">Select Customer*</option>
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
				
                  <input type="text" id="firstName" name="user" class="form-control" value="<?php 
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
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="ref" name="ref" class="form-control" placeholder="ref" required>
                  <label for="ref">Our Ref:</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submit" id="submit"  ><i class="fas fa-fw fa-folder"> </i> Save</button>
			  <button class="btn btn-primary btn-sm" type="reset" style="margin-right:10px;" ><i class="fa fa-bolt"> </i> Reset</button>
			  <a style="padding:10px;" class="btn btn-danger" href="javascript:history.back()"><<-Back</a>
            </div>
          </div>
		  <h5 style="color:green; padding:10px;">Create Supplementary Report</h5>
		  <hr>
              <div class="form-row">


    <div style="margin-bottom:10px;" class="col-11">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Report Details</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="insured" name="insured" class="form-control" placeholder="First name" autofocus="autofocus" required>
                  <label for="insured">Insured</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="claimno" name="claimno" class="form-control" placeholder="Last name" required>
                  <label for="claimno">Claim No</label>
                </div>
              </div>

            </div>
          </div>
		    <div class="form-group">
            <div class="form-row">
			<div class="col-md-4" style="padding-top:10px;" class="form-label-group">
		    <select class="form-control" name="address" id="address" required>
			<option disabled selected style="display: none;"value="">Select Customer Address*</option>
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
			<option value="<?php echo ($result->Address);?>"><?php echo ($result->Address);?><?php }}?></option>
			</select>
            </div>
            </div>
            </div>
			<div style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">Report Details</p>
            <textarea class="form-control" rows="1" cols="50" name="intro" id="intro">RE: SUPPLEMENTARY REPAIRS ESTIMATE FOR XXXX</textarea>
            </div>
			<div style="padding-bottom:10px;" class="form-label-group"><p style="color:red;">Report Details</p>
            <textarea class="form-control" rows="15" cols="50" name="reportdetails" id="reportdetails">The subject vehicle is undergoing accident repairs at XXXX . After engine removed from the car it was noted that: XXXX . We recommend that the same be replaced to facilitate completion of repairs.
			
			
			
			
Sub total

Add 16% VAT
			
Total Ksh.
			
The initial total cost of repair cost was, Ksh.
			
The revised total cost of repairs now is Ksh (XXXX) = Ksh.XXXX





Kindly Allow the additional costs to allow completion of repairs.</textarea>
            </div>			
            </div>
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

</body>

</html>
<?php } ?>
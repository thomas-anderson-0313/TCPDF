<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login');
}
else{
	?>
	
<?php
//error_reporting(0);
session_start();
include('includes/config.php');
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$mobile=$_POST['mobileno'];
$address=$_POST['address'];
$sql="INSERT INTO customers(Name,EmailId,PhoneNo,Address) VALUES(:fname,:email,:mobile,:address)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Registration successfull";
}
else 
{
$msg="Something went wrong. Please try again";
}
}
?>

<?php
if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from customers  WHERE  Id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Deleted successfully";
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

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'fullname='+$("#fullname").val(),
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

      <?php include('includes/header.php');?>

  <div id="wrapper">

    <!-- Sidebar -->
<?php include('includes/sidenav.php');?>

    <div id="content-wrapper"><br><br>

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Customers - Insurance Company</li>
        </ol>

        <!-- Page Content -->
  <div class="row">		
  <div class="col-md-5">

      <div class="card-header">Add Insurance Co. Details</div>
      <div class="card-body">
        <form  method="post" name="signup" onSubmit="return valid();">
          <div class="form-group">
            <div class="form-row">
              <div style="padding-bottom:10px;" class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="fullname" name="fullname" onBlur="checkAvailability()" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="fullname">Name</label>				  
                </div>
				<span id="user-availability-status" style="font-size:12px; padding-left:10px;"></span>
              </div><br>

              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="mobileno" class="form-control" placeholder="Last name">
                  <label for="lastName">Phone No.</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="emailid" class="form-control" placeholder="Email address">
              <label for="inputEmail">Email Address</label>
            </div>
          </div>
		  	<div style="padding-bottom:10px;" class="form-label-group">
            <textarea class="form-control" rows="6" cols="50" name="address" id="address" placeholder="Customer Address" required></textarea>
            </div>
          
		  <button class="btn btn-primary btn-block" type="submit" value="Sign Up" name="signup" id="submit">Add Now</button>
        </form>


    </div>
    </div>
	
	<div class="col-md-7">
					<!-- Zero Configuration Table -->
				<?php if($error){?><div style="margin-bottom:15px; color:red;"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div style="margin-bottom:15px; color:green;"><?php echo htmlentities($msg); ?> </div><?php }?>
				
								<table id="zctb" class="display table table-striped table-bordered table-hover" height="2%">
									<thead style="color:green;">
										<tr>
										    <th style="width:30px; font-size:14px;">#</th>
											<th style="width:130px; font-size:11px;">Name</th>
											<th style="width:50px; font-size:11px;">Email Address</th>
											<th style="width:30px; font-size:11px;">Phone No.</th>
											<th style="width:100px; font-size:11px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php $sql = "SELECT * from customers ORDER BY id desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td style="font-size:12px;"><?php echo htmlentities($cnt);?></td>
											
											<td style="font-size:12px;"><?php echo htmlentities($result->Name);?></td>
											<td style="font-size:12px;"><?php echo htmlentities($result->EmailId);?></td>
											<td style="font-size:12px;"><?php echo htmlentities($result->PhoneNo);?></td>
											<td style="font-size:12px; color:red;"><a href='add-customer?del=<?php echo htmlentities($result->Id);?>' onclick="return confirm('Do really you want to delete employee?');"><i class="fa fa-edit"> Delete </i></a></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
	</div>
	
	<br><br><br><br><br><br>

      </div></div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
      <?php include('includes/footer.php');?>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
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

</body>

</html>
<?php } ?>
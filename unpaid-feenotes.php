<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE assessments SET PStatus=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Report Successfully Updated";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE assessments SET PStatus=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Report Successfully Updated";
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
  <!-- This software is designed and maintained by Evans Mutai Mwendwa 0792019010 evansomutai@gmail.com -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

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

    <div id="content-wrapper"><br><br>

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Unpaid Fee Notes</li>
        </ol>

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
		
<strong style="margin-left:50px;"><?php										
$Astatus=($result->Status);?>
<?php if($Astatus==1){
?>
        <!-- DataTables Example -->
					<div class="col-md-11">

						<!-- Zero Configuration Table -->

							<?php if($error){?><div style="margin-bottom:15px;"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div><?php } 
				            else if($msg){?><div style="margin-bottom:15px;"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
										    <th style="width:20px;">#</th>
											<th style="width:130px; font-size:14px;">Vehicle Make</th>
											<th style="width:90px; font-size:14px;">Reg NO.</th>
											<th style="width:30px; font-size:14px;">For</th>
											<th style="width:90px; font-size:14px;">View</th>
											<th style="width:30px; font-size:14px;">User</th>
											<th style="width:30px; font-size:14px;">Status</th>
											<th style="width:100px; font-size:14px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

									<?php $sql = "SELECT * from Assessments WHERE PStatus='0' ORDER BY id desc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td style="font-size:14px;"><?php echo htmlentities($cnt);?></td>
											
											<td style="font-size:14px;"><a  href=""><?php echo htmlentities($result->Make);?></td>
											<td style="font-size:14px;"><?php echo htmlentities($result->RegistrationNo);?></td>
											<td style="font-size:14px;"><?php echo htmlentities($result->Customer);?></td>

											<td><a href='assessment-report?rid=<?php echo htmlentities($result->id);?>'>[Pint Report]</a></td>
										    <td style="font-size:14px;"><?php echo htmlentities($result->User);?></td>
											<td><strong class="text-danger"><?php
                                            $vstatus=($result->Status);?>
											<?php if($vstatus==1){
											 echo "Paid";} elseif($vstatus==0) { echo "Unpaid"; }else{ echo "Pending Payment";
											}?></strong></td>
											<td><?php if($result->Status=="" || $result->Status==0)
{
?><a class="btn btn-success btn-sm" href="unpaid-feenotes?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Mark Paid?')"> Mark Paid</a>
<?php } else {?>

<a class="btn btn-danger btn-sm" href="unpaid-feenotes?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Mark Not Paid?')"> Mark Unpaid</a>
</td>
<?php } ?>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div>

<?php } else{ echo "Restricted Page, Kindly contact system admin!";
}?></strong>							

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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
    <script src="assets/js/custom-scripts.js"></script>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>
	<script src="js/active.js"></script>
</body>

</html>
<?php } ?>
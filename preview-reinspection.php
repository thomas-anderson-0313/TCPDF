<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:edit-assessment');
}
else{ 
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
</head>

<body id="page-top">

      <?php include('includes/header.php');?>

  <div id="wrapper">

    <!-- Sidebar -->
<?php include('includes/sidenav.php');?>

    <div id="content-wrapper"><br><br>

<div class="container-fluid">
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Reinspection Report Preview - <?php echo htmlentities($result->RegistrationNo);?></li>
		  <li><a style="margin-left:50px;" class="btn btn-danger" href="javascript:history.back()">Close</a></li>
        </ol>


<div class="row">
<div class="col-md-6">		
	<table class="table table-bordered table-responsive">
	
    <tr>
    	<td><label class="control-label">Registration Number</label></td>
        <td><input class="form-control" type="text" name="text" placeholder="Image Name" value="<?php echo htmlentities($result->RegistrationNo);?>" readonly /></td>
    </tr>
    <tr>
    	<td><label class="control-label">Insurance Co.</label></td>
        <td><input class="form-control" type="text" name="text" placeholder="Image Name" value="<?php echo htmlentities($result->Customer);?>" readonly /></td>
    </tr>
    
    <tr>
    	<td><label class="control-label">Created By</label></td>
        <td><input class="form-control" type="text" name="text" placeholder="Image Name" value="<?php echo htmlentities($result->User);?>" readonly /></td>
    </tr>

    <tr>
    	<td><label class="control-label">Report Link</label><br><button class="btn btn-primary btn-sm">Copy link</button></td>
        <td><textarea rows="3">http://<?php include('includes/ipaddress.php');?>/reinspection-report?rid=<?php echo htmlentities($result->id);?></textarea></td>
    </tr>    
    <tr>
<td><label class="control-label">Action</label></td>
<td><a href="reinspection-report?rid=<?php echo htmlentities($result->id);?>" data-toggle="modal" data-target="#pdfModal<?php echo htmlentities($result->id);?>" ><i class="fa fa-download"> Print/Download </i></a></td>
		
											<div style="padding-top:35px;" class="modal fade" id="pdfModal<?php echo htmlentities($result->id);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">

		                                    <iframe height="540" frameborder="15" src="reinspection-report?rid=<?php echo htmlentities($result->id);?>"></iframe>
											<div style="height:3px; background-color:#4d4d4d; border:2px solid;" class="modal-footer"></div>
                                            </div>
                                            </div>
                                            </div>
    </tr>
    
    </table>		
</div>
<div class="col-md-6">
<iframe height="450" width="350" frameborder="15" src="reinspection-report?rid=<?php echo htmlentities($result->id);?>"></iframe>

<?php $cnt=$cnt+1; }} ?>
		
	
</div></div></div></div>
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

<script>$("button").click(function(){
	$("textarea").select();
	document.execCommand('copy');
});</script>  

</body>

</html>
<?php } ?>
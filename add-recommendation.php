<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:add-recomendation');
}
else{ 

if(isset($_POST['submit']))
  {

$damages=$_POST['damages'];
$recommendation=$_POST['recommendation'];
$reportid=$_POST['reportid'];

$sql="INSERT INTO recommendation (Damages,Recommendation,ReportId) 
VALUES(:damages,:recommendation,:reportid)";
$query = $dbh->prepare($sql);
$query->bindParam(':damages',$damages,PDO::PARAM_STR);
$query->bindParam(':recommendation',$recommendation,PDO::PARAM_STR);
$query->bindParam(':reportid',$reportid,PDO::PARAM_STR);

$query->execute();

$msg="Posted successfully";

}
?>

<?php
if(isset($_POST['recommendationedit']))
  {
$damages=$_POST['damages'];
$recommendation=$_POST['recommendation'];
$id=$_POST['id'];

$sql="UPDATE recommendation set Damages=:damages,Recommendation=:recommendation where id=:id"; 
$query = $dbh->prepare($sql);
$query->bindParam(':damages',$damages,PDO::PARAM_STR);
$query->bindParam(':recommendation',$recommendation,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="List Updated successfully";

}
?>
 
<?php
if(isset($_POST['del']))
	{
$delid=$_POST['id'];
$sql = "delete from recommendation  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Item deleted successfully";
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
  
  <!-- This software is designed and maintained by Evans Mutai Mwendwa 0792019010 evansomutai@gmail.com -->
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet"> 
</head>

<body id="page-top">

<?php include('includes/header.php');?>

  <div id="wrapper">

    <!-- Sidebar -->
<?php include('includes/sidenav.php');?>

    <div id="content-wrapper"><br><br><br>

<div class="container-fluid">
<?php if($error1){?><div style="padding-bottom:15px;" ><strong>ERROR </strong>: <?php echo htmlentities($error1); ?> </div><?php } 
else if($msg1){?><div style="padding-bottom:15px;"><strong>SUCCESS </strong>: <?php echo htmlentities($msg1); ?> </div><?php }?>
<?php if($error2){?><div style="padding-bottom:15px;"><strong>ERROR </strong>: <?php echo htmlentities($error2); ?> </div><?php } 
else if($msg2){?><div style="padding-bottom:15px;"><strong>SUCCESS </strong>: <?php echo htmlentities($msg2); ?> </div><?php }?>
<?php if($msg){?><div style="padding-bottom:15px;"><strong>SUCCESS </strong>: <?php echo htmlentities($msg); ?> </div><?php } ?>

<form method="post" onSubmit="return valid();">
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
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" name="customer" id="customer" class="form-control" value="<?php echo htmlentities($result->RegistrationNo);?>" readonly required>
                  <label for="customer">Registration No.</label>
                </div>
              </div>

			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="user" class="form-control" value="<?php echo htmlentities($result->User);?>" readonly required>
                  <label for="user">Report Created By</label>
                </div>
              </div>

			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="date" class="form-control" value="<?php echo htmlentities($result->AssessmentDate);?>" required>
                  <label for="date">Assessment Date</label>
                </div>
              </div>

			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="ref" class="form-control" value="<?php echo htmlentities($result->Ref);?>" required>
                  <label for="ref">Our Ref:</label>
                </div>
              </div>
			  <a style="color:white; padding:10px; margin-right:10px;" class="btn btn-primary btn-sm" href="upload-photos?id=<?php echo htmlentities($result->id);?>"><i class="fa fa-plus"> </i> Add Photos</a>
			  <a style="padding:10px;" class="btn btn-danger" href="javascript:history.back()"><<-Back</a>
            </div>
          </div><hr>
              <div class="form-row">


    <div style="margin-bottom:10px;" class="col-10">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
		    <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="Three" aria-selected="true" style="color:red;">Recommendation</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
		  
<form method="post" onSubmit="return valid();">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="damages" name="damages" class="form-control" placeholder="Last name" required="required">
                  <label for="damages">Damages</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="recommendation" name="recommendation" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="recommendation">Recommendation</label>
                </div>
              </div>
			  <div hidden class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" required>
                  <label for="reportid">Report ID</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px; height:35px;" type="submit" name="submit"  ><i class="fa fa-plus"> </i> Add Item</button>
            </div>
          </div></form>	<?php } ?> 
		  
		  							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
											<th style="width:170px; font-size:13px;">Damages</th>
											<th style="width:30px; font-size:13px;">Recommendation</th>
											<th style="width:10px; font-size:13px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php
$id=intval($_GET['id']);
$sql = "SELECT * from recommendation where ReportId=$id";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
										    <form method="post" onSubmit="return valid();">
											<td style="font-size:13px;"><input style="width:350px;" type="text" name="damages" value="<?php echo htmlentities($result->Damages);?>"></td>
											<td style="font-size:13px;"><input style="width:150px;" type="text" name="recommendation" value="<?php echo htmlentities($result->Recommendation);?>"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"></td>
											<td style="font-size:13px; width:150px;"><button type="submit" name="del" ><i class="fa fa-trash"> Delete</i></button> - <button type="submit" name="recommendationedit" ><i class="fa fa-save"> Save</i></button></td>
										    </form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

          </div><hr></form>
<?php }} ?>
</div>
</div>
</div>
</div>
		
      </div><br><br><br><br><br><br><br>
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
<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconfig.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login');
}
?>


<?php

	error_reporting( ~E_NOTICE );
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT Desc1, Image FROM assessmentimagesdoc WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: change-image2.php");
	}
	
	
	
	if(isset($_POST['update']))
	{
		$text = $_POST['text'];// user name
			
		$imgFile = $_FILES['image']['name'];
		$tmp_dir = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
					
		if($imgFile)
		{
			$upload_dir = 'assessmentimages/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$image = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['Image']);
					move_uploaded_file($tmp_dir,$upload_dir.$image);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$image = $edit_row['Image']; // old image from database
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE assessmentimagesdoc
									     SET Desc1=:uname,										 
										     Image=:upic 
								       WHERE id=:uid');
			$stmt->bindParam(':uname',$text);
			$stmt->bindParam(':upic',$image);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){

			}
			else{
				$errMSG = "Sorry Data Could Not Updated !";
			}
		
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
          <li class="breadcrumb-item active">Change Image</li>
        </ol>

		<div class="container">
		<div class="col-xl-11 col-sm-6 mb-3"><br>
        <!-- Page Content -->

				<div class="row">
					<div class="col-md-12">

						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									<div class="panel-body">
										<form method="post" class="form-horizontal" enctype="multipart/form-data">
										
<div class="form-group">
<label class="col-sm-4 control-label">Current Image</label>
<?php 
$id=intval($_GET['edit_id']);
$sql ="SELECT * from assessmentimagesdoc where assessmentimagesdoc.id=:id Limit 1";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<div class="col-sm-8">
<img src="assessmentimages/<?php echo htmlentities($result->Image);?>" width="300" height="250" style="border:solid 1px #000">
</div>

</div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Upload New Image<span style="color:red">*</span></label>
												<div class="col-sm-8">
											<input type="file" name="image" required>
												</div>
												<input style="margin-top:10px; margin-left:15px; width:400px;" type="text" id="text" name="text" value="<?php echo htmlentities($result->Desc1);?>" autofocus="autofocus">
											</div>
											<div class="hr-dashed"></div>
											
										
								
											
											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
								                    <a class="btn btn-danger" href="upload-photos?id=<?php echo htmlentities($result->ReportId);?>">Go back</a>
													<button class="btn btn-primary" name="update" type="submit" value="<?php echo htmlentities($result->id)?>">Update</button><?php }}?>
												</div>
											</div>

										</form>

									</div>
								</div>
							</div>
							
						</div>
						
					

					</div>
				</div>		
		
		

      </div></div></div>
      <!-- /.container-fluid -->
<br><br><br><br><br>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
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
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
if(isset($_POST['update']))
{
$signature=$_FILES["img"]["name"];
$id=intval($_GET['id']);
move_uploaded_file($_FILES["img"]["tmp_name"],"signatureimages/".$_FILES["img"]["name"]);
$sql="update users set Signature=:signature where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':signature',$signature,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$msg="Photos uploaded successfully";
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
<style>
.thumb{
	margin: 10px 5px 0 0;
	width: 100px;
	height: 70px;
}
</style>

<body id="page-top">

      <?php include('includes/header.php');?>

  <div id="wrapper">

    <!-- Sidebar -->
<?php include('includes/sidenav.php');?>

<div id="content-wrapper"><br><br><br>
<?php if($error){?><div style="padding-bottom:25px;" ><strong>ERROR </strong>: <?php echo htmlentities($error); ?> </div><?php } 
else if($msg){?><div style="padding-left:25px; color:green;"><strong>SUCCESS </strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
<div class="panel-body">
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from users where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
<h4><b style="color:green; padding-left:30px;">Upload Signature Photo (<?php echo htmlentities($result->Signature);?>)</b></h4>
<a style="margin-left:800px;" class="btn btn-danger" href="settings"><< Back</a>
<?php }} ?>

    <div style="margin-bottom:10px;" class="col-10">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?> 
<div style="padding-left:35px;" class="col-sm-3">
Signature<span style="color:red">*</span><input type="file" id="file-input" name="img" required>
<div id="thumb-output"></div>

<div class="col-sm-4">
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from users where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>


<div class="row">
<div><img style="padding:6px;" src="signatureimages/<?php echo htmlentities($result->Signature);?>" class="img-responsive" width="150" height="150" alt="image"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"><br>
</div>
</div>

<?php }} ?>
</div>
</div>
											<div style="margin-left:90px; padding-top:30px;" class="form-group">
												<div class="col-sm-12 col-sm-offset-5">
												    
													
													<button class="btn btn-primary" name="update" type="submit">Upload</button>													
												</div>
											</div></form>
        </div>

<br><br>

								
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
  $(document).ready(function(){
	$('#file-input').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    	{
			$('#thumb-output').html(''); //clear html of output element
			var data = $(this)[0].files; //this file data
			
			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
					return function(e) {
						var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
						$('#thumb-output').append(img); //append image to output element
					};
				  	})(file);
					fRead.readAsDataURL(file); //URL representing the file's data.
				}
			});
			
		}else{
			alert("Your browser doesn't support File API!"); //if File API is absent
		}
	});
});
</script>

</body>

</html>

<!-- This software belongs to Evans Mutai Mwendwa 0792019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
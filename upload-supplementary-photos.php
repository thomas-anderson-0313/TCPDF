<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:upload-supplementary-photos');
}
else{
	
if(isset($_POST['update']))
{
$image1=$_FILES["img1"]["name"];
$image2=$_FILES["img2"]["name"];
$reportid=$_POST['reportid'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"supplementaryimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"supplementaryimages/".$_FILES["img2"]["name"]);
$sql="INSERT INTO supplementaryimages(Image1,Image2,ReportId) VALUES(:image1,:image2,:reportid)";
$query = $dbh->prepare($sql);
$query->bindParam(':image1',$image1,PDO::PARAM_STR);
$query->bindParam(':image2',$image2,PDO::PARAM_STR);
$query->bindParam(':reportid',$reportid,PDO::PARAM_STR);
$query->execute();

$msg="Photos uploaded successfully";
}

?>

<?php
if(isset($_POST['del']))
	{
$delid=$_POST['id'];
$sql = "delete from supplementaryimages  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Image deleted successfully";
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
else if($msg){?><div style="padding-left:25px;"><strong>SUCCESS </strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
<div class="panel-body">

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from supplementaries where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
<h4><b style="color:green; padding-left:30px;">Upload Supplementary Photos (<?php echo htmlentities($result->Customer);?>)</b></h4>
<?php }} ?>
<div class="row" class="col-sm-6">

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="col-sm-3">
<div class="col-sm-3">
Image1<span style="color:red">*</span><input type="file" id="file-input1" name="img1" required>
<div id="thumb-output1"></div>
Image2<span style="color:red">*</span><input type="file" id="file-input2" name="img2" required>
<div id="thumb-output2"></div>

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from supplementaries where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
<input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" autofocus="autofocus" hidden required>
<?php }} ?>
</div></div>
											<div style="margin-left:90px; padding-top:30px;" class="form-group">
												<div class="col-sm-12 col-sm-offset-5">
												    <a class="btn btn-danger" href="supplementary">Go back</a>
													<button class="btn btn-danger" type="reset">Reset</button>
													<button class="btn btn-primary" name="updatephotos" type="submit">Upload</button>													
												</div>
											</div></form>




<div class="col-sm-6 col-sm-offset-5">
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from supplementaryimages where ReportId=:id";
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
<div class="row">
<div><img style="padding:3px;" src="supplementaryimages/<?php echo htmlentities($result->Image1);?>" class="img-responsive" width="110" height="90" alt="image"><br>
<a style="font-size:12px;" href="change-supplementary-image1?imgid=<?php echo htmlentities($result->id)?>">Change image</a></div>
<div><img style="padding:3px;" src="supplementaryimages/<?php echo htmlentities($result->Image2);?>" class="img-responsive" width="110" height="90" alt="image"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"><br>
<a style="font-size:12px;" href="change-supplementary-image2?imgid=<?php echo htmlentities($result->id)?>">Change image</a></div><button style="height:29px; padding:3px;" class="btn btn-danger" type="submit" name="del" ><i class="fa fa-trash"> Delete</i></button>
</form>
</div><br>
<?php }} ?>
</div>
																			
</div><br><br><br><br><br><br>
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
	$('#file-input1').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    	{
			$('#thumb-output1').html(''); //clear html of output element
			var data = $(this)[0].files; //this file data
			
			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
					return function(e) {
						var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
						$('#thumb-output1').append(img); //append image to output element
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
<script>
  $(document).ready(function(){
	$('#file-input2').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    	{
			$('#thumb-output2').html(''); //clear html of output element
			var data = $(this)[0].files; //this file data
			
			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
					return function(e) {
						var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
						$('#thumb-output2').append(img); //append image to output element
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
<script>
  $(document).ready(function(){
	$('#file-input3').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    	{
			$('#thumb-output3').html(''); //clear html of output element
			var data = $(this)[0].files; //this file data
			
			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
					return function(e) {
						var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
						$('#thumb-output3').append(img); //append image to output element
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
<script>
  $(document).ready(function(){
	$('#file-input4').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    	{
			$('#thumb-output4').html(''); //clear html of output element
			var data = $(this)[0].files; //this file data
			
			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
					return function(e) {
						var img = $('<img/>').addClass('thumb').attr('src', e.target.result); //create image element 
						$('#thumb-output4').append(img); //append image to output element
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
<?php } ?>

<!-- This software belongs to Evans Mutai Mwendwa 0782019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
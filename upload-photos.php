<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconfig.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login');
}
else{
	
if(isset($_POST['updatesketch']))
{
$image3=$_FILES["img3"]["name"];
$sketchdetails=$_POST['sketchdetails'];
$id=intval($_GET['id']);
move_uploaded_file($_FILES["img3"]["tmp_name"],"assessmentimages/".$_FILES["img3"]["name"]);
$sql="update assessments set Image3=:image3,SketchDetails=:sketchdetails where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':image3',$image3,PDO::PARAM_STR);
$query->bindParam(':sketchdetails',$sketchdetails,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$msg="Photos uploaded successfully";
}
?>

<?php	
	if(isset($_POST['delsketch']))
	{
		$delid=$_POST['id'];
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT Image3 FROM assessments WHERE id =:delid');
		$stmt_select->execute(array(':delid'=>$_POST['delsketch']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("assessmentimages/".$imgRow['Image3']);
	}
?>

<?php
if(isset($_POST['updateetr']))
{
$image4=$_FILES["img4"]["name"];
$id=intval($_GET['id']);
move_uploaded_file($_FILES["img4"]["tmp_name"],"assessmentimages/".$_FILES["img4"]["name"]);
$sql="update assessments set Image4=:image4 where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':image4',$image4,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();

$msg="Photos uploaded successfully";

}

?>

<?php
	
	if(isset($_POST['deletr']))
	{
		$delid=$_POST['id'];
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT Image4 FROM assessments WHERE id =:delid');
		$stmt_select->execute(array(':delid'=>$_POST['deletr']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("assessmentimages/".$imgRow['Image4']);

	}
?>


<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	if(isset($_POST['updatedoc']))
	{
		$text = $_POST['reportid'];// user email
		
		$imgFile = $_FILES['img1']['name'];
		$tmp_dir = $_FILES['img1']['tmp_name'];
		$imgSize = $_FILES['img1']['size'];
		
		
        if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}

		else
		{
			$upload_dir = 'assessmentimages/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$img1 = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 8000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$img1);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO assessmentimagesdoc(ReportId,Image) VALUES(:reportid,:upic)');
			$stmt->bindParam(':reportid',$text);
			$stmt->bindParam(':upic',$img1);
			
			if($stmt->execute())
			{
				$successMSG = "New record succesfully inserted ...";
			}
			else
			{
				$errMSG = "Error while inserting....";
			}
		}
	}
?>



<?php
	
	if(isset($_POST['dell']))
	{
		$delid=$_POST['id'];
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT Image FROM assessmentimagesdoc WHERE id =:delid');
		$stmt_select->execute(array(':delid'=>$_POST['dell']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("assessmentimages/".$imgRow['Image']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM assessmentimagesdoc WHERE id =:delid');
		$stmt_delete->bindParam(':delid',$_POST['dell']);
		$stmt_delete->execute();
	}
?>

<?php
	
	if(isset($_POST['del']))
	{
		$delid=$_POST['id'];
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT Image1 FROM assessmentimages WHERE id =:delid');
		$stmt_select->execute(array(':delid'=>$_POST['del']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("assessmentimages/".$imgRow['Image1']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM assessmentimages WHERE id =:delid');
		$stmt_delete->bindParam(':delid',$_POST['del']);
		$stmt_delete->execute();
	}
?>


<?php

	error_reporting( ~E_NOTICE ); // avoid notice
	
	if(isset($_POST['updatephotos']))
	{
		$text1 = $_POST['desc1'];// user name
		$text2 = $_POST['desc2'];// user email
		$text3 = $_POST['reportid'];// user email
		
		$imgFile = $_FILES['img1']['name'];
		$tmp_dir = $_FILES['img1']['tmp_name'];
		$imgSize = $_FILES['img1']['size'];
		
		$imgFile2 = $_FILES['img2']['name'];
		$tmp_dir2 = $_FILES['img2']['tmp_name'];
		$imgSize2 = $_FILES['img2']['size'];
		
        if(empty($imgFile)){
			$errMSG = "Please Select Image File.";
		}
		else
		{
			$upload_dir = 'assessmentimages/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$img1 = rand(1000,1000000).".".$imgExt;
			$img2 = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 8000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$img1);
					move_uploaded_file($tmp_dir2,$upload_dir.$img2);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO assessmentimages(Desc1,Desc2,ReportId,Image1,Image2) VALUES(:desc1,:desc2,:reportid,:upic1,:upic2)');
			$stmt->bindParam(':desc1',$text1);
			$stmt->bindParam(':desc2',$text2);
			$stmt->bindParam(':reportid',$text3);
			$stmt->bindParam(':upic1',$img1);
			$stmt->bindParam(':upic2',$img2);
			
			if($stmt->execute())
			{
				$successMSG = "New record succesfully inserted ...";
			}
			else
			{
				$errMSG = "Error while inserting....";
			}
		}
	}
?>




<!-- Dropezone-->
<?php
$uploadDir = 'assessmentimages';

if (!empty($_FILES)) {

 $tmpFile = $_FILES['file']['tmp_name'];

 $filename = $uploadDir.'/'.time().'-'. $_FILES['file']['name'];
 $filenamez = ''.time().'-'. $_FILES['file']['name'];

 $reportidd = $_POST['reportid'];
 move_uploaded_file($tmpFile,$filename);
 
$sql="INSERT INTO assessmentimages(Image1,ReportId) VALUES(:filename,:reportid)";
$query = $dbh->prepare($sql);
$query->bindParam(':filename',$filenamez,PDO::PARAM_STR);
$query->bindParam(':reportid',$reportidd,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();

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
  
  
    <!-- Dropezone-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
	
	
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
<h4><b style="color:green; padding-left:30px;">Upload Assessment Photos (<?php echo htmlentities($result->RegistrationNo);?>)</b> - <a style="padding-top:1px; padding-bottom:1px;" href="preview-assessment?id=<?php echo htmlentities($result->id);?>" class="btn btn-danger"> Preview <i class="fa fa-eye"></i></a></h4>
<a style="margin-left:800px; padding-top:1px; padding-bottom:1px;" class="btn btn-danger" href="edit-assessment?id=<?php echo htmlentities($result->id);?>"><< Back</a>
<?php }} ?>

    <div style="margin-bottom:10px;" class="col-10">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Vehicle Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">Scanned Documents</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">Sketch</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#four" role="tab" aria-controls="Four" aria-selected="false">Fee Note ETR</a>
            </li>
          </ul>
        </div>
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
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
<div class="row">
<div class="col-sm-6">





 <!-- Dropezone-->
<div class="container">

    <div class="row">

        <div class="col-md-12">

            <form action="upload-photos.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
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
<input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" autofocus="autofocus" hidden required>
<?php }} ?>

            </form>

        </div>

    </div>

</div>

<a style="height:20px; font-size:10px; padding-top:1px; margin-left:30px; margin-top:10px;" href="./upload-photos?id=<?php echo htmlentities($result->id)?>" class="btn btn-danger">Upload <i class="fas fa-fw fa-upload"> </i></a>
  
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div hidden style="padding-left:35px;" class="col-sm-3">
Image1<span style="color:red">*</span><input type="file" id="file-input1" name="img1" required>
<div id="thumb-output1"></div>

                  <input style="margin-top:10px; width:350px;" type="text" id="desc1" name="desc1" placeholder="Image Description" autofocus="autofocus">

Image2<input type="file" id="file-input2" name="img2" >
<div id="thumb-output2"></div>

                  <input style="margin-top:10px; width:350px;" type="text" id="desc2" name="desc2" placeholder="Image Description" autofocus="autofocus">  
				  
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
<input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" autofocus="autofocus" hidden required>
<?php }} ?>
</div>
											<div hidden style="margin-left:90px; padding-top:30px;" class="form-group">
												<div class="col-sm-12 col-sm-offset-5">
												    
													<button class="btn btn-danger" type="reset">Reset</button>
													<button class="btn btn-primary" name="updatephotos" type="submit">Upload</button>													
												</div>
											</div></form>
											</div>
<div class="col-sm-6">

<form method="post" onSubmit="return valid();">
<div class="row">

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentimages where ReportId=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
<div class="col-sm-5">
<img style="padding:3px;" src="assessmentimages/<?php echo htmlentities($result->Image1);?>" class="img-responsive" width="150px" height="110px" alt="image">
<a style="font-size:12px; padding-bottom: 1px; padding-right: 3px; padding-left: 3px; background-color: black; position: absolute; top: 23%; left: 30%; translate(-50%, -50%);" href="change-image1?edit_id=<?php echo htmlentities($result->id)?>">Edit Image</a>
<button style="height:20px; margin-left:20px; padding:2px; font-size:10px;" class="btn btn-danger" type="submit" name="del" value="<?php echo htmlentities($result->id)?>"><i class="fa fa-trash"> Delete</i></button>
<p style="font-size:12px;"><?php echo htmlentities($result->Desc1);?></p>
<br><br>
</div><?php }} ?>
</div>
</form>
<br>
</div></div>										
</div>


<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">

<div class="row"> 
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
Snanned Image<span style="color:red">*</span><input type="file" id="file-input5" name="img1" required>
<div id="thumb-output5"></div>

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
<input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" autofocus="autofocus" hidden required>
<?php }} ?>
</div>
											<div style="margin-left:90px; padding-top:30px;" class="form-group">
												<div class="col-sm-12 col-sm-offset-5">
												    
													<button class="btn btn-danger" type="reset">Reset</button>
													<button class="btn btn-primary" name="updatedoc" type="submit">Upload</button>													
												</div>
											</div></form>




<div class="col-sm-4">
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentimagesdoc where ReportId=:id";
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
<div><img style="padding:6px;" src="assessmentimages/<?php echo htmlentities($result->Image);?>" class="img-responsive" width="110" height="150" alt="image"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"><br>
<a style="font-size:12px;" href="change-imagedoc?edit_id=<?php echo htmlentities($result->id)?>">Change image</a></div>
<button style="height:29px; padding:3px;" class="btn btn-danger" type="submit" name="dell" value="<?php echo htmlentities($result->id)?>" ><i class="fa fa-trash"> Delete</i></button>
</div>
</form>
<?php }} ?>
</div>
</div>

</div>
<div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="container">
<div class="row">
<div class="col-sm-12">
<p style="color:red;">NB: Delete existing Sketch Image before uploading a new one.</p> Upload Sketch <br><input type="file" id="file-input3" name="img3">
<div id="thumb-output3"></div><br><br>

<div class="col-sm-12">
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

<img style="padding:3px;" src="assessmentimages/<?php echo htmlentities($result->Image3);?>" class="img-responsive" width="300" height="150" alt="No sketch image">
<button style="height:29px; margin-left:20px; padding:3px;" class="btn btn-danger" type="submit" name="delsketch" value="<?php echo htmlentities($result->id)?>"><i class="fa fa-trash"> Delete</i></button>
<?php }} ?>
</div>
<br><br>
                <div hidden class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="sketchdetails" name="sketchdetails" class="form-control" autofocus="autofocus" value="<?php echo htmlentities($result->SketchDetails);?>">
                  <label for="sketchdetails">Sketch Details </label>
                </div></div>
															<div style="margin-left:90px; padding-top:30px;" class="form-group">
												<div class="col-sm-8 col-sm-offset-5">
												    
													<button class="btn btn-danger" type="reset">Reset</button>
													<button class="btn btn-primary" name="updatesketch" type="submit">Upload</button>													
												</div>
</div></form><br>

</div></div></div></div>

<div class="tab-pane fade p-3" id="four" role="tabpanel" aria-labelledby="four-tab">

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="row">			
<div class="col-sm-7"><br>
<p style="color:red;">NB: Delete existing ETR Image before uploading a new one.</p> Upload Fee Note ETR <br><input type="file" id="file-input4" name="img4">
<div id="thumb-output4"></div>
<br>
</div>

<div class="col-sm-5">
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

<img style="padding:3px;" src="assessmentimages/<?php echo htmlentities($result->Image4);?>" class="img-responsive" width="150" height="200" alt="No ETR Image">
<button style="height:29px; margin-left:20px; padding:3px;" class="btn btn-danger" type="submit" name="deletr" value="<?php echo htmlentities($result->id)?>"><i class="fa fa-trash"> Delete</i></button>
<?php }} ?>
</div></div>


											<div style="margin-left:90px; padding-top:30px;" class="form-group">
												<div class="col-sm-8 col-sm-offset-5">
												    
													<button class="btn btn-danger" type="reset">Reset</button>
													<button class="btn btn-primary" name="updateetr" type="submit">Upload</button>													
												</div>
											</div></form>

											<br><br><br>

</div>
        </div>
        </div>
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

<script>
  $(document).ready(function(){
	$('#file-input5').on('change', function(){ //on file input change
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
						$('#thumb-output5').append(img); //append image to output element
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



<!-- Dropezone-->
<script type="text/javascript">

    Dropzone.options.imageUpload = {

        maxFilesize:15,

        acceptedFiles: ".jpeg,.jpg,.png,.gif"

    };

</script>




</body>

</html>
<?php } ?>

<!-- This software belongs to Evans Mutai Mwendwa 0792019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
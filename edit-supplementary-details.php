<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:edit-supplementary-details');
}
else{ 

if(isset($_POST['submit']))
  {
$customer=$_POST['customer'];
$ref=$_POST['ref'];
$date=$_POST['date'];
$intro=$_POST['intro'];
$reportdetails=$_POST['reportdetails'];
$insured=$_POST['insured'];
$claimno=$_POST['claimno'];
$user=$_POST['user'];
$id=intval($_GET['id']);

$sql="UPDATE supplementary set Customer=:customer,Ref=:ref,Date=:date,Intro=:intro,ReportDetails=:reportdetails,Insured=:insured,
ClaimNo=:claimno,User=:user where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':customer',$customer,PDO::PARAM_STR);
$query->bindParam(':ref',$ref,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':intro',$intro,PDO::PARAM_STR);
$query->bindParam(':reportdetails',$reportdetails,PDO::PARAM_STR);
$query->bindParam(':insured',$insured,PDO::PARAM_STR);
$query->bindParam(':claimno',$claimno,PDO::PARAM_STR);
$query->bindParam(':user',$user,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();
$msg="Updated successfully";

}
?>


<?php
	
	if(isset($_POST['del']))
	{
		$delid=$_POST['id'];
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT Image1,Image2 FROM supplementaryimages WHERE id =:delid');
		$stmt_select->execute(array(':delid'=>$_POST['del']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("supplementaryimages/".$imgRow['Image1']);
		unlink("supplementaryimages/".$imgRow['Image2']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM supplementaryimages WHERE id =:delid');
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
			$upload_dir = 'supplementaryimages/'; // upload directory
	
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
			$stmt = $DB_con->prepare('INSERT INTO supplementaryimages(Desc1,Desc2,ReportId,Image1,Image2) VALUES(:desc1,:desc2,:reportid,:upic1,:upic2)');
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



<?php
if(isset($_POST['dell']))
	{
$delid=$_POST['id'];
$sql = "delete from supplementaryparts WHERE id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);

$query -> execute();

$msg="Item deleted successfully";
}
?>


<?php
if(isset($_POST['spareslist']))
  {
$number=$_POST['number'];
$quantity=$_POST['quantity'];
$description=$_POST['description'];
$unitcost=$_POST['unitcost'];
$total=$_POST['total'];
$id=$_POST['id'];

$sql="UPDATE supplementaryparts set Number=:number,Quantity=:quantity,Description=:description,UnitCost=:unitcost,Total=:total where id=:id"; 
$query = $dbh->prepare($sql);
$query->bindParam(':number',$number,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':unitcost',$unitcost,PDO::PARAM_STR);
$query->bindParam(':total',$total,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="List Updated successfully";

}
?>


<?php

if(isset($_POST['submit2']))
  {
$number=$_POST['number'];
$qty=$_POST['qty'];
$description=$_POST['description'];
$unitcost=$_POST['unitcost'];
$total=$_POST['total'];
$reportid=$_POST['reportid'];

$sql="INSERT INTO supplementaryparts (Number,Quantity,Description,UnitCost,Total,ReportId) 
VALUES(:number,:qty,:description,:unitcost,:total,:reportid)";
$query = $dbh->prepare($sql);
$query->bindParam(':number',$number,PDO::PARAM_STR);
$query->bindParam(':qty',$qty,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':unitcost',$unitcost,PDO::PARAM_STR);
$query->bindParam(':total',$total,PDO::PARAM_STR);
$query->bindParam(':reportid',$reportid,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg1="Item Posted Successfully";
}
else 
{
$error1="Something went wrong. Please try again";
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
  <script src="css/jquery-1.12.4.js"></script>
  <script src="css/jquery-ui.js"></script>

<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

<style>
.thumb{
	margin: 10px 5px 0 0;
	width: 100px;
	height: 70px;
}
</style>

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

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from supplementary where id=:id";
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
			  <select class="form-control" name="customer" id="customer" required>

				      	<option selected style="display: none;" value="<?php echo htmlentities($result->Customer);?>"><?php echo htmlentities($result->Customer);?></option>
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
			  
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from supplementary where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?> 			  
              <div class="col-md-2">
                <div class="form-label-group">				
                  <input type="text" id="firstName" name="user" class="form-control" value="<?php echo htmlentities($result->User);?>" autofocus="autofocus" readonly>
                  <label for="firstName">Report Created By</label>
                </div>
				</div>

			  <div class="col-md-2">
			   <div class="form-label-group">
                  <input type="text" id="date" name="date" class="form-control" placeholder="Supplementary Date" value="<?php echo htmlentities($result->Date);?>" required>
                  <label for="date">Date</label>
			  </div>
			  </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="ref" name="ref" class="form-control" value="<?php echo htmlentities($result->Ref);?>">
                  <label for="ref">Ref No:</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="submit" id="submit"  ><i class="fas fa-fw fa-folder"> </i> Update</button>
			  <a style="color:white; padding:10px; margin-right:10px;" class="btn btn-primary btn-sm" href="upload-sup-photos?id=<?php echo htmlentities($result->id);?>"><i class="fa fa-plus"> </i> Add Photos</a>			  
			  <a style="padding:5px;" class="btn btn-danger" href="supplementary"><<-Back</a>
            </div>
          </div>
		  
		  <h5 style="color:green; padding:10px;"><strong>Edit Supplementary Report</strong></h5>
		  <hr>
              <div class="form-row">


    <div style="margin-bottom:10px;" class="col-11">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">Report Details</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="true">Supplementary Parts</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-1" id="one" role="tabpanel" aria-labelledby="one-tab">

          <div style="padding:15px; class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="insured" name="insured" class="form-control" value="<?php echo htmlentities($result->Insured);?>" autofocus="autofocus" required>
                  <label for="insured">Insured</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="claimno" name="claimno" class="form-control" value="<?php echo htmlentities($result->ClaimNo);?>" required>
                  <label for="claimno">Claim No</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="claimno" name="claimno" class="form-control" value="<?php echo htmlentities($result->RegistrationNo);?>" required>
                  <label for="claimno">Registration No</label>
                </div>
              </div>

            </div>
          </div>
			<div style="padding:15px;" class="form-label-group"><p style="color:red;">Report Details</p>
            <textarea class="form-control" rows="5" cols="20" name="reportdetails" id="reportdetails"><?php echo htmlentities($result->ReportDetails);?></textarea>
          </div></form><?php }} }} ?>			
            </div>
			
<div class="tab-pane fade show" id="two" role="tabpanel" aria-labelledby="two-tab">
<div style="padding:15px;">
<?php 
$x=intval($_GET['id']);
$sql ="SELECT Number FROM supplementaryparts WHERE ReportId=$x ORDER BY id DESC LIMIT 1";
$query= $dbh -> prepare($sql);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $data)
	{
    
$namba1=($data->Number);
$namba2=1;
$namba3=$namba1+$namba2;
}}?>		  
		  
		  <form method="post" onSubmit="return valid();">
          <div class="form-group">
            <div class="form-row">
			  <div class="col-md-1">
                <div class="form-label-group">
                  <input type="text" id="number" name="number" value="" class="form-control" placeholder="First name"  autofocus="autofocus" readonly>
                  <label for="number">NO.</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-label-group">
                  <input type="text" id="qty" name="qty" class="form-control" oninput="calculate2();" placeholder="First name"  autofocus="autofocus">
                  <label for="qty">Qty</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="description" name="description" class="form-control" placeholder="Last name" >
                  <label for="description">Description</label>
                </div>
              </div>
			    <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="unitcost" name="unitcost" class="form-control" oninput="calculate2();" placeholder="First name"  autofocus="autofocus">
                  <label for="unitcost">Unit Cost</label>
                </div>
              </div>
			  	<div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="total" name="total" class="form-control" oninput="calculate2();" placeholder="First name" autofocus="autofocus">
                  <label for="total">Total</label>
                </div>
              </div>
			  <div hidden class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" required>
                  <label for="reportid">Report ID</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px; height:35px;" type="submit" name="submit2"  ><i class="fa fa-plus"> </i> Add Item</button>
            </div>
</div></form>	
		  
		  
		  
		  							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
										    <th style="width:10px; font-size:13px;">NO.</th>
											<th style="width:10px; font-size:13px;">QTY</th>
											<th style="width:60px; font-size:13px;">Description</th>
											<th style="width:40px; font-size:13px;">Unit Cost</th>
											<th style="width:30px; font-size:13px;">Total</th>
											<th style="width:10px; font-size:13px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php
$id=intval($_GET['id']);
$sql = "SELECT * from supplementaryparts where ReportId=$id";
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
											<td style="font-size:13px;"><input style="width:35px;" type="text" name="number" value="<?php echo htmlentities($result->Number);?>"></td>
											<td style="font-size:13px;"><input style="width:35px;" type="text" name="quantity" value="<?php echo htmlentities($result->Quantity);?>"></td>
											<td style="font-size:13px;"><input style="width:250px;" type="text" name="description" value="<?php echo htmlentities($result->Description);?>"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"></td>
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="unitcost" value="<?php echo htmlentities($result->UnitCost);?>"></td>
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="total" value="<?php echo htmlentities($result->Total);?>"></td>
											<td style="font-size:13px; width:150px;"><button type="submit" name="dell" ><i style="color:red;" class="fa fa-trash"> Delete</i></button> - <button type="submit" name="spareslist" ><i style="color:green;" class="fa fa-save"> Update</i></button></td>
											</form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
									</tbody>
								</table>	 
</div></div>			
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
  <script src="vendor/jquery/jquery.min.js"></script>
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
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>

</body>

</html>
<?php } ?>
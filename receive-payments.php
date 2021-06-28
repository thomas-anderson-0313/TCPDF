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
if(isset($_POST['payment']))
  {
$paymentdesc=$_POST['paymentdesc'];
$paymentdate=$_POST['paymentdate'];
$status=$_POST['status'];
$id=$_POST['id'];

$sql="UPDATE feenotes set PaymentDesc=:paymentdesc,PaymentDate=:paymentdate,PStatus=:status where id=:id"; 
$query = $dbh->prepare($sql);
$query->bindParam(':paymentdesc',$paymentdesc,PDO::PARAM_STR);
$query->bindParam(':paymentdate',$paymentdate,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="Updated successfully";

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
  
		<!-- Datepicker-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="css/jquery-1.12.4.js"></script>
  <script src="css/jquery-ui.js"></script>
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
          <li class="breadcrumb-item active">Fee Notes Payment</li>
        </ol>

                <!-- DataTables Example -->
				<div style="font-size:13px;" class="col-md-11">
				<?php if($error){?><div class="alert alert-danger alert-dismissible" style="width:300px; margin-left:1px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="alert alert-success alert-dismissible" style="width:300px; margin-left:1px;"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo htmlentities($msg); ?> </div><?php }?>
  <form name="" method="post" onSubmit="return valid();">
	<div class="search_input">
				        <div class="form-group">
                        <div class="form-row">
		                <div hidden class="col-md-4">
			  
				        <select  class="form-control" name="customer" id="customer">

				      	<option disabled selected style="display: none;"value="">Select Insurance Co.</option>
<?php $sql = "SELECT * from customers";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>						<option value="<?php echo ($result->Name);?>"><?php echo ($result->Name);?><?php }}?></option>
                        						
				        </select>
                        </div>	
                        <div class="col-md-3">
						<p>Enter fee note number</p>
                        </div>						
						<div class="col-md-3">
						<input type="text" id="feenoteno" class="form-control" value="" placeholder="Enter number here." name="feenoteno"/></div>

						<button class="btn btn-primary btn-sm" type="submit" name="search" href="" >Search</button>
						
						</div></div></div>
</form> 
                
				<!-- Zero Configuration Table -->
				
								<table id="zctb" class="display table table-striped table-bordered table-hover" height="2%">
									<thead style="color:green;">
										<tr>
										    <th style="width:30px; font-size:14px;">#</th>
											<th style="width:130px; font-size:14px;">Vehicle Make</th>
											<th style="width:50px; font-size:14px;">Reg NO.</th>
											<th style="width:50px; font-size:14px;">NO.</th>
											<th style="width:80px; font-size:14px;">Payment desc.</th>
											<th style="width:80px; font-size:14px;">Payment Date</th>
											<th style="width:30px; font-size:14px;">Status</th>
											<th style="width:100px; font-size:14px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>
	

<?php 
if(isset($_POST['search']))
  {
$feenoteno=$_POST['feenoteno'];
$sql = "SELECT * from feenotes where feenotes.FeeNoteNo=:feenoteno";
$query = $dbh -> prepare($sql);
$query -> bindParam(':feenoteno',$feenoteno, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	
foreach($results as $result)
{  ?>
										<tr>
											<td style="font-size:14px;"><?php echo htmlentities($cnt);?></td>
											
											<td style="font-size:14px;"><?php echo htmlentities($result->Make);?></td>
											<td style="font-size:14px;"><?php echo htmlentities($result->RegistrationNo);?></td>
											<td style="font-size:14px;"><?php echo htmlentities($result->FeeNoteNo);?></td>

											<td><?php echo htmlentities($result->PaymentDesc);?></td>
											
											<div style="padding-top:35px;" class="modal fade" id="pdfModal<?php echo htmlentities($result->id);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
											<div style="padding:15px;">
			  <p style="font-size:14px;">Add fee note payment details.</p> <p style="color:red; padding-left:20px;"><?php echo htmlentities($result->RegistrationNo);?></p>
			  <form method="post" onSubmit="return valid();">

                <div class="form-group">
                  <input type="text" id="paymentdesc" name="paymentdesc" class="form-control" autofocus="autofocus" value="<?php echo htmlentities($result->PaymentDesc);?>" placeholder="Payment Desc">
                </div>
			<div class="form-group">	
			<div style="width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control"id="status" name="status">
			<option value="Paid">Paid</option>
			<option value="Not Paid">Not Paid</option>			
			</select>
            </div></div>
				 
				  <input type="text" id="id" name="id" class="form-control" value="<?php echo htmlentities($result->id);?>" autofocus="autofocus" hidden>

			    <div class="form-group">
<?php
$month = date("d-m-yy");
?>
                  <input type="text" id="datepicker" name="paymentdate" class="form-control" autofocus="autofocus" value="<?php echo $month;?>">
                </div>	
             <button class="btn btn-primary btn-sm" type="submit" name="payment" id="submit">Update Payment</button></form>			  
                                            </div>
                                            </div>
                                            </div>
											</div>
											
										    <td><?php echo htmlentities($result->PaymentDate);?></td>

											<td style="font-size:14px;"><strong><?php echo htmlentities($result->Pstatus);?></strong></td>
											<td style="font-size:14px;"><?php if($result->PStatus=="" || $result->PStatus==0)
{
?><a class="btn btn-success btn-sm" href="assessment-report?rid=<?php echo htmlentities($result->id);?>" data-toggle="modal" data-target="#pdfModal<?php echo htmlentities($result->id);?>"> Add/Edit Payment</a>
<?php } else {?>

</td>
<?php }} ?>

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

						

							</div><br>


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
  
  <!-- spinner -->
  <script src="js/active.js"></script>
  
	
<script>
  $( function() {
    $( "#datepicker1" ).datepicker({dateFormat:"yy-mm-dd"});
  } );
</script>

<script>
  $( function() {
    $( "#datepicker2" ).datepicker({dateFormat:"yy-mm-dd"});
  } );
</script>

	
</body>
</html>
<?php } ?>
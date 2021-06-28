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
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title style="font-size:12px;">Fee note statement</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->

  <!-- This software belongs to Evans Mutai Mwendwa 0792019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  		<!-- Datepicker-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="css/jquery-1.12.4.js"></script>
  <script src="css/jquery-ui.js"></script>
  
     <!-- datatables-->
    <link href="Datatables/DataTables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="Datatables/Buttons/css/buttons.dataTables.min.css" rel="stylesheet">
	
  

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
          <li class="breadcrumb-item active">Generate feenote statement</li>
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
		
<div style="margin-left:10px;"><?php										
$Astatus=($result->Status);?>
<?php if($Astatus==1){
?>		
		
						
						<div class="form-group">
						
                        <div class="form-row">

  <form name="" method="post" onSubmit="return valid();">
	<div class="search_input">
				        <div class="form-group">
                        <div class="form-row">
						<div class="col-md-1">
						<p>Search</p>
                        </div>	
		                <div class="col-md-6">
			  
				        <select class="form-control" name="customer" id="customer" required>

				      	<option disabled selected style="display: none;"value="">Select Insurance</option>
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
					
						<div hidden class="col-md-2">
						<input type="text" id="datepicker1" class="form-control" value="<?php echo isset($_POST['date1'])? $_POST['date1']:''?>" placeholder="From Date" name="date1" readonly  /></div>
						<div hidden class="col-md-2">
	                    <input type="text" id="datepicker2" class="form-control" value="<?php echo isset($_POST['date2'])? $_POST['date2']:''?>" placeholder="To Date" name="date2" readonly /></div>
                        <div style="padding-right:8px;" class="checkbox checkbox-inline">
		                <select class="form-control" name="pstatus" id="pstatus" required>
						 <option value="Not Paid">Not Paid</option>	
			            <option value="Paid">Paid</option>			           		
			            </select>
                        </div>
						<button class="btn btn-primary btn-sm" type="submit" name="search" > <i style="color:white;" class="fas fa-fw fa-search"></i> Search</button>
						
						</div></div></div>
</form> 


  <table style="font-size:14px;" id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
			    <th style="color:white; font-size:11px; background-color:gray;">#</th>
				<th style="color:white; font-size:11px; background-color:gray;">FEE NOTE REF NO.</th>
                <th style="color:white; font-size:11px; background-color:gray;">INSURANCE CO.</th>
                <th style="color:white; font-size:11px; background-color:gray;">REG NO.</th>
                <th style="color:white; font-size:11px; background-color:gray;">DATE</th>
				<th style="color:white; font-size:11px; background-color:gray;">INSURED</th>
				<th style="color:white; font-size:11px; background-color:gray;">CLAIMNO</th>
                <th style="color:white; font-size:11px; background-color:gray;">TOTAL(KSH)</th>
				<th style="color:white; font-size:11px; background-color:gray;">STATUS</th>
				
            </tr>
        </thead>
        <tbody>
<?php 
if(isset($_POST['search']))
  {
$customer=$_POST['customer'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$pstatus=$_POST['pstatus'];
$sql = "SELECT FeeNoteNo,BranchCode,Customer,RegistrationNo,ReportDate,Insured,ClaimNo,FeeNoteTotal,FeeNoteSubTotal,FeeNoteVat,Pstatus,id from feenotes where feenotes.Customer=:customer AND feenotes.Pstatus=:pstatus ORDER BY str_to_date(ReportDate,'%d-%m-%Y') desc";
$query = $dbh -> prepare($sql);
$query -> bindParam(':customer',$customer, PDO::PARAM_STR);
$query -> bindParam(':pstatus',$pstatus, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	
foreach($results as $result)
{  ?>
	
    <tr>
                <td style="font-size:11px;"><?php echo htmlentities($cnt);?></td>
				<td style="font-size:11px;"><?php echo htmlentities($result->BranchCode);?><?php echo htmlentities($result->FeeNoteNo);?></td>
                <td style="font-size:11px;"><?php echo htmlentities($result->Customer);?></td>
                <td style="font-size:11px;"><?php echo htmlentities($result->RegistrationNo);?></td>	
                <td style="font-size:11px;"><?php echo htmlentities($result->ReportDate);?></td>				
                <td style="font-size:11px;"><?php echo htmlentities($result->Insured);?></td>
				<td style="font-size:11px;"><?php echo htmlentities($result->ClaimNo);?></td>				
				<td style="font-size:11px;"><?php echo htmlentities($result->FeeNoteTotal);?></td>
				<td style="font-size:11px;"><?php echo htmlentities($result->Pstatus);?></td>
  </tr><?php $cnt=$cnt+1; }}}?>
        </tbody>		
        <tfoot>
            <tr>
                <th style="color:white; background-color:gray;"></th>
                <th style="color:white; background-color:gray;"></th>
				<th style="color:white; background-color:gray;"></th>
                <th style="color:white; background-color:gray;"></th>
                <th style="color:white; background-color:gray;"></th>
				<th style="color:white; background-color:gray;"></th>
                <th style="color:white; background-color:gray;"></th>
                <th style="color:white; background-color:gray;"></th>
				<th style="color:white; background-color:gray;"></th>
            </tr>
  </tfoot>
    </table>						


	
</div></div>				                <!-- DataTables Example -->
<strong><div class="col-md-11">			
<?php } else{ echo "Restricted Page, Kindly contact system admin!";
}?></strong></div>						

	  </div><br><br><br><br><br><br>

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
  
  
    <!-- Data Tables-->

    <script src="datatables/dataTables.min.js"></script>
    <script src="datatables/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="datatables/Buttons/js/buttons.flash.min.js"></script>
    <script src="datatables/jszip.min.js"></script>
    <script src="datatables/pdfmake.min.js"></script>
    <script src="datatables/vfs_fonts.js"></script>
    <script src="datatables/Buttons/js/buttons.html5.min.js"></script>
    <script src="datatables/Buttons/js/buttons.print.min.js"></script>




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

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

</body>

</html>
<?php } ?>
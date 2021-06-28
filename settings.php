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
$status="0";
$sql = "UPDATE users SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="User Successfully Updated";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE users SET Status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="User Successfully Updated";
}
?>
 
<?php
if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from users  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Employee deleted successfully";
}
?>


<?php
if(isset($_POST['update']))
{
$fname=$_POST['fname'];
$emailid=$_POST['emailid']; 
$lastname=$_POST['lastname'];
$phoneno=$_POST['phoneno']; 
$idno=$_POST['idno'];
$krapin=$_POST['krapin'];
$nhif=$_POST['nhif']; 
$nssf=$_POST['nssf'];
$gender=$_POST['gender']; 
$yob=$_POST['yob'];
$kinno=$_POST['kinno'];
$kinr=$_POST['kinr'];
$id=$_POST['id'];

$sql="UPDATE users set UserName=:fname,Email=:emailid,LastName=:lastname,PhoneNo=:phoneno,IDNO=:idno,KRA=:krapin,NHIF=:nhif,NSSF=:nssf,Gender=:gender,
YOB=:yob,KINNO=:kinno,KINR=:kinr where id=:id";

$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
$query->bindParam(':phoneno',$phoneno,PDO::PARAM_STR);
$query->bindParam(':idno',$idno,PDO::PARAM_STR);
$query->bindParam(':krapin',$krapin,PDO::PARAM_STR);
$query->bindParam(':nhif',$nhif,PDO::PARAM_STR);
$query->bindParam(':nssf',$nssf,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':yob',$yob,PDO::PARAM_STR);
$query->bindParam(':kinno',$kinno,PDO::PARAM_STR);
$query->bindParam(':kinr',$kinr,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Updated posted successfully";
}
else 
{
$msg="Updated posted successfully";
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
          <li class="breadcrumb-item active">User Permissions Settings</li>
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
				<?php if($error){?><div style="margin-bottom:15px; color:red;"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div style="margin-bottom:15px; color:green;"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
				
								<table id="zctb" class="display table table-striped table-bordered table-hover" height="2%">
									<thead style="color:green;">
										<tr>
										    <th style="width:30px; font-size:14px;">#</th>
											<th style="width:130px; font-size:14px;">User Name</th>
											<th style="width:50px; font-size:14px;">Email</th>
											<th style="width:30px; font-size:14px;">Signature</th>
											<th style="width:30px; font-size:14px;">Delete</th>
											<th style="width:30px; font-size:14px;">User Role</th>
											<th style="width:100px; font-size:14px;">Action</th>
											<th style="width:100px; font-size:14px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php $sql = "SELECT * from users ORDER BY id desc";
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
											
											<td style="font-size:14px;"><?php echo htmlentities($result->UserName);?></td>
											<td style="font-size:14px;"><?php echo htmlentities($result->Email);?></td>
											<td style="font-size:14px;"><a href="upload-signature?id=<?php echo htmlentities($result->id);?>"><i class="fa fa-plus"> </i> Add</a></td>
											
										    <td style="font-size:14px; font-color:red;"><a href='settings?del=<?php echo htmlentities($result->id);?>' onclick="return confirm('Do really you want to delete employee?');"><i class="fa fa-edit"> Delete </i></a></td>
											<td style="font-size:14px;"><strong style="color:green"><?php
                                            $vstatus=($result->Status);?>
											<?php if($vstatus==1){
											 echo "Administrator";} elseif($vstatus==0) { echo "Normal User"; }else{ echo "User";
											}?></strong></td>
											<td style="font-size:14px;"><a href="settings?eid=<?php echo htmlentities($result->id);?>" data-toggle="modal" data-target="#pdfModal<?php echo htmlentities($result->id);?>" ><i class="fa fa-eye"> Preview </i></a></td>
											<div style="padding-top:35px;" class="modal fade" id="pdfModal<?php echo htmlentities($result->id);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">

		                                          <div class="card-body">
	  <div class="col-md-12" >
        <form  method="post" name="signup" onSubmit="return valid();">
		<div class="text-center">
          <h4 style="margin-bottom:15px; color:red;">Employee Details</h4>
        </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="fname" value="<?php echo htmlentities($result->UserName);?>" class="form-control" readonly autofocus="autofocus">
                  <label for="firstName">First Name (User Name)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" value="<?php echo htmlentities($result->LastName);?>" name="lastname" class="form-control" required="required">
                  <label for="lastName">Last Name</label>
                </div>
              </div>
            </div>
          </div>
		 <div class="form-group">
            <div class="form-row">
              <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="phoneno" value="0<?php echo htmlentities($result->PhoneNo);?>" name="phoneno" class="form-control" required="required" autofocus="autofocus">
                  <label for="phoneno">Phone No.</label>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-label-group">
                  <input type="email" id="inputEmail" value="<?php echo htmlentities($result->Email);?>" name="emailid" class="form-control">
                  <label for="inputEmail">Email Address</label>
                </div>
              </div>
            </div>
          </div>
		  		 <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="idno" value="<?php echo htmlentities($result->IDNO);?>" name="idno" class="form-control" autofocus="autofocus">
                  <label for="idno">ID No</label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="krapin" value="<?php echo htmlentities($result->KRA);?>"name="krapin" class="form-control">
                  <label for="krapin">KRA PIN</label>
                </div>
              </div>
			   <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="nhif" value="<?php echo htmlentities($result->NHIF);?>" name="nhif" class="form-control">
                  <label for="nhif">NHIF No</label>
                </div>
              </div>

            </div>
          </div>
		   <div class="form-group">
            <div class="form-row">
				<div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="nssf" value="<?php echo htmlentities($result->NSSF);?>" name="nssf" class="form-control">
                  <label for="nssf">NSSF No</label>
                </div>
              </div>
			  	<div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="gender" value="<?php echo htmlentities($result->Gender);?>" name="gender" class="form-control">
                  <label for="gender">Gender</label>
                </div>
              </div>
			   <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="yob" value="<?php echo htmlentities($result->YOB);?>" name="yob" class="form-control">
                  <label for="yob">YOB</label>
                </div>
              </div>
			</div></div>
		 <div class="form-group">
            <div class="form-row">

              <div class="col-md-5">
                <div class="form-label-group">
                  <input type="text" id="kinno" value="<?php echo htmlentities($result->KINNO);?>" name="kinno" class="form-control">
                  <label for="kinno">Next of kin No.</label>
                </div>
              </div>
			   <div class="col-md-7">
                <div class="form-label-group">
                  <input type="text" id="kinr" value="<?php echo htmlentities($result->KINR);?>" name="kinr" class="form-control">
				  <input type="text" id="id" name="id" class="form-control" value="<?php echo htmlentities($result->id);?>" autofocus="autofocus" hidden required>
                  <label for="kinr">Kin Relation</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
		  <button class="btn btn-primary btn-block" type="submit" value="update" name="update" id="submit"><i class="fa fa-folder"></i> Update</button></div>
        </form>
      </div></div>
											<div style="height:3px; background-color:#4d4d4d; border:2px solid;" class="modal-footer"></div>
                                            </div>
                                            </div>
                                            </div>
											<td style="font-size:14px;"><?php if($result->Status=="" || $result->Status==0)
{
?><a class="btn btn-success btn-sm" href="settings?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to make user Admin?')"> Make Admin</a>
<?php } else {?>

<a class="btn btn-danger btn-sm" href="settings?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Demote user?')"> Demote</a>
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
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
//error_reporting(0);
session_start();
include('includes/config.php');
if(isset($_POST['signup']))
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
$branch=$_POST['branch'];
$password=md5($_POST['password']); 
$sql="INSERT INTO  users (UserName,Email,LastName,PhoneNo,IDNO,KRA,NHIF,NSSF,Gender,YOB,KINNO,KINR,Branch,Password) 
VALUES(:fname,:emailid,:lastname,:phoneno,:idno,:krapin,:nhif,:nssf,:gender,:yob,:kinno,:kinr,:branch,:password)";
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
$query->bindParam(':branch',$branch,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Employee registration was successfull!";
}
else 
{
$error="Something went wrong. Please try again";
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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'fname='+$("#fname").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>  
  
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
          <li class="breadcrumb-item active">Employee Account Details</li>
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

  <div class="container">
	  <div class="col-md-8" >
        <form  method="post" name="signup" onSubmit="return valid();">
		<?php if($error){?><div style="margin-bottom:15px; color:red;"><strong>ERROR</strong>: <?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div style="margin-bottom:15px; color:green;"><strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?> </div><?php }?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="fname" name="fname" onBlur="checkAvailability()" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="fname">First Name (User Name)</label>
				  <span id="user-availability-status" style="font-size:12px; padding-left:10px;"></span>
                </div>
				 
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lastname" class="form-control" placeholder="Last name">
                  <label for="lastName">Last Name</label>
                </div>
              </div>
            </div>
          </div>
		 <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="phoneno" name="phoneno" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="phoneno">Phone No.</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="email" name="emailid" id="emailid" class="form-control" placeholder="Last name">
                  <label for="emailid">Email Address</label>
                </div>
              </div>
            </div>
          </div>
		  		 <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="idno" name="idno" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="idno">ID No</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="krapin" name="krapin" class="form-control" placeholder="Last name">
                  <label for="krapin">KRA PIN No</label>
                </div>
              </div>
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="nhif" name="nhif" class="form-control" placeholder="Last name">
                  <label for="nhif">NHIF No</label>
                </div>
              </div>
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="nssf" name="nssf" class="form-control" placeholder="Last name">
                  <label for="nssf">NSSF No</label>
                </div>
              </div>
            </div>
          </div>
		 <div class="form-group">
            <div class="form-row">
              <div class="col-md-3">
			  
				      <select class="form-control" name="gender" id="gender" required>

				      	<option disabled selected style="display: none;"value="">Select Gender</option>

				      	<option value="Male">Male</option>
						<option value="Male">Female</option>
				        </select>

              </div>
			<div class="col-md-3">
			  
				      <select class="form-control" name="yob" id="yob">

				      	<option selected style="display: none;"value="">Year of Birth</option>

						<option value="1960">1960</option>
						<option value="1961">1961</option>
						<option value="1962">1962</option>
						<option value="1963">1963</option>
						<option value="1964">1964</option>
				      	<option value="1965">1965</option>
						<option value="1966">1966</option>
						<option value="1967">1967</option>
						<option value="1968">1968</option>
						<option value="1969">1969</option>
						<option value="1970">1970</option>
						<option value="1971">1971</option>
						<option value="1972">1972</option>
						<option value="1973">1973</option>
						<option value="1974">1974</option>
						<option value="1975">1975</option>
						<option value="1976">1976</option>
						<option value="1978">1978</option>
						<option value="1979">1979</option>
						<option value="1980">1980</option>
						<option value="1981">1981</option>
						<option value="1982">1982</option>
						<option value="1983">1983</option>
						<option value="1984">1984</option>
						<option value="1985">1985</option>
						<option value="1986">1986</option>
						<option value="1987">1987</option>
						<option value="1988">1988</option>
						<option value="1989">1989</option>
						<option value="1990">1990</option>
						<option value="1991">1991</option>
						<option value="1992">1992</option>
						<option value="1993">1993</option>
						<option value="1994">1994</option>
						<option value="1995">1995</option>
						<option value="1996">1996</option>
						<option value="1997">1997</option>
						<option value="1998">1998</option>
						<option value="1999">1999</option>
						<option value="2000">2000</option>
						<option value="2001">2001</option>
						<option value="2002">2002</option>
						<option value="2003">2003</option>
						<option value="2004">2004</option>
						<option value="2005">2005</option>
						<option value="2006">2006</option>
						<option value="2007">2007</option>
						<option value="2008">2008</option>
						<option value="2009">2009</option>
						<option value="2010">2020</option>
						<option value="2011">2011</option>
						<option value="2012">2012</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
				        </select>

              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="kinno" name="kinno" class="form-control" placeholder="Last name">
                  <label for="kinno">Next of kin No.</label>
                </div>
              </div>
			   <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="kinr" name="kinr" class="form-control" placeholder="Last name">
                  <label for="kinr">Kin Relation</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
						<div class="col-md-3">
			  
				      <select class="form-control" name="branch" id="branch" required>

				      	<option selected style="display: none;"value="">Select Branch</option>
						<option value="1">Nairobi Branch</option>
						<option value="2">Mombasa Branch</option>
						<option value="3">Eldoret Branch</option>
						<option value="4">Kisumu Branch</option>
				        </select>

              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-3">
		  <button class="btn btn-primary btn-block" type="submit" value="Sign Up" name="signup" id="submit"><i class="fa fa-folder"></i> Save</button></div>
        </form>
      </div>
	
<?php } else{ echo "Restricted Page, Kindly contact system admin!";
}?></strong>	
	
  </div><br><br><br><br><br><br>

 </div>
  
        <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
      <?php include('includes/footer.php');?>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  
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
<?php } ?>
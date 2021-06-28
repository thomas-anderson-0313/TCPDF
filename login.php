<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM Users WHERE UserName=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard'; </script>";
} else{
  
  echo "<script>alert('Invalid Login Details Try Again...');</script>";

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

</head>

<body class="bg-dark">
<br><br><br><br><br>
  <div class="container">
    <div style="width:300px;" class="card card-login mx-auto mt-4">
      <div style="font-size:14px; color:gray; padding-left:83px; padding-top:5px;"><strong>Enter Login Details<strong></div>
      <div class="card-body">
       <form method="post">
          <div class="form-group">
              <input type="text" id="inputEmail" name="username" class="form-control" placeholder="User Name" required="required" autofocus="autofocus">
            </div>
          <div class="form-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
          </div>

          
		  <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
        </form>
		<h6 style="font-size:11px; padding-top:9px; padding-left:25px;">Powered by: <a href="http://ezzytech.co.ke">Ezzytech Computer Systems</a></h6>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

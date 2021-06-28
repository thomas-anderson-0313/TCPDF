  <nav style="border-bottom: 1px solid gray;" class="navbar navbar-expand navbar-dark bg-dark fixed-top">

    <a style="font-size:16px;" class="navbar-brand mr-1" href="dashboard"><h6 style="color:red;">Ascend ERP System - Maroon Loss Assessors LTD</h6></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input style="height:29px;" readonly type="text" class="form-control" value="Howdy! <?php 
$email=$_SESSION['alogin'];
$sql ="SELECT UserName FROM Users WHERE UserName=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{
	 echo htmlentities($result->UserName); }}?>" aria-label="Search" aria-describedby="basic-addon2">
      </div>
    </form>

    <!-- Navbar -->
    <ul style="padding-right:25px;" class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i style="font-size:15px; color:white;" class="fas fa-envelope fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
          <a style="font-size:14px;" class="dropdown-item" href="tasks">My Tasks</a>
        </div>
      </li>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i style="font-size:20px; color:white;" class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a style="font-size:14px;" class="dropdown-item" href="settings"><i style="color:black;" class="fa fa-cog"></i> System Settings</a>
          <a style="font-size:14px;" class="dropdown-item" href="register"><i style="color:black;" class="fa fa-user"></i>  Register Employee</a>
		  <a style="font-size:14px;" class="dropdown-item" href="change-password"><i style="color:black;" class="fa fa-key"></i> Change Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" style="color:red;" data-toggle="modal" data-target="#logoutModal"><i style="color:red;" class="fa fa-sign out"></i> Logout</a>
        </div>
      </li>
    </ul>

  </nav>
  <!-- This software belongs to Evans Mutai Mwendwa 0782019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
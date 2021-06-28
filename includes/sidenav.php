    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard"><br><br><br>
          <i style="color:white;" class="fas fa-fw fa-tachometer-alt"></i>
          <span> Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i style="color:white; padding-left:3px;" class="fa fa-plus"></i>
          <span> Create Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 style="color:red;" class="dropdown-header">Add Reports Here:</h6>
		  <a style="font-size:14px;" class="dropdown-item" href="create-assessment">Motor Assessment</a>
		  <a style="font-size:14px;" class="dropdown-item" href="create-reinspection">Motor Re-Inspection</a>
		  <a style="font-size:14px;" class="dropdown-item" href="create-valuation">Motor Valuation</a>
		  <a style="font-size:14px;" class="dropdown-item" href="create-pretheft">Pre-Theft Valuation</a>
          <div class="dropdown-divider"></div>
          <h6 style="color:red;" class="dropdown-header">Others:</h6>

          <a style="font-size:14px;" class="dropdown-item" href="add-customer">Add Insurance Co.</a>
		  <a style="font-size:14px;" class="dropdown-item" href="create-task">Create Tasks</a>

        </div>
      </li>

	    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i style="color:orange;" class="fas fa-fw fa-file"></i>
          <span>Reports</span>
        </a>

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
				
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 style="color:red;" class="dropdown-header">View Reports Here:</h6>
		  <a style="font-size:14px;" class="dropdown-item" href="assessments-admin">Assessment Reports</a>
		  <a style="font-size:14px;" class="dropdown-item" href="re-inspections-admin">Re-inspection Reports</a>
		  <a style="font-size:14px;" class="dropdown-item" href="valuations-admin">Valuation Reports</a>
		  <a style="font-size:14px;" class="dropdown-item" href="pre-theft-valuations-admin">Pre-theft Reports</a>
        </div>
		
<?php } else{ ?> 
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 style="color:red;" class="dropdown-header">View Reports Here:</h6>
		  <a style="font-size:14px;" class="dropdown-item" href="assessments">Assessment Reports</a>
		  <a style="font-size:14px;" class="dropdown-item" href="re-inspections">Re-inspection Reports</a>
		  <a style="font-size:14px;" class="dropdown-item" href="valuations">Valuation Reports</a>
		  <a style="font-size:14px;" class="dropdown-item" href="pre-theft-valuations">Pre-theft Reports</a>
        </div>
<?php } ?></strong>		
		
      </li>
	  
	    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i style="color:orange;" class="fas fa-fw fa-folder"></i>
          <span>Revised Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 style="color:red;" class="dropdown-header">Revised Reports:</h6>
		  <a style="font-size:14px;" class="dropdown-item" href="assessment-drafts">Motor Assessment</a>
		  <a style="font-size:14px;" class="dropdown-item" href="supplimentaries">Supplimentaries</a>
		  <a hidden style="font-size:14px;" class="dropdown-item" href="reinspection-drafts">Motor Re-Inspection</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i style="color:orange;" class="fas fa-fw fa-folder"></i>
          <span>Accounts</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
		  <h6 style="color:red;" class="dropdown-header">Generate Feenotes:</h6>
		  <a style="font-size:14px;" class="dropdown-item" href="assessment-feenotes">Assessment Feenotes</a>
		  <a style="font-size:14px;" class="dropdown-item" href="reinspection-feenotes">Reinspection Feenotes</a>
		  <a style="font-size:14px;" class="dropdown-item" href="pre-theft-feenotes">Pre-theft Feenotes</a>
		  <a style="font-size:14px;" class="dropdown-item" href="valuation-feenotes">Valuation Feenotes</a>
          <div class="dropdown-divider"></div>
          <h6 style="color:red;" class="dropdown-header">Generate Statements:</h6>
		  <a style="font-size:14px;" class="dropdown-item" href="feenote-statement">Feenote Statements</a>
		  <a style="font-size:14px;" class="dropdown-item" href="receive-payments">Recieve Payments</a>
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i style="color:white; padding-left:3px;" class="fa fa-plus"></i>
          <span> Private Reports</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 style="color:red;" class="dropdown-header">Add Reports Here:</h6>
		  <a style="font-size:14px;" class="dropdown-item" href="create-assessment-private">Motor Assessment</a>
		  <a style="font-size:14px;" class="dropdown-item" href="create-reinspection-private">Motor Re-Inspection</a>
		  <a style="font-size:14px;" class="dropdown-item" href="create-valuation-private">Motor Valuation</a>

        </div>
      </li>
	  
	  	<li class="nav-item">
        <a class="nav-link" href="http://ezzytech.co.ke/mla-status" data-toggle="modal" data-target="#status">
          <i style="color:white;" class="fas fa-fw fa-cog"></i>
          <span> System Status</span></a>
											
											<div style="padding-top:35px;" class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">

		                                    <iframe height="300" frameborder="15" src="http://ezzytech.co.ke/mla-status"></iframe>
											<div style="height:3px; background-color:#4d4d4d; border:2px solid;" class="modal-footer"></div>
                                            </div>
                                            </div>
                                            </div>
      </li>

	  <li class="nav-item">
        <a class="nav-link" href="http://ezzytech.co.ke/terms" data-toggle="modal" data-target="#terms">
          <i style="color:white;" class="fas fa-fw fa-user"></i>
          <span> Terms of Use</span></a><br><br><br><br><br><br><br>
											
											<div style="padding-top:35px;" class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">

		                                    <iframe height="540" frameborder="15" src="http://ezzytech.co.ke/terms"></iframe>
											<div style="height:3px; background-color:#4d4d4d; border:2px solid;" class="modal-footer"></div>
                                            </div>
                                            </div>
                                            </div>
      </li>
    </ul>
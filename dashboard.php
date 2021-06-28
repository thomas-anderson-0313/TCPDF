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

  <title>Ascend ERP System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  
  <script type="text/javascript" src="js2/jquery.min.js"></script>
  <script type="text/javascript" src="js2/Chart.min.js"></script>
  
<style type="text/css">
#chart-container {
    width: 100%;
    height: auto;
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

    <div id="content-wrapper">

      <div class="container-fluid"><br><br>
        <!-- This software belongs to Evans Mutai Mwendwa 0782019010 Id Number 28092695 Dont use this software unless you have pachased it from him. It cost Ksh.1,500,000-->
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
		  <li style="color:red;" class="breadcrumb-item active">Welcome Back!
<?php 
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
	 echo htmlentities($result->UserName); }}?></li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">

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
<?php										
$Astatus=($result->Status);?>
<?php if($Astatus==1){
?>		
				
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
				<?php 
$sql ="SELECT id from assessments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalassessments=$query->rowCount();
?>
                <div class="mr-5">Assessments  <?php echo htmlentities($totalassessments);?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="assessments-admin">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
				<?php 
$sql ="SELECT id from reinspections";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalreinspections=$query->rowCount();
?>
                <div class="mr-5">Re-inspections  <?php echo htmlentities($totalreinspections);?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="re-inspections-admin">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
				<?php 
$sql ="SELECT id from valuations";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalvaluations=$query->rowCount();
?>
                <div class="mr-5">Valuations   <?php echo htmlentities($totalvaluations);?></div>
				
              </div>
              <a class="card-footer text-white clearfix small z-1" href="valuations-admin">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-2 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-cogs"></i>
                </div>
				<?php 
$sql ="SELECT id from tasks";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totaltasks=$query->rowCount();
?>
                <div class="mr-5">Tasks  <?php echo htmlentities($totaltasks);?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="tasks">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
		
<?php } else{ ?> 
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
				<?php 
$sql ="SELECT id from assessments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalassessments=$query->rowCount();
?>
                <div class="mr-5">Assessment Reports  <?php echo htmlentities($totalassessments);?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="assessments">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
				<?php 
$sql ="SELECT id from reinspections";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalreinspections=$query->rowCount();
?>
                <div class="mr-5">Re-inspections  <?php echo htmlentities($totalreinspections);?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="re-inspections">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
				<?php 
$sql ="SELECT id from valuations";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalvaluations=$query->rowCount();
?>
                <div class="mr-5">Valuation Reports   <?php echo htmlentities($totalvaluations);?></div>
				
              </div>
              <a class="card-footer text-white clearfix small z-1" href="valuations">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-2 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
				<?php 
$sql ="SELECT id from tasks";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totaltasks=$query->rowCount();
?>
                <div class="mr-5">Tasks  <?php echo htmlentities($totaltasks);?></div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="tasks">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
<?php } ?>	
        </div>





<div hidden>		

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary1' from feenotes where MONTH='Jan' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data1=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data1["sumsummary1"];
$jan=$x;
?>

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary3' from feenotes where MONTH='Feb' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data3=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data3["sumsummary3"];
$feb=$x;
?>

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary5' from feenotes where MONTH='March' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data5=$query->fetch(PDO::FETCH_ASSOC);
?>
				  
<?php 
$x = $data5["sumsummary5"];
$march=$x;
?>
																		  
<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary7' from feenotes where MONTH='Apr' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data7=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data7["sumsummary7"];
$april=$x;
?>

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary9' from feenotes where MONTH='May' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data9=$query->fetch(PDO::FETCH_ASSOC);
?>
				  
<?php 
$x = $data9["sumsummary9"];
$may=$x;
?>

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary11' from feenotes where MONTH='Jun' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data11=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data11["sumsummary11"];
$june=$x;
?>	

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary13' from feenotes where MONTH='Jul' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data13=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data13["sumsummary13"];
$july=$x;
?>	

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary15' from feenotes where MONTH='Aug' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data15=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data15["sumsummary15"];
$aug=$x;
?>	

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary17' from feenotes where MONTH='Sep' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data17=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data17["sumsummary17"];
$sept=$x;
?> 

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary19' from feenotes where MONTH='Oct' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data19=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data19["sumsummary19"];
$oct=$x;
?> 

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary21' from feenotes where MONTH='Nov' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data21=$query->fetch(PDO::FETCH_ASSOC);
?>

				  
<?php 
$x = $data21["sumsummary21"];
$nov=$x;
?>

<?php
$sql="select MONTH,YEARR,SUM(FeeNoteTotal) as 'sumsummary23' from feenotes where MONTH='Dec' and YEAR(YEARR) = YEAR(CURRENT_DATE) ";
$query = $dbh -> prepare($sql);
$query->execute();
$data23=$query->fetch(PDO::FETCH_ASSOC);
?>
				  
<?php 
$x = $data23["sumsummary23"];
$dec=$x;
?>
				 				  
</div>
	
        <!-- Area Chart Example-->
        <div class="row">
		    <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Total reports</div>
              <div class="card-body">
                <div id="piechart"></div>
              </div>
              <div class="card-footer small text-muted">Updated 5 seconds Ago</div>
            </div>
          </div>
		  		  
          <div class="col-lg-7">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Monthly perfomance</div>
              <div class="card-body">
				<canvas id="myChart" width="100%" height="40"></canvas>
              </div>
              <div class="card-footer small text-muted">Updated 5 seconds Ago <a href="charts"> (Enlarge)</a></div>
            </div>
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

  <!-- This software is designed and maintained by Evans Mutai Mwendwa 0792019010 evansomutai@gmail.com -->
  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
    <script src="assets/js/custom-scripts.js"></script>
  <!-- Demo scripts for this page-->
  <script src="js/graphs/datatables-demo.js"></script>
  <script src="js/active.js"></script>
  <!-- Pie Chart-->
  <script src="css/Chart.min.js"></script>
  <script type="text/javascript" src="css/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Reports'],
  ['Assessments', <?php echo $totalassessments;?>],
  ['Tasks', <?php echo $totaltasks;?>],
  ['Reinspections', <?php echo $totalreinspections;?>],
  ['Valuations', <?php echo $totalvaluations;?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'', 'width':320, 'height':200};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>


<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June','July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Total Revenue',
            data: [<?php echo $jan;?>, <?php echo $feb; ?>, <?php echo $march; ?>,
			<?php echo $april; ?>, <?php echo $may; ?>,<?php echo $june; ?>, <?php echo $july; ?>, 
			<?php echo $aug; ?>, <?php echo $sept; ?>,<?php echo $oct; ?>,<?php echo $nov; ?>, <?php echo $dec; ?>],
            backgroundColor: [
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
				'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
				'rgba(86, 135, 255)',
                'rgba(86, 135, 255)'
            ],
            borderColor: [
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
				'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
                'rgba(86, 135, 255)',
				'rgba(86, 135, 255)',
                'rgba(86, 135, 255)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

		 
</body>

</html>
<?php } ?>
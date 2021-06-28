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
  
<style type="text/css">
#chart-container {
    width: 100%;
    height: auto;
}
</style> 

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
          <li class="breadcrumb-item active">Company Performance Graphs</li>
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

	
        <div class="row">
          <div class="col-lg-10">
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
<?php
$year = date("Y");
?>
                Company Performance Bar Chart for the year: (<?php echo $year;?>)</div>
              <div class="card-body">
                <canvas id="myChart" width="100%" height="40"></canvas>
              </div>
              <div class="card-footer small text-muted">Data collected from motor assessment & reinspection feenotes totals for each month. <strong>NOTE:</strong> This data is for the current year.</div>
            </div>
          </div>
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
          <a class="btn btn-primary" href="login">Logout</a>
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

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
  
   <!-- Charts-->
  <script src="css/Chart.min.js"></script>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'March', 'April', 'May', 'June','July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: ' Monthly Income',
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
<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login');
}
else{ 

if(isset($_POST['spares']))
  {
$itemstotal=$_POST['itemstotal'];
$discountdetails=$_POST['discountdetails'];
$discount=$_POST['discount'];
$discountt=$_POST['discountt'];
$netparts=$_POST['netparts'];
$id=intval($_GET['id']);

$sql="UPDATE assessmentdrafts set CostTotal=:itemstotal,DiscountDetails=:discountdetails,Discount=:discount,Discountt=:discountt,Net=:netparts where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':itemstotal',$itemstotal,PDO::PARAM_STR);
$query->bindParam(':discountdetails',$discountdetails,PDO::PARAM_STR);
$query->bindParam(':discount',$discount,PDO::PARAM_STR);
$query->bindParam(':discountt',$discountt,PDO::PARAM_STR);
$query->bindParam(':netparts',$netparts,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="Updated successfully";

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

$sql="UPDATE costofrepairsrevised set Number=:number,Quantity=:quantity,Description=:description,UnitCost=:unitcost,Total=:total where id=:id"; 
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
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:edit-assessment');
}
else{ 

if(isset($_POST['summary']))
  {
$subtotal=$_POST['subtotal'];
$vat=$_POST['vat'];
$grandtotal=$_POST['grandtotal'];
$id=intval($_GET['id']);

$sql="UPDATE assessmentdrafts set SubTotal=:subtotal,Vat=:vat,GrandTotal=:grandtotal where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':subtotal',$subtotal,PDO::PARAM_STR);
$query->bindParam(':vat',$vat,PDO::PARAM_STR);
$query->bindParam(':grandtotal',$grandtotal,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="Updated successfully";

}
?>

<?php
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:create-assessment');
}
else{ 

if(isset($_POST['submit2']))
  {
$number=$_POST['number'];
$qty=$_POST['qty'];
$description=$_POST['description'];
$unitcost=$_POST['unitcost'];
$total=$_POST['total'];
$reportid=$_POST['reportid'];

$sql="INSERT INTO costofrepairsrevised (Number,Quantity,Description,UnitCost,Total,ReportId) 
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

<?php
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:create-assessment');
}
else{ 

if(isset($_POST['submit3']))
  {

$descriptionsummary=$_POST['descriptionsummary'];
$totalsummary=$_POST['totalsummary'];
$reportidsummary=$_POST['reportidsummary'];

$sql="INSERT INTO costofrepairssummaryrevised (DescriptionSummary,TotalSummary,ReportIdSummary) 
VALUES(:descriptionsummary,:totalsummary,:reportidsummary)";
$query = $dbh->prepare($sql);
$query->bindParam(':descriptionsummary',$descriptionsummary,PDO::PARAM_STR);
$query->bindParam(':totalsummary',$totalsummary,PDO::PARAM_STR);
$query->bindParam(':reportidsummary',$reportidsummary,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg2="Item Posted Successfully";
}
else 
{
$error2="Something went wrong. Please try again";
}

}
?>

<?php
if(isset($_POST['del']))
	{
$delid=$_POST['id'];
$sql = "delete from costofrepairsrevised  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Item deleted successfully";
}
?>


<?php
if(isset($_POST['summaryedit']))
  {
$descriptions=$_POST['descriptions'];
$totals=$_POST['totals'];
$id=$_POST['id'];

$sql="UPDATE costofrepairssummaryrevised set DescriptionSummary=:descriptions,TotalSummary=:totals where id=:id"; 
$query = $dbh->prepare($sql);
$query->bindParam(':descriptions',$descriptions,PDO::PARAM_STR);
$query->bindParam(':totals',$totals,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="List Updated successfully";

}
?>

<?php
if(isset($_POST['delsummary']))
	{
$delid=$_POST['id'];
$sql = "delete from costofrepairssummaryrevised  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Item deleted successfully";
}
 ?>
 
<?php
if(isset($_POST['summary']))
  {
$subtotal=$_POST['subtotal'];
$vat=$_POST['vat'];
$partsvatdesc=$_POST['partsvatdesc'];
$grandtotal=$_POST['grandtotal'];
$id=intval($_GET['id']);

$sql="UPDATE assessmentdrafts set SubTotal=:subtotal,Vat=:vat,PartsVatDesc=:partsvatdesc,GrandTotal=:grandtotal where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':subtotal',$subtotal,PDO::PARAM_STR);
$query->bindParam(':vat',$vat,PDO::PARAM_STR);
$query->bindParam(':partsvatdesc',$partsvatdesc,PDO::PARAM_STR);
$query->bindParam(':grandtotal',$grandtotal,PDO::PARAM_STR);
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
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
   
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet"> 
</head>

<body id="page-top">

      <?php include('includes/header.php');?>

  <div id="wrapper">

    <!-- Sidebar -->
<?php include('includes/sidenav.php');?>

    <div id="content-wrapper"><br><br><br>

<div class="container-fluid">
<?php if($error1){?><div style="padding-bottom:15px;" ><?php echo htmlentities($error1); ?> </div><?php } 
else if($msg1){?><div style="padding-bottom:15px;"><?php echo htmlentities($msg1); ?> </div><?php }?>
<?php if($error2){?><div style="padding-bottom:15px;"><?php echo htmlentities($error2); ?> </div><?php } 
else if($msg2){?><div style="padding-bottom:15px;"><?php echo htmlentities($msg2); ?> </div><?php }?>
<?php if($msg){?><div style="padding-bottom:15px;"><?php echo htmlentities($msg); ?> </div><?php } ?>


<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentdrafts where id=:id";
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
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" name="customer" id="customer" class="form-control" value="<?php echo htmlentities($result->RegistrationNo);?>" readonly required>
                  <label for="customer">Registration No.</label>
                </div>
              </div>

			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="user" class="form-control" value="<?php echo htmlentities($result->User);?>" readonly required>
                  <label for="user">Report Created By</label>
                </div>
              </div>

			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="date" class="form-control" value="<?php echo htmlentities($result->AssessmentDate);?>" readonly required>
                  <label for="date">Assessment Date</label>
                </div>
              </div>

			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="ref" class="form-control" value="<?php echo htmlentities($result->Ref);?>" readonly required>
                  <label for="ref">Our Ref:</label>
                </div>
              </div>
			  <a hidden style="color:white; padding:10px; margin-right:10px;" class="btn btn-primary btn-sm" href="upload-photos?id=<?php echo htmlentities($result->id);?>"><i class="fa fa-plus"> </i> Add Photos</a>
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
			  
			  <a style="padding:10px;" class="btn btn-danger" href="assessment-drafts"><<-Back</a>
			  
<?php } else{ ?> 			  
 
             <a style="padding:10px;" class="btn btn-danger" href="assessment-drafts"><<-Back</a>
			  
<?php } ?>	
		  
            </div>
          </div><hr>
		  <h5 style="color:green; padding:10px;"><strong>Update Motor Assessment Report (Revised)</strong></h5>		  
		  
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentdrafts where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>		  
    <div class="form-row">
    <div style="margin-bottom:10px;" class="col-11">
      <div class="card mt-3 tab-card">
        <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
		    <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="Three" aria-selected="false" style="color:red;">Cost of Spare Parts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Three" aria-selected="false" style="color:red;">Repairs Summary</a>
            </li>

          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
		  
		  
		  <form method="post" onSubmit="return valid();">
          <div class="form-group">
            <div class="form-row">
			  <div class="col-md-1">
                <div class="form-label-group">
                  <input type="text" id="number" name="number" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="number">NO.</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-label-group">
                  <input type="text" id="qty" name="qty" class="form-control" oninput="calculate2();" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="qty">Qty</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="description" name="description" class="form-control" placeholder="Last name" required="required">
                  <label for="description">Description</label>
                </div>
              </div>
			    <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="unitcost" name="unitcost" class="form-control" oninput="calculate2();" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="unitcost">Unit Cost</label>
                </div>
              </div>
			  	<div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="total" name="total" class="form-control" oninput="calculate2();" placeholder="First name" required="required" autofocus="autofocus" readonly>
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
</div></form>	<?php }} }} ?>
		  
		  
		  
		  							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
										    <th style="width:10px; font-size:13px;">NO.</th>
											<th style="width:10px; font-size:13px;">QTY</th>
											<th style="width:100px; font-size:13px;">Description</th>
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
$sql = "SELECT * from costofrepairsrevised where ReportId=$id";
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
											<td style="font-size:13px; width:150px;"><button type="submit" name="del" ><i style="color:red;" class="fa fa-trash"> Delete</i></button> - <button type="submit" name="spareslist" ><i style="color:green;" class="fa fa-save"> Update</i></button></td>
											</form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
									</tbody>
								</table>
								
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentdrafts where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?> 
			<form method="post" onSubmit="return valid();">	



<?php
$id=intval($_GET['id']);
$sql="select SUM(Total) as 'sumtotal' from costofrepairsrevised where ReportId=$id";
$query = $dbh -> prepare($sql);
$query->execute();
$data=$query->fetch(PDO::FETCH_ASSOC);
?>


			
		    <div class="form-group">
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="itemstotal" name="itemstotal" oninput="calculate1();" class="form-control" value="<?php echo $data["sumtotal"];?>"  autofocus="autofocus" readonly>
                  <label for="itemstotal">Total</label>
                </div>
              </div>
			  <div class="col-md-4"><br>
                <div class="form-label-group">
                  <input type="text" id="discountdetails" name="discountdetails" value="<?php echo htmlentities($result->DiscountDetails);?>" class="form-control" value="" autofocus="autofocus">
                  <label for="discountdetails">Discount Details</label>
                </div>
              </div>
			  <div class="col-md-5"><br>
                <div class="form-label-group">
                  <input type="text" id="discountt" name="discountt"  value="<?php echo htmlentities($result->Discountt);?>" oninput="calculate1();" class="form-control" value="" autofocus="autofocus">
                  <label for="discountt">Discount Example: for 7.5% discount enter 0.075</label>
                </div>
              </div>
              <div class="col-md-3"><br>
                <div class="form-label-group">
                  <input type="text" id="discount" name="discount" oninput="calculate1();" value="<?php echo htmlentities($result->Discount);?>" class="form-control" readonly>
                  <label for="discount">Discount Total</label>
                </div>
              </div>
			    <div class="col-md-2"><br>
                <div class="form-label-group">
                  <input type="text" id="netparts" name="netparts" oninput="calculate1();" class="form-control" value="<?php echo htmlentities($result->Net);?>" autofocus="autofocus" readonly>
                  <label for="netparts">Total Parts</label>
                </div><br>       
		    <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="spares"  ><i class="fas fa-fw fa-folder"> </i> Save</button>
            </div>
          </div></form><?php }} ?>	 

          </div>
</form>
<?php }} ?>

<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentdrafts where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
		  
<form method="post" onSubmit="return valid();">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <div class="form-label-group">
                  <input type="text" id="descriptionsummary" name="descriptionsummary" class="form-control" placeholder="Last name" required="required">
                  <label for="descriptionsummary">Description</label>
                </div>
              </div>
			  <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="totalsummary" name="totalsummary" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="totalsummary">Total</label>
                </div>
              </div>
			  <div hidden class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="reportidsummary" name="reportidsummary" class="form-control" value="<?php echo htmlentities($result->id);?>" required>
                  <label for="reportidsummary">Report ID</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px; height:35px;" type="submit" name="submit3"  ><i class="fa fa-plus"> </i> Add Item</button>
            </div></div></form><?php }} ?> 
		  
		  							<table style="width:850px;" id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
											<th style="width:170px; font-size:13px;">Description</th>
											<th style="width:30px; font-size:13px;">Total</th>
											<th style="width:10px; font-size:13px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php
$id=intval($_GET['id']);
$sql = "SELECT * from costofrepairssummaryrevised where ReportIdSummary=$id";
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
											<td style="font-size:13px;"><input style="width:350px;" type="text" name="descriptions" value="<?php echo htmlentities($result->DescriptionSummary);?>"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"></td>
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="totals" value="<?php echo htmlentities($result->TotalSummary);?>"></td>
											<td style="font-size:13px; width:150px;"><button type="submit" name="delsummary" ><i style="color:red;" class="fa fa-trash"> Delete</i></button> - <button type="submit" name="summaryedit" ><i style="color:green;" class="fa fa-save"> Update</i></button></td>
											</form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										<tr>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentdrafts where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
										<td style="font-size:13px;"><input style="width:350px;" type="text" name="parts" value="Replacement parts" readonly></td>
										<td style="font-size:13px;"><input style="width:100px;" type="text" name="net" value="<?php echo htmlentities($result->Net);?>" readonly></td>
										<td style="font-size:13px; width:150px;"></td><?php }} ?>
										</tr>
									</tbody>
								</table>

<?php
$id=intval($_GET['id']);
$sql="select SUM(TotalSummary) as 'sumsummary' from costofrepairssummaryrevised where ReportIdSummary=$id";
$query = $dbh -> prepare($sql);
$query->execute();
$data=$query->fetch(PDO::FETCH_ASSOC);
?>

				  <input style="width:100px;" type="text" id="totalsummaryy" oninput="calculate();" value="<?php echo $data["sumsummary"];?>" hidden>																
                  <input style="width:100px;" type="text" id="totalpartss" oninput="calculate();" value="<?php echo htmlentities($result->Net);?>" hidden >
				  <button style="margin-left:500px;" onclick="calculate()">Calculate</button>

								
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from assessmentdrafts where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>								
			<form method="post" onSubmit="return valid();">					
		    <div class="form-group">
            <div>
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="subtotal" name="subtotal" value="<?php echo htmlentities($result->SubTotal);?>" oninput="calculate();" class="form-control" value="">
                  <label for="subtotal">Sub-Total</label>
                </div>
              </div><br>
			<div style="margin-left:15px; width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate();" id="vatt" name="vatt" required>
			<option disabled selected style="display: none;"value="">Select VAT</option>
			<option value="0.16">16% VAT</option>
			<option value="0.14">14% VAT</option>	
            <option value="0">0% VAT</option>			
			</select>
            </div>
			<div class="col-md-3"><br>
                <div class="form-label-group">
                  <input type="text" id="partsvatdesc" name="partsvatdesc" class="form-control" placeholder="Last name" value="<?php echo htmlentities($result->PartsVatDesc);?>" required>
                  <label for="partsvatdesc">VAT Description</label>
                </div>
            </div>
			  <div class="col-md-2"><br>
                <div class="form-label-group">
                  <input type="text" id="vat" name="vat" oninput="calculate();" class="form-control" value="<?php echo htmlentities($result->Vat);?>" readonly>
                  <label for="vat">+16% VAT</label>
                </div>
              </div>
			    <div class="col-md-3"><br>
                <div class="form-label-group">
                  <input type="text" id="grandtotal" name="grandtotal" oninput="calculate();" class="form-control" value="<?php echo htmlentities($result->GrandTotal);?>" readonly>
                  <label for="grandtotal">Total repair cost</label>
                </div><br>
				<button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="summary"  ><i class="fas fa-fw fa-folder"> </i> Save</button>
              </div>	 
            </div>
          </div></form><?php }} ?>
 <br>
</div>

</div>
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
  
  
<script>
    function calculate() {
        var myBox1 = document.getElementById('subtotal').value; 
        var myBox2 = document.getElementById('vatt').value;
        var results = document.getElementById('vat'); 
        var myResult = Number(myBox1) * Number(myBox2);
          document.getElementById('vat').value = myResult;		  
		var myBox4 = document.getElementById('vat').value; 
        var myBox5 = document.getElementById('subtotal').value;
        var results = document.getElementById('grandtotal'); 
        var myResult = Number(myBox5) + Number(myBox4);
          document.getElementById('grandtotal').value = myResult;
		var myBox6 = document.getElementById('totalsummaryy').value; 
        var myBox7 = document.getElementById('totalpartss').value;
        var results = document.getElementById('subtotal'); 
        var myResult = Number(myBox6) + Number(myBox7);
          document.getElementById('subtotal').value = myResult;	

    }
</script>

<script>
    function calculate1() {
        var myBox1 = document.getElementById('itemstotal').value; 
        var myBox2 = document.getElementById('discountt').value;
        var results = document.getElementById('discount'); 
        var myResult = Number(myBox1) * Number(myBox2);
          document.getElementById('discount').value = myResult;		  
		var myBox4 = document.getElementById('discount').value; 
        var myBox5 = document.getElementById('itemstotal').value;
        var results = document.getElementById('netparts'); 
        var myResult = Number(myBox5) - Number(myBox4);
          document.getElementById('netparts').value = myResult;

    }
</script>

<script>
    function calculate2() {
        var myBox1 = document.getElementById('qty').value; 
        var myBox2 = document.getElementById('unitcost').value;
        var results = document.getElementById('total'); 
        var myResult = Number(myBox1) * Number(myBox2);
          document.getElementById('total').value = myResult;		  

    }
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
<?php }} ?>
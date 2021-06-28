<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/conn.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:edit-assessment');
}
else{ 

if(isset($_POST['spares1']))
  {
$totalparts1=$_POST['totalparts1'];
$id=intval($_GET['id']);

$sql="UPDATE reinspections set TotalParts=:totalparts1 where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':totalparts1',$totalparts1,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="Updated successfully";

}
?>

<?php
if(isset($_POST['spares2']))
  {
$totalparts2=$_POST['totalparts2'];
$id=intval($_GET['id']);

$sql="UPDATE reinspections set TotalParts=:totalparts2 where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':totalparts2',$totalparts2,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="Updated successfully";

}
?>

<?php
if(isset($_POST['remarks']))
  {
$no=$_POST['no'];
$qty=$_POST['qty'];
$description=$_POST['description'];
$remark=$_POST['remark'];
$amount=$_POST['amount'];
$id=$_POST['id'];

$sql="UPDATE reinspectionremarks set No=:no,Qty=:qty,Description=:description,Remark=:remark,Amount=:amount where id=:id"; 
$query = $dbh->prepare($sql);
$query->bindParam(':no',$no,PDO::PARAM_STR);
$query->bindParam(':qty',$qty,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':amount',$amount,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="List Updated successfully";

}
?>

<?php
if(isset($_POST['repair']))
  {

$description=$_POST['description'];
$total=$_POST['total'];
$id=$_POST['id'];

$sql="UPDATE reinspectionrepair set Description=:description,Total=:total where id=:id"; 
$query = $dbh->prepare($sql);

$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':total',$total,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="List Updated successfully";

}
?>






<?php
if(isset($_POST['repairr']))
  {

$descriptions=$_POST['descriptions'];
$totals=$_POST['totals'];
$id=$_POST['id'];

$sql="UPDATE costofrepairssummary set DescriptionSummary=:descriptions,TotalSummary=:totals where id=:id"; 
$query = $dbh->prepare($sql);

$query->bindParam(':descriptions',$descriptions,PDO::PARAM_STR);
$query->bindParam(':totals',$totals,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="List Updated successfully";

}
?>	






<?php
if(isset($_POST['summary']))
  {

$description=$_POST['description'];
$total=$_POST['total'];
$id=$_POST['id'];

$sql="UPDATE reinspectionsummary set Description=:description,Total=:total where id=:id"; 
$query = $dbh->prepare($sql);

$query->bindParam(':description',$description,PDO::PARAM_STR);
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

if(isset($_POST['summary1']))
  {
$subtotal=$_POST['subtotal'];
$partsvat=$_POST['partsvat'];
$partsvatdesc=$_POST['partsvatdesc'];
$grandtotal=$_POST['grandtotal'];
$id=intval($_GET['id']);

$sql="UPDATE reinspections set SubTotal=:subtotal,PartsVat=:partsvat,PartsVatDesc=:partsvatdesc,GrandTotal=:grandtotal where id=:id";
$query = $dbh->prepare($sql);
$query->bindParam(':subtotal',$subtotal,PDO::PARAM_STR);
$query->bindParam(':partsvat',$partsvat,PDO::PARAM_STR);
$query->bindParam(':partsvatdesc',$partsvatdesc,PDO::PARAM_STR);
$query->bindParam(':grandtotal',$grandtotal,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

$msg="Updated successfully";

}
?>

<?php
if(isset($_POST['submit-remarks']))
  {
$no=$_POST['no'];
$qty=$_POST['qty'];
$description=$_POST['description'];
$remark=$_POST['remark'];
$amount=$_POST['amount'];
$reportid=$_POST['reportid'];

$sql="INSERT INTO reinspectionremarks (No,Qty,Description,Remark,Amount,ReportId) 
VALUES(:no,:qty,:description,:remark,:amount,:reportid)";
$query = $dbh->prepare($sql);
$query->bindParam(':no',$no,PDO::PARAM_STR);
$query->bindParam(':qty',$qty,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':remark',$remark,PDO::PARAM_STR);
$query->bindParam(':amount',$amount,PDO::PARAM_STR);
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
if(isset($_POST['submit-summary']))
  {
$description=$_POST['description'];
$total=$_POST['total'];
$reportid=$_POST['reportid'];

$sql="INSERT INTO reinspectionrepair (Description,Total,ReportId) 
VALUES(:description,:total,:reportid)";
$query = $dbh->prepare($sql);

$query->bindParam(':description',$description,PDO::PARAM_STR);
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
if(isset($_POST['del']))
	{
$delid=$_POST['id'];
$sql = "delete from reinspectionremarks  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Item deleted successfully";
}
?>

<?php
if(isset($_POST['delrepair']))
	{
$delid=$_POST['id'];
$sql = "delete from reinspectionrepair  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Item deleted successfully";
}
?>

<?php
if(isset($_POST['delsummary']))
	{
$delid=$_POST['id'];
$sql = "delete from costofrepairssummary  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Item deleted successfully";
}
?>

<?php
if(isset($_POST['del2']))
	{
$delid=$_POST['id'];
$sql = "delete from costofrepairs  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="Item deleted successfully";
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

$sql="UPDATE costofrepairs set Number=:number,Quantity=:quantity,Description=:description,Remarks=:unitcost,Total=:total where id=:id"; 
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
$sql ="SELECT * from reinspections where id=:id";
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
                  <input type="text" id="date" class="form-control" value="<?php echo htmlentities($result->Date);?>" readonly required>
                  <label for="date">Valuation Date</label>
                </div>
              </div>

			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="ref" class="form-control" value="<?php echo htmlentities($result->Ref);?>" readonly required>
                  <label for="ref">Our Ref:</label>
                </div>
              </div>
			  <a style="color:white; padding:10px; margin-right:10px;" class="btn btn-primary btn-sm" href="upload-reinspection-photos?id=<?php echo htmlentities($result->id);?>"><i class="fa fa-plus"> </i> Add Photos</a>
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
			  
			  <a style="padding:10px;" class="btn btn-danger" href="re-inspections-admin"><<-Back</a>
			  
<?php } else{ ?> 			  
 
             <a style="padding:10px;" class="btn btn-danger" href="re-inspections"><<-Back</a>
			  
<?php } ?>
            </div>
          </div><hr>
		  <h5 style="color:green; padding:10px;"><strong>Update Reinspection Report</strong></h5>
		  
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
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
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="false" style="color:red;">Replacement Parts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false" style="color:red;">Other Costs</a>
            </li>
			<li class="nav-item" hidden>
                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false" style="color:red;">Repairs Summary</a>
            </li>

          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
<?php $xx=($result->Imported);?>
<?php if($xx==1){
?>	
		  		  					<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
										    <th style="width:10px; font-size:13px;">NO.</th>
											<th style="width:10px; font-size:13px;">QTY</th>
											<th style="width:100px; font-size:13px;">Description</th>
											<th style="width:40px; font-size:13px;">Remarks</th>
											<th style="width:30px; font-size:13px;">Total</th>
											<th style="width:10px; font-size:13px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php
$id=($result->AssessmentReportId);
$sql = "SELECT * from costofrepairs where ReportId=$id";
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
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="unitcost" value="<?php echo htmlentities($result->Remarks);?>"></td>
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="total" value="<?php echo htmlentities($result->Total);?>"></td>
											<td style="font-size:13px; width:150px;"><button type="submit" name="del2" ><i style="color:red;" class="fa fa-trash"> Delete</i></button> - <button type="submit" name="spareslist" ><i style="color:green;" class="fa fa-save"> Update</i></button></td>
											</form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
									</tbody>
								</table>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	}}?>								
								
<?php
$id=($result->AssessmentReportId);
$sql="select SUM(Total) as 'sumtotal' from costofrepairs where ReportId=$id";
$query = $dbh -> prepare($sql);
$query->execute();
$data=$query->fetch(PDO::FETCH_ASSOC);
?>
              <form method="post" onSubmit="return valid();">	
              <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="totalparts1" name="totalparts1" oninput="calculate1();" class="form-control" value="<?php echo $data["sumtotal"];?>"  autofocus="autofocus" readonly>
                  <label for="totalparts1">Total Parts</label>
                </div>
              </div>
			<div class="col-md-2"><br>       
		    <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="spares1"><i class="fas fa-fw fa-folder"> </i> Save</button>
            </div></form>			  
							

<?php } else{ ?> 
		  
		  <form method="post" onSubmit="return valid();">
<?php 
$x=intval($_GET['id']);
$sql ="SELECT No FROM reinspectionremarks WHERE ReportId=$x ORDER BY id DESC LIMIT 1";
$query= $dbh -> prepare($sql);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $data)
	{
    
$namba1=($data->No);
$namba2=1;
$namba3=$namba1+$namba2;
}}?>		  
          <div class="form-group">
            <div class="form-row">
			  <div class="col-md-1">
                <div class="form-label-group">
                  <input type="text" id="no" name="no" class="form-control" value="<?php echo $namba3; ?>" placeholder="First name"  autofocus="autofocus">
                  <label for="no">NO.</label>
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-label-group">
                  <input type="text" id="qty" name="qty" class="form-control" placeholder="First name"  autofocus="autofocus">
                  <label for="qty">Qty</label>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="description" name="description" class="form-control" placeholder="Last name">
                  <label for="description">Description</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="remark" name="remark" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="remark">Remarks</label>
                </div>
              </div>
			  <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="amount" name="amount" class="form-control" placeholder="First name" autofocus="autofocus">
                  <label for="amount">Amount</label>
                </div>
              </div>
			  <div hidden class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" required>
                  <label for="reportid">Report ID</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px; height:35px;" type="submit" name="submit-remarks"  ><i class="fa fa-plus"> </i> Add Item</button>
            </div>
</div></form>	
		  
		  
		  
		  							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
										    <th style="width:10px; font-size:13px;">NO.</th>
											<th style="width:10px; font-size:13px;">QTY</th>
											<th style="width:150px; font-size:13px;">Description</th>
											<th style="width:40px; font-size:13px;">Remarks</th>
											<th style="width:40px; font-size:13px;">Amount</th>
											<th style="width:10px; font-size:13px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php
$id=intval($_GET['id']);
$sql = "SELECT * from reinspectionremarks where ReportId=$id";
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
											<td style="font-size:13px;"><input style="width:35px;" type="text" name="no" value="<?php echo htmlentities($result->No);?>"></td>
											<td style="font-size:13px;"><input style="width:35px;" type="text" name="qty" value="<?php echo htmlentities($result->Qty);?>"></td>
											<td style="font-size:13px;"><input style="width:250px;" type="text" name="description" value="<?php echo htmlentities($result->Description);?>"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"></td>
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="remark" value="<?php echo htmlentities($result->Remark);?>"></td>
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="amount" value="<?php echo htmlentities($result->Amount);?>"></td>											
											<td style="font-size:13px; width:150px;"><button type="submit" name="del" ><i style="color:red;" class="fa fa-trash"> Delete</i></button> - <button type="submit" name="remarks" ><i style="color:green;" class="fa fa-save"> Update</i></button></td>
											</form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>  

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
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
$sql="select SUM(Amount) as 'sumtotal' from reinspectionremarks where ReportId=$id";
$query = $dbh -> prepare($sql);
$query->execute();
$data=$query->fetch(PDO::FETCH_ASSOC);
?>			
		    <div class="form-group"><hr>
              <div class="col-md-3">
                <div class="form-label-group">
                  <input type="text" id="totalparts2" name="totalparts2" class="form-control" value="<?php echo $data["sumtotal"];?>"  autofocus="autofocus" readonly>
                  <label for="totalparts2">Total Parts</label>
                </div>
              </div>
			<div class="col-md-2"><br>       
		    <button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="spares2"><i class="fas fa-fw fa-folder"> </i> Save</button>
            </div>
          </div></form>	<?php }} ?><?php }} ?> <?php }} }} ?> <?php } ?>

          </div>


<div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
<?php $xx=($result->Imported);?>
<?php if($xx==1){
?>
		  
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
$id=($result->AssessmentReportId);
$sql = "SELECT * from costofrepairssummary where ReportIdSummary=$id";
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
											<td style="font-size:13px; width:150px;"><button type="submit" name="delsummary" ><i style="color:red;" class="fa fa-trash"> Delete</i></button> - <button type="submit" name="repairr" ><i style="color:green;" class="fa fa-save"> Update</i></button></td>
											</form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										<tr>
										
										
										
									
										
										
										
										
										
										
										
										
										
										
										
										
										
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
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
										<td style="font-size:13px;"><input style="width:100px;" type="text" name="net" value="<?php echo htmlentities($result->TotalParts);?>" readonly></td>
										<td style="font-size:13px; width:150px;"></td><?php }} ?>
										</tr>
									</tbody>
								</table>
	
<?php } else{ ?> 

<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
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
                  <input type="text" id="summarydescription" name="description" class="form-control" placeholder="Last name" required="required">
                  <label for="summarydescription">Description</label>
                </div>
              </div>
			    <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="summarytotal" name="total" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="summarytotal">Total</label>
                </div>
              </div>
			  <div hidden class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" required>
                  <label for="reportid">Report ID</label>
                </div>
              </div><?php }} ?>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px; height:35px;" type="submit" name="submit-summary"  ><i class="fa fa-plus"> </i> Add Item</button>
            </div>
          </div></form> 	
		  
		  
		                            
		  							<table style="width:850px;" id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
											<th style="width:60px; font-size:13px;">Description</th>
											<th style="width:40px; font-size:13px;">Remarks</th>
											<th style="width:10px; font-size:13px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php
$id=intval($_GET['id']);
$sql = "SELECT * from reinspectionrepair where ReportId=$id";
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
											<td style="font-size:13px;"><input style="width:300px;" type="text" name="description" value="<?php echo htmlentities($result->Description);?>"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"></td>
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="total" value="<?php echo htmlentities($result->Total);?>"></td>
											<td style="font-size:13px; width:150px;"><button type="submit" name="delrepair" ><i style="color:red;" class="fa fa-trash"> Delete</i></button> - <button type="submit" name="repair" ><i style="color:green;" class="fa fa-save"> Update</i></button></td>
											</form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
										<tr>
										
																			
										
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
										<td style="font-size:13px;"><input style="width:300px;" type="text" name="parts" value="Total parts" readonly></td>
										<td style="font-size:13px;"><input style="width:100px;" type="text" name="net" value="<?php echo htmlentities($result->TotalParts);?>" readonly></td>
										<td style="font-size:13px; width:150px;"></td><?php }} ?>
										</tr>
										
									</tbody>
								</table>
<?php
$id=intval($_GET['id']);
$sql="select SUM(Total) as 'sumsummary' from reinspectionrepair where ReportId=$id";
$query = $dbh -> prepare($sql);
$query->execute();
$data=$query->fetch(PDO::FETCH_ASSOC);
?>
<?php } ?>
				  <input style="width:100px;" type="text" id="totalsummary" oninput="calculate();" value="<?php echo $data["sumsummary"];?>" hidden >	


<?php
$id=($result->AssessmentReportId);
$sql="select SUM(TotalSummary) as 'sumsummary' from costofrepairssummary where ReportIdSummary=$id";
$query = $dbh -> prepare($sql);
$query->execute();
$data=$query->fetch(PDO::FETCH_ASSOC);
?>

				  <input style="width:100px;" type="text" id="totalsummary2" oninput="calculate();" value="<?php echo $data["sumsummary"];?>" hidden>			  
                  <input style="width:100px;" type="text" id="totals" oninput="calculate();" value="<?php echo htmlentities($result->TotalParts);?>" hidden >
				  <button style="margin-left:470px;" onclick="calculate()">Calculate</button>
				  
				  
				  
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
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
                  <input type="text" id="subtotal" name="subtotal" oninput="calculate();" class="form-control" value="<?php echo htmlentities($result->SubTotal);?>">
                  <label for="subtotal">Sub-Total</label>
                </div>
              </div><br>
			  
			<div style="margin-left:15px; width:150px;" class="checkbox checkbox-inline">
		    <select class="form-control" oninput="calculate();" id="vatt" name="vatt">
			<option value="0.14">14% VAT</option>
			<option value="0.16">16% VAT</option>				
            <option value="0">0% VAT</option>			
			</select>
            </div>
			<div class="col-md-3"><br>
                <div class="form-label-group">
                  <input type="text" id="partsvatdesc" name="partsvatdesc" class="form-control" placeholder="Last name" value="14% VAT" required>
                  <label for="partsvatdesc">VAT Description</label>
                </div>
            </div>
			  <div class="col-md-2"><br>
                <div class="form-label-group">
                  <input type="text" id="partsvat" name="partsvat" oninput="calculate();" class="form-control" value="<?php echo htmlentities($result->PartsVat);?>" readonly>
                  <label for="partsvat">VAT</label>
                </div>
              </div>
			    <div class="col-md-3"><br>
                <div class="form-label-group">
                  <input type="text" id="grandtotal" name="grandtotal" oninput="calculate();" class="form-control" value="<?php echo htmlentities($result->GrandTotal);?>" readonly>
                  <label for="grandtotal">Total repair cost</label>
                </div><br>
				<button class="btn btn-primary btn-sm" style="margin-right:10px;" type="submit" name="summary1"  ><i class="fas fa-fw fa-folder"> </i> Save</button>
              </div>	 
            </div>
          </div></form><?php }} ?>
 <br>
</div>

<div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
<?php 
$id=intval($_GET['id']);
$sql ="SELECT * from reinspections where id=:id";
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
                  <input type="text" id="summarydescription" name="description" class="form-control" placeholder="Last name" required="required">
                  <label for="summarydescription">Description</label>
                </div>
              </div>
			    <div class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="summarytotal" name="total" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="summarytotal">Total</label>
                </div>
              </div>
			  <div hidden class="col-md-2">
                <div class="form-label-group">
                  <input type="text" id="reportid" name="reportid" class="form-control" value="<?php echo htmlentities($result->id);?>" required>
                  <label for="reportid">Report ID</label>
                </div>
              </div>
			  <button class="btn btn-primary btn-sm" style="margin-right:10px; height:35px;" type="submit" name="submit-repair"  ><i class="fa fa-plus"> </i> Add Item</button>
            </div>
          </div></form> <?php }} ?>
		  
		  
		  
		  							<table style="width:850px;" id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" height="3%">
									<thead style="color:green;">
										<tr>
											<th style="width:60px; font-size:13px;">Description</th>
											<th style="width:40px; font-size:13px;">Total</th>
											<th style="width:10px; font-size:13px;">Action</th>
										</tr>
									</thead>
									<tfoot>
									</tfoot>
									<tbody>

<?php
$id=intval($_GET['id']);
$sql = "SELECT * from reinspectionrepair where ReportId=$id";
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
											<td style="font-size:13px;"><input style="width:300px;" type="text" name="description" value="<?php echo htmlentities($result->Description);?>"><input hidden name="id" value="<?php echo htmlentities($result->id);?>"></td>
											<td style="font-size:13px;"><input style="width:100px;" type="text" name="total" value="<?php echo htmlentities($result->Total);?>"></td>
											<td style="font-size:13px; width:150px;"><button type="submit" name="delsummary" ><i style="color:red;" class="fa fa-trash"> Delete</i></button> - <button type="submit" name="summary" ><i style="color:green;" class="fa fa-save"> Update</i></button></td>
											</form>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

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
        var results = document.getElementById('partsvat'); 
        var myResult = Number(myBox1) * Number(myBox2);
          document.getElementById('partsvat').value = myResult;		  
		var myBox4 = document.getElementById('partsvat').value; 
        var myBox5 = document.getElementById('subtotal').value;
        var results = document.getElementById('grandtotal'); 
        var myResult = Number(myBox5) + Number(myBox4);
          document.getElementById('grandtotal').value = myResult;
		var myBox6 = document.getElementById('totalsummary').value; 
		var myBox8 = document.getElementById('totalsummary2').value; 
        var myBox7 = document.getElementById('totals').value;
        var results = document.getElementById('subtotal'); 
        var myResult = Number(myBox6) + Number(myBox7) + Number(myBox8) ;
          document.getElementById('subtotal').value = myResult;	

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

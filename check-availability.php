<?php
require_once("includes/config.php");
// code user email availablity
if(!empty($_POST["feenoteno"])) {
	$feenoteno= $_POST["feenoteno"];
	if (filter_var($feenoteno, FILTER_VALIDATE_EMAIL)===true) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT FeeNoteNo FROM feenotes WHERE FeeNoteNo=:feenoteno";
$query= $dbh -> prepare($sql);
$query-> bindParam(':feenoteno', $feenoteno, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Fee Note No. already exists .</span>";
 echo "<script>$('#submit2').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Number is OK!.</span>";
 echo "<script>$('#submit2').prop('disabled',false);</script>";
}
}
}
?>
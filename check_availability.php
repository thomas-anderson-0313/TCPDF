<?php 
require_once("includes/config.php");
// code user email availablity
if(!empty($_POST["fname"])) {
	$fname= $_POST["fname"];
	if (filter_var($fname, FILTER_VALIDATE_EMAIL)===true) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT UserName FROM users WHERE UserName=:fname";
$query= $dbh -> prepare($sql);
$query-> bindParam(':fname', $fname, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Username already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Username is available for Registration.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
?>


<?php
if(!empty($_POST["feenoterefno"])) {
	$feenoterefno= $_POST["feenoterefno"];
	if (filter_var($feenoterefno, FILTER_VALIDATE_EMAIL)===true) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT FeeNoteRefNo FROM reinspections WHERE FeeNoteRefNo=:feenoterefno";
$query= $dbh -> prepare($sql);
$query-> bindParam(':feenoterefno', $feenoterefno, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Fee note number already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Number is OK!</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
?>

<?php
if(!empty($_POST["fullname"])) {
	$fullname= $_POST["fullname"];
	if (filter_var($fullname, FILTER_VALIDATE_EMAIL)===true) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT Name FROM customers WHERE Name=:fullname";
$query= $dbh -> prepare($sql);
$query-> bindParam(':fullname', $fullname, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Insurance Company already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Insurance Company is available for Registration.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
?>
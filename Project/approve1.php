<?php
session_start();
?>


<?php 
     if(empty($_SESSION["username"])){
          header('location:Login.php');
     }else {
     $op_user=$_SESSION["username"];
     }?>

<?php
date_default_timezone_set('Asia/Calcutta');
?>
<?php
	$username ="RETAILERS";
	$password = "mysql";
	$host = "localhost";
	$dbname = "order_manager";

	$con = new mysqli("$host", "$username", "$password", "$dbname");
	//$con = mysql_connect("localhost","RETAILERS", "mysql");
	//echo " connected";
	if (!$con)
	{
	  	die('Could not connect: ' . mysqli_connect_error());
	}
	else 
	{
		//echo "database connected" + $dbname +"    ";
	}
	//mysqli_select_db("temp" , $con);
	mysqli_select_db($con,"order_manager")  or die(mysqli_connect_error($con));

	$r_id = $_GET['value'];
	echo $op_user;
$r=mysqli_query($con,"SELECT * FROM operator WHERE username='$op_user'");
$row1=mysqli_fetch_assoc($r);
$o_id=$row1['oeprator_id'];
echo $o_id;
	$sql = "UPDATE retailers SET retailers.approved_status='1', retailers.approved_by='$o_id' where retailers.Retailerid='$r_id' ";
	
	$result=mysqli_query($con,$sql);
	header("location:Approve_New_Retailers.php");

?>
			

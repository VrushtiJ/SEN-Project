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

	$o_id = $_GET['value'];
	$sql = "UPDATE operator SET approvedstatus='1' where oeprator_id='$o_id' ";
	
	$result=mysqli_query($con,$sql);
	header("location:Approve_New_Operators.php");

?>
			

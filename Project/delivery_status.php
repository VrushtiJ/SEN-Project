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
                $username ="RETAILERS";
				$password = "mysql";
				$host = "localhost";
				$dbname = "order_manager";

				$con = new mysqli("$host", "$username", "$password", "$dbname");
				//$con = mysql_connect("localhost","RETAILERS", "mysql");
				if (!$con)	{
				  die('Could not connect: ' . mysqli_connect_error());
				}
				else {
				//	echo "database connected" + $dbname +"    ";
				//<br>
				}
				
				mysqli_select_db($con,"order_manager")or die(mysqli_connect_error($con));

if(isset($_GET['value']))
{
	$op="SELECT * from operator where username='$op_user'";
	$op_res=mysqli_query($con,$op);
	$op_row=mysqli_fetch_assoc($op_res);
	$op_id=$op_row['oeprator_id'];


	$update="UPDATE orders SET delivery_status='1' WHERE order_id='$_GET[value]'";
	// echo $update;
	mysqli_query($con,$update);
	$time = date('Y-m-d H:i:s');
	$sql = "UPDATE orders SET delivery_date='$time' WHERE order_id='$_GET[value]'";
	mysqli_query($con,$sql);

 	$op_app="UPDATE orders SET delivered_by='$op_id' where order_id='$_GET[value]'";
	mysqli_query($con,$op_app);


	$sql1="SELECT * from orders where order_id='$_GET[value]'";
	$retval=mysqli_query($con,$sql1);
	$ret=mysqli_fetch_assoc($retval);
	$r_id = $ret['Retailerid'];

	$sql2="SELECT * from retailers where Retailerid='$r_id'";
	$retval1=mysqli_query($con,$sql2);
	$ret1=mysqli_fetch_assoc($retval1);
	$r_name=$ret1['r_name'];

	$text = "the order of Retailer ";
	$text.=$r_name;
	$text.=" with order id ";
	$text.=$o_id;
	$text.=" is delivered";

	 $stat = 1;
	 $query = "INSERT INTO notification (Retailerid,not_date,not_text,status) VALUES('$r_id','$time','$text','$stat')";
	 mysqli_query($con,$query);
	 
     header("location:Orders_delivered.php");
     
}
mysqli_close($con);
?>


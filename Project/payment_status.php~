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

if (!$con)
 {
 die('Could not connect: ' . mysqli_connect_error());
 }
else {
//echo "database connected" + $dbname +"    ";
}
//mysqli_select_db("temp" , $con);
mysqli_select_db($con,"order_manager")  or die(mysqli_connect_error($con));

$op="SELECT * from operator where username='$op_user'";
$op_res=mysqli_query($con,$op);
$op_row=mysqli_fetch_assoc($op_res);
$op_id=$op_row['oeprator_id'];
$o_id = $_GET['value'];

$op_app="UPDATE orders SET payment_confirmed_by='$op_id' where order_id='$o_id'";
mysqli_query($con,$op_app);

$sql = "UPDATE orders SET payment_status='1' WHERE order_id = '$o_id'";
$res = mysqli_query($con,$sql);
if($res)
{
	header("location:Payment_final.php");
}
?>

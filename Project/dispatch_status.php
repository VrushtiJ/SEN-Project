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
	$o_id=$_GET['value'];
	
	$update="UPDATE orders SET dispatch_status='1' WHERE order_id='$_GET[value]'";
	mysqli_query($con,$update);
	$time = date('Y-m-d H:i:s');
	
	$sql = "UPDATE orders SET dispatch_date='$time' WHERE order_id='$_GET[value]'";
	mysqli_query($con,$sql);

	$op_app="UPDATE orders SET dispatch_by='$op_id' where order_id='$o_id'";
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
	$text.=" is dispatched";
	$stat = 1;
	$query = "INSERT INTO notification (Retailerid,not_date,not_text,status) VALUES('$r_id','$time','$text','$stat')";
	mysqli_query($con,$query);
	$get = "SELECT item_id,qty from placeorder where order_id ='$_GET[value]'";
	$res = mysqli_query($con,$get);
	while($row = mysqli_fetch_assoc($res))
	{
	$id = $row['item_id'];
	$qty = $row['qty'];
 	$s="SELECT * from products where item_id='$id'";
 	$r=mysqli_query($con,$s);
 	$row1=mysqli_fetch_assoc($r);
 	$stock_committed=$row1['stock_commmited'];
 	$stock_available=$row1['stock_available'];

 	$final_commit =$stock_committed-$qty;
 	$final_available=$stock_available-$qty; 
	$que = "UPDATE products SET stock_available = '$final_available' where item_id='$id'";
	mysqli_query($con,$que);
	$que1 = "UPDATE products SET stock_commmited = '$final_commit' where item_id='$id'";
	mysqli_query($con,$que1);
	 }   
	 header("location:Orders_dispatched.php");
}
mysqli_close($con);
?>


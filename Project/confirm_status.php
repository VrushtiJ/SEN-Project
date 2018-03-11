<?php
session_start();
?>

<?php 
     if(empty($_SESSION["username"])){
          header('location:Login.php');
     }else{
     	$op_user=$_SESSION["username"];
     }?>
<?php
date_default_timezone_set('Asia/Calcutta');
?>
<?php
include 'send_mail.php';

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
#echo "hello";
if(isset($_GET['value']))
{
	$op="SELECT * from operator where username='$op_user'";
	$op_res=mysqli_query($con,$op);
	$op_row=mysqli_fetch_assoc($op_res);
	$op_id=$op_row['oeprator_id'];

	$time = date('Y-m-d H:i:s');
	$o_id=$_GET['value'];

	$item = "SELECT * from placeorder where order_id='$o_id'";
	$res = mysqli_query($con,$item);
	while($row=mysqli_fetch_assoc($res)){
		$id = $row['item_id'];
		$s="SELECT * from products where item_id='$id'";
		$r=mysqli_query($con,$s);
		$row1=mysqli_fetch_assoc($r);
		
		$stock_c=$row1['stock_commmited'];
		$stock_a=$row1['stock_available'];
		$model=$row1['model'];
		$category=$row1['category'];
		$qty = $row['qty'];
		$price=$row['item_price'];
		echo $total_price=$row['total_price'];
		$stock=$stock_a-$stock_c;
		if($stock==0){
			$mail="SELECT * from operator where oeprator_id='1'";
			$mail_res=mysqli_query($con,$mail);
			$result=mysqli_fetch_assoc($mail_res);
			
			$to=$result['email_id'];
			$sub="Information regarding stock.";
			$up_text="The quantity of model ";
			$up_text.=$model;
			$up_text.=" of category ";
			$up_text.=$category;
			$up_text.=" is finished and new orders cannot be met. ";
			
			SEND_MAIL($to,$sub,$up_text);
			header("location:index.php");
		}
		else if($stock<$qty){
               
               
			$update="UPDATE orders SET confirmation_status='1' WHERE order_id='$_GET[value]'";
			mysqli_query($con,$update);
			$sql = "UPDATE orders SET confirmation_date='$time' WHERE order_id='$_GET[value]'";
			mysqli_query($con,$sql);

			$op_app="UPDATE orders SET confirm_by='$op_id' where order_id='$o_id'";
			mysqli_query($con,$op_app);
			
			$b_amt="SELECT * from orders where order_id='$o_id'";
			$b_res=mysqli_query($con,$b_amt);
			if($b_row=mysqli_fetch_assoc($b_res)){
			     $bill_amt=$b_row['bill_amt'];
			     $r_id=$b_row['Retailerid'];
			}
			echo $new_total=$stock*$price;
			echo $bill_amt = ($bill_amt-$total_price)+$new_total;
						
			$bill="UPDATE orders SET bill_amt='$bill_amt' where order_id='$o_id'";
			$bill_res=mysqli_query($con,$bill);
               if($bill_res)
                    echo $bill_amt;
			$final_qty = $stock+$stock_c;
			$que = "UPDATE products SET stock_commmited = '$final_qty' where item_id='$id'";
			mysqli_query($con,$que);

			$update_order="UPDATE placeorder SET qty ='$final_qty' where item_id='$id'";
			mysqli_query($con,$update_order);

			$up="The order quantity of model ";
			$up.=$model;
			$up.=" of category ";
			$up.=$category;
			$up.=" has been updated to ";
			$up.=$stock;
			$up.=" due to stock availablity.";
			$not="INSERT INTO notification(Retailerid,not_date,not_text,status) VALUES('$r_id','$time','$up','1')";
			$not_res=mysqli_query($con,$not);
			if($not_res)
			     echo $up;
			$mail="SELECT * from operator where oeprator_id='1'";
			$mail_res=mysqli_query($con,$mail);
			$result=mysqli_fetch_assoc($mail_res);

			$to=$result['email_id'];
			$sub="Information regarding stock.";
			$up_text="The quantity of model ";
			$up_text.=$model;
			$up_text.=" of category ";
			$up_text.=$category;
			$up_text.=" is finished and further order cannot be met. ";
			     SEND_MAIL($to,$sub,$up_text);
			header("location:Orders_confirmed.php");
		}else {
		
			$update="UPDATE orders SET confirmation_status='1' WHERE order_id='$_GET[value]'";
			mysqli_query($con,$update);
			$sql = "UPDATE orders SET confirmation_date='$time' WHERE order_id='$_GET[value]'";
			mysqli_query($con,$sql);

			$op_app="UPDATE orders SET confirm_by='$op_id' where order_id='$o_id'";
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
			$text.=" with bill number ";
			$text.=$o_id;
			$text.=" is confirmed";
			$stat = 1;
			$query = "INSERT INTO notification (Retailerid,not_date,not_text,status) VALUES('$r_id','$time','$text','$stat')";
			mysqli_query($con,$query);

			$final_qty = $stock_c + $qty;
			$que = "UPDATE products SET stock_commmited = '$final_qty' where item_id='$id'";
			mysqli_query($con,$que);
               $final_stock=$stock-$qty;
			if(final_stock<200){
				$mail="SELECT * from operator where oeprator_id='1'";
				$mail_res=mysqli_query($con,$mail);
				$result=mysqli_fetch_assoc($mail_res);
				
				$to=$result['email_id'];
				$sub="Information regarding stock.";
				$up_text="The quantity of model ";
				$up_text.=$model;
				$up_text.=" of category ";
				$up_text.=$category;
				$up_text.=" is finished and new orders cannot be met. ";
				SEND_MAIL($to,$sub,$up_text);				
				header("location:Orders_confirmed.php");
			}
		}
	}
	#
 
}
mysqli_close($con);
?>



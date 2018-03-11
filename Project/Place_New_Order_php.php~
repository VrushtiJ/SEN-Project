<?php

if(!class_exists("place_order"))
{

	class place_order
	{
		function place_orders()
          {
				if(!empty($_POST)){

				$username ="root";
				$password = "";
				$host = "localhost";
				$dbname = "order_manager";

				$con = new mysqli("$host", "$username", "$password", "$dbname");
				if (!$con)
				  {
				  die('Could not connect: ' . mysqli_connect_error());
				  }
				else {
				}
				mysqli_select_db($con,"order_manager")  or die(mysqli_connect_error($con));
				
				$runame =$_POST['R_Username'];
				
				$cat = $_POST['category'];
				$model = $_POST['model'];
				$color = $_POST['color'];
				$size =$_POST['size'];
				$qty = $_POST['element_5'];

				$sql = "SELECT * FROM retailers WHERE username ='$runame' ";
				$result = mysqli_query($con, $sql);
		
				if(mysqli_num_rows($result)>0){
				while($row= mysqli_fetch_assoc($result))
				{
					$rid= $row['Retailerid'];
				}
				$date = date("Y-m-d H:i:s");
				
				//////////chaeck what is there in the status
				$sql1 = "INSERT INTO orders(Retailerid,orderplacedby, order_date,status) VALUES('$rid', 1, '$date', 0)";
				$res1= mysqli_query($con, $sql1);
				$sql2 = "SELECT * FROM orders WHERE Retailerid = '$rid' AND orderplacedby= 1 AND order_date = '$date'";
				$res2= mysqli_query($con, $sql2);
				while($row2 = mysqli_fetch_assoc($res2))
				{
					$oid = $row2['order_id'];
				}
												
				$sql3 = "SELECT * FROM products WHERE model='$model' AND category='$cat' AND color='$color' AND size='$size'";
				$res3 = mysqli_query($con, $sql3);
				if(mysqli_num_rows($res3))
				{
				while($row3 = mysqli_fetch_assoc($res3))
				{
					$itemid = $row3['item_id'];
					$price = $row3['price'];
				
					$total_price = $qty*$price;
				}
	}		
						
					
				
				$sql4 = "INSERT INTO placeorder(item_id, order_id, item_price, qty, total_price) VALUES('$itemid', '$oid', '$price','$qty','$total_price')";
				$res4= mysqli_query($con, $sql4);
				return "Succesfully placed order";
				
				}
			
	else
	{
		echo "Please Re-enter the username";
	}
		
		}
	}
   }
}
//header ("location:Add_new_product_final.php");
?>


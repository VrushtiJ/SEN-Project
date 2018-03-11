<?php

if(!class_exists("add_stock"))
{
	class add_stock
	{
		function add_stocks()
		{
		
		if(!empty($_POST)){
		
	$username ="RETAILERS";
$password = "mysql";
$host = "localhost";
$dbname = "order_manager";

$con = new mysqli("$host", "$username", "$password", "$dbname");

if (!$con)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
  
  mysqli_select_db($con,"order_manager")  or die(mysqli_connect_error($con)); 

$response = array();
 
$existing_stock =0;
$categoryname = $_POST['category'];
$model_number = $_POST['model'];
$size = $_POST['size'];
$color = $_POST['color'];
$stock_to_be_added = $_POST['element_5'];




$sql = "SELECT stock_available FROM products WHERE category = '$categoryname' AND model= '$model_number' AND size= '$size' AND color = '$color'";
			$res = mysqli_query($con, $sql) or die(mysql_error());
			while($rows = mysqli_fetch_array($res))
			{
				$existing_stock = $rows['stock_available'];
				}						
			$stock_available = $stock_to_be_added + $existing_stock;					

			$sql = "UPDATE products SET stock_available='$stock_available' WHERE category='$categoryname' AND model='$model_number' AND size='$size' AND color='$color'";
			$result = mysqli_query($con, $sql) or die(mysql_error());
 

 
			if (!$result) {

					return "Stock does not exist";
	
			}
		else
		{

				return "Succesfully added";
		}


   mysqli_close($con);	
		}
	}
}
}
?>

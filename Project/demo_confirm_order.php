<html>
<head>
<title>Price Chart</title>
</head>
<body>
<table>
	<tr>
		<td align = "center">Orders to be confirmed</td>
	</tr>
	<tr>
		<td>
			<table border = "1">
			<tr>
				<td>Retailerid</td>
				<td>date</td>
				<td>bill_amount</td>
			</tr>
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
					echo "database connected" + $dbname +"  bbbb  ";
				}
				mysqli_select_db($con,"order_manager");

				$sql = "SELECT Retailerid,order_date,bill_amt FROM orders WHERE confirmation_status == 0 ";
				$result = mysqli_query($con,$sql);
				if($result){
					while($row = mysqli_fetch_assoc($result)){
						$id = $row['Retailerid'];
						$date = $row['order_date'];
						$amt = $row['bill_amt'];
						echo ("<tr><td>$id</td><td>$date</td><td>$amt</td></tr>");
					}
				}
	
?>
			</table>
		</td>
	</tr>
</table>
</body>
</html>

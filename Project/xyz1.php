<html>
<body>

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
if(isset($_POST['data']))
{
	$a=$_POST['data'];
	$sel="SELECT DISTINCT color FROM products WHERE model='$a'";
	echo $sel;
	$run=mysqli_query($con,$sel);
}
?>

<select name="colour">
	<option value="Select"> Select </option>
	<?php
	while($r=mysqli_fetch_object($run))
	{
		?>
		<option value="<?php echo $r->item_id; ?>"> <?php echo $r-> color; ?> </option>
		<?php
	}
	?>
	</select>
	
</body>
</html>

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
	//echo $a;
	if($a=='other')
	{
		?>
		<input type="text" name="model">
		<?php
	}
	else
	{
	$sel="SELECT DISTINCT model FROM products WHERE category='$a'";
	//echo $sel;
	$run=mysqli_query($con,$sel);

?>

<select name="model">
	<option value="Select"> Select </option>
	<?php
	while($r=mysqli_fetch_array($run))
	{
		echo "<option value='$r[model]'>$r[model]</option>";
	}
	
	echo "</select>";


}
}
if(isset($_POST['data2']))
{
	$a=$_POST['data2'];
	$sel="SELECT DISTINCT color FROM products WHERE model='$a'";
	$run=mysqli_query($con,$sel);



	echo "<select name='color'>";
	echo "<option value='Select'> Select </option>";
	
	while($r=mysqli_fetch_array($run))
	{
		echo "<option value='$r[color]'>$r[color] </option>";	
	}
	
	echo "</select>";
	
}
if(isset($_POST['data3']))
{
	$a=$_POST['data3'];
	$a1=$_POST['data4'];
	$sel="SELECT DISTINCT size FROM products WHERE color='$a' AND model='$a1'";
	$run=mysqli_query($con,$sel);


?>

<select name="size">
	<option value="Select"> Select </option>
	<?php
	while($r=mysqli_fetch_array($run))
	{
		echo "<option value='$r[size]'>$r[size] </option>";	
	}
	?>
	</select>
<?php
}

	if(isset($_POST['data1']))
{
	$a=$_POST['data1'];
	//echo $a;
	$sel="SELECT DISTINCT model FROM products WHERE category='$a'";
	//echo $sel;
	$run=mysqli_query($con,$sel);


?>
<input type="text" name="model" />

	<?php
}
if(isset($_POST['box']))
{
	$a=$_POST['box'];
	if($a=='other')
	{
		?>
		<input type="text" name="category">
		<?php
	}
	else
	{
	
		?>
		<input type="hidden" name="category" value="<?php echo $_POST['box']; ?>">
		<?php
	}
}
?>


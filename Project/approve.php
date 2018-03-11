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
date_default_timezone_set('Asia/Calcutta');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="<?php echo $op_user ?>">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="css/inputtype.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="javascript">
	function accepted()
	{
		alert("Approved");
		return true;
	}

	function rejected()
	{
		alert("Rejected");
	}
</script>

	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"><span><b>Welcome to JAY JEEN</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-bell"></i>
								<span class="badge red">
						<?php  $username ="RETAILERS";
							   $password = "mysql";
							   $host = "localhost";
							   $dbname = "order_manager";

               				   $con = new mysqli("$host", "$username", "$password", "$dbname");

						if (!$con)
						{
							die('Could not connect: ' . mysqli_connect_error());
						}		            
  
               		mysqli_select_db($con,"order_manager")  or die(mysqli_connect_error($con));
               		$sql = "SELECT * FROM orders WHERE confirmation_status='0'";
					$result = mysqli_query($con,$sql);
					$rowcount=mysqli_num_rows($result);
					echo $rowcount;
					 ?>
								</span>
							</a>
				<ul class="dropdown-menu notifications">
				<?php

               		$sql = "SELECT * FROM orders WHERE confirmation_status='0'";
					$result = mysqli_query($con,$sql);
					$i=0;
					while($row = mysqli_fetch_assoc($result))
					{

						$o_id=$row['order_id'];
						$r_id=$row['Retailerid'];
						$time=$row['order_date'];
						$datetime1 = new DateTime();
						$datetime2 = new DateTime($time);
						$interval = $datetime1->diff($datetime2);
						$elapsed = $interval->format('%d days');
						$elapsed2 = $interval->format('%H hours');
						$elapsed3 = $interval->format('%m minutes');
						$time1 = strtotime($time);
						$sql1="SELECT r_name from retailers where Retailerid='$r_id'";
						$result1 = mysqli_query($con,$sql1);
						$row1 = mysqli_fetch_assoc($result1);
						$name=$row1['r_name'];
						//echo $name;
						$text="$name placed order on $time";
						//$time=''
			
               		?>
               		<li>
               		<a href="#">									
						<span class="message"><?php echo $text; ?><br></span>
						<span class="message" style="font-weight: bold;"><?php  echo $elapsed." ".$elapsed2." ".$elapsed3;?>  ago</span> 
                    </a>
                	</li>
                    
                    <?php	
					}?> 
				
							</ul>
						</li>
						<!-- start: Notifications Dropdown -->
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i><?php echo $op_user ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="view_profile_operator.php"><i class="icon-list-alt"></i> Profile</a></li>
								<li><a href="Change_password.php"><i class="halflings-icon user"></i> Change password</a></li>
								<li><a href="login.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li>
							<a class="dropmenu" href="index.php"><i class="icon-shopping-cart"></i><span class="hidden-tablet">Orders  </span><span class="label label-inverse"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="Orders_confirmed.php"><i class="icon-align-justify"></i><span class="hidden-tablet">Orders to be confirmed</span></a></li>
								<li><a class="submenu" href="Orders_dispatched.php"><i class="icon-align-justify"></i><span class="hidden-tablet">Orders to be dispatched</span></a></li>
								<li><a class="submenu" href="Orders_delivered.php"><i class="icon-align-justify"></i><span class="hidden-tablet">Orders delivered</span></a></li>
							</ul>
						</li>		
						<li><a href="Place_New_Order.php"><i class="icon-edit"></i><span class="hidden-tablet"> Place New Orders</span></a></li>
						<li><a href="Approve_New_Retailers.php"><i class="icon-tasks"></i><span class="hidden-tablet">Approve New Retailers</span></a></li>
						<li><a href="Approve_New_Operators.php"><i class="icon-tasks"></i><span class="hidden-tablet">Approve New Operators</span></a></li>
					<!--	<li><a href="ui.php"><i class="icon-eye-open"></i><span class="hidden-tablet">Stock Management</span></a></li>-->
						<li>
							<a class="dropmenu" href="#"><i class="icon-star"></i><span class="hidden-tablet">Stock Management  </span><span class="label label-inverse"> 4 </span></a>
							<ul>
								<li><a class="submenu" href="price_chart.php"><i class="icon-list-alt"></i><span class="hidden-tablet">View Stocks</span></a></li>
								<li><a class="submenu" href="Edit_Price_final.php"><i class="icon-edit"></i><span class="hidden-tablet">Update price of products</span></a></li>
								<li><a class="submenu" href="Add_new_stock_final.php"><i class="icon-edit"></i><span class="hidden-tablet">Add New stock</span></a></li>

								<li><a class="submenu" href="Add_new_product_final.php"><i class="icon-edit"></i><span class="hidden-tablet">Add New Product</span></a></li>
							</ul>
						</li>
							<li>
							<a class="dropmenu" href="#"><i class="icon-user"></i><span class="hidden-tablet">Grouping Retailers </span><span class="label label-inverse"> 3 </span></a>
							<ul>
								<li><a class="submenu" href="Add_group_final.php"><i class="icon-plus"></i><span class="hidden-tablet">Add New Group</span></a></li>
								<li><a class="submenu" href="Edit_group_final.php"><i class="icon-edit"></i><span class="hidden-tablet">Update existing group</span></a></li>
								<li><a class="submenu" href="Add_Retailers_final.php"><i class="icon-edit"></i><span class="hidden-tablet">Add Retailers to group</span></a></li>

							</ul>
						</li>
					<li>
							<a class="dropmenu" href="Payment_final.php"><i class="icon-folder-close-alt"></i><span class="hidden-tablet">Payment  </span></a>
												
					</li>
						<li>
							<a class="dropmenu" href="#"><i class="icon-eye-open"></i><span class="hidden-tablet">Order History</span><span class="label label-inverse"> 2 </span></a>
							<ul>
								<li><a class="submenu" href="Datewise_final.php"><i class="icon-calendar"></i><span class="hidden-tablet">Date-wise History</span></a></li>
								<li><a class="submenu" href="Retailerwise_final.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Retailer-wise History</span></a></li>
							</ul>	
						</li>
						
					</ul>
				</div>
			</div>
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.php">Home</a>
					<i class="icon-angle-right"></i>
					<a href="Approve_New_Retailers.php">Add New Retailers</a>
					<i class="icon-angle-right"></i>
					<a href="">View profile of the retailer</a>
				</li><br> <br>
				
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><b><font size="3">View profile of the retailer</font></h2>
					
					</div>
					<br>
	<img id="bottom" src="bottom.png" alt=""><br>

				<div class="box-content">
<?php
	$username ="RETAILERS";
	$password = "mysql";
	$host = "localhost";
	$dbname = "order_manager";

	$con = new mysqli("$host", "$username", "$password", "$dbname");
	//$con = mysql_connect("localhost","RETAILERS", "mysql");
	#echo " connected";
	if (!$con)
	  {
	  die('Could not connect: ' . mysqli_connect_error());
	  }
	else {
		#echo "database connected" + $dbname +"    ";
	}
	//mysqli_select_db("temp" , $con);
	mysqli_select_db($con,"order_manager")  or die(mysqli_connect_error($con));

	$r_id = $_GET['value'];
	$sql = "SELECT * from retailers where Retailerid='$r_id'";
	$res = mysqli_query($con,$sql);
	if($res){
	     while($row = mysqli_fetch_assoc($res)){
		     $id = $row['Retailerid'];
		     $name = $row['r_name'];
		     $user = $row['username'];
		     $dob = $row['date_of_birth'];
		     $shop_name = $row['shop_name'];
		     $shop_add = $row['shop_address'];
		     $number = $row['contact_no'];
		     $area = $row['area'];
		     $city = $row['city'];
		     $email = $row['emailid'];
		     ?>

			
					<li>
		<label class="description" ><font color="#211D5C">Name:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text medium" style="font-weight: bold;" value="<?php  echo $name; ?>" size="70" readonly/> 
		
		</div> <br>
		</li>	
		
		<li>
		<label class="description"><font color="#211D5C">ID:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text small" style="font-weight: bold;" size="4" value="<?php  echo $id; ?>" readonly/> 
		</div> <br>
		</li>
		
		<li>
		<label class="description"><font color="#211D5C">Username:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text small" style="font-weight: bold;"  size="4" value="<?php  echo $user; ?>" readonly/> 
			</div>
			<br>
		</li>
	     <li>
		<label class="description"><font color="#211D5C">Date of Birth:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text small" style="font-weight: bold;" size="4" value="<?php  echo $dob; ?>" readonly/> 
		</div> 
		 <br>
		</li>

		<li>
		<label class="description"><font color="#211D5C">Shop Name:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text small" style="font-weight: bold;" size="4" value="<?php  echo $shop_name; ?>" readonly/> 
		</div> 
		<br>
		</li>

		<li>
		<label class="description"><font color="#211D5C">Shop Address:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text medium" style="font-weight: bold;" size="4" value="<?php  echo $shop_add; ?>" readonly/> 
		</div> 
		<br>
		</li>

		<li>
		<label class="description"><font color="#211D5C">Mobile Number:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text small" style="font-weight: bold;" size="4" value="<?php  echo $number; ?>" readonly/> 
		</div>
		 <br>
		</li>
		
		<li>
		<label class="description"><font color="#211D5C">Area:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text small" style="font-weight: bold;" size="4" value="<?php  echo $area; ?>" readonly/> 
		</div> <br>
		</li>
		
		<li>
		<label class="description"><font color="#211D5C">City:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text small" style="font-weight: bold;" size="4" value="<?php  echo $city; ?>" readonly/> 
		</div> <br>
		</li>
		
		<li>
		<label class="description"><font color="#211D5C">Email:&nbsp;&nbsp;</font> </label>
		<div>
			<input class="element text medium" style="font-weight: bold;" size="4" value="<?php  echo $email; ?>" readonly/> 
		</div> <br>
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="992796" />
		   		 <a href= "Approve_New_Retailers.php">
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
<input id="saveForm" class="btn btn-primary17" align="right" type="submit" name="accept" value="Back" />
</a>
				<a href="approve1.php?value=<?php echo $r_id; ?>">   
<li value="<?php echo $r_id; ?>">  
<input id="saveForm" class="btn btn-primary15" type="submit" name="submit" value="Accept" onclick="accepted()"/> </a>
</li>
	<a href="approve2.php?value=<?php echo $r_id; ?>">   
<li value="<?php echo $r_id; ?>">  
<input id="saveForm" class="btn btn-primary16" type="button" name="submit" value="Reject" onclick="rejected()"/> </a>
</li>	</form>	
	</div>
	<img id="bottom" src="bottom.png" alt="">
               
<?php	}
}
?>
</tbody>
</table>

</div>

	
	<!--<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
			
		</p> 

	</footer> -->
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>




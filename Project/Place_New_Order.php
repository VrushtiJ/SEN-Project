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

     <?php

    require_once('Place_New_Order_php.php');
    $j= new place_order();
   $ch=$j->place_orders();
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
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
<script>
	$(document).ready(function()
	{
		//alert('idkl');
		$("#category").change(function()
		{
			var b=$("#category").val();
			$("#model").html('retreiving...');
			$.ajax(
			{
				type:"POST",
				url:"xyz.php",
				data:"data="+b,
				success:function(msg)
				{
					$("#model").html(msg)
						$("#model").change(function()
		          {
			          var c=$('#model option:selected').text();
			        //  var yourString =c;
//var r = yourString.substring(1, yourString.length-1);
			          $("#color").html('retreiving...');
			          $.ajax(
			          {
				          type:"POST",
				          url:"xyz.php",
				          data:"data2="+c,
				          success:function(msg)
				          {
					          $("#color").html(msg)
					          	$("#color").change(function()
		                                   {
			                                   var v=$('#color option:selected').text();
			        //                           var yourString =v;
                     //    var r1 = yourString.substring(1, yourString.length-1);
			                                   $("#size").html('retreiving...');
			                                   $.ajax(
			                                   {
				                                   type:"POST",
				                                   url:"xyz.php",
				                                   data: { "data3": v, "data4": c},
				                                   success:function(msg)
				                                   {
					                                   $("#size").html(msg)
					
				                                   }

			                                   });
		                                   });
					      }

			          });
		          });
				}

			});
		});
	});

</script>		

<script text="javascript">
	function validate()
	{
	 var price=document.getElementById('element_5').value;
	 var confirm_price=document.getElementById('element_6').value;   
	 
	          if(price!=confirm_price){
	          alert("Quantity and confirm quantity fields do not match..!!");
	          return false;
	          }
	     
	          else
	          {
	           return true;
	            }
	}
	
	</script>
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
				<ul class="dropdown-menu notifications" style="overflow: auto; width: 450px; height: 500px;">
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
								<li><a href="View_profile_operator.php"><i class="icon-list-alt"></i> Profile</a></li>
								<li><a href="Change_password.php"><i class="halflings-icon user"></i> Change password</a></li>
								<li><a href="Login.php"><i class="halflings-icon off"></i> Logout</a></li>
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
					<li><a href="Payment_final.php"><i class="icon-edit"></i><span class="hidden-tablet">Payment</span></a></li>
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
					<li><a href="#">Place New Order</a></li>
					
				</li><br>
		
	
	<div class="clearfix"></div>
	<div id="form_container">
	<br>
		<h1><a>Add Stock to Existing products</a></h1>
		<form id="form_992796" class="appnitro"  method="post" action="" onsubmit="return validate();">
					<div class="form_description">
			<h2><b >Place New Order</h2>
			<p></p>
	<img id="top" src="top.png" alt="">
	
		</div>						
			<ul >
				<li id="li_1" >
		<label class="description" for="element_1">Retailer's Username</label>
		<div>
			<input id="element_1" name="R_Username" class="element text large" type="text" value="" size="100"/> 
		</div> <br>
			

			
							
					<li id="li_1" >
		<label class="description" for="element_1">Category </label>
		<div>
		<!--	<input id="element_1" name="element_1" class="element text large" type="text" value="" size="100"/> -->
		<?php

	          
               $username ="RETAILERS";
               $password = "mysql";
               $host = "localhost";
               $dbname = "order_manager";

               $con = new mysqli("$host", "$username", "$password", "$dbname");

               if (!$con)
                 {
                 die('Could not connect: ' . mysqli_connect_error());
                 }
  
               mysqli_select_db($con,"order_manager");//  or die(mysqli_connect_error($con)); 

               $response = array();
               $result = mysqli_query($con, "SELECT DISTINCT category FROM products") or die(mysql_error());
                
                
               if (mysqli_num_rows($result)>0) {

	
                   $response["products"] = array();
	               echo "<select name = 'category' id = 'category' >";
	               echo "<option value ='select'> Select </option>";
	               
	
	               while ($row = mysqli_fetch_array($result)) 
	               {
				               echo "<option value='$row[category]'> $row[category]</option>" ;
                    }
                echo "</select>";
	
	}
//	$store=$_POST['category'];
//	echo $store;'
//echo $time  = date('Y-m-d H:i:s');
	?>
				<li id="li_2" >
		<label class="description" for="element_2">Model Number </label>
		<div>
              <div id="model">
              	<select name="model" >
	          <option value="Select"> Select </option>
          </select>
              </div>
               </li>
                   
              <li id="li_2" >
		          <label class="description" for="element_2">Colour</label>
		          <div>
              <div id="color">
              	<select name="color">
	          <option value="Select"> Select </option>
          </select>
              </div>
		          </li>


    <li id="li_2" >
		<label class="description" for="element_2">Size</label>
		<div>
    <div id="size">
    	<select name="size">
	<option value="Select"> Select </option>
</select>		<li id="li_5" >
		<label class="description" for="element_5">Quantity </label>
		<div>
			<input id="element_5" name="element_5" class="element text small" type="number" value=""/> 
		</div> <br>
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Confirm Quantity </label>
		<div>
			<input id="element_6" name="element_6" class="element text small" type="number" value=""/> 
		</div> <br>
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="992796" />
			    
				<input id="saveForm" class="btn btn-primary" type="submit" name="submit" onclick="index.php" value="Finish"/> 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="saveForm" class="btn btn-primary" type="submit" name="submit" onclick="Place New Order.php" value="Place another order" />
				<?php 
			
			if($ch!=""){
			         echo "<script language=\"JavaScript\">\n";
                         echo "alert('$ch');\n";
                         echo "</script>";} ?>
		</li>
			</ul>
		</form>	
		

<br>
	<img id="bottom" src="bottom.png" alt="">
<br>
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

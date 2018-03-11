<?php
session_start();
?>


<?php 
     if(empty($_SESSION["username"])){
          header('location:Login.php');
          $op_user=$_SESSION['username'];
     }else {
     $op_user=$_SESSION["username"];
     }?>



<?php
date_default_timezone_set('Asia/Calcutta');

    require_once('Add_new_product_php.php');
    $j= new add_product();
   $ch=$j->add_products();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="<?php echo $op_user; ?>">
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
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script>
	<!-- end: CSS -->
	
	<!-- Add and Delete Row-->
	<script type="text/javascript" src="jquery-1.3.2.min.js"></script>
<script>
	$(document).ready(function()
	{
		$("#category").change(function()
		{
		     
			var b=$("#category").val();
			$("#box").html('');
			$.ajax(
			{
				type:"POST",
				url:"xyz.php",
				data:"box="+b,
				success:function(msg)
				{
					$("#box").html(msg)
				}

			});
			
		
		});
	});

</script>	
<script>
	$(document).ready(function()
	{
		$("#category").change(function()
		{
		     
			var b=$("#category").val();
			$("#box").html('');
			$.ajax(
			{
				type:"POST",
				url:"xyz.php",
				data:"box="+b,
				success:function(msg)
				{
					$("#box").html(msg)
				}

			});
			
		
		});
	});

</script>
    <script language="javascript">
    var rowCount=0;
    var rowCount1=0;
    var index =4;
    function addRow(tableID)
    {
    	var table=document.getElementById(tableID);
    	rowCount=table.rows.length;
    
    	var row=table.insertRow(rowCount);
    	var cell1=row.insertCell(0);
    	var element1=document.createElement("input");
    //	<input id="element_3" name="element_3" class="element text midium" type="text"  value=""
            element1.setAttribute('type','text');
            //element1.setAttribute('name','element_3');
            element1.setAttribute('id','element_'+index);
            element1.setAttribute('value','');
            element1.setAttribute('class', 'element text large')
    	element1.name="colour"+ (rowCount+1);
    	element1.placeholder=element1.name;
    	cell1.appendChild(element1);
   // 	call();
   document.getElementById('get_rowCount').value=rowCount+1;
  //alert(document.getElementById("get_rowCount").value);
    	
    }
	function deleteRow(tableID) 
	{
        try 
        {
        	var table = document.getElementById(tableID);
       // 	rowCount = table.rows.length;
        	if(rowCount!=1)
        	{
        	table.deleteRow(rowCount-1);
        	rowCount--;	
        	}
       }
       catch(e) 
       {
            alert(e);
       }
    }
 
 
    var i=1;
   function addSize(tableID)
    {
    	var table=document.getElementById(tableID);
    	var rowCount=table.rows.length;
    	var row=table.insertRow(rowCount);
    	var cell1=row.insertCell(0);
    	var element1=document.createElement("input");
    //	<input id="element_3" name="element_3" class="element text midium" type="text"  value=""
            element1.setAttribute('type','text');
          //  element1.setAttribute('name','element_3');
            element1.setAttribute('id','size_'+i);
            element1.setAttribute('value','');
            element1.setAttribute('class', 'element text large')
    	element1.name="size"+ (rowCount+1);
    	element1.placeholder=element1.name;
    	cell1.appendChild(element1);
    	document.getElementById('get_sizeCount').value=rowCount+1;

    }
    
	function deleteRow1(tableID) 
	{
        try 
        {
        	var table = document.getElementById(tableID);
        	var rowCount = table.rows.length;
        	if(rowCount!=1)
        	{
        	table.deleteRow(rowCount-1);
        	rowCount--;	
       		}
       }
       catch(e) 
       {
            alert(e);
       }
    }
  
  
	</script>

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
								<i class="halflings-icon white user"></i><?php echo $op_user; ?>
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
					<li><a href="#">Stock Management</a></li>
					<i class="icon-angle-right"></i>
					<li><a href="#">Add New Product</a></li>
					
				</li><br>
				
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
	
	<div class="clearfix"></div>
	<div id="form_container">
	<br>
		<h1><a>Add Stock to Existing products</a></h1>
		<form id="form_992796" name="myform" class="appnitro"  method="Post" action="Add_new_product_final.php" enctype="multipart/form-data">
			<div class="form_description">
			     <h2><b >Add New Product</h2>
			     <p></p>
	               <img id="top" src="top.png" alt="">
		     </div>						
			<ul>
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
               // echo 
	
	}
//	$store=$_POST['category'];
//	echo $store;'
//echo $time  = date('Y-m-d H:i:s');
	?>
	<option value ='other'> Other </option>
	</select>
		
		<div id="box">
		</div>
		</div> <br>
		</li>			<li id="li_2" >
		<label class="description" for="element_2">Model Number </label>
		<div>
    <div id="model">

<input id="element_3" name="model" class="element text medium" type="text" placeholder="model"/> 
    </div>	
		      <li id="li_4" >
		          <label class="description" for="element_4">Colour</label>
                         <table id="dataTable1" width="350px">
	                         <tbody> 
		                              <tr>
		                        	     <td><input id="element_3" name="colour1" class="element text large" type="text"  value="" placeholder="colour1"/> </td>
		                        	     <td><input value=" + " class="button_color" onclick="addRow('dataTable1')" type="button"></td>
                        			     <td><input value=" - " class="button_color" onclick="deleteRow('dataTable1')" type="button"></td>
		                              </tr>
		                    </tbody>
	                    </table> <br>
	           </li>	
	            <li id="li_4" >
		          <label class="description" for="element_4">Size</label>
		          <table id="dataTable2" width="350px">
	                         <tbody> 
		                              <tr>
		                        	     <td><input id="size_0" name="size1" class="element text large" type="text"  value="" placeholder="size1"/> </td>
		                        	     <td><input value=" + " class="button_color" onclick="addSize('dataTable2')" type="button"></td>
                        			     <td><input value=" - " class="button_color" onclick="deleteSize('dataTable2')" type="button"></td>
		                              </tr>
		                    </tbody>
	                    </table> 
                      <br>
	           </li>
	            
	           <li id="li_1" >
		     <label class="description" for="element_1">Price </label>
		     <div>
			     <input id="element_1" name="price" class="element text medium" type="text" value="" size="100" placeholder="Price (INR)"/> 
		     </div> <br>
		     
		     <input type="hidden" id="get_rowCount" name="get_rowCount" value="">
		      <input type="hidden" id="get_sizeCount" name="get_sizeCount" value="">
		     </li>
		  
	           <li id="li_5">
	               <label class="description" for="element_4">Image</label>
	               <table id="dataTable" width="350px">
	                   <tbody> 
		                   <tr>
		                     <input type="file" name="imageUpload" id="imageUpload">              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                             </tr>
		               </tbody>
	               </table>
	           </li>
	          <li class="buttons">
			    <input type="hidden" name="form_id" value="992796" />
			    <?php 
			
			if($ch!=""){
			         echo "<script language=\"JavaScript\">\n";
                         echo "alert('$ch');\n";
                         echo "</script>";} ?>
			   <input id="saveForm" class="btn btn-primary1" type="submit" name="submit" value="Finish" />
				 
				
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				
			
				<input id="saveForm" class="btn btn-primary1" type="submit" name="submit" value="Add another model" />
	     	</li>
			</ul>
		</form>	
		<br>
	
	<img id="bottom" src="bottom.png" alt="">
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
<?php
ob_flush();
?>


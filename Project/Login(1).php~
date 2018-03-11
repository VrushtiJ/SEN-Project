<?php
session_start();
?>

<?php
     require_once('login.php');
     $j = new log_in();
     $ch = $j->LogIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style1.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="view.css" media="all">

<link href="css/bootstrap1.min.css" rel="stylesheet">

<!-- Optional theme -->
	
<link href="css/bootstrap2.min.css" rel="stylesheet">	
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
			
		<script type="text/javascript">
        function validateForm()
        {
      //  alert("check");
        var x= document.getElementById("username").value;
//            var x = document.myForm.username.value;
            if (x == null || x == "") 
            {
                alert("Username must be filled out");
                return false;
            }
            var y = document.getElementById("pwd").value;
            if (y == null || y == "") 
            {
                alert("Password must be filled out");
                return false;
            }

        }
        </script>
		
		
</head>


<body>
	<div class="navbar">
		<div class="navbar-inner">
				<a class="brand"><span><b>Welcome to JAY JEEN</span></a>
	</div>
	</div>
	<!--<body background:"#357ebd">
   --> <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        
                    </div>     
                    <div style="padding-top:30px" class="panel-body" >
                        <div style="display:none" id="alert" class="alert alert-danger col-sm-12"></div>
                            <form id="loginform" class="form-horizontal" action="Login.php" method="post" onsubmit="return validateForm();">
                              <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Username" required>                                        
                               </div>
                                
	                            <div style="margin-bottom: 25px" class="input-group">
	                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                                <input id="login-password" type="password" class="form-control" name="pwd" placeholder="Password" required>
	                            </div>
	                            <?php 
	                            if($ch!=" "){
			     echo "<div style ='color:red'>$ch</div>";
			     }
			     ?> 
	                            <div style="margin-top:10px" class="form-group">
	                                <div class="col-sm-12 controls">
	                                <button type="submit" class="btn btn-primary"> <font size="3">Login</font></button>
	                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       
	                         <a class="forget" href="forgot_pass.php" onClick=>
	                                      <font color="#265a88" ><b>    Forgot Password </font>
	                                        </a>
	                                </div>
	                            </div>
	                            <div class="form-group">
	                                <div class="col-md-12 control">
	                                        <div style="border-top: 1px solid#010101; padding-top:15px; font-size:85%" >
	                                            Don't have an account! 
	                                            
	                                        <a class="signup" href="Signup.php" onClick=>
	                                      <font color="#265a88" ><b>     Sign Up Here </font>
	                                        </a>
	                                       
	                                </div>
	                            </div>
                              </div>    
                            </form>     
                    </div>                     
               </div>  
        </div>
    </div> 
   </div>

	<!--	<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
					<div class="login-box">
				<div class="icons" align="center">
						<h1><b><font color="#005580">Welcome to JAYJEEN</h1>
					</div>
					<div align="center" size>
					<font size="5" color="#848482"><b>Login</font>
					<form class="form-horizontal" action="Login.php" method="post" onsubmit="return validateForm();">
							
							<div class="input-prepend" title="Username">
							     Enter Username:
								<input class="input-large span10" name="username" id="username" type="text" placeholder="username"/>
							</div>
							
							<div class="input-prepend" title="Password">
								<input class="input-large span10" name="pwd" id="password" type="password" placeholder="password"/>
							</div>
							<?php 
			if($ch!=""){
			         echo "<script language=\"JavaScript\">\n";
                         echo "alert('$ch');\n";
                         echo "</script>";} ?> 
							<div class="button-login">	
							
								<button type="submit" class="btn btn-primary"> <font size="3">Login</font></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								
					                    
							
							</div>
			                    <div class="clearfix"></div>
				                    </p>
					           </div>
					</form>
					<div align="center">
					<p>
					   <a href="Forgot_password.php" ><font color="#357ebd" size="3"><b>Forgot Password?</font></a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     <a href="Signup.php" ><font color="#357ebd" size="3">Sign up<b></font></a>
	                    </p>
	                    <p>
	                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                    </p>
	                      </div>
	</div>
				</div><!--/span-->
			<!--</div><!--/row-->
			
<!--
	</div><!--/.fluid-container-->
	
	<!--	</div>
-->	<!-- start: JavaScript-->

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

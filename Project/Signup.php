<?php
     require_once('operator_registration.php');
     $j = new sign_up();
     $ch = $j->SignUp();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
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
	<link rel="stylesheet" type="text/css" href="view1.css" media="all">
	
<script type="text/javascript" src="view.js"></script>
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
	
		<script type="text/javascript">
        function validateForm()
        {
            var name = document.myform.op_name;
            var letters = /^[A-Z a-z]+$/;
            if(name.value.match(letters)){}
            else
            {
               alert("Name can contain only letters    ");
               return false;
            }
     
     
            var usrname = document.myform.op_usrname;
            var usr= /^[A-Za-z0-9_-]+$/;
            if(usrname.value.match(usr)){}
            else
            {
               alert("Username can contain letters, underscores and numbers only");
            }
            if(usrname.value.length>12)
            {
               alert("username too long..!!");
               usrname.focus();;
               return false;
            }
            
            
            var pass=document.myform.op_passwd;
            var conpass=document.myform.op_conpasswd;     
            
            if(pass.value!=conpass.value)
            {
               alert("Password and confirm password are different");
               pass.focus();
               conpass.focus();
               return false;
            }
            else
            {
                         
	             if(pass.value.length<6 || pass.value.length>20)
	             {
	               alert("Password should consist of 6-20 characters");
	          pass.focus();
               conpass.focus();
             
	               return false;
	             }
            }
            if (name.value==usrname.value) 
            {
                alert("Username and Name can not be same..!!!");
                name.focus();
                return false;
            }
 
            
                   
            var email=document.myform.op_email;
            var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(reg.test(email.value)){}
            else
            {
               alert("Wrong email format");
               email.focus();
               return false;
            }
 
            
            var contact=document.myform.op_cont_no;
            var phoneno = /^\d{10}$/; 
            if(contact.value.match(phoneno)){}
            else
            {
               alert("Wrong number format");
               return false;
            }
        }
      </script>
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				
				<a class="brand" href="index.php"><span><b>Welcome to JAY JEEN</span></a>
				<div align="right">
				<a href="Login.php"><font color="white"> LogIn</font></a>
			     </div>	
			</div>
			</div>
		</div>				
				<!-- start: Header Menu -->
				
				<!-- end: Header Menu -->
		
	<!-- start: Header -->
	
		
			<!-- start: Content -->
			
	<div class="clearfix"></div>
	<div id="form_container">
	<br>
		<form id="form_992796" class="appnitro"  method="post" action="Signup.php" onsubmit="return validateForm();">
					<div class="form_description" align="center">
			<h2><b>Sign Up</h2>
			<p></p>
	<img id="top" src="top.png" alt="">
	
		</div>						
			<ul align="center">
			
					<li id="li_1" >
		<label class="description" for="element_1">Enter Name </label>
		<div>
			<input type="text" class="element text large" name="op_name" required="required"  placeholder="Name" /> 
		</div> <br><br>
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Enter Username</label>
		<div>
			<input type="text" id="usernamesignup" class="element text large" name="op_usrname" required="required" placeholder="username" />
		</div> <br><br>
		</li>		<li id="li_3" >
		<label class="description" for="element_3">Enter Email </label>
		<div>
			<input type="email" id="emailsignup" class="element text large" name="op_email" required="required"  placeholder="xyz@mail.com"/> 
		</div> <br><br>
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Enter password </label>
		<div>
			<input type="password" id="passwordsignup" class="element text large" name="op_passwd" required="required"  placeholder="password"/>
		</div> <br><br>
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Enter confirm password </label>
		<div>
			<input type="password" id="passwordsignup_confirm" class="element text large" name="op_conpasswd" required="required"  placeholder="Confirm Password"/>
		</div> <br><br>
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Enter Address </label>
		<div>
			<input type="text" id="address" name="op_add"  class="element text large" required="required" width="50" placeholder="Enter Address"/>
		</div> <br><br>
		</li>
			<li id="li_6" >
		<label class="description" for="element_6">Enter Contact Number </label>
		<div>
			 <input type="text" id="contactnum" name="op_cont_no" required="required"  class="element text large" placeholder="Contact Number"/>
		</div> <br><br>
		</li>
			<li id="li_6" >
		<label class="description" for="element_6">Enter Date Of Birth </label>
		<div>
			<input type="date" id="dateofbirth" name="op_dob" class="element text large" required="required" />
		</div> <br><br>
		</li>
			
			
					<li class="buttons">
			        <?php 
			if($ch!=""){
			         echo "<script language=\"JavaScript\">\n";
                         echo "alert('$ch');\n";
                         echo "</script>";} ?> 
                               <p class="signin button"> 
									<input type="submit" class="btn btn-primary19" value="Submit" name="submit" onsubmit="return validateForm();"/>
</li>
			</ul>
		</form>	
		<br>
	<img id="bottom" src="bottom.png" alt="">
	</div>
	
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

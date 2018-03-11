<?php
     require_once('operator_registration.php');
     $j = new sign_up();
     $ch = $j->SignUp();
    
?>

<!DOCTYPE html>
<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css1/demo.css" />
        <link rel="stylesheet" type="text/css" href="css1/style.css" />
        <link rel="stylesheet" type="text/css" href="css1/radiobutton.css" />
	   <link rel="stylesheet" type="text/css" href="css1/animate-custom.css" />
	   <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	   <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	   <link id="base-style" href="css/style.css" rel="stylesheet">
	   <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	   
	   <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

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
        
             <style type="text/css">
			body { background: url(img/bg-login.jpg) !important; }
		</style>
    </head>
     <body>
     	
						
    <!-- <div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"><span><b>Welcome to JAY JEEN</span></a>
				
				     <ul class="nav pull-right">
					
						<a href="Login.php">	<b>	Log In
							</a>
				</div>
				</div>
				</div>
	-->			<div id="form_container">
       <div class="container">
            <div id="container_demo" >
                    <div id="wrapper">
                   
				<div id="form_container">
				<div class="form_description">
                       <form  name="myform" onsubmit="return validateForm();"  action="Signup.php" method="post" > 
                            <h2> Welcome to JAYJEEN </h2><a href="Login.php">Login</a>
                            <a href="Signup.php">Signup</a>
                            
                            <h1> Forgot passeord </h1>  
                              </div> 
                              </div>
                               <p> 
                                   <label for="namesignup" class="name" data-icon="u"> <font color="white" size="3">Enter your Username</font></label>
                                    <input type="text" id="namesignup" name="op_username" required="required"  placeholder="Name" />
                                   </p>
                                   <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u"><font color="white" size="3">Enter your old password</font></label>
                                    <input type="password" id="passwordsignup" name="op_oldpasswd" required="required"  placeholder="password"/></p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" ><font color="white" size="3">Enter your new password</font></label>
                                    <input type="password" id="passwordsignup" name="op_newpasswd" required="required"  placeholder="password"/></p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p"><font color="white" size="3">Confirm new password </font></label>
                                    <input type="password" id="passwordsignup" name="op_conpasswd" required="required"  placeholder="password"/>
                                </p>
                                <p> 
                                   
  
<!--									<input type="submit" value="Submit" name="submit"/> -->
                              
                              <?php 
			if($ch!=""){
			         echo "<script language=\"JavaScript\">\n";
                         echo "alert('$ch');\n";
                         echo "</script>";} ?> 
                               <p class="signin button"> 
									<input type="submit" value="Submit" name="submit" onsubmit="return validateForm();"/>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	                                                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
								


<!--				<button class="signin button" value="submit" type="submit" name="submit">Submit</button> -- >
                            
                            </form>
                        </div>
	                    				
                  
        </div>
                             
</div>        
    </body>
  
</html>




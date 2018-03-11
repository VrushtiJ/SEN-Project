<?php

include 'send_mail.php';
if(!class_exists("forgot_pass")){
     class forgot_pass
     {
          function forgot_pass1()
          {
               if(!empty($_POST))
               {
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
                 
                   $emailid =$_POST['Email']; 


	                $res = "SELECT * FROM operator WHERE email_id='$emailid'";
	                $retval=mysqli_query($con,$res);
	               if($row = mysqli_fetch_assoc($retval))
	               {
		               $username = $row['username'];
			              # echo $username;
	               }else{
                        return "Invalid E-mail";
	               }

                   $subject = "Passsword";
                   $body="Your USERNAME: .$username \r\n";
                   $body.="Your new password is: ";

                   srand ((double) microtime() * 10000000);
                   //Array of alphabets
                   $input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
                   "R","S","T","U","V","W","X","Y","Z");

                   $passkey="";// Initialize the string to store random numbers
                   for($i=1;$i<6;$i++){ // Loop the number of times of required digits
                       $rand_index = array_rand($input);
                       $passkey .=$input[$rand_index]; // One char is added
                   }
                   $body.="$passkey";
                   $key = $passkey;
	               #echo $key;
	               $key = md5($key);
	               #echo $key;
	               $result  = "UPDATE retailers SET password='$key' WHERE username='$username'";
	               $ret=mysqli_query($con,$result);
	               
                   // check if row inserted or not
                   if ($ret) {
                   send_mail($emailid,$subject,$body);
                   return "Password Successfullly mailed to your E-mail";
                   
                   } else {
                        return "Failed to mail password to your E-mail";
                   }
                   }
                   }
                   }
                   }
//}
?>

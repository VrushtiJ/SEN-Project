


<?php

if(!class_exists("change_pass1"))
{

	class change_pass1
	{
		function change_pass()
          {
               if(!empty($_POST)){
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
               //$o_id = $_POST['value'];
               $o_id=1;
               $pass=$_POST['password'];
               $query = "SELECT password FROM operator WHERE oeprator_id='$o_id' ";
               $retval = mysqli_query($con,$query);
               if($row = mysqli_fetch_assoc($retval))  
               {
                    $p=$row['password'];
                    $n=$_POST['new_password'];
                    if($p==$pass)
                    {
                          $sql="UPDATE operator set password='$n' where password='$p' ";
                          $retval1 = mysqli_query($con,$sql);
                          return "Successfully Changed"; 
                          
                    }
                    else
                    {
                         return "Old password is wrong";
                    }     
               }
               header("Location:Change_password.php");
          
          }
     }
    }
}    
?>



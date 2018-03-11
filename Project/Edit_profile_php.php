<?php
if(!class_exists("profile"))
{
     class profile
     {
          function Edit_profile()
          {
                 if(!empty($_POST))
               {
               echo "vvv";
                  
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


                    $name=$_POST['name'];
                    $dob=$_POST['dob'];
                    $address=$_POST['address'];
                    $cont=$_POST['cont_no'];
                    $email=$_POST['email'];
                    $i=1;
                    echo $email;
                    $sql="UPDATE operator SET operator_name='$name', address='$address', email_id='$email', cont_no='$cont', dob='$dob'      where oeprator_id='$i'";
                    $result=mysqli_query($con, $sql);
                    if($result)
                    {
                    return "profile successfuly updated";
                    }
                    else
                    {
                         return "Something is wrong..!!";
                    }
                    header("location:Edit_profile.php");
               }
          } 
     }
}                       

?>

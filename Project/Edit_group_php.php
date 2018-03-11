


<?php

if(!class_exists("Edit_Group1"))
{

	class Edit_Group1
	{
		function edit_group()
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


               $old_group = $_POST['old_group_name'];
               $new_group = $_POST['new_group_name'];
              
               //$sql="INTO groups (groupname) VALUES('".$gname."')";
               $sql1="SELECT groupname FROM groups WHERE groupname='$old_group'";
               $result1=mysqli_query($con, $sql1);
               $check= mysqli_num_rows($result1);
               if($check<=0)
               {
                        return "Old group name doesnot exist";
               
               }
               else
               {
                    $sql2="SELECT groupname FROM groups WHERE groupname='$new_group'";
                    $result2=mysqli_query($con, $sql2);
                    $check1= mysqli_num_rows($result2);
                    if($check1>0)
                    {
                        return "New group name exists";
                    }
                    else
                    {    
                         $sql="UPDATE groups SET groupname='$new_group' WHERE groupname='$old_group'";
                         $result = mysqli_query($con, $sql);
               
                     if($result)
                     {
                   
		                return "Group name updated";
		                    
                    }
                  }
                }
                
	 mysqli_close($con);
               }

          }
     }
    }
?>



<?php

          if(!class_exists("Change_Group1"))
          {

	     class Change_Group1
	     {
		     function Change_Group()
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
				else 
				{
					
				}
				$id=$_POST['groupid'];
				
				$r_id=$_POST['bansari'];
				#echo $r;
				mysqli_select_db($con,"order_manager")or die(mysqli_connect_error($con));
				//$ch = $_GET['value'];
				//echo $ch;
					if(isset($_POST['bansari']))
					{
					 //echo "value";
					 $sql="SELECT group_id from groups where group_id='$id'";
					 $r=mysqli_query($con,$sql);
					// $check1= mysqli_num_rows(mysqli_query($con,$sql));
					      if($row=mysqli_fetch_assoc($r))
					      {
				               $update="UPDATE retailers SET group_id='$id' WHERE Retailerid='$r_id'";
				               mysqli_query($con,$update);
				               return "Successfully Changed";  
					     }
					     else
					     {
						     return "Enter valid group ID";
					     }
                         }
          }
}
}
				
}				


?>


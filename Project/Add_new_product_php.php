<?php
if(!class_exists("add_product"))
{
	class add_product
	{
		function add_products()
		{
		
		if(!empty($_POST)){
				          $username ="RETAILERS";
				          $password = "mysql";
				          $host = "localhost";
				          $dbname = "order_manager";

				          $con = new mysqli("$host", "$username", "$password", "$dbname");
				          //$con = mysql_connect("localhost","RETAILERS", "mysql");
				          if (!$con)
				            {
				            die('Could not connect: ' . mysqli_connect_error());
				            }
				          else {
			          //		echo "database connected" + $dbname +"    ";
				          }
				          mysqli_select_db($con,"order_manager")  or die(mysqli_connect_error($con));
			
				          $target_dir = "uploads/";
				          $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
				          $uploadOk = 1;
				          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          // Checking if image has uploaded or not
			          /*	if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
				           //   echo "The file ". basename( $_FILES["imageUpload"]["name"]). " has been uploaded.";
				          } else {
				              echo "Sorry, there was an error uploading your file.";
				          }*/
			               $image="uploads/".$_FILES["imageUpload"]["name"].".jpg"; // used to store the filename in a variable
				          $cat1 = $_POST['category'];
				         // echo $cat1;
				          #$color = $_POST['color'];
				          $size1 = $_POST['size1'];
				          $price1 = $_POST['price'];
				          $stock_committed1 = 0;
				          $stock_available1 = 0;
				          $model1 = $_POST['model'];
			               $color_count=$_POST['get_rowCount'];
			               $size_count=$_POST['get_sizeCount'];
                              #echo $color_count+" ikfoks ";
                          //   echo $color_count." fvd ".$size_count;
                              //storind the data in your database
                              $flag=0;
                              $time = date('Y-m-d H:i:s');
                              for ($j=1; $j<=$color_count; $j++){
                             
					          $color = $_POST['colour'.$j];
					
				               for ($i= 1; $i<=$size_count; $i++)
				               {
				                    $size= $_POST['size'.$i];
				                    $sql = "SELECT color,model,size FROM products WHERE color='$color.$j' and size='$size.$i' and model='$model1'";
				                    $result = mysqli_query($con,$sql);
				
				                    if($row = mysqli_fetch_array($result))
				                    {
				                         #echo $row['model'];
				                         return "this product already exists.";
				                    }
				                  
				                $query="INSERT INTO products (category,model,color,size,price,stock_commmited,stock_available) values ('$cat1','$model1','$color','$size','$price1','$stock_committed1','$stock_available1')";
				                    
				                //  $query= "INSERT INTO products(model,category,color,size,price,stock_commmitted,stock_available,image_path) VALUES ('$model1','$cat1','$color','$size','$price1','$stock_committed1','$stock_available1','$image')";
				                    $retval = mysqli_query($con,$query);
				                    if(!$retval) 
				                    {
				                //    echo "falsekfjvkj";
				                         $flag=1;
				                         break;
				                    }
				                    else
				                    {
				                  //       echo "true";
				                    }			
				                    
				                  }
			               }
                    $not_text="the product with category ".$cat1." of article no ".$model1." has been added.";
                    $query1="INSERT INTO broadcast (not_date,not_text) VALUES('$time','$not_text')";
                    mysqli_query($con,$query1);			     
                   header("location:Add_new_product_final.php");
	     	}
	     }
     }
}

//header ("location:Add_new_product_final.php");
?>

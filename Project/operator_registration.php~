<?php
if(!class_exists("sign_up")){
     class sign_up
     {
          function SignUp()
          {
               if(!empty($_POST))
               {
                    #include db_connect class
                    //require_once __DIR__ . '/db_connect.php';

                    //$response = array();
                    # connecting to the database
                    //$db = new DB_CONNECT();

                    #getting the form variables via POST mehtod
                    $username ="RETAILERS";
                    $password = "mysql";
                    $host = "localhost";
                    $dbname = "order_manager";

                    $con = new mysqli("$host", "$username", "$password", "$dbname");

                    //$con = mysql_connect("localhost","RETAILERS", "mysql");
                    /*if (!$con)
                      {
                      die('Could not connect: ' . mysqli_connect_error());
                      }*/
                    // echo $_POST['op_name'];
                      
                      
                    mysqli_connect("localhost","RETAILERS","mysql");
                    mysqli_select_db($con, "order_manager");  


                    $o_name = $_POST['op_name'];
                    $o_add = $_POST['op_add'];
                    $o_usrname = $_POST['op_usrname'];
                    $pwd = $_POST['op_passwd'];
                    $o_email = $_POST['op_email'];
                    $o_cont_no = $_POST['op_cont_no'];
                    $o_dob = $_POST['op_dob'];

                    if($o_gender=='0'){
                         $o_gender="Female";
                    }

                    if($o_gender=='1')
                    {
                         $o_gender="Male";
                    }
                    /*echo $o_dob;
                    echo $o_name;
                    echo $o_add;
                    echo $o_usrname;
                    echo $o_passwd;
                    echo $o_email;
                    echo $o_cont_no;
                    echo $o_gender;*/
                    //$o_approved = $_POST['op_approved']

                    #inserting a row entry to the database
                    $o_passwd=md5($pwd);
                    $sql = "INSERT INTO operator".
                         " (operator_name,address,username,password,email_id,cont_no,dob)".
                         " VALUES".
                         " ('$o_name','$o_add','$o_usrname','$o_passwd','$o_email','$o_cont_no','$o_dob')";
                    //echo $sql;

                    //mysqli_select_db()
                    $retval = mysqli_query($con,$sql);
                    //echo $retval;
                    if(!$retval) {
                         return "Username already exists";
                        //    header('Location:Signup.html');
                        die('could not get data: ' . mysqli_connect_error()); 
                    }
                    else{
                    header('Location:index.php');
                    }

                    /*echo "Entered data successfully\n";

                    $sql1= "SELECT * FROM"



                    $flag=false;
                    while($row = mysqli_fetch_assoc($retval)) {
                         $flag=true;   
                        echo " EMP ID : {$row['username']} <br>";
                    }

                    if($flag==true)
                    {
                         header('Location:index.html');
                    }

                    */
                    mysqli_close($con);
                    }
                }
            }
        }
?>

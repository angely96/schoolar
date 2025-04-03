<?php

//aqui llamamos a quien tiene la conexion 
include ('../config/database.php');
 
 $fname = $_POST['f_name'];
 $lname = $_POST['l_name'];
 $email = $_POST['e_mail'];
 $passwd= $_POST['passw'];

 //$enc_pass= md5($passwd);
//SHA 256 
$enc_pass =sha1($passwd);

//Aqui voy a validad si el email ya existe en la bd
$sql_email_exist = "
   SELECT 
      COUNT(email) as total  
   FROM 
      user 
   WHERE  
      email ='$email' 
      LIMIT 1 ";

$res= pg_query($conn, $sql_email_exist);

if($res){
   $row = pg_fetch_assoc($res);
   if($row['total']>0){
      echo "Email already exist";
   }
   else{
      $sql ="INSERT INTO users( firstname, lastname, email, password)
         values('$fname','$lname','$email','$enc_pass')
   ";

      $res= pg_query($conn,$sql);

      if($res){
         echo"User has been created succesfully";
         }else {
            echo"Error ";
         }
      }
   }

?>
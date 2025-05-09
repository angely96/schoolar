<?php
    //Lo primero es conectarnos a la bd 
    //session_start();
    include('../config/database.php');

    session_start();

    if(isset($_SESSION['user_id'])){
        header('Refresh:0; url=http://localhost/schoolar/src/home.php');
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign </title>
</head>
<body>
    <center> <h1>Inicio de Sesion</h1>
    <form name="register_form" action="signin.php" method="post">
    <img src="images/profile.png" alt="" width="100" height="100">
    <br>
    <table border ="0 "align="center"> 
        <tr><td><input type="email" name="e_mail" placeholder="joe@gmai.com"></td></tr>
        <tr><td><input type="password" name="p_sswd" placeholder="Password"required></td></tr>
        
        <tr><td align="center"><button>Register</button></td></tr>
        
    </table>    
    </form>
    </center >
   <center> <a href="signup.html">I don't have an account</a></center>
</body>
</html>

<?php


// Aqui solo haremos esto, que es lo que necesita el usuario.
if(!empty($_POST['e_mail']) && !empty($_POST['p_sswd'])){   //valida que se halla enviado form

$email= $_POST['e_mail'];
$passwd = $_POST['p_sswd'];
$enc_pass = sha1($passwd);//aqui se llama nuevamente la contraseña y viene desencriotada


$sql = "
    select 
        id,
        COUNT(id) as total
    from 
        users
    where
        email= '$email' and
        password = '$enc_pass' and
        status = true
    group by 
        id;
";

$res= pg_query($conn, $sql);

if($res){
    $row = pg_fetch_assoc($res);
    if($row['total']>0){
       //echo "Login Ok ";
        $_SESSION['user_id']=$row['id'];
        header('Refresh:0; url=http://localhost/schoolar/src/home.php');

    }else{
        echo"Login failed";
    }
}
}
?>

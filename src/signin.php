<?php

    //Lo primero es conectarnos a la bd 
    include('../config/database.php');

    session_start();
    if(isset($_SESSION['user_id'])){
        header('Refresh:0; url=http://localhost/schoolar/src/home.php');
    }
    // Aqui solo haremos esto, que es lo que necesita el usuario.
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
?>
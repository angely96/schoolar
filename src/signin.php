<?php

    //Lo primero es conectarnos a la bd 
    include('../config/database.php');
    // Aqui solo haremos esto, que es lo que necesita el usuario.
    $email= $_POST['e_mail'];
    $passw = $_POST['p_sswd'];

    $sql = "
        select 
            --id,
            --email,
            --password,
            COUNT(id) as total
        from 
            users
        where
            email= '$email' and
            password = '$passw' and
            status = true
        group by 
            id;
    ";

    $res= pg_query($conn, $sql);

    if($res){
        $row = pg_fetch_assoc($res);
        if($row['total']>0){
           echo "Login Ok ";
        }else{
            echo "Login failed";
        }
    }
?>
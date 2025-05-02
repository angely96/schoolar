
<?php

    #funcion de pho para que inice sesion 
    session_start();
    session_destroy(); //Aqui me cierra la sesion. 

    header('Refresh:0; url=http://localhost/schoolar/src/signin.html');
?>
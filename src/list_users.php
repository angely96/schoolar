<?php
include('../config/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de usuarios</title>
</head>
<body>
    <table border="1" align="Center">
        <tr>
            <th>Firstname</th>
            <th>Last name</th>
            <th>E-mail</th>
            <th>Status</th>
            <th>Photo</th>
            <th>....</th>
        </tr>
        

        <?php
            //Here code 
            $sql="select
                id,
                firstname,
                lastname,
                email,
                case when status = true then'Active' else 'No active' end as status
            from
                users
            ";

        $res= pg_query($conn, $sql);

        if(!$res){
            echo"Query error";
            exit;
        }

        while($row = pg_fetch_assoc($res) ){
        echo "<tr>";
        echo  "<td>".$row ['firstname']."</td>";
        echo  "<td>".$row ['lastname']."</td>";
        echo  "<td>".$row ['email']."</td>";
        echo  "<td>".$row ['status']."</td>";
        echo "<td align='center'><img src='photo_users/default.png' width='25'></td>";
        echo  "<td>";
        echo "<a href =''> <img src='icons/edit.png' width='15'>";
        echo "<a href =''> <img src='icons/search.png' width='15'>";
        echo "<a href ='http://127.0.0/schoolar/stc/delete.php'> <img src='icons/trash.png' width='15'>";
        echo "</td>";
        echo "</tr>";
        }
        ?>


 </table>
</body>
</html>
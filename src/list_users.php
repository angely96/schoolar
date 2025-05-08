<?
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
            <th>....</th>
        </tr>
        <tr>
            <td>Ary</td>
            <td>Cadena</td>
            <td>ary@gmail.com</td>
            <td>Active</td>
            <td>
                <img src="icons/edit.png" width="15">
                <img src="icons/search.png" width="15">
                <img src="icons/trash.png" width="15">
            </td>
        </tr>

        <?php
            //Here code 
            $sql="select";
        ?>


    </table>
</body>
</html>
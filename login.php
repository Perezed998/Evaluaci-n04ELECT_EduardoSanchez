<?php

    session_start();
    include("/xampp/htdocs/DB_eval04/conexion/db.php");

    $user = $_POST['user'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE user = '$user'";
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($result)){

        $User = $row['user'];
        $pass = $row['Password'];

    }

    if($user == $User && $password == $pass ){

        header("Location: index.php");

    }else{
        echo"No eres usuario de este sistema ";
    }

    



?>
 




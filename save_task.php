<?php

include('/xampp/htdocs/DB_eval04/conexion/db.php');
if (isset($_POST['save_task'])){

    $nombre_producto = $_POST['producto'];
    $precio_producto = $_POST['price'];
    $stock_producto =  $_POST['stock'];

    $query = "INSERT INTO productos(Descripcion , Precio , Stock) VALUES ('$nombre_producto','$precio_producto','$stock_producto')";
    $result = mysqli_query($conn,$query);
    if(!$result){

        die("Query failed");
    }


    $_SESSION['message'] = 'Accion guardada exitosamente';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
    
}

?>
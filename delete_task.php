<?php

    include("/xampp/htdocs/DB_eval04/conexion/db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM productos WHERE ID = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
        }

        $_SESSION['message'] = 'Producto eliminado exitosamente';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");    




    }

?>
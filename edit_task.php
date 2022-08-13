<?php

    include("/xampp/htdocs/DB_eval04/conexion/db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE ID= $id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1){

            $row=mysqli_fetch_array($result);
            $producto = $row['Descripcion'];
            $precio = $row['Precio'];
            $stock = $row['Stock'];

            

        }

    }


    if (isset($_POST['update'])){

        $id = $_GET['id'];
        $precio = $_POST['Precio'];
        $stock = $_POST['Stock'];

        $query = "UPDATE productos set Precio='$precio', Stock = '$stock' WHERE id =$id ";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Producto actualizado exitosamente';
        $_SESSION['message_type'] = 'primary';
        header('Location: index.php');

    }
    ?>

<?php include("/xampp/htdocs/DB_eval04/includes/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto" >
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="Precio" value="<?php echo $precio; ?>" class="form-control" placeholder="Actualiza el Precio">
                    </div>
                    <div class="form-group">
                        <input type="number" name="Stock" value="<?php echo $stock; ?>" class="form-control" placeholder="Actualiza la cantidad">
                    </div>
                    <button class="btn btn-success" name="update">
                        Actualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("/xampp/htdocs/DB_eval04/includes/footer.php")?>
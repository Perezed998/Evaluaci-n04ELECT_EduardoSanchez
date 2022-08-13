<?php include("/xampp/htdocs/DB_eval04/conexion/db.php")?>
<?php include("/xampp/htdocs/DB_eval04/includes/header.php")?>
    



<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

        <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php session_unset();} ?>

            <div class="card card-body">

                <form action="save_task.php" method="POST">

                    <div class="form-group">
                        <input type="text" name="producto" class="form-control" placeholder="Escribe el nombre del Producto" autofocus></input>
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control"
                        placeholder="Escribe el Precio ($)" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="number" name="stock" class="form-control"
                        placeholder="Escribe la cantidad de existencia" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardado">
                </form>

            </div>

        </div>
        <div class="col-md-8">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Precio ($)</th>
                        <th>stock</th>
                        <th>Fecha de Entrada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                        $query = "SELECT * FROM productos";
                        $result_task = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($result_task)) { ?>
                        
                        <tr>
                            <td><?php echo $row['ID'] ?></td>
                            <td><?php echo $row['Descripcion'] ?></td>
                            <td><?php echo $row['Precio'] ?></td>
                            <td><?php echo $row['Stock'] ?></td>
                            <td><?php echo $row['created_ad'] ?></td>
                            <td>
                                <a href="edit_task.php?id=<?php echo $row['ID']?>" class="btn btn-secondary">
                                <i class="fa-solid fa-pencil"></i>
                                </a>
                                
                                <a href="delete_task.php?id=<?php echo $row['ID']?>"class="btn btn-danger">
                                <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>
    </div>

    <a href="logout.php">Cerrar Sesion</a>

</div>

<?php include("/xampp/htdocs/DB_eval04/includes/footer.php")?>

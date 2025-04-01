<?php
include "../Programa/seguridad.php";
include "../Programa/conexion.php";
$id=$_GET["id"];
$sql=$conexion->query(" SELECT * FROM usuarios WHERE id=$id ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
        <!-- CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
<form class="col-4 p-5 m-auto" method="POST">
    <h3 class="text-center text-primary">Editar usuario</h3>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>"> 
    <?php
        include "usuario_editado.php";
    ?>
    <br>
    <?php // función para editar usuarios con el formulario
        while($datos=$sql->fetch_object()){?> <!-- se almacena los valores de la base de datos (sql) en $datos -->
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Usuario:</label>
        <input type="text" class="form-control" name="usuario" value="<?= $datos->usuario ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contraseña:</label>
        <input type="text" class="form-control" name="contraseña" value="">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email:</label>
        <input type="text" class="form-control" name="email" value="<?= $datos->email ?>">
    </div>  
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DNI:</label>
        <input type="text" class="form-control" name="dni" value="<?= $datos->DNI ?>">
    </div>  
    </div>
    <?php }
    ?>
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    <button type="submit" class="btn btn-danger float-right ml-auto" name="btncancelar" value="no">Cancelar edicion del cliente</button>
</form> 
</body>
</html>
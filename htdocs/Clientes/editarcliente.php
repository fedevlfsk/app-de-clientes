<?php
include "../Programa/seguridad.php";
include "../Programa/conexion.php";
$id=$_GET["id"];
$sql=$conexion->query(" SELECT * FROM clientes WHERE id=$id ");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar cliente</title>
        <!-- CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
<form class="col-4 p-5 m-auto" method="POST">
    <h3 class="text-center text-primary">Editar cliente</h3>
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>"> 
    <?php
        include "cliente_editado.php";
    ?>
    <br>
    <?php // función para editar clientes  con el formulario
        while($datos=$sql->fetch_object()){?> <!-- se almacena los valores de la base de datos (sql) en $datos -->
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre" value="<?= $datos->Nombre ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido:</label>
        <input type="text" class="form-control" name="apellido" value="<?= $datos->Apellido ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DNI:</label>
        <input type="text" class="form-control" name="dni" value="<?= $datos->DNI ?>">
    </div>  
    <div class="mb-3">  
        <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento:</label>
        <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha_de_nacimiento ?>">
    </div>
    <div class="mb-3">
    <label class="form-label">Sexo:</label><br>
    <input type="radio" id="hombre" name="sexo" value="hombre">
    <label for="hombre">Hombre</label><br>
    <input type="radio" id="mujer" name="sexo" value="mujer">
    <label for="mujer">Mujer</label><br>
    <input type="radio" id="otro" name="sexo" value="otro">
    <label for="otro">Otro</label>
</div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Descripción:</label>
        <input type="text" class="form-control" name="descripcion" value="<?= $datos->Descripcion ?>">
    </div>  
    <?php }
    ?>
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    <button type="submit" class="btn btn-danger float-right ml-auto" name="btncancelar" value="no">Cancelar edicion del cliente</button>
</form> 
</body>
</html>
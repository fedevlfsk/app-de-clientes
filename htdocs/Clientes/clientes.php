<?php
include "../Programa/seguridad.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clientes</title>
    <!-- CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
<script> // Confirmar eliminacion del cliente
    function eliminar(){
        var respuesta=confirm("¿Estas seguro que deseas eliminar al cliente?");
        return respuesta
    }
</script>
<?php
    include "../Programa/barra_de_navegacion.php";
?>
<br>
<h2 class="text-center">Administración de clientes</h2>
<div class="container-fluid row">
    <form class="col-4 p-5" method="POST">
    <h4 class="text-center text-secondary">Registro de clientes</h4>
    <br>
    <?php
        // función para registrar y eliminar clientes nuevos con el formulario
        include "../Programa/conexion.php";
        include "registroclientes.php";
        include "cliente_eliminar.php";
        // Enviar mensaje cuando se modifica, crea o elimina exitosamente el cliente
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'modificado'){
            echo "<div class='alert alert-success'>Cliente modificado exitosamente</div>";
        }
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'){
            echo "<div class='alert alert-success'>Cliente eliminado exitosamente</div>";
        }
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado'){
            echo "<div class='alert alert-success'>Cliente registrado exitosamente</div>";
        }
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'cancelado'){
            echo "<div class='alert alert-danger'>Se ha cancelado la modificación del cliente</div>";
        }
    ?>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre:</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Apellido:</label>
        <input type="text" class="form-control" name="apellido">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DNI:</label>
        <input type="text" class="form-control" name="dni">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento:</label>
        <input type="date" class="form-control" name="fecha">
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
        <input type="text" class="form-control" name="descripcion">
    </div>
    <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>
        <div class="col-8 p-4">
        <table class="table">
        <style>
  th {
    font-weight: normal; /* Hacer el texto menos grueso */
  }
</style>
    <thead class="bg-primary text-white">
        <br>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">DNI</th>
        <th scope="col">Fecha</th>
        <th scope="col">Sexo</th>
        <th scope="col"></th>   
        </tr>
    </thead>
    <tbody>
    <?php
        include "../Programa/conexion.php";
        $sql=$conexion->query(" select * from clientes");
        while($datos=$sql->fetch_object()) { ?> <!-- Almacenar valores de la base de datos en una variable -->
        <tr> 
            <td><?= $datos->ID?></td>
            <td><?= $datos->Nombre?></td>
            <td><?= $datos->Apellido?></td>
            <td><?= $datos->DNI?></td>
            <td><?= $datos->fecha_de_nacimiento?></td>
            <td><?= $datos->Sexo?></td>
            <td>
            <!-- Botón de editar (se envia el id a la pagina de editar cliente) -->
            <a href="editarcliente.php?id=<?=$datos->ID?>"><button class="btn btn-small btn-warning">Editar</button></i></a>
            <!-- Botón de eliminar -->
            <a onclick="return eliminar()" href="clientes.php?id=<?=$datos->ID?>"><button class="btn btn-small btn-danger">Eliminar</button></i></a>
            </td>
        </tr>    
        <?php }
        ?>
    </tbody>
    </table>  
    </div>
</div>
</body>
</html>
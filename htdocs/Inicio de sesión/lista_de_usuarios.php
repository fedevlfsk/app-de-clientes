<?php
include "../Programa/seguridad.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar usuarios</title>
        <!-- CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
include "../Programa/barra_de_navegacion.php";
?>
<br>
<h2 class="text-center">Administración de usuarios del sistema</h2>
 <!-- Botón de agregar usuario -->
 <a href="registrarse2.php"><button class="btn btn-small btn-success ml-3">Agregar usuario</button></a>
<div class="container-fluid h-100">
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
        <th scope="col">Usuario</th>
        <th scope="col">Fecha de creación</th>
        <th scope="col">Email</th>
        <th scope="col">DNI</th>
        <th scope="col"></th>   
        </tr>
    </thead>
    <tbody>
    <?php
        include "../Programa/conexion.php";
        include "usuario_eliminar.php";
        // Enviar mensaje cuando se modifica, crea o elimina exitosamente el usuario
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'modificado'){
            echo "<div class='alert alert-success'>Usuario modificado exitosamente</div>";
        }
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado'){
            echo "<div class='alert alert-success'>Usuario registrado exitosamente</div>";
        }
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'cancelado'){
            echo "<div class='alert alert-danger'>Se ha cancelado la modificación del usuario</div>";
        }
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'cancelado2'){
            echo "<div class='alert alert-danger'>Se ha cancelado la creación del usuario</div>";
        }
        if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'){
            echo "<div class='alert alert-success'>Usuario eliminado exitosamente</div>";
        }
        $sql=$conexion->query(" select * from usuarios");
        while($datos=$sql->fetch_object()) { ?> <!-- Almacenar valores de la base de datos en una variable -->
        <tr> 
            <td><?= $datos->ID?></td>
            <td><?= $datos->usuario?></td>
            <td><?= $datos->fecha_de_creacion?></td>
            <td><?= $datos->email?></td>
            <td><?= $datos->DNI?></td>
            <td>
            <!-- Botón de eliminar -->
            <a onclick="return eliminar()" href="lista_de_usuarios.php?id=<?=$datos->ID?>"><button class="btn btn-small btn-danger float-right ml-2">Eliminar</button></a>
            <!-- Botón de editar (se envia el id a la pagina de editar cliente) -->
            <a href="editar_usuario.php?id=<?=$datos->ID?>"><button class="btn btn-small btn-warning float-right">Editar</button></a>
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
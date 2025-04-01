<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
        <!-- CSS -->
        <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
  <?php
include "../Programa/conexion.php";
include "controlador.php";
// Enviar mensaje cuando se modifica, crea o elimina exitosamente el usuario
if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado'){
    echo "<div class='alert alert-success'>Usuario registrado exitosamente</div>";
}
if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'cancelado'){
  echo "<div class='alert alert-danger'>Se ha cancelado la creación del nuevo usuario</div>";
}
if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'Error'){
  echo "<div class='alert alert-danger'>Sesión invalida, por favor inicia sesión</div>";
}
if(isset($_GET['mensaje']) && $_GET['mensaje'] == 'cerrar_sesion'){
  echo "<div class='alert alert-warning'>Has cerrado sesión</div>";
}
?>
    <br>
    <br>  
    <br>
    <br>
<h3 class="text-center text-primary">Inicio de sesión:</h3>   
<form class="col-4 p-5 m-auto" method="POST">    
<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Usuario:</label>
  <input type="text" name="usuario" class="form-control" id="formGroupExampleInput" placeholder="ingresar usuario">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Contraseña:</label>
  <input type="password" name="contraseña" class="form-control" id="formGroupExampleInput2" placeholder="ingresar contraseña">
</div>
<button type="submit" data-toggle="modal" data-target="#modalRegistro" class="btn btn-primary" name="ingresar" value="ok">Ingresar</button>
</form>
<div class="text-center">¿No tienes un usuario? Has click en <a href="registrarse.php" text-primary">agregar usuario</a></div>
</body>
</html>   
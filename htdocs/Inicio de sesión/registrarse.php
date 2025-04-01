<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo usuario</title>
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h3 class="text-center mt-5 text-primary">Registro de Usuario</h3>
        <?php
        include "../Programa/conexion.php";
        include "registrousuarios.php";
        ?>
        <form class="col-6 mx-auto mt-4" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" name="usuario" class="form-control" placeholder="Ingrese su usuario">
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña:</label>
                <input type="password" name="contraseña" class="form-control" placeholder="Ingrese su contraseña">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Ingrese su email">
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" name="dni" class="form-control" placeholder="Ingrese su DNI">
            </div>
            <button type="submit" class="btn btn-primary" name="registrarse" value="ok">Registrarse</button>
            <button type="submit" class="btn btn-danger float-right ml-auto" name="btncancelar" value="no">Cancelar nuevo usuario</button>
        </form>
    </div>
</body>
</html>

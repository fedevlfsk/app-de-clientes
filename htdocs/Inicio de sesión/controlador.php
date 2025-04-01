<?php
// Verificar si se ha enviado el formulario
if (!empty($_POST["ingresar"])) {
    // Verificar si los campos usuario y contraseña están vacíos
    if (empty($_POST["usuario"]) || empty($_POST["contraseña"])) {
        echo "<div class='alert alert-warning'>Alguno de los campos está vacío</div>";
    } else {
        // Obtener los valores de usuario y contraseña
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];

        // Evitar inyección SQL utilizando consultas preparadas
        $sql = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? AND contraseña = ?");
        $sql->bind_param("ss", $usuario, $contraseña);
        $sql->execute();
        $resultado = $sql->get_result();

        // Verificar si se encontró un usuario con los datos proporcionados
        if ($resultado->num_rows > 0) {
            // Iniciar sesión y redirigir al usuario
            session_start();
            $_SESSION['usuario'] = $usuario;
            $_SESSION['usuario_id'] = $usuario_id;
            header("location:inicio.php");
            exit(); // Salir del script para evitar que se siga ejecutando después de redirigir
        } else {
            echo "<div class='alert alert-danger'>Usuario inexistente</div>";
        }
    }
}
?>

<?php
session_start(); // Iniciar sesión

// Verificar si se ha enviado el formulario de cerrar sesión
if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    // Redirigir al usuario a la página de inicio de sesión u otra página
    header("location: inicio_de_sesion.php?mensaje=cerrar_sesion");
    exit();
}
?>
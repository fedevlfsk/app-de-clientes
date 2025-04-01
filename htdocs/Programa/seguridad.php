<?php
session_start();
// Verificar que tanto "usuario" como "usuario_id" estén establecidas
if (!isset($_SESSION["usuario"]) AND !isset($_SESSION["usuario_id"])){
    header("location: ../Inicio de sesión/inicio_de_sesion.php?mensaje=Error");
}
?>

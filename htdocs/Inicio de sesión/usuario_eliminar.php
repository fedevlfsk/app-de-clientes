<?php
if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query(" DELETE FROM usuarios WHERE id=$id ");
    if ($sql) {
        header("location:lista_de_usuarios.php?mensaje=eliminado");
    }else {
        echo "<div class='alert alert-danger'>Error al eliminar el cliente</div>";
    }
}
?>
<?php
if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query(" DELETE FROM clientes WHERE id=$id ");
    if ($sql) {
        header("location:clientes.php?mensaje=eliminado");
    }else {
        echo "<div class='alert alert-danger'>Error al eliminar el cliente</div>";
    }
}
?>
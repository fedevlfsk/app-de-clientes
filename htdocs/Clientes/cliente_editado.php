<?php
if(!empty($_POST["btncancelar"])){
header("location:clientes.php?mensaje=cancelado");
}
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha"]) and !empty($_POST["sexo"])) {
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $dni=$_POST["dni"];
        $fecha=$_POST["fecha"];
        $sexo=$_POST["sexo"];
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : '';
        $sql=$conexion->query(" UPDATE clientes SET Nombre='$nombre', Apellido='$apellido', DNI='$dni', fecha_de_nacimiento='$fecha', Sexo='$sexo', Descripcion='$descripcion' WHERE ID='$id' "); 
        if ($sql) {
            header("location:clientes.php?mensaje=modificado");
        }else{
            echo "<div class='alert alert-danger'>Error al modificar el cliente</div>";
        }
    }else{
        echo "<div class='alert alert-warning'>Alguno de los campos está vacio</div>";
    }
}
?>
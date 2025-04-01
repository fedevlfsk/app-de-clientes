<?php
if(!empty($_POST["btncancelar"])){
header("location:lista_de_usuarios.php?mensaje=cancelado");
}
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["contraseña"]) and !empty($_POST["dni"]) and !empty($_POST["email"])) {
        $id=$_POST["id"];
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $dni=$_POST["dni"];
        $email=$_POST["email"];
        $sql=$conexion->query(" UPDATE usuarios SET usuario='$usuario', contraseña='$contraseña', DNI='$dni', email='$email' WHERE ID='$id' "); 
        if ($sql) {
            header("location:lista_de_usuarios.php?mensaje=modificado");
        }else{
            echo "<div class='alert alert-danger'>Error al modificar el cliente</div>";
        }
    }else{
        echo "<div class='alert alert-warning'>Alguno de los campos está vacio</div>";
    }
}
?>  
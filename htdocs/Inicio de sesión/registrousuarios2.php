<?php
if(!empty($_POST["btncancelar2"])){
    header("location:lista_de_usuarios.php?mensaje=cancelado2");
}
    if (!empty($_POST["registrarse2"])){ // Verificar si se ha pulsado registrar, seguidamente verificar que los campos no esten vacios
        if (!empty($_POST["usuario"]) and !empty($_POST["contraseña"]) and !empty($_POST["dni"]) and !empty($_POST["email"])) {
            // Se crea una variable con cada dato ingresado en el formulario
            $usuario=$_POST["usuario"];
            $contraseña=$_POST["contraseña"];
            $dni=$_POST["dni"];
            $email=$_POST["email"];
            $sql=$conexion->query("INSERT INTO usuarios(usuario,contraseña,DNI,email,fecha_de_creacion) VALUES ('$usuario','$contraseña','$dni','$email',NOW())");   
            if ($sql) { 
                header("location:lista_de_usuarios.php?mensaje=registrado");
            } else {
                echo '<div class="alert alert-danger">Error al registrar el cliente</div>';
            }
        }else{ // Si no se obtienen los datos del formulario, uno de los campos está vacio
            echo "<div class='alert alert-warning'>Alguno de los campos está vacio</div>";
        }
    }    
?>  
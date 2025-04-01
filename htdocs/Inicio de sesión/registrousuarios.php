<?php
if(!empty($_POST["btncancelar"])){
    header("location:inicio_de_sesion.php?mensaje=cancelado");
}
    if (!empty($_POST["registrarse"])){ // Verificar si se ha pulsado registrar, seguidamente verificar que los campos no esten vacios
        if (!empty($_POST["usuario"]) and !empty($_POST["contraseña"]) and !empty($_POST["dni"]) and !empty($_POST["email"])) {
            // Se crea una variable con cada dato ingresado en el formulario
            $usuario=$_POST["usuario"];
            $contraseña=$_POST["contraseña"];
            $dni=$_POST["dni"];
            $email=$_POST["email"];
            $sql=$conexion->query("INSERT INTO usuarios(usuario,contraseña,DNI,email,fecha_de_creacion) VALUES ('$usuario','$contraseña','$dni','$email',NOW())");   
            if ($sql) { 
                header("location:inicio_de_sesion.php?mensaje=registrado");
            } else {
                echo '<div class="alert alert-danger">Error al registrar el cliente</div>';
            }
        }else{ // Si no se obtienen los datos del formulario, uno de los campos está vacio
            echo "<div class='alert alert-warning'>Alguno de los campos está vacio</div>";
        }
    }    
?>  
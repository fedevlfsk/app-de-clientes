<?php
    if (!empty($_POST["btnregistrar"])){ // Verificar si se ha pulsado registrar, seguidamente verificar que los campos no esten vacios
        if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["fecha"]) and !empty($_POST["sexo"])) {
            // Se crea una variable con cada dato ingresado en el formulario
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $dni=$_POST["dni"];
            $fecha=$_POST["fecha"];
            $sexo=$_POST["sexo"];
            $descripcion= !empty($_POST["descripcion"]) ? $_POST["descripcion"] : ''; // Verificar si se envió el campo "descripcion"            // Se ingresan estas variables en la tabla buscada con query en la tabla clientes
            $sql=$conexion->query("INSERT INTO clientes(Nombre,Apellido,DNI,fecha_de_nacimiento,Sexo,Descripcion) VALUES ('$nombre','$apellido','$dni','$fecha','$sexo','$descripcion')");   
            if ($sql) { 
                header("location:clientes.php?mensaje=registrado");
            } else {
                echo '<div class="alert alert-danger">Error al registrar el cliente</div>';
            }
        }else{ // Si no se obtienen los datos del formulario, uno de los campos está vacio
            echo "<div class='alert alert-warning'>Alguno de los campos está vacio</div>";
        }
    }    
?>  
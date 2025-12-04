<?php
$conex = mysqli_connect("localhost", "root", "", "italika");
if (!$conex) {
    die("No hay conexión: " . mysqli_connect_error());
}

$userName       = $_POST['name'];
$user_apellido  = $_POST['user_apellido'];
$user_apellidom = $_POST['user_apellidom'];
$user_Edad      = $_POST['user_Edad'];
$pass           = $_POST['pass'];
if(isset ($_POST["inicio"]))
{
    $consulta="SELECT * FROM cliente WHERE Nombre  =' $userName'  and  contraseña='$pass'";
    $query =mysqli_query($conex,$consulta);
    $nr=mysqli_num_rows($query);
    if($nr==1){
        echo "<script> alert('Bienvenido :  $userName');window.location='inicio.html' </script>";
    }else{
        echo "<script> alert('usuario no existe ');;window.location='inicio.html' </script>";
    }
}

// Registrar cliente
if (isset($_POST["registra"])) {
    $consulta = "INSERT INTO cliente (Nombre, Apellido_paterno, Apellido_Materno, Edada, contraseña)
                 VALUES ('$userName', '$user_apellido', '$user_apellidom', '$user_Edad', '$pass')";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
        echo "<script> alert('Usuario registrado con éxito: $userName'); window.location='inicio.html' </script>";
    } else {
        echo "Error al registrar cuenta: " . mysqli_error($conex);
    }
}

// Borrar cuenta
if (isset($_POST["accion"]) && $_POST["accion"] == "Borrar cuenta") {
    $consulta = "DELETE FROM cliente WHERE Nombre = '$userName'";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
        echo "<script> alert('Cuenta eliminada exitosamente: $userName'); window.location='inicio.html' </script>";
    } else {
        echo "Error al eliminar cuenta: " . mysqli_error($conex);
    }
}

// Actualizar cuenta
if (isset($_POST["accion"]) && $_POST["accion"] == "Actualizar cuenta") {
    $consulta = "UPDATE cliente SET 
                    Apellido_paterno = '$user_apellido', 
                    Apellido_Materno = '$user_apellidom', 
                    Edada = '$user_Edad', 
                    
                    Nombre = '$userName'
                 WHERE  contraseña = '$pass'";
    $resultado = mysqli_query($conex, $consulta);
    if ($resultado) {
        echo "<script> alert('Cuenta actualizada exitosamente: $userName'); window.location='inicio.html' </script>";
    } else {
        echo "Error al actualizar cuenta: " . mysqli_error($conex);
    }
}

?>

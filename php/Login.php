<?php

// Login

session_start();

include "Conexion.php";

if(!$con){
    die("No hay conexion".mysqli_connect_error());
}

// Variables para conectar
$correo = $_POST['correo'];
$contrasena = $_POST['password'];

// Consulta para verificar el usuario y su contraseña
$query = mysqli_query($con, "SELECT * FROM usuario WHERE correo = '".$correo."' and password = '".$contrasena."'");
$nr = mysqli_num_rows($query);

if($nr == 1){
    $usuario = mysqli_fetch_array($query); // El usuario se autenticó correctamente
    $_SESSION['id_usuario'] = $usuario['id']; // Guardar el ID de usuario en una variable de sesión
    header("location:/Proyecto Final/cliente/HomeUsuario.php");
    echo "Bienvenido ".$correo;
}
else if($nr == 0){
    // El usuario no se autenticó correctamente
    echo "No ingreso usuario, vuelvalo a intentar";
}
?>

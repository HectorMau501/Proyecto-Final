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
    $nombre = $usuario['nombre'];
    $correo = $usuario['correo'];
    $telefono = $usuario['telefono'];
    $direccion = $usuario['direccion'];


    $_SESSION['id_usuario'] = $usuario['id']; // Guardar el ID de usuario en una variable de sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['correo'] = $correo;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['direccion'] = $direccion;
    header("location:/Proyecto Final/cliente/HomeUsuario.php");
}
else if($nr == 0){
    // El usuario no se autenticó correctamente
    header("location:/Proyecto Final/html/Login.html");
}
?>

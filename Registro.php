<?php

include "Conexion.php";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['password'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


$sql = mysqli_query($con, "INSERT INTO usuario (id,nombre,correo,password,telefono,direccion) 
values (0,'$nombre', '$correo', '$contrasena', '$telefono', '$direccion')");


if($sql){
    header("location:Home.html");
}
else{
    echo " Usuario no agregado";
}



?>


<?php

include "../php/Conexion.php";


if(!$con){
    die("No hay conexion".mysqli_connect_error());
}

//Variables
$correo = $_POST['correo'];
$contrasena = $_POST['password'];

//Para la consulta
$query = mysqli_query($con, "SELECT * FROM administrador WHERE 
correo = '".$correo."' and password = '".$contrasena."'");

$nr = mysqli_num_rows($query);

if($nr == 1){

    header("location: MostrarUsuario.php");
}
else if($nr == 0){
    header("location:../html/LoginAdministrador.html");
}


?>
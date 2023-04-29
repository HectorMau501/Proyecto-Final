<?php


    /* Login */

$server = "localhost";
$username = "root";
$password = "";
$database = "ventaautomoviles";


$con = mysqli_connect($server, $username, $password, $database);

if(!$con){
    die("No hay conexion".mysqli_connect_error());
}

//Variables para conectar

$correo = $_POST['correo'];
$contrasena = $_POST['password'];

//Para la consulta que se va hacer
$query = mysqli_query($con, "SELECT * FROM usuario WHERE correo = '".$correo."'  and password = '".$contrasena."'");

$nr = mysqli_num_rows($query);

if($nr == 1){
    header("location:HomeUsuario.html");
    //echo "Bienvenido" .$correo;
}
else if($nr == 0)
    echo "No ingreso usuario, vuelvalo a intentar";
?>
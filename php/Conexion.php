<?php

//Estas son las variables para conectar a tu base de datos

$server="localhost";
$database= "VentaAutomoviles";
$username= "root";
$password="";

//Aqui se traen las variables para poderlas enviar

    $con = mysqli_connect($server,$username,$password,$database);

    //Por si tenemos errores en la conexion
if(!$con){
    die("No hay conexión".mysqli_connect_error());
}    

?>

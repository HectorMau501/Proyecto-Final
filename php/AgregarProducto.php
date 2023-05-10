<?php

include "Conexion.php";

$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$precio = $_POST['precio'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];



$sql = mysqli_query($con, "INSERT INTO producto (id,nombre,marca,precio,tipo,descripcion,imagen,stock) 
values (0,'$nombre', '$marca', '$precio', '$tipo', '$descripcion','$imagen',0)");


if($sql){
    header("location:/Proyecto Final/html/AgregarProducto.html");
}
else{
    echo " Usuario no agregado";
}

?>
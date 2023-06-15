<?php

include "Conexion.php";



$sql = mysqli_query($con, "INSERT INTO usuario (id,nombre,correo,password,telefono,edad,pais) 
    values (NULL,'".$_POST['nombre']."', '".$_POST['correo']."', '".$_POST['password']."',
    '".$_POST['telefono']."','".$_POST['edad']."','".$_POST['pais']."')");


if($sql){
    header("location:/Proyecto Final/html/Home.html");
}
else{
    echo " Usuario no agregado";
}



?>


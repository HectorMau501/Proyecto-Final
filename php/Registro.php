<?php

include "Conexion.php";



$sql = mysqli_query($con, "INSERT INTO usuario (id,nombre,correo,password,telefono) 
    values (NULL,'".$_POST['nombre']."', '".$_POST['correo']."', '".$_POST['password']."',
    '".$_POST['telefono']."')");
$id = mysqli_insert_id($con);
$sql1 = mysqli_query($con, "INSERT INTO usuario_info (id_usuarioinfo,calle,no_ext,colonia,id_usuario) 
values (NULL,'".$_POST['calle']."', '".$_POST['no_exterior']."', '".$_POST['colonia']."',
'$id')");

if($sql){
    header("location:/Proyecto Final/html/Home.html");
}
else{
    echo " Usuario no agregado";
}



?>


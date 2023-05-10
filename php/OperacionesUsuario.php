<?php

include "Conexion.php";

//Variables de la tabla
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['password'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


//Esto es para que en el boton dependiendo del name que tenga pues al momento
//de oprimirlo pues haga dicha accion.



if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modificar'])){

    $sql_modificar = "UPDATE usuario SET nombre = '$nombre', correo = '$correo',
    password = '$contrasena', direccion = '$direccion', telefono = '$telefono'  WHERE id = $id";
        
    if(mysqli_query($con , $sql_modificar)){
        header('Location: ModificarUsuario.php');
    }
    else{
        echo "Error " .$sql. "<db>" .mysqli_error($con);
    } 
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminar'])){

    $sql_eliminar = "DELETE FROM usuario WHERE id = $id";
        
    if(mysqli_query($con , $sql_eliminar)){
        header('Location: ModificarUsuario.php');
    }
    else{
        echo "Error " .$sql. "<db>" .mysqli_error($con);
    }
}

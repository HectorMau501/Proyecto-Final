<?php

include "../php/Conexion.php";

//Variables de la tabla
$id = 0;
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['password'];
$telefono = $_POST['telefono'];
$edad = $_POST['edad'];
$pais = $_POST['pais'];

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

//Esto es para que en el boton dependiendo del name que tenga pues al momento
//de oprimirlo pues haga dicha accion.

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['agregar'])){

$sql = mysqli_query($con, "INSERT INTO usuario (id,nombre,correo,password,telefono,edad,pais) 
values (0,'$nombre', '$correo', '$contrasena', '$telefono','$edad','$pais' )");


    if($sql){
        header("location: AgregarUsuario.php");
    }
    else{
        echo " Usuario no agregado";
    }

}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modificar'])){

    $sql_modificar = "UPDATE usuario SET nombre = '$nombre', correo = '$correo',
    password = '$contrasena',  telefono = '$telefono', edad = '$edad', pais = '$pais'  WHERE id = $id";
        
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

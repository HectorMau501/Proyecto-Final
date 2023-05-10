<?php

include "Conexion.php";

//Variables de la tabla
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$precio = $_POST['precio'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];




//Esto es para que en el boton dependiendo del name que tenga pues al momento
//de oprimirlo pues haga dicha accion.



if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modificar'])){

    $sql_modificar = "UPDATE producto SET nombre = '$nombre', marca = '$marca',
    precio = '$precio', tipo = '$tipo', descripcion = '$descripcion', imagen = '$imagen'  WHERE id = $id";
        
    if(mysqli_query($con , $sql_modificar)){
        header('Location: ModificarProducto.php');
    }
    else{
        echo "Error " .$sql. "<db>" .mysqli_error($con);
    } 
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminar'])){

    $sql_eliminar = "DELETE FROM producto WHERE id = $id";
        
    if(mysqli_query($con , $sql_eliminar)){
        header('Location: ModificarProducto.php');
    }
    else{
        echo "Error " .$sql. "<db>" .mysqli_error($con);
    }
}

?>
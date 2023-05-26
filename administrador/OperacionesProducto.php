<?php

include "../php/Conexion.php";

//Variables de la tabla
$id = 0;
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$precio = $_POST['precio'];
$tipo = $_POST['tipo'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$stock = $_POST['stock'];

if(isset($_POST['id'])){
    $id = $_POST['id'];
}


//Esto es para que en el boton dependiendo del name que tenga pues al momento
//de oprimirlo pues haga dicha accion.

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['agregar'])){
$sql = mysqli_query($con, "INSERT INTO producto (id,nombre,marca,precio,tipo,descripcion,imagen,stock) 
values (0,'$nombre', '$marca', '$precio', '$tipo', '$descripcion','$imagen',$stock)");


if($sql){
    header("location: AgregarProducto.php");
}
else{
    echo " Usuario no agregado";
}

}

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
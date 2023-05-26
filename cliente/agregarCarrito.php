<?php

// Agregar producto al carrito

session_start();

include "../php/Conexion.php";

if(!$con){
    die("No hay conexion".mysqli_connect_error());
}

// Variables para conectar
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

var_dump($id_producto);

if(isset($_SESSION['id_usuario'])){
    // El usuario ha iniciado sesión, podemos agregar el producto al carrito
    $id_usuario = $_SESSION['id_usuario'];
    
    // Consulta para agregar el producto al carrito
    $usuario = mysqli_query($con, "SELECT nombre FROM usuario WHERE id = ".$id_usuario);
    $usuario = mysqli_fetch_assoc($usuario);
    $producto = mysqli_query($con, "SELECT * FROM producto WHERE id = ".$id_producto);
    $producto = mysqli_fetch_assoc($producto);
    $query = mysqli_query($con, "INSERT INTO carrito (id_usuario, nombre_usuario,nombre_producto, 
    imagen_producto,precio_producto,id_producto, cantidad) 
    VALUES ('".$id_usuario."','".$usuario['nombre']."','".$producto['nombre']."', 
    '".$producto['imagen']."','".$producto['precio']."','".$id_producto."', '".$cantidad."')");
    

    if($query){
        header("Location: Carrito.php");
    } else {
        echo "Error al agregar el producto al carrito.";
    }
} else {
    // El usuario no ha iniciado sesión, no podemos agregar el producto al carrito
    echo "Debe iniciar sesión antes de agregar un producto al carrito.";
}
?>



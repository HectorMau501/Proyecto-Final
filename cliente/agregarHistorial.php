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
$fecha = $_POST['fecha'];
$total = $_POST['total'];

var_dump($id_producto);

if(isset($_SESSION['id_usuario'])){
    // El usuario ha iniciado sesión, podemos agregar el producto al carrito
    $id_usuario = $_SESSION['id_usuario'];
    
    // Consulta para agregar el producto al carrito
    $usuario = mysqli_query($con, "SELECT * FROM usuario WHERE id = ".$id_usuario);
    $usuario = mysqli_fetch_assoc($usuario);
    $producto = mysqli_query($con, "SELECT * FROM producto WHERE id = ".$id_producto);
    $producto = mysqli_fetch_assoc($producto);
    $query = mysqli_query($con, "INSERT INTO historial (id_usuario, nombre_usuario,nombre_producto, 
    telefono_usuario,direccion_usuario, precio_producto,id_producto, fecha, total) 
    VALUES ('".$id_usuario."','".$usuario['nombre']."', '".$usuario['telefono']."', 
    '".$usuario['direccion']."', '".$producto['nombre']."', 
    '".$producto['precio']."','".$id_producto."', '".$fecha."', '".$total."')");
    

    if($query){
        header("Location: Carrito.php");
    } else {
        echo "Error al comprar.";
    }
} else {
    // El usuario no ha iniciado sesión, no podemos agregar el producto al carrito
    echo "Debe iniciar sesión antes de agregar un producto al carrito.";
}
?>



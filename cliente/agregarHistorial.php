<?php

// Agregar producto al carrito

session_start();

include "../php/Conexion.php";

if(!$con){
    die("No hay conexion".mysqli_connect_error());
}

$id = mysqli_insert_id($con);
$sql1 = mysqli_query($con, "INSERT INTO usuario_info (id_usuarioinfo,calle,no_ext,colonia,id_usuario) 
values (NULL,'".$_POST['calle']."', '".$_POST['no_exterior']."', '".$_POST['colonia']."',
'$id')");

if(isset($_SESSION['id_usuario'])){
    // El usuario ha iniciado sesión, podemos agregar el producto al carrito
    $id_usuario = $_SESSION['id_usuario'];
    
    // Consulta para agregar el producto al carrito
    
    // Actualizar el total en la tabla 'historial' para el usuario actual
   
    $sql_busqueda = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario'";
    $sql_query = mysqli_query($con, $sql_busqueda);
   
    //if(mysqli_num_rows($sql_query) > 0){
    $total = 0;

    while ($row = mysqli_fetch_array($sql_query)) {
        $precio_producto = $row["precio_producto"];
        $cantidad = $row["cantidad"];

        $subtotal = $precio_producto * $cantidad;
        $total += $subtotal;
    }
 
    
    $query = mysqli_query($con, "INSERT INTO historial (id_usuario, fecha, total) 
        VALUES ('".$id_usuario."', CURRENT_TIMESTAMP(), '".$total."')");

    if($query){
        $id_historial = mysqli_insert_id($con);

        $sql_busqueda = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario'";
        $sql_query = mysqli_query($con, $sql_busqueda);
    
    while($row = mysqli_fetch_array($sql_query)){
        $id_producto = $row["id_producto"];
        $query = mysqli_query($con, "INSERT INTO historial_productos (id_producto, id_historial) 
        VALUES ('$id_producto',  '.$id_historial.')");
    }   
    
    $query = "DELETE FROM carrito WHERE id_usuario = $id_usuario";
    $sql_query = mysqli_query($con, $query);
}

        if($query){
            header("Location: Carrito.php");
        } else {
            echo "Error al comprar.";
        }
    }    
 else {
    // El usuario no ha iniciado sesión, no podemos agregar el producto al carrito
    echo "Debe iniciar sesión antes de agregar un producto al carrito.";
}

?>



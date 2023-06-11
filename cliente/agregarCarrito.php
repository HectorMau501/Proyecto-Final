<?php
session_start();

include "../php/Conexion.php";

if (isset($_SESSION['id_usuario'])) {
    // El usuario ha iniciado sesión, podemos agregar el producto al carrito
    $id_usuario = $_SESSION['id_usuario'];

    if (isset($_POST['id'])) {
        $id_producto = $_POST['id_producto'];
        $cantidad = 1;

        $sql_busqueda = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario'
         AND id_producto = '$id_producto'";
        $query = mysqli_query($con, $sql_busqueda);

        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $cantidad_actual = $row['cantidad'];
            $nueva_cantidad = $cantidad_actual + 1;

            $query = "UPDATE carrito SET cantidad = '$nueva_cantidad' WHERE
            id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
            $sql_query = mysqli_query($con, $query);

            if ($sql_query) {
                header("Location: Carrito.php");
            } else {
                echo "Error al actualizar la cantidad del producto en el carrito.";
            }
        } else {
            // Consulta para agregar el producto al carrito
            $usuario = mysqli_query($con, "SELECT nombre FROM usuario WHERE id = '$id_usuario'");
            $usuario = mysqli_fetch_assoc($usuario);
            $producto = mysqli_query($con, "SELECT * FROM producto WHERE id = ".$id_producto);
            $producto = mysqli_fetch_assoc($producto);

            $query = mysqli_query($con, "INSERT INTO carrito (id_usuario, nombre_usuario, nombre_producto, 
            imagen_producto, precio_producto, id_producto, cantidad) 
            VALUES ('$id_usuario', '".$usuario['nombre']."', '".$producto['nombre']."', 
            '".$producto['imagen']."', '".$producto['precio']."', '$id_producto', '$cantidad')");
            
            if ($query) {
                header("Location: Carrito.php");
            } else {
                echo "Error al agregar el producto al carrito.";
            }
        }
    } else {
        echo "No se ha especificado el producto a agregar.";
    }
} else {
    // El usuario no ha iniciado sesión, no podemos agregar el producto al carrito
    echo "Debe iniciar sesión antes de agregar un producto al carrito.";
}
?>

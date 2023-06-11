<?php

include "../php/Conexion.php";


if(!$con){
    die("No hay conexion".mysqli_connect_error());
}

var_dump($_POST);

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

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['agregar'])) {
    $direccion_sucursal = $_POST['sucursal'];
    $marca_provedor = $_POST['marca'];

    // Obtener el ID de la sucursal en función de la dirección
    $sucursal_query = mysqli_query($con, "SELECT id FROM sucursal WHERE direccion = '$direccion_sucursal'");
    $sucursal = mysqli_fetch_assoc($sucursal_query);

    $provedor_query = mysqli_query($con, "SELECT id FROM provedor WHERE marca_producto = '$marca_provedor'");
    $provedor= mysqli_fetch_assoc($provedor_query);

    if ($sucursal && $provedor_query) {
        $id_sucursal = $sucursal['id'];
        $id_provedor = $provedor['id'];

        $sql = mysqli_query($con, "INSERT INTO producto (id, nombre, id_marca, marca, precio, 
        tipo, descripcion, 
        imagen, stock, id_sucursal, sucursal) 
        VALUES (0, '$nombre', ' $id_provedor', '$marca', '$precio', '$tipo', '$descripcion', 
        '$imagen', $stock, $id_sucursal,
        '$direccion_sucursal')");

        if ($sql) {
            header("location: AgregarProducto.php");
            exit();
        } else {
            echo "Error al agregar el producto: " . mysqli_error($con);
        }
    } else {
        echo "Error al obtener la dirección de la sucursal.";
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
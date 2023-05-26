<?php
include "../php/Conexion.php";

//Variables de la tabla
$id = 0;

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['eliminar'])){
    session_start();
    $id_usuario = $_SESSION['id_usuario'];

    $sql_eliminar = "DELETE FROM carrito WHERE id = $id AND id_usuario = $id_usuario";

        
    if(mysqli_query($con , $sql_eliminar)){
        header('Location: Carrito.php');
    }
    else{
        echo "Error " .$sql_eliminar. "<br>" .mysqli_error($con);
    }
}
?>

<?php

include 'Conexion.php';

if(!isset($_POST['buscar'])){

    $_POST['buscar'] = "";

    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];

$sql_busqueda = "SELECT * FROM usuario WHERE id LIKE '%".$buscar."%' OR
nombre LIKE '%".$buscar."%' OR correo LIKE '%".$buscar."%' OR telefono
LIKE '%".$buscar."%'";

$sql_query = mysqli_query($con,$sql_busqueda);

?>
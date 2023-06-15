<?php

include '../php/Conexion.php';

if(!isset($_POST['buscar'])){

    $_POST['buscar'] ="";

    $buscar = $_POST['buscar'];
}

$buscar = $_POST['buscar'];

$sql_busqueda = "SELECT * FROM producto WHERE id LIKE '%".$buscar."%' OR
nombre LIKE '%".$buscar."%' OR marca LIKE '%".$buscar."%'";

$sql_query = mysqli_query($con,$sql_busqueda); 

?>
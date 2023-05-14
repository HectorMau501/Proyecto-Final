<?php

session_start();

if(isset($_SESSION['carrito'])){
    $arreglo = $_SESSION['carrito'];
    $encontro = false;
    $numero = 0;
    for($i=0; $i<count($arreglo); $i++){
        if($arreglo[$i]['Id'] == $_POST['id']){
            $encontro=true;
            $numero=$i;
        }
    }
    if($encontro == true){
        array_splice($arreglo, $numero, 1);
        $_SESSION['carrito'] = $arreglo;
    }
}

header("Location: /Proyecto Final/cliente/Carrito.php");

?>

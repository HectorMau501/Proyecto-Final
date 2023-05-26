<?php
/*
session_start();
include '../php/Conexion.php';


if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = array();
}

if(isset($_GET['id_producto'], $_GET['nombre_producto'], $_GET['precio_producto'], $_GET['imagen_producto'])){
    $arregloCarrito = array(
        'id_producto' => $_GET['id_producto'],
        'nombre' => $_GET['nombre_producto'],
        'precio' => $_GET['precio_producto'],
        'imagen' => $_GET['imagen_producto'],
        'cantidad' => 1
    );
    array_push($_SESSION['carrito'], $arregloCarrito);
}

*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri&family=Kaushan+Script&family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="stylesheet" href="../css/StylesUsuario.css">
    <link rel="stylesheet" href="/Proyecto Final/css/normalize.css">



</head>

<body>

    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <section class="nav__izquierda">
                <a class="eslogan" href="/Proyecto Final/cliente/HomeUsuario.php">Venta de Automoviles</a>
            </section>
            <section class="nav__derecha">
            <a href="/Proyecto Final/cliente/ProductosUsuario.php">Productos</a>
                <a href="UbicacionCliente.html">Ubicación</a>
                <a href="Carrito.php">Carrito</a>
                <a href="/Proyecto Final/html/Home.html">Cerra Sección</a>
            </section>
        </nav>
    </div>

    <div class="nav-marcas">
        <nav class="navegacion-marcas contenedor">
            <a href="../cliente/HondaCliente.php">Honda</a>
            <a href="../cliente/NissanCliente.php">Nissan</a>
            <a href="../cliente/FordCliente.php">Ford</a>
            <a href="../cliente/ChevroletCliente.php">Chevrolet</a>
        </nav>
    </div>



    <main class="contenedor sombra">
        <h2 class="centrar-texto">Carrito de Compras</h2>

    <table>
        <caption>Productos</caption>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Remover</th>
            </tr>

<?php



include "../php/Conexion.php";

// Obtener el id del usuario logueado
session_start();
$id_usuario = $_SESSION['id_usuario'];



$sql_busqueda = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario'";

$sql_query = mysqli_query($con,$sql_busqueda);

while($row = mysqli_fetch_array($sql_query)){?>
    
    <tr>
         <td><?= $row["nombre_producto"] ?></td> 
         <td>$<?= $row["precio_producto"] ?></td>
         <td>
         <div class="producto__imagen">
            <img src="/Proyecto Final/img/<?php echo $row['imagen_producto']; ?>" alt="imagen auto">
        </div>
        </td>
         <td><?= $row["cantidad"] ?></td> 
         <td>$<?= $row["cantidad"]   *  $row["precio_producto"] ?></td>
         <td>
         <form action="eliminarCarrito.php" method="post">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <input class="button button_eliminar button_move" type="submit" value="Eliminar" name="eliminar">
        </form>
          
        </td>
 
     </tr>

<?php }
?>  
    
 
        </table>
    </main>
    <footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>



    </body>
</html>
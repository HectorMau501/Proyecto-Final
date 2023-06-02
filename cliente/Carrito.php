
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

<?php
session_start();

include "../php/Conexion.php";

if(isset($_SESSION['correo'])){
    $correo = $_SESSION['correo'];

    
    $sql_busqueda = "SELECT * FROM usuario WHERE correo = '$correo'";
    
    $sql_query = mysqli_query($con,$sql_busqueda);
    
    while($row = mysqli_fetch_array($sql_query)){    
        ?>
        <p class="correo"><?= $row["correo"] ?></p>
        <?php
    }
}else{
    echo "Seccion no iniciada";
}
?>  

    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <section class="nav__izquierda">
                <a  href="/Proyecto Final/cliente/HomeUsuario.php"><img src="../icon/SpeedWheels2.jpg" alt=""></a>
            </section>
            <section class="nav__derecha">
            <a href="/Proyecto Final/cliente/ProductosUsuario.php">Productos</a>
                <a href="UbicacionCliente.php">Ubicación</a>       
            <section class="carrito">
                <a href="Carrito.php">
                    <img class="" src="../icon/icons8-agregar-a-carrito-de-compras-32.png" alt="" id="imagen-salida">
                    <div class="imagen-hover" id="imagen-hover"></div>
                </a>
            </section>
               <section class="salida">
                    <a href="/Proyecto Final/html/Home.html">
                        <img src="../icon/icons8-salida-32.png" alt=""id="imagen-salida">
                        <div class="imagen-hover" id="imagen-hover"></div>
                    </a>
               </section>
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
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Remover</th>
            </tr>

<?php



include "../php/Conexion.php";

// Obtener el id del usuario logueado
$id_usuario = $_SESSION['id_usuario'];

$total = 0;


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

         <?php
        $subtotal = $row["cantidad"] * $row["precio_producto"];
         ?>
        <td>
            $<?= $subtotal ?>
        </td>

         <td>
         <form action="eliminarCarrito.php" method="post">
            <input type="hidden" name="id" value="<?= $row["id"] ?>">
            <input class="remover " type="submit" value="Eliminar" name="eliminar">
        </form>
          
        </td>
 
     </tr>

        <?php
        $subtotal = $row["cantidad"] * $row["precio_producto"];
        $total += $subtotal;

        ?>

<?php }
?>  
        </table>
    <section class="grid_right">
        <h3 class="">Cars Totals</h3>
   
        <h4 class="">Total: <span>$<?= $total ?></span> </h4>
        <a  href="../cliente/CompraUsuario.php">
            <input class="button button_comprar" type="submit" value="Comprar" name="comprar">
        </a>
    </section>


    </main>
    <footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>



    </body>
</html>
<?php

session_start();

include '../php/Conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    // Definir la variable de sesión con un valor por defecto si no está establecida
    $_SESSION['id_usuario'] = 0;
}


if(isset($_GET['id'])){
    $id_producto = $_GET['id'];
    $resultado = $con->query("SELECT * FROM producto WHERE id = $id_producto");
    if(mysqli_num_rows($resultado) > 0){
        $fila = mysqli_fetch_assoc($resultado);
        $nombre = $fila['nombre'];
        $precio = $fila['precio'];

        // Establecer la variable $id_usuario
        $id_usuario = $_SESSION['id_usuario'] == 0 ? null : $_SESSION['id_usuario'];

        // Aquí deberías insertar los datos en la tabla de carrito
    } 
} 

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
    
    <link rel="stylesheet" href="../css/StylesCompra.css">
    <link rel="stylesheet" href="/Proyecto Final/css/normalize.css">


</head>
<body>
    
<?php


    $nombre = $_SESSION['nombre'];
    $correo = $_SESSION['correo'];
    $telefono = $_SESSION['telefono'];
    $direccion = $_SESSION['direccion'];


    
    $sql_busqueda = "SELECT * FROM usuario WHERE  nombre = '$nombre' and correo = '$correo'
    and telefono = '$telefono' and direccion = '$direccion'";
    
    $sql_query = mysqli_query($con,$sql_busqueda);
     
    while($row = mysqli_fetch_array($sql_query)){    
        ?>
        <p class="correo"><?= $row["correo"] ?></p>
        <?php
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

    <main class="contenedor">
        <?php
           
           $sql_busqueda = "SELECT * FROM usuario WHERE  nombre = '$nombre' and correo = '$correo'
            and telefono = '$telefono' and direccion = '$direccion'";
            
            $sql_query = mysqli_query($con,$sql_busqueda);

            while($row = mysqli_fetch_array($sql_query)){    
                ?>
                    <form  action="">
                        <div class="grid_productos">
                            <div class="compra">
                                <h3>Datos personales</h3>
                                <p> <span class="negrita">Cliente: </span><?= $row["nombre"] ?></p>
                                <p> <span class="negrita">Domicilio: </span><?= $row["direccion"] ?></p>
                                <p> <span class="negrita">Telefono: </span><?= $row["telefono"] ?></p>
                                <p> <span class="negrita">Numero de cuenta: </span></p>
                                <input class="input-text" type="text" min="0">
                            </div>
                            
                            <div class="">
        <?php
            }
        ?>

<table>
                <h3>Datos de Compra</h3>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>

<?php
// Obtener el id del usuario logueado
$id_usuario = $_SESSION['id_usuario'];

$total = 0;


foreach($resultado as $row){?>

            <div class="">
                </div>
            </div>   
    <tr>
            <td><?php echo $fila['nombre']; ?></td> 
            <td>$<?= $row["precio_producto"] ?></td>
            <td><?= $row["cantidad"] ?></td> 

         <?php
        $subtotal = $row["cantidad"] * $row["precio_producto"];
         ?>
        <td>
            $<?= $subtotal ?>
        </td>

     </tr>

        <?php
        $subtotal = $row["cantidad"] * $row["precio_producto"];
        $total += $subtotal;

        ?>
</table>
    <form action="../cliente/agregarHistorial.php" method="POST">
        <input type="hidden" name="id_producto" value="<?php echo $fila['id']; ?>">
        <button class="button" type="submit">Pagar</button>
    </form>   

<?php }
?>      




<p>Informacion de seguridad</p>
    </main>



<footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
</footer>    
    
</body>
</html>
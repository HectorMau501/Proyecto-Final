<?php

include '../php/Conexion.php';

//Por si tenemos errores en la conexion
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//Consulta
$sql = "SELECT id, nombre, marca, precio, tipo, descripcion,
imagen FROM producto";
$resultado = mysqli_query($con, $sql);

$resultado = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

mysqli_close($con);

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
    <link rel="stylesheet" href="../css/normalize.css">


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
                <a  href="../cliente/HomeUsuario.php"><img src="../icon/SpeedWheels2.jpg" alt=""></a>
            </section>
            <section class="nav__derecha">
            <a href="../cliente/ProductosUsuario.php">Productos</a>
                <a href="UbicacionCliente.php">Ubicación</a>       
            <section class="carrito">
                <a href="Carrito.php">
                    <img class="" src="../icon/icons8-agregar-a-carrito-de-compras-32.png" alt="" id="imagen-salida">
                    <div class="imagen-hover" id="imagen-hover"></div>
                </a>
            </section>
               <section class="salida">
                    <a href="../html/Home.html">
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

    <h1 class=""></h1>

    <main class="contenedor">
        
        <h2 class="centrar-texto">Nuestros Productos</h2>  
        <?php
        foreach($resultado as $row){  ?>     
        <div class="producto">
            <a href="shop-single.php?id=<?php echo $row['id']; ?>">
                <div class="">
                    <img src="../img/<?php echo $row['imagen']; ?>" alt="imagen auto">
                </div>
            </a>    
            <div class="producto__informacion">
                    <h3 class="no-margin producto__nombre"><?php echo $row['marca']; ?> 
                        <span class="producto__bold"><?php echo $row['nombre']; ?></span>
                    </h3>

                    <p class="producto__bold">Estrena desde:
                         <span class="producto__precio">$<?php echo $row['precio']; ?></span>
                    </p>

                    <p class="producto__bold">Tipo:
                        <span class="producto__precio"><?php echo $row['tipo']; ?></span>
                   </p>

                    <p class="producto__descripcion">
                        <?php echo $row['descripcion']; ?>
                    </p>   
                <a href="shop-single.php?id=<?php echo $row['id']; ?>">
                    <div class="alinear-derecha flex">
                        <button class="button " class="input-text" type="submit" value="">Ver</button>
                    </div>
                </a>
            </div>          
        </div> 
        <?php } ?>
    </main>
  
    <footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>

</body>
</html>
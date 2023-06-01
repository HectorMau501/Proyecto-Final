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

    <link rel="stylesheet" href="/Proyecto Final/css/StylesUsuario.css">
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


    <iframe class="ubicacion" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.197848142829!2d-103.39105798576043!3d20.702189004223925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae4e98d5453d%3A0xc4fdd3929a2ecbd1!2sCentro%20de%20Ense%C3%B1anza%20T%C3%A9cnica%20Industrial%20(Plantel%20Colomos)!5e0!3m2!1ses!2smx!4v1679495059352!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>

</body>
</html>
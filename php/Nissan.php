<?php

include 'Conexion.php';

//Por si tenemos errores en la conexion
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

//Consulta
$sql = "SELECT id, nombre, marca, precio, tipo, descripcion,
imagen FROM producto WHERE marca = 'Nissan'";
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
    
    <link rel="stylesheet" href="/Proyecto Final/css/StylesUsuario.css">
    <link rel="stylesheet" href="/Proyecto Final/css/normalize.css">

</head>

<body>

<div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <section class="nav__izquierda">
                <ul class="menu_horizontal">
                    <li>
                        <a href="/Proyecto Final/html/Home.html">
                            <img src="../icon/SpeedWheels (1).jpg" alt="">
                        </a>
                    </li>
                </ul>
            </section>
            <section class="nav__derecha">
                <ul class="menu_horizontal">
                    <li><a href="">Productos</a>
                        <ul class="menu_vertical">
                            <li><a href="/Proyecto Final/php/Honda.php">Honda</a></li>
                            <li><a href="/Proyecto Final/php/Nissan.php">Nissan</a></li>
                            <li><a href="/Proyecto Final/php/Ford.php">Ford</a></li>
                            <li><a href="/Proyecto Final/php/Chevrolet.php">Chevrolet</a></li>
                        </ul>
                    </li>
                    <li><a href="/Proyecto Final/html/Ubicacion.html">Ubicación</a></li>
                    <li><a href="/Proyecto Final/html/Registro.html"><span class="login_circular">Sing up</span></a></li>
                    <li><a href="/Proyecto Final/html/Login.html"><span class="login_circular">Log in</span></a></li>
                </ul>
            </section>
        </nav>
    </div>


    <main class="contenedor">
        
        <h2 class="centrar-texto">Nissan</h2>
        <?php
        foreach($resultado as $row){  ?>     
        <div class="producto">
                <div class="producto__imagen">
                    <img src="/Proyecto Final/img/<?php echo $row['imagen']; ?>" alt="imagen auto">
                </div>
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
                    <a href="../html/Login.html">
                    <div class="alinear-derecha flex">
                        <button class="button " class="input-text" type="submit" value="Iniciar Sesión">Comprar</button>
                    </div>
                </a>
            </div>          
        </div> 
        <?php } ?>
    </main>
  
    <footer class="footer">
        <div class="footer__container">
          <div class="footer__column">
            <h3>Politica y Privacidad</h3>
            <p>
                En nuestra empresa SpeedWheels vemos la privacidad de nuestros usuarios
                como una de las cosas más importantes. Al registrarte con nosotros, utilizamos la 
                información solo con el uso de prorpocionarte los servios que estamos ofreciendo
                con relación con la venta de nuestros automoviles y mejorar las espectativas de nuestros
                clientes. 
            </p>
          </div>
          <div class="footer__column footer__centro">
            <h3>Enlaces</h3>
            <ul>
              <li><a href="">Productos</a></li>
              <li><a href="">Promociones</a></li>
              <li><a href="../html/Ubicacion.html">Ubicación</a></li>
              <li><a href="">Contacto</a></li>
            </ul>
          </div>
          <div class="footer__column">
            <h3>Contacto</h3>
            <p>Dirección: Es Tienda Online 100%</p>
            <!-- icon by Icons8 -->
            <p><img src="../icon/icons8-whatsapp-32.png" alt="">  Teléfono: (123) 456-7890</p>
            <p><img src="../icon/icons8-gmail-32.png" alt="">  Email: SpeedWheels@gmail.com</p>
            <h3>Nuestras Redes Sociales</h3>
            <p><img src="../icon/icons8-facebook-nuevo-32.png" alt="">  Facebook: SpeedWheels212</p>
            <p><img src="../icon/icons8-instagram-32 (1).png" alt="">  Instagram: Wheels501</p>
          </div>
        </div>
        <div class="footer__bottom">
          <p>&copy; 2023 Tu Tienda de Autos. Todos los derechos reservados.</p>
        </div>
      </footer>
    
</body>
</html>
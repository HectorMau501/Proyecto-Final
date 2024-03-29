


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
                <ul class="menu_horizontal">
                    <li>
                        <a href="../cliente/HomeUsuario.php">
                            <img src="../icon/SpeedWheels (1).jpg" alt="">
                        </a>
                    </li>
                </ul>
            </section>
            <section class="nav__derecha">
                <ul class="menu_horizontal">
                    <li><a href="">Productos</a>
                        <ul class="menu_vertical">
                            <li><a href="../cliente/HondaCliente.php">Honda</a></li>
                            <li><a href="../cliente/NissanCliente.php">Nissan</a></li>
                            <li><a href="../cliente/FordCliente.php">Ford</a></li>
                            <li><a href="../cliente/ChevroletCliente.php">Chevrolet</a></li>
                        </ul>
                    </li>
                    <li><a href="../cliente/UbicacionCliente.php">Ubicación</a></li>
                    <li>
                        <a href="Carrito.php">
                            <img class="" src="../icon/icons8-agregar-a-carrito-de-compras-32 (1).png" alt="" id="imagen-salida">
                            <div class="imagen-hover" id="imagen-hover"></div>
                        </a>
                    </li>                    
                <li>    
                    <a href="../html/Home.html">
                        <img src="../icon/icons8-salida-32 (1).png" alt=""id="imagen-salida">
                        <div class="imagen-hover" id="imagen-hover"></div>
                    </a></li>
                </ul>
            </section>
        </nav>
    </div>


    <section class="hero">
        <div>
            <h2>Bienvenido Usuario</h2>
            <h2>En la Agencia nos Enfocamos</h2>          
        </div>
    </section>

    <main class="contenedor sombra">

        <div class="descripciones">
            
            <section class="descripcion">
                <h3>Misión</h3>
                <div class="iconos">
                    <img src="https://img.icons8.com/carbon-copy/100/000000/car-racing.png"/>   
                </div>                    
                <p>           
                    En esta empresa contamos con el principal objetivo de brindar una mejor experiencia, agilizando los procesos con mayor seguridad para el cliente, esto con el fin de otorgar confianza y así hacerse de un automóvil. Hemos trabajado en una modalidad en la cual ya no tengan que comprar de manera física, siendo estrictamente profesionales y fácil de utilizar para los usuarios.  
                </p>
            </section>
            <section class="descripcion">
                <h3>Visión</h3>
                <div class="iconos">
                    <img src="https://img.icons8.com/ios-filled/50/000000/wheel.png"/>
    
                    <img src="https://img.icons8.com/ios-filled/50/null/speedometer.png"/>
                </div>
                <p>Nuestra empresa busca en convertirse en una de las mejores opciones para comprar autos más eficaces sobre el mercado nacional. Ser una empresa de referencia en Jalisco, en el sector automotriz, tener una calidad, tecnología, rentabilidad, seguridad y solidez financiera en nuestros productos. Buscando todas las expectativas de los clientes como los de nuestros empleados y nuestros proveedores.  </p>
            </section>

            <section class="descripcion">
                <h3>Acerca de Nosotros</h3>
                <div class="iconos">
                    <img src="https://img.icons8.com/external-creatype-glyph-colourcreatype/64/null/external-car-car-machine-creatype-glyph-colourcreatype-19.png"/>
                </div>
                <p>Estos son automóviles nuevos, en los cuales son de diferentes diseños y marcas. Nos enfocamos en vender automóviles con un precio al cliente accesible, duradero, fiable entre otros. Tenemos automóviles de uso familiar, para trabajar como las camionetas, de uso exclusivo y demás. Marcas que podrás encontrar desde la Honda, Nissan, Toyota etc.</p>
            </section>
        </div>               
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
              <li><a href="../html/LoginAdministrador.html">Administracion</a></li>
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
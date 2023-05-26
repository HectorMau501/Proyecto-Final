


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
/*
include "../php/Conexion.php";
    session_start();

    $correo = $_SESSION['correo'];

    
    $sql_busqueda = "SELECT * FROM usuario WHERE correo = '$correo'";
    
    $sql_query = mysqli_query($con,$sql_busqueda);
    
    while($row = mysqli_fetch_array($sql_query)){    
?>

<h3><?= $row["correo"] ?></h3>

<?php }*/
?>  

    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <section class="nav__izquierda">
                <a class="eslogan" href="/Proyecto Final/cliente/HomeUsuario.php">Venta de Automoviles</a>
            </section>
            <section class="nav__derecha">
            <a href="/Proyecto Final/cliente/ProductosUsuario.php">Productos</a>
                <a href="UbicacionCliente.html">Ubicación</a>       
                <a href="Carrito.php"><img class="icono" src="../icon/icons8-comprar-32.png" alt=""></a>
               
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
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>
</body>
</html>
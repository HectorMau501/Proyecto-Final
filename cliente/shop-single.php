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
        $imagen = $fila['imagen'];
        $sucursal = $fila['sucursal'];

        // Establecer la variable $id_usuario
        $id_usuario = $_SESSION['id_usuario'] == 0 ? null : $_SESSION['id_usuario'];

        $cantidad = 1;

        // Aquí deberías insertar los datos en la tabla de carrito



    } else {
        header("Location: ./ProductosUsuario.php");
    }
} else {
    header("Location: ./ProductosUsuario.php");
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
    
    <link rel="stylesheet" href="../css/StylesUsuario.css">
    <link rel="stylesheet" href="../css/normalize.css">


</head>
<body>

<?php


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
                        <a href="/Proyecto Final/cliente/HomeUsuario.php">
                            <img src="../icon/SpeedWheels (1).jpg" alt="">
                        </a>
                    </li>
                </ul>
            </section>
            <section class="nav__derecha">
                <ul class="menu_horizontal">
                    <li><a href="">Productos</a>
                        <ul class="menu_vertical">
                            <li><a href="/Proyecto Final/cliente/HondaCliente.php">Honda</a></li>
                            <li><a href="/Proyecto Final/cliente/NissanCliente.php">Nissan</a></li>
                            <li><a href="/Proyecto Final/cliente/FordCliente.php">Ford</a></li>
                            <li><a href="/Proyecto Final/cliente/ChevroletCliente.php">Chevrolet</a></li>
                        </ul>
                    </li>
                    <li><a href="/Proyecto Final/cliente/UbicacionCliente.php">Ubicación</a></li>
                    <li>
                        <a href="Carrito.php">
                            <img class="" src="../icon/icons8-agregar-a-carrito-de-compras-32 (1).png" alt="" id="imagen-salida">
                            <div class="imagen-hover" id="imagen-hover"></div>
                        </a>
                    </li>                    
                <li>    
                    <a href="/Proyecto Final/html/Home.html">
                        <img src="../icon/icons8-salida-32 (1).png" alt=""id="imagen-salida">
                        <div class="imagen-hover" id="imagen-hover"></div>
                    </a></li>
                </ul>
            </section>
        </nav>
    </div>

    <main class="contenedor">
          
        <?php
        foreach($resultado as $row){  ?>    
                <h2 class="centrar-texto producto__nombre"><?php echo $fila['marca']; ?>  
                    <span class="producto__bold"><?php echo $fila['nombre']; ?></span>
                </h2> 
        <div class="producto">
                    <img src="/Proyecto Final/img/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['1']; ?>">
            <div class="producto__informacion">

                    <p class="producto__bold">Estrena desde:
                         <span class="producto__precio">$<?php echo $fila['precio']; ?></span>
                    </p>

                    <p class="producto__bold">Sucursal:
                        <span class="producto__precio"><?php echo $fila['sucursal']; ?></span>
                   </p>

                    <p class="producto__descripcion">
                        <?php echo $row['descripcion']; ?>
                    </p>  

            <form action="agregarCarrito.php" method="POST">
                     <input type="hidden" name="id" value="ID_DEL_PRODUCTO_A_AGREGAR">
                    <input type="hidden" name="id_producto" value="<?php echo $fila['id']; ?>">
                    <!-- <input type="number" name="cantidad" value="1" min="1" "> -->
                    <button class="button" type="submit">Añadir al carrito</button>
            </form>

  
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
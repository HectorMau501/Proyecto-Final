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

    <main class="contenedor">
          
        <?php
        foreach($resultado as $row){  ?>    
                <h2 class="centrar-texto producto__nombre"><?php echo $fila['marca']; ?>  
                    <span class="producto__bold"><?php echo $fila['nombre']; ?></span>
                </h2> 
        <div class="producto">
                <div class="producto__imagen">
                    <img src="/Proyecto Final/img/<?php echo $fila['imagen']; ?>" alt="<?php echo $fila['1']; ?>">
                </div>    
            <div class="producto__informacion">

                    <p class="producto__bold">Estrena desde:
                         <span class="producto__precio">$<?php echo $fila['precio']; ?></span>
                    </p>

                    <p class="producto__bold">Tipo:
                        <span class="producto__precio"><?php echo $fila['tipo']; ?></span>
                   </p>

                    <p class="producto__descripcion">
                        <?php echo $row['descripcion']; ?>
                    </p>  
            <form action="agregarCarrito.php" method="POST">
                    <input type="hidden" name="id_producto" value="<?php echo $fila['id']; ?>">
                    <input type="number" name="cantidad" value="1" min="1" ">
                    <button class="button" type="submit">Añadir al carrito</button>
            </form>

  
            </div>          
        </div> 
        <?php } ?>
    </main>
  
    <footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>
    
</body>
</html>
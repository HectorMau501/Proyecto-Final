<?php

include '../php/Conexion.php';

if(isset($_GET['id'])){
    $resultado = $con -> query("SELECT * FROM producto WHERE id =" .$_GET['id']) or die($con->error);
    if(mysqli_num_rows($resultado) > 0){
        $fila = mysqli_fetch_row($resultado);
    }else{
        header("Location: ./Productos.php");
    }
}   else{
    header("Location: ./Productos.php");
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
                <a href="Ubicacion.html">Ubicación</a>
                <a href="Registro.html">Registro</a>
                <a href="Login.html">Login</a>
                <a href="Carrito.php">Carrito</a>
            </section>
        </nav>
    </div>

    <div class="nav-marcas">
        <nav class="navegacion-marcas contenedor">
            <a href="/Proyecto Final/php/Honda.php">Honda</a>
            <a href="/Proyecto Final/php/Nissan.php">Nissan</a>
            <a href="/Proyecto Final/php/Ford.php">Ford</a>
            <a href="/Proyecto Final/php/Chevrolet.php">Chevrolet</a>
        </nav>
    </div>

    <main class="contenedor">
          
        <?php
        foreach($resultado as $row){  ?>    
                <h2 class="centrar-texto producto__nombre"><?php echo $fila['2']; ?> 
                    <span class="producto__bold"><?php echo $fila['1']; ?></span>
                </h2> 
        <div class="producto">
                <div class="producto__imagen">
                    <img src="/Proyecto Final/img/<?php echo $fila['6']; ?>" alt="<?php echo $fila['1']; ?>">
                </div>    
            <div class="producto__informacion">

                    <p class="producto__bold">Estrena desde:
                         <span class="producto__precio">$<?php echo $fila['3']; ?></span>
                    </p>

                    <p class="producto__bold">Tipo:
                        <span class="producto__precio"><?php echo $fila['4']; ?></span>
                   </p>

                    <p class="producto__descripcion">
                        <?php echo $row['descripcion']; ?>
                    </p>   
                <a href="Carrito.php?id=<?php echo $fila['0']; ?>">
                    <div class="alinear-derecha flex">
                        <button class="button " class="input-text" type="submit" value="Iniciar Sesión">Añadir</button>
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
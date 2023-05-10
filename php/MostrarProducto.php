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
    
        <link rel="stylesheet" href="/Proyecto Final/css/StylesAdministrador.css">
        <link rel="stylesheet" href="/Proyecto Final/css/normalize.css">
    
       
        <div class="nav-bg">
            <nav class="navegacion-principal contenedor">
                <section class="nav__izquierda">
                    <a class="eslogan" href="/Proyecto Final/html/Home.html">Venta de Automoviles</a>
                </section>
                <section class="nav__derecha">
                    <a href="/Proyecto Final/php/MostrarUsuario.php">Usuarios</a>
                    <a href="/Proyecto Final/html/AgregarUsuario.html">Agregar</a>
                    <a href="ModificarUsuario.php">Modificar y Eliminar</a>
                </section>
            </nav>
        </div>
    
        <div class="nav-marcas">
            <nav class="navegacion-marcas contenedor">
                <a href="/Proyecto Final/php/MostrarProducto.php">Producto</a>
                <a href="/Proyecto Final/html/AgregarProducto.html">Agregar</a>
                <a href="ModificarProducto.php">Modificar y Eliminar</a>
            </nav>
        </div>
    
    </head>
    <body>
    
        <main class="contenedor">
            <h2 class="centrar-texto">Bienvenido Administrador</h2>
    
        <div class="usuarios">       
            <form class="formulario__usuario" method="POST" action="MostrarProducto.php">
                <fieldset>
                    <legend>Buscar Producto</legend>
                        <div class="contenedor-campos">
                            <div class="campo">
                                <label>ID, Nombre, Marca o Tipo</label>
                                <input class="input-text" type="text" name="buscar" placeholder="Atributo">
                            </div>
    
                            <div class="alinear-derecha flex">
                                <button class="button button_move input-text" type="submit" value="">Buscar Producto</button>
                            </div>
                        </div>
                    </fieldset>
            </form>    
        </div>

        <table>
        <caption>Productos</caption>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Stock</th>
        </tr>
 
<?php

include 'BusquedaProducto.php';

    while($row = mysqli_fetch_array($sql_query)){  ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nombre"] ?></td>
            <td><?= $row["marca"] ?></td>
            <td><?= $row["precio"] ?></td>
            <td><?= $row["tipo"] ?></td>
            <td><?= $row["descripcion"] ?></td>
            <td><img src="/Proyecto Final/img/<?php echo $row['imagen']; ?>" alt="imagen auto"></td>
            <td><?= $row["stock"] ?></td>
        </tr>    

<?php  } ?>

                </table>
            </main>
        </body>
</html>
 

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
                    <a href="../administrador/MostrarUsuario.php">Usuarios</a>
                    <a href="../administrador/AgregarUsuario.php">Agregar</a>
                    <a href="../administrador/ModificarUsuario.php">Modificar y Eliminar</a>
                </section>
            </nav>
        </div>
    
        <div class="nav-marcas">
            <nav class="navegacion-marcas contenedor">
                <a href="../administrador/MostrarProducto.php">Producto</a>
                <a href="../administrador/AgregarProducto.php">Agregar</a>
                <a href="../administrador/ModificarProducto.php">Modificar y Eliminar</a>
            </nav>
        </div>

</head>
<body>

    <main class="contenedor">
        <h2 class="centrar-texto">Bienvenido Administrador</h2>
        <h3 class="centrar-texto">Modificar y Eliminar Productos</h3>

        <div class="Agregar">             
            <form class="formulario__usuario" method="post" action="OperacionesProducto.php">
                <fieldset>
                    <legend class="justificar-texto">Modifica poniendo el "ID" del producto junto con los nuevos datos.</legend>
                    <legend class="justificar-texto">Elimina solamente poniendo el "ID" del producto.</legend>

                    <div class="contenedor-campos">
                    <div class="campo">
                            <label>ID</label>
                            <input class="input-text" type="text" REQUIRED name="id" placeholder="id" value="<?php echo isset($id) ? $id : ''; ?>">
                        </div>

                        <div class="campo">
                            <label>Nombre</label>
                            <input class="input-text" type="text" name="nombre" placeholder="Nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>">
                        </div>

                        <div class="campo">
                            <label for="Marcas">Marca</label>
                            <input class="input-text" type="text" name="marca" list="opciones_marcas" value="<?php echo isset($marca) ? $marca : ''; ?>" placeholder="Seleccione una opción de la lista">
                            <datalist id="opciones_marcas">
                                <option  value="Honda">
                                <option  value="Nissan">
                                <option  value="Ford"> 
                                <option  value="Chevrolet">       
                            </datalist>
                        </div>
 
                        <div class="campo">
                            <label>Precio</label>
                            <input class="input-text" type="text" name="precio" placeholder="Precio" value="<?php echo isset($precio) ? $precio : ''; ?>">
                        </div>

                        <div class="campo">
                            <label for="Tipo">Tipo</label>
                            <input class="input-text" type="text" name="tipo" list="opciones_tipos" placeholder="Seleccione una opción de la lista" value="<?php echo isset($tipo) ? $tipo : ''; ?>">
                            <datalist id="opciones_tipos">
                                <option  value="Sedan">
                                <option  value="Camionetas">
                                <option  value="Deportivos"> 
                                <option  value="Hatchback">       
                            </datalist>
                        </div>

                        <div class="campo">
                            <label>Descripción</label>
                            <textarea class="input-text" id="" name="descripcion" cols="30" rows="10" value="<?php echo isset($descripcion) ? $descripcion : ''; ?>"></textarea>
                        </div>

                        <div class="campo">
                            <label>URL de la Imagen</label>
                            <input class="input-text" type="text" name="imagen" placeholder="URL" value="<?php echo isset($imagen) ? $imagen : ''; ?>">
                        </div>

                        <div class="campo">
                            <label>Stock</label>
                            <input class="input-text" type="number" name="stock" placeholder="Stock" value="<?php echo isset($stock) ? $stock : ''; ?>">
                        </div>
    

                        <div class="alinear-derecha flex">
                            <input class="button button_eliminar button_move" type="submit" value="Eliminar" name="eliminar"></input>
                            <input class="button button_move" type="submit" value="Modificar" name="modificar"></input>
                        </div>
                    </div>
                </fieldset>
            </form>
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
            <td>$<?= $row["precio"] ?></td>
            <td><?= $row["tipo"] ?></td>
            <td><?= $row["descripcion"] ?></td>
            <td><img src="/Proyecto Final/img/<?php echo $row['imagen']; ?>" alt="imagen auto"></td>
            <td><?= $row["stock"] ?></td>
        </tr>    

<?php  } ?>

                </table>
       </div>
    </main>

    <footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>

   
</body>
</html>
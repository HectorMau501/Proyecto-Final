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

    <link rel="stylesheet" href="../css/StylesAdministrador.css">
    <link rel="stylesheet" href="../css/normalize.css">

   
    <div class="nav-bg">
            <nav class="navegacion-principal contenedor">
                <section class="nav__izquierda">
                    <a class="eslogan" href="../html/Home.html">Venta de Automoviles</a>
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
        <h3 class="centrar-texto">Agregar Productos</h3>

        <div class="Agregar">             
            <form class="formulario__usuario" method="post" action="../administrador/OperacionesProducto.php">
                <fieldset>
                    <legend>Llena los Campos para Agregar un nuevo Producto</legend>
        
                    <div class="contenedor-campos">
                        <div class="campo">
                            <label>Nombre</label>
                            <input class="input-text" type="text" name="nombre" placeholder="Nombre">
                        </div>

                        <?php

include "../php/Conexion.php";

$queryProvedor = "SELECT marca_producto FROM provedor";
$resultadoProvedor = mysqli_query($con, $queryProvedor);
?>
                        <div class="campo">
                            <label for="Tipo">Provedor</label>
                            <input class="input-text" type="text" name="marca" list="opciones_provedor" 
                            placeholder="Seleccione una opción de la lista">
                            <datalist id="opciones_provedor">
                                <?php while ($filaProvedor = mysqli_fetch_assoc($resultadoProvedor)) { ?>
                                    <option value="<?php echo $filaProvedor['marca_producto']; ?>">
                                <?php } ?>
                            </datalist>
                        </div>
 
                        <div class="campo">
                            <label>Precio</label>
                            <input class="input-text" type="text" name="precio" placeholder="Precio">
                        </div>

                        <div class="campo">
                            <label for="Tipo">Tipo</label>
                            <input class="input-text" type="text" name="tipo" list="opciones_tipos" placeholder="Seleccione una opción de la lista">
                            <datalist id="opciones_tipos">
                                <option  value="Sedan">
                                <option  value="Camionetas">
                                <option  value="Deportivos"> 
                                <option  value="Hatchback">       
                            </datalist>
                        </div>

                        <div class="campo">
                            <label>Descripción</label>
                            <textarea class="input-text" id="" name="descripcion" cols="30" rows="10"></textarea>
                        </div>

                        <div class="campo">
                            <label>URL de la Imagen</label>
                            <input class="input-text" type="text" name="imagen" placeholder="URL">
                        </div>

                        <div class="campo">
                            <label>Stock</label>
                            <input class="input-text" type="text" name="stock" placeholder="stock">
                        </div>
<?php


$querySucursal = "SELECT direccion FROM sucursal";
$resultadoSucursal = mysqli_query($con, $querySucursal);
?>
                        <div class="campo">
                            <label for="Tipo">Sucursal</label>
                            <input class="input-text" type="text" name="sucursal" list="opciones_sucursal" 
                            placeholder="Seleccione una opción de la lista">
                            <datalist id="opciones_sucursal">
                                <?php while ($filaSucursal = mysqli_fetch_assoc($resultadoSucursal)) { ?>
                                    <option value="<?php echo $filaSucursal['direccion']; ?>">
                                <?php } ?>
                            </datalist>
                        </div>

                        <div class="alinear-derecha flex">
                            <!--Recuerda en el buttun poder el nombre isset que le diste para que realice esa funcion-->
                            <input class="button button_move" type="submit" value="Agregar Nuevo Producto" name="agregar"></input>
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
            <th>Provedor</th>
            <th>Precio</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Stock</th>
            <th>Sucursal</th>
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
            <td><img src="../img/<?php echo $row['imagen']; ?>" alt="imagen auto"></td>
            <td><?= $row["stock"] ?></td>
            <td><?= $row["sucursal"] ?></td>
        </tr>    

<?php  } ?>
     </table>
    </main>

    <footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>
    
</body>
</html>
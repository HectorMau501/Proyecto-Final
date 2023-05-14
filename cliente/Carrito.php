<?php

session_start();
include '../php/Conexion.php';

if(isset($_SESSION['carrito'])){
        //Si existe buscamos que ya haya estado agregado ese producto
        if(isset($_GET['id'])){
            $arreglo = $_SESSION['carrito'];
            $encontro = false;
            $numero = 0;
            for($i=0; $i<count($arreglo); $i++){
                if($arreglo[$i]['Id'] == $_GET['id']){
                    $encontro=true;
                    $numero=$i;
                }
            }
            if($encontro == true){
                $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad'] + 1;
                $_SESSION['carrito'] = $arreglo;
            }else{
                $nombre = ""; 
                $marca = "";
                $precio = "";
                $imagen = "";
                $res = $con->query('select * from producto where id='.$_GET['id'])or die($con->error);
                $fila = mysqli_fetch_row($res);
                $nombre=$fila[1];
                $marca = $fila[2];
                $precio =$fila[3];
                $imagen = $fila[6];
                $arregloNuevo = array(
                    'Id' => $_GET['id'],
                    'Nombre' => $nombre,
                    'Marca' => $marca,
                    'Precio' => $precio,
                    'Imagen' => $imagen,
                    'Cantidad' => 1
                );
                array_push($arreglo, $arregloNuevo);
                $_SESSION['carrito']=$arreglo;
            }
        }
    }else{
        //creamos la variable de sesion
        if(isset($_GET['id'])){
            $nombre = ""; 
            $marca = "";
            $precio = "";
            $imagen = "";
            $res = $con->query('select * from producto where id='.$_GET['id'])or die($con->error);
            $fila = mysqli_fetch_row($res);
            $nombre=$fila[1];
            $marca = $fila[2];
            $precio =$fila[3];
            $imagen = $fila[6];
            $arreglo[] = array(
                'Id' => $_GET['id'],
                'Nombre' => $nombre,
                'Marca' => $marca,
                'Precio' => $precio,
                'Imagen' => $imagen,
                'Cantidad' => 1
            );
            $_SESSION['carrito'] = $arreglo;
        }
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



    <main class="contenedor sombra">
        <h2 class="centrar-texto">Carrito de Compras</h2>

    <table>
        <caption>Productos</caption>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Remover</th>
            </tr>

<?php
    
    if(isset($_SESSION['carrito'])){
        $arregloCarrito = $_SESSION['carrito'];
        for($i=0 ; $i<count($arregloCarrito); $i++){
    ?>        
        <tr>
            <td>
                <?php echo $arregloCarrito[$i]['Nombre']; ?>
            </td>
            <td>
                <?php echo $arregloCarrito[$i]['Marca']; ?>
            </td>
            <td>
                $<?php echo $arregloCarrito[$i]['Precio']; ?>
            </td>
            <td>
                <img src="/Proyecto Final/img/<?php echo $arregloCarrito[$i]['Imagen']; ?>" alt="">
            </td>
            <td>
                <input class="input-text" type="text" name="tipo" list="opciones_tipos" value="<?php echo $arregloCarrito[$i]['Cantidad']; ?>" placeholder="Cantidad">
                    <datalist id="opciones_tipos">
                        <option  value="1">
                        <option  value="2">
                        <option  value="3">
                        <option  value="4">
                    </datalist>
            </td>
            <td>
                <?php echo is_numeric($arregloCarrito[$i]['Precio']) ? '$' . $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'] : 'Precio no válido'; ?>
            </td>

            <td>
                <form action="/Proyecto Final/php/eliminarCarrito.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $arregloCarrito[$i]['Id']; ?>">
                    <input type="submit" value="Eliminar">
                </form>            
            </td>

        </tr>    

    <?php }
            } ?>
    
        </table>
    </main>
    <footer class="footer">
        <p class="text__footer">Todos los Derechos reservados para The Cars</p>
    </footer>

<script>
    $(document).ready(function(){
        $(".btnEliminar").click(function(event){
            event.preventDefault();
            var id = $(this).data('id');
            
            $.ajax({
                method: 'POST',
                url: '../php/eliminarCarrito.php',
                data:{
                    id:id
                }
            }).done(function(respuesta){
                alert(respuesta);
            });
        });
    });
</script>

    </body>
</html>
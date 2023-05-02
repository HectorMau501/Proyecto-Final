<?php
    include 'Conexion.php';
    echo '
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

    <link rel="stylesheet" href="css/StylesAdministrador.css">

   
    <div class="nav-bg">
        <nav class="navegacion-principal contenedor">
            <section class="nav__izquierda">
                <a class="eslogan" href="Home.html">Venta de Automoviles</a>
            </section>
            <section class="nav__derecha">
                <a href="Productos.html">Productos</a>
                <a href="Ubicacion.html">Ubicación</a>
                <a href="Registro.html">Registro</a>
                <a href="Login.html">Login</a>
            </section>
        </nav>
    </div>

    <div class="nav-marcas">
        <nav class="navegacion-marcas contenedor">
            <a href="MostrarUsuarios.php">Administrador</a>
            <a href="Agregar.html">Agregar</a>
            <a href="Eliminar.html">Eliminar</a>
            <a href="Modificar.html">Modificar</a>
            <a href="Buscar.html">Buscar</a>
        </nav>
    </div>
    

</head>

<body>

    <main class="contenedor">
        <h2 class="centrar-texto">Bienvenido Administrador</h2>

        <div class="Administrador">  
            
            <form class="formulario__usuario">
                <fieldset>
                    <legend>Buscar Usuario</legend>
        
                    <div class="contenedor-campos">
                        <div class="campo">
                            <label>ID, Nombre o Correo</label>
                            <input class="input-text" type="text" name="nombre" placeholder="Atributo">
                        </div>

                        <div class="alinear-derecha flex">
                            <button class="button button_move" class="input-text" type="submit" name="Login" value="Iniciar Sesión">Buscar Usuario</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

    </main>
    ';  


    $sql = "SELECT id, nombre, correo, password, telefono, direccion FROM usuario";
    $result = $con ->query($sql);

    if($result -> num_rows > 0){
        echo "
        
        <table>
            <caption>Usuarios</caption>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Teléfono</th>
                <th>Dirección</th>
            </tr>"
        ;
        while($row = $result ->fetch_assoc()){
            echo "<tr>";
                echo "<td>".$row["id"]."</td>";
                echo "<td>".$row["nombre"]."</td>"; 
                echo "<td>".$row["correo"]."</td>"; 
                echo "<td>".$row["password"]."</td>"; 
                echo "<td>".$row["telefono"]."</td>"; 
                echo "<td>".$row["direccion"]."</td>";  
            echo "</tr>";
        }
    }else{
        echo "0 results";
    }

    $con -> close();
    
    echo '
    </body>
    </html>
    ';   
?>
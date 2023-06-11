<?php

session_start();

include "../php/Conexion.php";

$nombre = $_SESSION['nombre'];
$telefono = $_SESSION['telefono'];
// $direccion = $_SESSION['direccion'];
$correo = $_SESSION['correo'];
$producto = $_SESSION['nombre_producto'];
$fecha = $_SESSION['fecha'];
$total = $_SESSION['total'];

$id_usuario = $_SESSION['id_usuario']; 


$sql_historial = "SELECT * FROM historial WHERE id_usuario = '$id_usuario'";
$resultado_historial = $con->query($sql_historial);
$datos_historial = mysqli_fetch_assoc($resultado_historial);

$sql_carrito = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario'";
$resultado_carrito = $con->query($sql_carrito);

$sql_usuario = "SELECT * FROM usuario WHERE nombre = '$nombre' and correo = '$correo'
 and telefono = '$telefono'";
$resultado_usuario = $con->query($sql_usuario);
$datos_usuario = mysqli_fetch_assoc($resultado_usuario);


// $sql_busqueda = "SELECT * FROM usuario WHERE  nombre = '$nombre' and correo = '$correo'
// and telefono = '$telefono' and direccion = '$direccion'";

$to =  $correo ;
$subject = 'Asunto del mensaje';

$message = "Este mensaje ha sido enviado por SpeedWheels\n";
$message .= "Para: " . $datos_usuario['nombre'] . "\n";
$message .= "Teléfono: " . $datos_usuario['telefono'] . "\n";
$message .= "Automóvil:" . "\n";
if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
    while ($fila_carrito = mysqli_fetch_assoc($resultado_carrito)) {
        // Obtener los datos específicos del carrito
        $nombre_producto = $fila_carrito['nombre_producto'];
        // Otros campos del carrito
        
        // Mostrar los datos del carrito
        $message .= "\t\t$nombre_producto \n";
        // Mostrar otros campos del carrito
        
    }
}

$message .= "Fecha: " . $datos_historial['fecha'] . "\n";
$message .= "Total:$" . $datos_historial['total'] . "\n";


$headers = 'From: rodriguez.salazar.hector1@gmail.com' . "\r\n";
$headers .= 'Reply-To: rodriguez.salazar.hector1@gmail.com' . "\r\n";
$headers .= 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);



    // Obtener el ID de la sucursal en función de la dirección
$usuario_query = mysqli_query($con, "SELECT id FROM usuario");
$usuario = mysqli_fetch_assoc($usuario_query );

    if ($usuario) {
        $id = $usuario['id'];

        // $sql = mysqli_query($con, "INSERT INTO producto (id, nombre, id_marca, marca, precio, 
        // tipo, descripcion, 
        // imagen, stock, id_sucursal, sucursal) 
        // VALUES (0, '$nombre', ' $id_provedor', '$marca', '$precio', '$tipo', '$descripcion', 
        // '$imagen', $stock, $id_sucursal,
        // '$direccion_sucursal')");

    $sql1 = mysqli_query($con, "INSERT INTO usuario_info (id_usuarioinfo,calle,no_ext,colonia,id_usuario,cuenta) 
    values (NULL,'".$_POST['calle']."', '".$_POST['no_exterior']."', '".$_POST['colonia']."',
    '$id', '".$_POST['cuenta']."')");

}



//Agregar

if(isset($_SESSION['id_usuario'])){
    // El usuario ha iniciado sesión, podemos agregar el producto al carrito
    $id_usuario = $_SESSION['id_usuario'];
    
    // Consulta para agregar el producto al carrito
    
    // Actualizar el total en la tabla 'historial' para el usuario actual
   
    $sql_busqueda = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario'";
    $sql_query = mysqli_query($con, $sql_busqueda);
   
    //if(mysqli_num_rows($sql_query) > 0){
    $total = 0;

    while ($row = mysqli_fetch_array($sql_query)) {
        $precio_producto = $row["precio_producto"];
        $cantidad = $row["cantidad"];

        $subtotal = $precio_producto * $cantidad;
        $total += $subtotal;
    }
 
    
    $query = mysqli_query($con, "INSERT INTO historial (id_usuario, fecha, total) 
        VALUES ('".$id_usuario."', CURRENT_TIMESTAMP(), '".$total."')");

    if($query){
        $id_historial = mysqli_insert_id($con);

        $sql_busqueda = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario'";
        $sql_query = mysqli_query($con, $sql_busqueda);
    
    while($row = mysqli_fetch_array($sql_query)){
        $id_producto = $row["id_producto"];
        $query = mysqli_query($con, "INSERT INTO historial_productos (id_producto, id_historial) 
        VALUES ('$id_producto',  '.$id_historial.')");
    }   
    
    $query = "DELETE FROM carrito WHERE id_usuario = $id_usuario";
    $sql_query = mysqli_query($con, $query);
}

        if($query){
            header("Location: Carrito.php");
        } else {
            echo "Error al comprar.";
        }
    }    
 else {
    // El usuario no ha iniciado sesión, no podemos agregar el producto al carrito
    echo "Debe iniciar sesión antes de agregar un producto al carrito.";
}

?>

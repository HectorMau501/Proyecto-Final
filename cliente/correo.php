<?php

session_start();

include '../php/Conexion.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "../vendor/autoload.php";
require('../fpdf185/fpdf.php');
require('../PHPMailer/src/PHPMailer.php');
require('../PHPMailer/src/SMTP.php');
require('../PHPMailer/src/Exception.php');

$id_usuario = $_SESSION['id_usuario']; 
$nombre = $_SESSION['nombre'];
$telefono = $_SESSION['telefono'];
$correo = $_SESSION['correo'];
$total = $_SESSION['total'];
$productos = json_decode($_SESSION["productos"]);
$producto = $productos[0]->nombre_producto;


$sql_carrito = "SELECT * FROM carrito WHERE id_usuario = $id_usuario";
$resultado_carrito = $con->query($sql_carrito);

 $sql_busqueda = "SELECT * FROM usuario WHERE  nombre = '$nombre' and correo = '$correo'
 and telefono = '$telefono' ";

    // Crear un nuevo objeto FPDF
    $pdf = new FPDF();

    // Agregar una nueva página al PDF
    $pdf->AddPage();

    // Generar el contenido del PDF
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'Este mensaje ha sido enviado por SpeedWheels', 0, 1);
    $pdf->Ln(10); // Cambio de ln a Ln
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Para: ' . $nombre, 0, 1); // Cambio de $datos_usuario['nombre'] a $nombre
    $pdf->Cell(0, 10, 'Telefono: ' . $telefono, 0, 1); // Cambio de $datos_usuario['telefono'] a $telefono
    $pdf->Cell(0, 10, 'Automovil:', 0, 1);

    if ($resultado_carrito && $resultado_carrito->num_rows > 0) {
        while ($fila_carrito = mysqli_fetch_assoc($resultado_carrito)) {
            // Obtener los datos específicos del carrito
            $nombre_producto = $fila_carrito['nombre_producto'];
            // Otros campos del carrito
            
            // Agregar los datos del carrito al PDF
            $pdf->Cell(0, 10, "\t\t$nombre_producto", 0, 1);
            // Agregar otros campos del carrito al PDF
            
        }
    }
    $fecha = date('l jS \of F Y h:i:s A');
    $pdf->Cell(0, 10, 'Fecha: ' . $fecha, 0, 1); // Cambio de $datos_historial['fecha'] a $fecha
    $pdf->Cell(0, 10, 'Total: $' . $total, 0, 1); // Cambio de $datos_historial['total'] a $total

      // Guardar el PDF en el servidor
    $pdfPath = '../pdf/orden'.$id_usuario.'.pdf';
    $pdf->Output($pdfPath, 'F');

    // Definir los encabezados del correo electrónico
    $mail = new PHPMailer();
	$mail->CharSet = 'utf-8';
	$mail->Host = "smtp.googlemail.com";
	$mail->From = "rodriguez.salazar.hector1@gmail.com";
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->Username = "rodriguez.salazar.hector1@gmail.com";
	$mail->Password = "qvolbvlxthjyiodr";
	$mail->SMTPSecure = "ssl";
	$mail->Port = 465;
	$mail->AddAddress($correo);
	$mail->SMTPDebug = 0;   //Muestra las trazas del mail, 0 para ocultarla
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Gracias por la Compra!';
	$mail->Body = '<b>Este es el recibo de tu compra:)</b>';
	$mail->AltBody = 'Hemos enviado el recibo';

	$inMailFileName = "recibo.pdf";
	$filePath = "../pdf/orden" .$id_usuario.".pdf" ;
	$mail->AddAttachment($filePath, $inMailFileName);

	$mail->send();

$credentials = array(
    'mau',
    '123'
);

$filenameP = "orden".$id_usuario.".pdf";

//$filePath = '../pdf/'.$filenameP;
$filesize = filesize($filePath);
$fh = fopen($filePath, 'r');

$remoteUrl = '10.0.0.4/';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $remoteUrl . $filenameP);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//curl_setopt($ch, CURLOPT_USERPWD, implode(':', $credentials));

curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_INFILE, $fh);
curl_setopt($ch, CURLOPT_INFILESIZE, $filesize);

$response = curl_exec($ch);

if($response == true){
    echo "File posted.";
}else{
    "Error:" .curl_error($ch);
}

fclose($fh);

    // Obtener el ID de la sucursal en función de la dirección
$usuario_query = mysqli_query($con, "SELECT id FROM usuario");
$usuario = mysqli_fetch_assoc($usuario_query );

//Agregar
if(isset($_SESSION['id_usuario'])){
    // El usuario ha iniciado sesión, podemos agregar el producto al carrito
    $id_usuario = $_SESSION['id_usuario'];
       
    // Actualizar el total en la tabla 'historial' para el usuario actual
    $sql_busqueda = "SELECT * FROM carrito WHERE id_usuario = '$id_usuario'";
    $sql_query = mysqli_query($con, $sql_busqueda);
   
    $total = 0;

    while ($row = mysqli_fetch_array($sql_query)) {
        $precio_producto = $row["precio_producto"];
        $cantidad = $row["cantidad"];

        $subtotal = $precio_producto * $cantidad;
        $total += $subtotal;
    }
     
$query = "DELETE FROM carrito WHERE id_usuario = $id_usuario";
$sql_query = mysqli_query($con, $query);

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

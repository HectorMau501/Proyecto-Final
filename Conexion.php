<?php
$server="127.0.0.1";
$database= "VentaAutomoviles";
$username= "root";
$password="";


$con = mysqli_connect($server,$username,$password,$database);

if($con){
    echo "exitosa";
}

else{
    echo " No exitosa";
}
?>

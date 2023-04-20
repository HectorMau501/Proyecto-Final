<?php
$server="localhost";
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

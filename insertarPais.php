<?php
include("conexion.php");
$con=conectar();

$country=$_POST['country'];

$sql="INSERT INTO country (country) values ('$country')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: inicio.php");
}else {
}
?>
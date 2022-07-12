<?php
include("conexion.php");
$con=conectar();

$city=$_POST['city'];
$country_id=$_POST['country_id'];

$sql="INSERT INTO city (city, country_id) values ('$city','$country_id')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: inicio.php");
}else {
}
?>
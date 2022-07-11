<?php
include("conexion.php");
$con=conectar();

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$address=$_POST['address'];
$city_id=$_POST['city_id'];
$active=$_POST['active'];

$sql="CALL registrarCliente ('$first_name','$last_name','$email','$address','$city_id','$active')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: inicio.php");
}else {
}
?>
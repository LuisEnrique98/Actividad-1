<?php

include("conexion.php");
$con=conectar();

$customer_id=$_GET['id'];

$sql="CALL eliminarCliente ('$customer_id')";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: inicio.php");
    }
?>

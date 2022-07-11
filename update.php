<?php

include("conexion.php");
$con=conectar();

$customer_id=$_POST['customer_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$address=$_POST['address'];
$city_id=$_POST['city_id'];
$active=$_POST['active'];

$sql="UPDATE customer SET  first_name='$first_name',last_name='$last_name',email='$email',address='$address',city_id='$city_id',active='$active' WHERE customer_id='$customer_id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: inicio.php");
    }
?>
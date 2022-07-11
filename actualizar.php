<?php 
    include("conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM customer WHERE customer_id='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <h1>Actualizar Cliente</h1>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="customer_id" value="<?php echo $row['customer_id']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="first_name" placeholder="Nombre" value="<?php echo $row['first_name']  ?>">
                                <input type="text" class="form-control mb-3" name="last_name" placeholder="Apellidos" value="<?php echo $row['last_name']  ?>">
                                <input type="text" class="form-control mb-3" name="email" placeholder="Correo Electrónico" value="<?php echo $row['email']  ?>">
                                <input type="text" class="form-control mb-3" name="address" placeholder="Dirección" value="<?php echo $row['address']  ?>">
                                <input type="text" class="form-control mb-3" name="city_id" placeholder="Ciudad" value="<?php echo $row['city_id']  ?>">
                                <input type="text" class="form-control mb-3" name="active" placeholder="Estado" value="<?php echo $row['active']  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>
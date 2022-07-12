<?php
include("conexion.php");
$con = conectar();

$sql = "select * from country";
$query = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> ACTIVIDAD JULIO 6</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ACTIVIDAD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrarCliente.php">Registrar Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrarCiudad.php">Registrar Ciudad</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="registrarPais.php">Registrar País</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row gx-5">
            <div class="col-md-3">
                <h1>Registrar País</h1>
                <form action="insertarPais.php" method="POST" >
                    <label for="formGroupExampleInput" class="form-label">Nombre del País</label>
                    <input type="text" class="form-control mb-3" name="country" placeholder="País" required>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Codigo</th>
                            <th>País</th>
                            <th>Última actualización</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <th><?php echo $row['country_id'] ?></th>
                                <th><?php echo $row['country'] ?></th>
                                <th><?php echo $row['last_update'] ?></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
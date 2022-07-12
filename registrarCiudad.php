<?php
include("conexion.php");
$con = conectar();

$sql = "select * from country";
$query = mysqli_query($con, $sql);

$sql1 = "select c.city_id, c.city, co.country, c.last_update from city c inner join country co on c.country_id=co.country_id";
$query1 = mysqli_query($con, $sql1);

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
                        <a class="nav-link active" href="registrarCiudad.php">Registrar Ciudad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrarPais.php">Registrar País</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row gx-5">
            <div class="col-md-3">
                <h1>Registrar Clientes</h1>
                <form action="insertar.php" method="POST">
                    <label for="formGroupExampleInput" class="form-label">Nombre de la ciudad</label>
                    <input type="text" class="form-control mb-3" name="city" placeholder="Ciudad" required>
                    <label for="formGroupExampleInput" class="form-label">País</label>
                    <select name="city_id" class="form-control mb-3">
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <option value="<?php echo $row['country_id'] ?>"> <?php echo $row['country'] ?> </option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="submit" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Codigo</th>
                            <th>Ciudad</th>
                            <th>País</th>
                            <th>Última actualización</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query1)) {
                        ?>
                            <tr>
                                <th><?php echo $row['city_id'] ?></th>
                                <th><?php echo $row['city'] ?></th>
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
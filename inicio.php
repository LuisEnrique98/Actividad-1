<?php
include("conexion.php");
$con = conectar();

$sql = "CALL listarCliente()";
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
                        <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrarCliente.php">Registrar Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrarCiudad.php">Registrar Ciudad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registrarPais.php">Registrar País</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div class="container overflow-hidden">
        <div class="row gx-5">
            <div class="col">
                <h4>Backup de Tablas y Datos</h4>
                <a href="descarga.php" class="btn btn-success">Generar Backup</a>
            </div>
            <div class="col">
                <h4>Buscar cantidad de clientes por nombre</h4>
                <form class="d-flex" action="filtro.php" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="id" id="id">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container mt-5">

        <div class="col-md-8">
            <table class="table">
                <thead class="table-success table-striped">
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>País</th>
                        <th>Estado</th>
                        <th>F. de creación</th>
                        <th>Última actualización</th>
                        <th>Opciones</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <th><?php echo $row['customer_id'] ?></th>
                            <th><?php echo $row['first_name'] ?></th>
                            <th><?php echo $row['last_name'] ?></th>
                            <th><?php echo $row['email'] ?></th>
                            <th><?php echo $row['address'] ?></th>
                            <th><?php echo $row['city'] ?></th>
                            <th><?php echo $row['country'] ?></th>
                            <th><?php if ($row['active'] == 1) {
                                    echo 'Activo';
                                } else {
                                    echo 'No Activo';
                                }
                                ?></th>
                            <th><?php echo $row['create_date'] ?></th>
                            <th><?php echo $row['last_update'] ?></th>
                            <th><a href="actualizar.php?id=<?php echo $row['customer_id'] ?>" class="btn btn-info">Editar</a></th>
                            <th><a href="delete.php?id=<?php echo $row['customer_id'] ?>" class="btn btn-danger">Eliminar</a></th>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
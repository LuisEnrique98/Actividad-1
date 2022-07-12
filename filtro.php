<?php
include("conexion.php");
$con = conectar();
$id = $_POST['id'];
$count = current($con->query("SELECT cantidadClientes('$id') as cantidad")->fetch_row());
if ($count > 0) {
    $resultado = "Solamente hay " . $count . " clientes que tienen un " . $id . " en su campo de nombre";
} else {
    $resultado = "No hay datos";
}

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
    <br>
    <div class="container overflow-hidden">
        <H3>FILTRO DE CANTIDAD DE CLIENTES</H3>
        <br>
        <div class="row gx-5">
            <div class="col">

            </div>
            <div class="col">
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
                        <th>Cantidad de Clientes</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th><?php echo $resultado ?></th>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</body>

</html>
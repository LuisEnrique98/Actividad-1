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
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="col-md-3">
            <h1>Registrar Clientes</h1>
            <form action="insertar.php" method="POST">
                <input type="text" class="form-control mb-3" name="first_name" placeholder="Nombre" required>
                <input type="text" class="form-control mb-3" name="last_name" placeholder="Apellido" required>
                <input type="text" class="form-control mb-3" name="email" placeholder="Correo Electrónico" required>
                <input type="text" class="form-control mb-3" name="address" placeholder="Dirección" required>
                <input type="text" class="form-control mb-3" name="city_id" placeholder="Ciudad" required>
                <input type="text" class="form-control mb-3" name="active" placeholder="Estado" required>
                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
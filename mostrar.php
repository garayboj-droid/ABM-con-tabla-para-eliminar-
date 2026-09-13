?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bcescuela"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Fallo: " . $conn->connect_error); }

$sql = "SELECT id, nombre, edad, apellido FROM personas7";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registros - Vista Morada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f3f0ff; }
        .header-purple { background-color: #6f42c1; color: white; border-radius: 15px 15px 0 0; padding: 20px; }
        .custom-table { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(111, 66, 193, 0.1); }
        .badge-age { background-color: #e5dbff; color: #6f42c1; }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="custom-table">
                <div class="header-purple d-flex justify-content-between align-items-center">
                    <h4 class="m-0">Lista de Alumnos Actualizada</h4>
                    <a href="index.php" class="btn btn-sm btn-outline-light">Volver a Eliminar</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light text-secondary">
                            <tr>
                                <th class="py-3 ps-4">ID</th>
                                <th>NOMBRE COMPLETO</th>
                                <th>EDAD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($resultado && $resultado->num_rows > 0) {
                                while($fila = $resultado->fetch_assoc()) {
                                    echo "<tr>
                                            <td class='ps-4 fw-bold text-muted'>#".$fila["id"]."</td>
                                            <td><span class='d-block fw-semibold'>".$fila["nombre"]." ".$fila["apellido"]."</span></td>
                                            <td><span class='badge badge-age p-2 px-3'>".$fila["edad"]." años</span></td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3' class='text-center py-5 text-muted'>No hay datos disponibles</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

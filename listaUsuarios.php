<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Usuarios</h1>
        
        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>ID Empresa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once "index.php";

                    $usuarios = obtenerUsuarios(); 

                    if (!empty($usuarios) && is_array($usuarios)) {
                        foreach ($usuarios as $usuario) {
                            echo "<tr>
                                    <td>{$usuario['id']}</td>
                                    <td>{$usuario['nombre']}</td>
                                    <td>{$usuario['correo']}</td>
                                    <td>{$usuario['empresa_id']}</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr>
                                <td colspan='4' class='text-center text-muted'>No hay usuarios registrados.</td>
                              </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="text-center mt-3">
        <a href="registrar.php" class="btn btn-success btn-lg ms-2">registrar usuarios</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
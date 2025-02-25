<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Formulario de registro de Empresa -->
            <div class="col-md-6">
                <h1 class="text-center">Registrar Empresa</h1>
                <form method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label fs-5">Nombre de la Empresa</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escribe el nombre de la empresa" required>
                    </div>
                    <div class="mb-3">
                        <label for="rubro" class="form-label fs-5">Rubro</label>
                        <input type="text" name="rubro" class="form-control" id="rubro" placeholder="Escribe el rubro de la empresa" required>
                    </div>
                    <div class="text-center mt-3">
                        <input type="submit" name="registrar_empresa" value="registrar_empresa" class="btn btn-primary btn-lg">
                    </div>
                </form>
            </div>
            <!-- Formulario de registro de Usuario -->
            <div class="col-md-6">
                <h1 class="text-center">Registrar Usuario</h1>
                <form method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label fs-5">Nombre de Usuario</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Escribe el nombre de usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label fs-5">Correo</label>
                        <input type="email" name="correo" class="form-control" id="correo" placeholder="Escribe tu correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label fs-5">Contraseña</label>
                        <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label for="empresa_id" class="form-label fs-5">ID Empresa</label>
                        <input type="number" name="empresa_id" class="form-control" id="empresa_id" placeholder="Ingresa ID de la empresa" required>
                    </div>
                    <div class="text-center mt-3">
                        <input type="submit" name="registrar" value="registrar" class="btn btn-primary btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="listaUsuarios.php" class="btn btn-success btn-lg ms-2">Ver Lista de Usuarios</a>
    </div>
</body>
</html>
<?php
if(isset($_POST['registrar'])){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $empresa_id = $_POST['empresa_id'];
    if(empty($nombre) 
    || empty($correo)
    || empty($contrasena)
    || empty($empresa_id)){
        echo'
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    
    include_once "index.php";
    $resultado = registrarUsuario($nombre, $correo, $contrasena, $empresa_id);
    if($resultado){
        echo'
        <div class="alert alert-success mt-3" role="alert">
            Usuario registrado con éxito.
        </div>';
    }
}

if(isset($_POST['registrar_empresa'])){
    $nombre = $_POST['nombre'];
    $rubro = $_POST['rubro'];
    
    if(empty($nombre) || empty($rubro)){
        echo '
        <div class="alert alert-danger mt-3" role="alert">
            Debes completar todos los datos.
        </div>';
        return;
    } 
    
    include_once "index.php";
    $resultado = registrarEmpresa($nombre, $rubro);
    if($resultado){
        echo '
        <div class="alert alert-success mt-3" role="alert">
            Empresa registrada con éxito.
        </div>';
    } else {
        echo '
        <div class="alert alert-danger mt-3" role="alert">
            Ocurrió un error al registrar la empresa.
        </div>';
    }
}
?>
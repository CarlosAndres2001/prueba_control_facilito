<?php
function conectarBaseDatos() {
	$host = "localhost";
	$db   = "prueba_control";
	$user = "taller";
	$passbd = "eu0!0vO/t3)MsB5H";
	$charset = 'utf8mb4';

	$options = [
	    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
	    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
	    \PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	try {
	     $pdobd = new \PDO($dsn, $user, $passbd, $options);
	     return $pdobd;
	} catch (\PDOException $e) {
	     throw new \PDOException($e->getMessage(), (int)$e->getCode());
	}
}
function insertar($sentencia, $parametros ){
    $bd = conectarBaseDatos();
    $respuesta = $bd->prepare($sentencia);
    return $respuesta->execute($parametros);
}

function select($sentencia, $parametros = []){
    $bd = conectarBaseDatos();
    $respuesta = $bd->prepare($sentencia);
    $respuesta->execute($parametros);
    return $respuesta->fetchAll(PDO::FETCH_ASSOC); 
}

function registrarUsuario($nombre, $correo, $contrasena, $empresa_id){
    $nueva1 = password_hash( $contrasena, PASSWORD_DEFAULT);
    $sentencia = "INSERT INTO usuario (nombre, correo, contrasena, empresa_id) VALUES(?,?,?,?)";
    $parametros = [$nombre, $correo, $nueva1, $empresa_id];
    return insertar($sentencia, $parametros);
}

function registrarEmpresa($nombre, $rubro){
    $sentencia ="INSERT INTO empresa (nombre, rubro ) VALUES (?,?)";
    $parametros = [$nombre,$rubro];
    return insertar($sentencia, $parametros);
}

function obtenerUsuarios(){
    $sentencia = "SELECT id, nombre, correo, empresa_id FROM usuario";
    return select($sentencia);
}

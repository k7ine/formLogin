<?php

// Establece la conexión
$dsn = 'mysql:dbname=usuariodb;host=localhost:3306'; //nombre Base datos y dónde está la BD
$usuario = 'test';
$contrasena = 'test';

try {

$conexion = new PDO($dsn, $usuario, $contrasena);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Conexión Establecida con la BD en Docker";

}
catch (PDOException $e) { //en caso de detectar un error lo muestra
echo 'Falló la conexión: ' . $e->getMessage();
}

?>
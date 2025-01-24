<?php
// Establish the connection
$dsn = 'mysql:dbname=usuariodb;host=localhost:3306'; // Name and data base location
$usuario = 'test';
$contrasena = 'test';

try {
$conexion = new PDO($dsn, $usuario, $contrasena);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Conexión Establecida con la BD en Docker";
}
catch (PDOException $e) { // Error case
echo 'Falló la conexión: ' . $e->getMessage();
}
?>
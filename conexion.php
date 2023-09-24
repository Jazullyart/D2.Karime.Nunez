<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "usuariospractica";

$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>
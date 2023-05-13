<?php
//editar datos de la tabla//
$conexion = mysqli_connect("localhost", "root", "12345", "login");
$conexion -> set_charset("utf8");

$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$carrera = $_POST['carrera'];
$telefono = $_POST['telefono'];
$pass = $_POST['pass'];

$sql = "UPDATE roluser set nombre='$nombre', usuario='$usuario', carrera='$carrera', telefono='$telefono', pass='$pass' WHERE usuario = $usuario";
$rta = mysqli_query($conexion, $sql);

header("Location: ../usuarios.php");
?>
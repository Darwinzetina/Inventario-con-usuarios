<?php
//editar datos de la tabla//
$conexion = mysqli_connect("localhost", "root", "12345", "login");
$conexion -> set_charset("utf8");

$categoria = $_POST['categoria'];

$sql = "INSERT INTO categorias (nombre_categoria) VALUES('$categoria')";
$rta = $conexion->query($sql);

header("Location:agregar_categoria.php");

?>
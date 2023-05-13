<?php
//eliminar filas de la tabla//
$id = $_GET['codigo'];

$cnx = mysqli_connect("localhost", "root", "12345", "login");
$sql = "DELETE FROM productos WHERE codigo = '$id'";
$rta = mysqli_query($cnx, $sql);
header("Location: ../productos.php");
?>
<?php
//eliminar filas de la tabla//
$id = $_GET['id'];

$cnx = mysqli_connect("localhost", "root", "12345", "login");
$sql = "DELETE FROM categorias WHERE id = '$id'";
$rta = mysqli_query($cnx, $sql);
header("Location: agregar_categoria.php");
?>
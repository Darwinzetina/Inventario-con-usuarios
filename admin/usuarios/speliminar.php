<?php
//eliminar filas de la tabla//
$id = $_GET['usuario'];

$cnx = mysqli_connect("localhost", "root", "12345", "login");
$sql = "DELETE FROM roluser WHERE usuario = '$id'";
$rta = mysqli_query($cnx, $sql);
header("Location: ../usuarios.php");
?>
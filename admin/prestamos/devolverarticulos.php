<?php
$conexion=mysqli_connect("localhost", "root", "12345", "login");
$conexion -> set_charset("utf8");

$id=$_GET['id'];
$nombre=$_GET['nombre'];
$mat=$_GET['matricula'];
$codigo =$_GET['codigo_articulo'];
$art=$_GET['articulo'];
$cant=$_GET['cantidad'];
$prestamo=$_GET['fecha_prestamo'];
$devolucion=$_GET['fecha_devolucion'];

$sql = "UPDATE productos a, prestamos b SET a.cantidad=a.cantidad+'$cant' WHERE a.codigo = '$codigo'";
$rta = mysqli_query($conexion, $sql);

$sql="DELETE FROM prestamos WHERE id='$id'";
$rta =mysqli_query($conexion,$sql);

header("Location: ../prestamos.php");

?>
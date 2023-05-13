<?php
//editar datos de la tabla//
$conexion = mysqli_connect("localhost", "root", "12345", "login");
$conexion -> set_charset("utf8");

$codigo = $_POST['codigo'];
$institucional = $_POST['institucional'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$articulo = $_POST['articulo'];
$marca = $_POST['marca'];
$color = $_POST['color'];
$tipo = $_POST['tipo'];
$cantidad = $_POST['cantidad'];
$observaciones = $_POST['observaciones'];

if($imagen==false){

$sql = "UPDATE productos SET codigo='$codigo', institucional='$institucional', articulo='$articulo', marca='$marca', color='$color', tipo='$tipo', cantidad='$cantidad', observaciones='$observaciones' WHERE codigo = $codigo";
$rta = mysqli_query($conexion, $sql);

}else{
$sql = "UPDATE productos SET codigo='$codigo', institucional='$institucional', imagen='$imagen', articulo='$articulo', marca='$marca', color='$color', tipo='$tipo', cantidad='$cantidad', observaciones='$observaciones' WHERE codigo = $codigo";
$rta = mysqli_query($conexion, $sql);

}

header("Location: ../productos.php");



?>
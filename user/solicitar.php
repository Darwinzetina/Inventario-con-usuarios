<?php
$conexion = mysqli_connect('localhost','root','12345','login'); 

session_start();
if(!isset($_SESSION['id_usuario'])) {
      header("Location: ../loginu.php");
}
?>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="shortcut icon" href="../favicon.png">
<link rel="stylesheet" href="estilo22.css" type="text/css">
<title>INICIO</title>
<style type="text/css">
<!--
.Estilo1 {
	font-weight: bold;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 18px;
	color: #000000;
}
.Estilo3 {
	font-family: Verdana, Arial, Helvetica, sans-serif
}
.Estilo4 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo5 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #FFFFFF; }
.Estilo7 {font-size: 13px; font-weight: bold; font-family: Geneva, Arial, Helvetica, sans-serif; }
.Estilo9 {color: #455A64}
.Estilo10 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #455A64; }
-->
</style>
</head>

<body>
<div class="cuadro2">
  
<div id="menu">
<ul class="Estilo1">
<li class="Estilo5"><a href="user.php"><img src="../img/inicio.png" alt="itselogo" width="15" height="15">  Inicio</a></li>
</ul>
</div>

<div>
<div id="menu1">
<ul class="Estilo1">
<li><span class="Estilo4"><a href="solicitar.php"><img src="../img/prestamos.png" alt="itselogo" width="20" height="15">Historial de préstamos</a></span></li>
</ul>
</div>

<div>
<div id="menu3">
<ul class="Estilo1">
<li><a href="consultar.php" class="Estilo4"><img src="../img/articulos.png" alt="itselogo" width="15" height="15"> Consultar artículos</a></li>
</ul>
</div>
<div Estilo4 class="cuadro5">
<div class="cuadro3"><h2 align="center" class="Estilo3 Estilo9">INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA</h2>
</div>
<div class="cuadro1"><img src="../img/itselogo.png" alt="itselogo" width="200" height="60"></div>
<div class="cuadro4">
  <div align="center">
  <a href= "salir.php" class="sesion"><img src="../img/cerrar-sesion.png" alt="itselogo" width="35" height="35"><p><text>Cerrar Sesión</text></p></a>
  </div>
</div>

</div>

<div class="cuadro6"></div>


<div class="cuadro8">
<center><h2 class="Estilo10">Historial de préstamos</h2>
</center>
</div>

<div class="cuadro9"style="overflow: auto; width: 1130px; height: 438px">
  <table>
    <tr>
      <td><span class="Estilo7">Código interno</span></td>
      <td><span class="Estilo7">Código institucional</span></td>
      <td><span class="Estilo7">Artículo</span></td>
      <td><span class="Estilo7">Nombre</span></td>
      <td><span class="Estilo7">Cantidad</span></td>
      <td><span class="Estilo7">Fecha de préstamo</span></td>
      <td><span class="Estilo7">Fecha de devolución</span></td>
    </tr>
    <?php
//mostrar tabla de base de datos//
$iduser=$_SESSION['id_usuario'];
$sql = "SELECT id, nombre FROM roluser WHERE id = '$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc(); 
$riw = $row['nombre'];


$sql = "SELECT a.codigo_articulo,b.institucional, b.imagen, a.articulo, a.cantidad, a.fecha_prestamo, a.fecha_devolucion FROM prestamos a , productos b WHERE nombre='$riw' and b.codigo=a.codigo_articulo";
$rta = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($rta)) {
?>
    <tr>
      <td><?php echo $mostrar['codigo_articulo'] ?></td>
      <td><?php echo $mostrar['institucional'] ?></td>
      <td class="imagen"><center><img height="80px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['imagen']);?>"/></center></td>
      <td><?php echo utf8_encode($mostrar[3]) ?></td>
      <td><?php echo $mostrar['cantidad'] ?></td>
      <td><?php echo $mostrar['fecha_prestamo'] ?></td>
      <td><?php echo $mostrar['fecha_devolucion'] ?></td>
    </tr>
    <?php
}
?>
  </table>
</div>
</body>
</html>
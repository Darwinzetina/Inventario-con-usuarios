<?php

$conexion = mysqli_connect('localhost','root','12345','login')
or die(mysql_error($mysqli)); 

session_start();
if(!isset($_SESSION['id_usuario'])) {
      header("Location: ../loginu.php");
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="shortcut icon" href="../favicon.png">
<link rel="stylesheet" href="estil44.css" type="text/css">
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
.Estilo6 {color: #455A64}
-->
</style>
</head>

<body>

<script>
window.alert("Bienvenido a nuestro sitio web");
</script>
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
<div id="menu2">
<ul class="Estilo1">
<li><a href="consultar.php" class="Estilo4"><img src="../img/articulos.png" alt="itselogo" width="15" height="15"> Consultar artículos</a></li>
</ul>
</div>
<div class="cuadro5"></div>
<div class="cuadro3"><h2 align="center" class="Estilo3 Estilo6">INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA</h2>
</div>
<div class="cuadro1"><img src="../img/itselogo.png" alt="itselogo" width="200" height="60"></div>
<div class="cuadro4">
  <div align="center">
  <a href= "salir.php" class="sesion"><img src="../img/cerrar-sesion.png" alt="itselogo" width="35" height="35"><p><text>Cerrar Sesión</text></p></a>
  </div>
</div>



<div class="cuadro6">
  <div align="center">Consultar Artículos</div>
</div>

<div class="cuadro7">
<?php
    $buscar = $_POST['buscar'];
?>
<form action="" method="post">
<input type="search" class="busqueda" placeholder="Buscar"value="<?=$buscar?>" name="buscar" id="">
<input type="submit" value="Buscar" class="buscar" id="buscar">
</form>
</div>

<div class="cuadro8"style="overflow: auto; width: 1130px; height: 438px">
<table>
<tr>
<td>Código interno</td>
<td>Código institucional</td>
<td>Artículo</td>
<td>Nombre</td>
<td>Marca</td>
<td>Modelo</td>
<td>Categoría</td>
<td>Cantidad disponible</td>
<td>Observaciones del artículo</td>
<td>Realizar Préstamo</td>
</tr>
<?php
//mostrar tabla de base de datos//
$sql = "SELECT codigo,institucional, imagen,articulo, marca, color, tipo, cantidad,observaciones, (codigo+institucional+imagen+articulo+marca+color+tipo+cantidad+observaciones)  FROM productos WHERE articulo like '$buscar' '%' or codigo like '$buscar' '%' or marca like '$buscar' '%' or color like '$buscar' '%' order by codigo desc";
$rta = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_row($rta)) {
?>
<tr>
<td><?php echo $mostrar[0] ?></td>
<td><?php echo $mostrar[1] ?></td>
<td class="imagen"><center><img height="80px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar[2]);?>"/></center></td>
<td><?php echo utf8_encode($mostrar[3]) ?></td>
<td><?php echo utf8_encode($mostrar[4]) ?></td>
<td><?php echo utf8_encode($mostrar[5]) ?></td>
<td><?php echo utf8_encode($mostrar[6]) ?></td>
<td><?php echo $mostrar[7] ?></td>
<td><?php echo utf8_encode($mostrar[8]) ?></td>

<td>
<a href="solicitar2.php?  
codigo=<?php echo $mostrar[0] ?> &
institucional=<?php echo $mostrar[1] ?> &
imagen= <?php echo base64_encode ($mostrar['imagen']) ?> &
articulo=<?php echo utf8_encode($mostrar[3]) ?> 

"><center><img src="../img/agregar.png" alt="itselogo" width="20" height="20"><input type="submit" class="prestar"  value="Agregar" id="prestar" onclick="return confirm('Estás seguro que desea realizar este préstamo');"</center></a>
</td>
</tr>
<?php
}
?>

</table>
</div>

</body>
</html>
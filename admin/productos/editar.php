<?php
$conexion = mysqli_connect('localhost','root','12345','login'); 
$conexion -> set_charset("utf8");
session_start();
if(!isset($_SESSION['id_usuario'])) {
      header("Location: ../../logina.php");
}

?>

<html>
<head>
<meta charset="UTF-8"/>
<link rel="shortcut icon" href="../../favicon.png">
<link rel="stylesheet" href="estil23.css" type="text/css">
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
<?php
$codigo = $_REQUEST['codigo'];
$institucional = $_REQUEST['institucional'];
$imagen = $_REQUEST['imagen'];
$articulo = $_REQUEST['articulo'];
$marca = $_REQUEST['marca'];
$color = $_REQUEST['color'];
$tipo = $_REQUEST['tipo'];
$cantidad = $_REQUEST['cantidad'];
$observaciones = $_REQUEST['observaciones'];
?>

<div class="cuadro5"></div>
<div class="cuadro2">
  
<div id="menu">
<ul class="Estilo1">
<li class="Estilo5"><a href="../admin.php"><img src="../../img/inicio.png" alt="itselogo" width="15" height="15">  Inicio</a></li>
</ul>
</div>

<div>
<div id="menu1">
<ul class="Estilo1">
    <li><a href="../productos.php" class="Estilo4"><img src="../../img/articulos.png" alt="itselogo" width="15" height="15">  Edición de artículos</a></li>
</ul>
</div>

<div>
<div id="menu2">
<ul class="Estilo1">
    <li><span class="Estilo4"><a href="../usuarios.php"><img src="../../img/usuario.png" alt="itselogo" width="15" height="15">  Gestión de usuarios</a></span></li>
</ul>
</div>

<div>
<div id="menu3">
<ul class="Estilo1">
    <li><span class="Estilo4"><a href="../reportes.php"><img src="../../img/reporte.png" alt="itselogo" width="15" height="15">  Gestión de reportes</a></span></li>
</ul>
</div>

<div>
<div id="menu4">
<ul class="Estilo1">
    <li><span class="Estilo4"><a href="../prestamos.php"><img src="../../img/prestamos.png" alt="itselogo" width="20" height="15"> Prestamos</a></span></li>
</ul>
</div>

<div class="cuadro3"><h2 align="center" class="Estilo3 Estilo6">INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA</h2>
</div>
<div class="cuadro1"><img src="../../img/itselogo.png" alt="itselogo" width="200" height="60"></div>
<div class="cuadro4">
  <div align="center">
  <a href= "salir.php" class="sesion"><img  src="../../img/cerrar-sesion.png" alt="itselogo" width="35" height="35"><p><text>Cerrar Sesión</text></p></a>
  </div>
</div>

<div class="cuadro6">
  <div align="center">Edición de artículos</div>
</div>

<div class="cuadro7">
<ul class="Estilo4">
<form name="form1" action="speditar.php" method="post" enctype="multipart/form-data">
<H4>Editar artículo</H4>

</ul>
<center><td><abbr title="El codigo interno no se puede cambiar"><input type="text" placeholder="Código interno" value="<?=$codigo?>" name="codigo" id="" readonly></abbr></td>
<p>
<center><td><input type="text" placeholder="Código institucional" name="institucional" value="<?=$institucional?>" readonly></td>
<tr>
Cargar imagen
<td><input type="file"  name="imagen" value="<?=$imagen?>" /></td>
</tr>
<tr>
<p>
<center><td><input type="text" placeholder="Nombre del Articulo" value="<?=$articulo?>" name="articulo" id="" required></td>
</p>
</tr>
<tr>
<p>
<center><td><input type="text" placeholder="Marca" value="<?=$marca?>" name="marca" id="" required></td>
</p>
</tr>
<tr>
<p>
<center><td><input type="text" placeholder="Modelo" value="<?=$color?>" name="color" id="" required></td>
</p>
</tr>
<tr>
<p>
<center><td><input type="text" placeholder="Categoría" value="<?=$tipo?>" name="tipo" id="" readonly></td>
</p>    
</tr>
<tr>
<p>
<center><td><input type="text" placeholder="Cantidad" value="<?=$cantidad?>" name="cantidad" id="" required></td>
</tr>
<tr>
<p>
<center><td><textarea placeholder="Observaciones" name="observaciones" id="" ><?=$observaciones?></textarea></td>
</tr>
<center><td><input type="submit" name="editar" onClick="alert('Datos actualizados')" class="añadir" value="Actualizar" id="añadir"></td>
</form>
</div>

<div class="cuadro8">
<?php
    $buscar = $_POST['buscar'];
?>
<form action="" method="post">
<input type="search" class="busqueda" placeholder="Buscar"value="<?=$buscar?>" name="buscar" id="">
<input type="submit" value="Buscar" class="buscar" id="buscar">
</form>
</div>

<div class="cuadro9" style="overflow: auto; width: 865px; height: 455px">
<form action="speditar.php" method="post">
<table>
<tr>
<td>Código interno</td>
<td>Código institucional</td>
<td><center>Artículo</center></td>
<td>Nombre</td>
<td>Marca</td>
<td>Modelo</td>
<td>Categoría</td>
<td>Cantidad</td>
<td>Observaciones</td>
<td>Operaciones</td>
</tr>
<?php
//mostrar tabla de base de datos//
$sql = "SELECT codigo, institucional, imagen, articulo, marca, color, tipo, cantidad, observaciones, (codigo+institucional+imagen+articulo+marca+color+tipo+cantidad+observaciones)  FROM productos WHERE articulo like '$buscar' '%' or tipo like '$buscar' '%' or institucional like '$buscar' '%' or codigo like '$buscar' '%' or marca like '$buscar' '%' or color like '$buscar' '%' order by codigo desc";
$rta = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_row($rta)) {
?>
<tr>
<td><?php echo $mostrar[0] ?></td>
<td><?php echo $mostrar[1] ?></td>
<td class="imagen"><center><img height="80px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar[2]);?>"/></center></td>
<td><?php echo $mostrar[3] ?></td>
<td><?php echo $mostrar[4] ?></td>
<td><?php echo $mostrar[5] ?></td>
<td><?php echo $mostrar[6] ?></td>
<td><?php echo $mostrar[7] ?></td>
<td><?php echo $mostrar[8] ?></td>

<td>
<a href="productos/editar.php? 
codigo=<?php echo $mostrar[0] ?> &
institucional=<?php echo $mostrar[1] ?> &
imagen=<?php echo base64_encode ($mostrar[2]) ?> &
articulo=<?php echo $mostrar[3] ?> &
marca=<?php echo $mostrar[4] ?> &
color=<?php echo $mostrar[5] ?> &
tipo=<?php echo $mostrar[6] ?> &
cantidad=<?php echo $mostrar[7] ?> &
observaciones=<?php echo $mostrar[8] ?>
"><input type="submit" class="editar" value="Editar" id="editar"</a>
<a href="productos/speliminar.php? codigo=<?php echo $mostrar[0] ?>"><p>
<input type="submit" class="eliminar" value="Eliminar" id="eliminar" onClick="return confirm('Estás seguro que deseas eliminar el registro?');"></a>
</td>
</tr>
<?php
}
?>

</table>
</div>
</body>
</html>
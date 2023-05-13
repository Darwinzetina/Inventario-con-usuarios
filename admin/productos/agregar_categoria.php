<?php

$conexion = mysqli_connect('localhost','root','12345','login');
$conexion -> set_charset("utf8");


?>

<html>
<head>
<meta charset="UTF-8"/>
<link rel="shortcut icon" href="../../favicon.png">
<link rel="stylesheet" href="estilo33.css" type="text/css">
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
.Estilo7 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #455A64;
}
-->
</style>
</head>

<body>

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
    <li><a href="../productos.php" class="Estilo4"><img src="../../img/articulos.png" alt="itselogo" width="15" height="15">  Agregar Categoría</a></li>
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
    <li><span class="Estilo4"><a href="../prestamos.php"><img src="../../img/prestamos.png" alt="itselogo" width="20" height="15"> Préstamos</a></span></li>
</ul>
</div>

<div class="cuadro3"><h2 align="center" class="Estilo3 Estilo6">INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA</h2>
</div>
<div class="cuadro1"><img src="../../img/itselogo.png" alt="itselogo" width="200" height="60"></div>

<div class="cuadro4">
  <div align="center">
  <a href= "salir.php" class="sesion"><img src="../../img/cerrar-sesion.png" alt="itselogo" width="35" height="35"><p><text>Cerrar Sesión</text></p></a>
  </div>
</div>



<div class="cuadro6">
  <div align="center">Categorías</div>
  <a href= "../productos.php" class="regresar"><img src="../../img/regresar.png" alt="itselogo" width="35" height="35"></a>
</div>

<div class="cuadro7">
<form name="form1" action="insertar.php" method="post">
<tr>
<p>&nbsp;</p>
<center><h2 class="Estilo7">Agregar nueva categoría</h2>
</center>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
<center><td><input type="text" placeholder="Categoría" name="categoria" id="" required></td>
</p>
</tr>
<p>&nbsp;</p>
<p>&nbsp;</p>
<tr>
<p>
<center><td><input type="submit" name="añadir" class="añadir" value="Añadir" id="añadir"></td>
</tr>
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

<div class="cuadro9" style="overflow: auto; width: 775px; height: 345px">
<table>
<tr>
<td><center>Id</center></td>
<td><center>Nombre de categoría</center></td>
<td><center>Operaciones</center></td>
</tr>
<?php
//mostrar tabla de base de datos//
$sql = "SELECT id,nombre_categoria, (id+nombre_categoria)  FROM categorias WHERE nombre_categoria like '$buscar' '%'  order by id ";
$rta = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_row($rta)) {
?>
<tr>
<td><center><?php echo $mostrar[0] ?></center></td>
<td><center><?php echo $mostrar[1] ?></center></td>

<td>
<center><a href="eliminar.php? id=<?php echo $mostrar[0] ?>"><p>
<input type="submit" class="eliminar" value="Eliminar" id="eliminar" onClick="return confirm('¿Estás seguro que desea eliminar esta categoría?');"></a></center>
</td>
</tr>
<?php
}
?>

</table>
</div>
</body>
</html>

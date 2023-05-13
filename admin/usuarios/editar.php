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
<link rel="stylesheet" href="estilo.css" type="text/css">
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
.Estilo7 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-size: 18px;
	color: #455A64;
}
-->
</style>
</head>

<body>
<?php
$nombre = $_REQUEST['nombre'];
$usuario = $_REQUEST['usuario'];
$carrera = $_GET['carrera'];
$telefono = $_GET['telefono'];
$pass = $_GET['pass'];
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
    <li><a href="../productos.php" class="Estilo4"><img src="../../img/articulos.png" alt="itselogo" width="15" height="15">  Gestión de artículos</a></li>
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

<div class="cuadro3"><h2 align="center" class="Estilo3">INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA</h2>
</div>
<div class="cuadro1"><img src="../../img/itselogo.png" alt="itselogo" width="200" height="60"></div>
<div class="cuadro4">
  <div align="center">
  <a href= "salir.php" class="sesion"><img src="../../img/cerrar-sesion.png" alt="itselogo" width="35" height="35"><p><text>Cerrar Sesión</text></p></a>
  </div>
</div>



<div class="cuadro6">
  <div align="center">Gestión de usuarios</div>
</div>

<div class="cuadro7">
<form name="form1" action="speditar.php" method="post">
<tr>
<center><h2 class="Estilo7">Edita los datos del usuario</h2></center>
<p>
<center><td><input type="text" placeholder="Nombre" name="nombre" value="<?=$nombre?>" id="" readonly></td>
</p>
</tr>
<tr>
<p>
<center><td><abbr title="No tienes permitido cambiar la Matrícula"><input type="text" required placeholder="Matrícula" name="usuario" value="<?=$usuario?>" id="" readonly></abbr></td>
</p>
</tr>
<tr>
<p>
<center><td><input type="text" placeholder="Carrera" name="carrera" value="<?=$carrera?>" id="" readonly></td>
</p>
</tr>
<tr>
<p>
<center><td><input type="text" placeholder="Teléfono" name="telefono" value="<?=$telefono?>" id="" required></td>
</p>
</tr>
<tr>
<p>
<center><td><input type="text" placeholder="Contraseña" value="<?=$pass?>" name="pass" id="" required></td>
</p>    
</tr>
<tr>
<p>
<center><td><input type="submit" onclick="alert('Datos actualizados')" class="añadir" value="Actualizar" id="añadir"></td>
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
<td>Nombre</td>
<td>Matrícula</td>
<td>Carrera</td>
<td>Teléfono</td>
<td>Contraseña</td>
<td>Operaciones</td>
</tr>
<?php
//mostrar tabla de base de datos//
$sql = "SELECT nombre, usuario, carrera, telefono, pass, (nombre+usuario+carrera+telefono+pass)  FROM roluser WHERE nombre like '$buscar' '%' or usuario like '$buscar' '%' or carrera like '$buscar' '%' or telefono like '$buscar' '%' order by nombre desc";
$rta = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_row($rta)) {
?>
<tr>
<td><?php echo utf8_encode($mostrar[0]) ?></td>
<td><?php echo $mostrar[1] ?></td>
<td><?php echo $mostrar[2] ?></td>
<td><?php echo $mostrar[3] ?></td>
<td><?php echo utf8_encode($mostrar[4]) ?></td>

<td>
<a href="editar.php? 
nombre=<?php echo $mostrar[0] ?> &
usuario=<?php echo $mostrar[1] ?> &
carrera=<?php echo $mostrar[2] ?> &
telefono=<?php echo $mostrar[3] ?> &
pass=<?php echo $mostrar[4] ?>
"><input type="submit" class="editar" value="Editar" id="añadir"</a>
<a href="speliminar.php? usuario=<?php echo $mostrar[1] ?>"><p>
<input type="submit" class="eliminar" value="Eliminar" id="eliminar" onclick="return confirm('Estás seguro que deseas eliminar a este usuario?');"></a>
</td>
</tr>
<?php
}
?>
</table>
</div>
</body>
</html>
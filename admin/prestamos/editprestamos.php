<?php
$conexion = mysqli_connect('localhost','root','12345','login'); 

session_start();
if(!isset($_SESSION['id_usuario'])) {
      header("Location: ../../logina.php");
}

?>

<html>
<head>
<meta charset="UTF-8"/>
<link rel="shortcut icon" href="../../favicon.png">
<link rel="stylesheet" href="estilo1.css" type="text/css">
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
.Estilo7 {color: #455A64; font-family: Geneva, Arial, Helvetica, sans-serif; }
.Estilo8 {color: #455A64; font-family: Geneva, Arial, Helvetica, sans-serif; font-weight: bold; }
-->
</style>
</head>

<body>
<?php
$codigo_articulo = $_GET['codigo_articulo'];
$matricula= $_GET['matricula'];
$id= $_GET['id'];
$cantidad = $_GET['cantidad'];
?>

<div class="cuadro2">
  
  <div>
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
<div class="cuadro5"></div>
<div class="cuadro3"><h2 align="center" class="Estilo3 Estilo6">INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA</h2>
</div>
<div class="cuadro1"><img src="../../img/itselogo.png" alt="itselogo" width="200" height="60"></div>

<div class="cuadro4">
<div align="center">
<a href= "salir.php" class="sesion"><img src="../../img/cerrar-sesion.png" alt="itselogo" width="35" height="35"><p><text>Cerrar Sesión</text></p></a>
</div>
</div>

<div class="cuadro6">
  <div align="center">Préstamos</div>
</div>

<div class="cuadro7"></div>

<div class="cuadro8">
<?php
    $buscar = $_POST['buscar'];
?>
<form action="" method="post">
<input type="search" class="busqueda" placeholder="Buscar"value="<?=$buscar?>" name="buscar" id="">
<input type="submit" value="Buscar" class="buscar" id="buscar">
</form>
</div>

<div class="cuadro9" style="overflow: auto; width: 1160px; height: 450px">
  <table>
    <tr>
      <td><span class="Estilo7">Nombre</span></td>
      <td><span class="Estilo7">Matrícula</span></td>
      <td><span class="Estilo7">Código interno</span></td>
      <td><span class="Estilo7">Código institucional</span></td>
      <td><span class="Estilo7">Artículo</span></td>
      <td><span class="Estilo7">Nombre</span></td>
      <td><span class="Estilo7">Cantidad prestada</span></td>
      <td><span class="Estilo7">Fecha de préstamo</span></td>
      <td><span class="Estilo7">Fecha de devolución</span></td>
      
    </tr>
    <?php
//mostrar tabla de base de datos//
$sql = "SELECT * FROM prestamos";
$rta = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($rta)) {
?>
    <tr>
      <td><?php echo utf8_encode($mostrar['nombre']) ?></td>
      <td><?php echo $mostrar['matricula'] ?></td>
      <td><?php echo $mostrar['codigo_articulo'] ?></td>
      <td><?php echo $mostrar['institucional'] ?></td>
      <td class="imagen"><img height="80px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['imagen']);?>"/></td>
      <td><?php echo utf8_encode($mostrar['articulo']) ?></td>
      <td><?php echo $mostrar['cantidad'] ?></td>
      <td><?php echo $mostrar['fecha_prestamo'] ?></td>
      <td><?php echo $mostrar['fecha_devolucion'] ?></td>


    </tr>
    <?php
}
?>
  </table>
</div>
<div class="cuadro10">
<form name="form3" action="speditar.php" method="post">
<p>
<center><h3 class="Estilo8">Modifique la cantidad</h3>
Código del artículo
<tr>
<center><td><input type="text"  name="codigo_articulo" value="<?=$codigo_articulo?>" id="" readonly></td>
</tr>
Matrícula
<tr>
<center><td><input type="text"   name="matricula" value="<?=$matricula?>" id="" readonly></td>
</tr>
Id de operación
<tr>
<center><td><input type="text"   name="id" value="<?=$id?>" readonly></td>
</tr>
Cantidad
<tr>
<center><td><input type="number" placeholder="CANTIDAD" min="1" value="<?=$cantidad?>" name="cantidad" id="" required></td>
</tr>
<p>
<input type="submit" class="guardar" value="Guardar" id="guardar";>
</p>
</form>
</div>
</html>
</body>
</html>
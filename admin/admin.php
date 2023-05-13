<?php
$conexion = mysqli_connect('localhost','root','12345','login'); 

session_start();
if(!isset($_SESSION['id_usuario'])) {
      header("Location: ../logina.php");
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="../favicon.png">
<link rel="stylesheet" href="estilo111.css" type="text/css">
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
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #455A64;
}
.Estilo4 {font-family: Geneva, Arial, Helvetica, sans-serif}
.Estilo5 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #FFFFFF; }
-->
</style>
</head>

<body>
<div class="pantalla">
<div class="cuadro2">
  
<div id="menu">
<ul class="Estilo1">
<li class="Estilo5"><a href="javascript:abrir()","admin.php"><img src="../img/inicio.png" alt="itselogo" width="15" height="15">  Inicio</a></li>
</ul>
</div>

<div>
<div id="menu1">
<ul class="Estilo1">
    <li><a href="productos.php" class="Estilo4"><img src="../img/articulos.png" alt="itselogo" width="15" height="15">  Gestión de artículos</a></li>
</ul>
</div>

<div>
<div id="menu2">
<ul class="Estilo1">
    <li><span class="Estilo4"><a href="usuarios.php"><img src="../img/usuario.png" alt="itselogo" width="15" height="15">  Gestión de usuarios</a></span></li>
</ul>
</div>

<div>
<div id="menu3">
<ul class="Estilo1">
    <li><span class="Estilo4"><a href="reportes.php"><img src="../img/reporte.png" alt="itselogo" width="15" height="15">  Gestión de reportes</a></span></li>
</ul>
</div>

<div>
<div id="menu4">
<ul class="Estilo1">
    <li><span class="Estilo4"><a href="prestamos.php"><img src="../img/prestamos.png" alt="itselogo" width="20" height="15"> Préstamos</a></span></li>
</ul>
</div>
<div class="cuadro5"></div>
<div class="cuadro3"><h2 align="center" class="Estilo3">INSTITUTO TECNOLÓGICO SUPERIOR DE ESCÁRCEGA</h2>
</div>
<div class="cuadro1"><img src="../img/itselogo.png" alt="itselogo" width="200" height="60"></div>

<div class="cuadro4">
  <div align="center">
  <a href= "salir.php" class="sesion"><img src="../img/cerrar-sesion.png" alt="itselogo" width="35" height="35"><p><text>Cerrar Sesión</text></p></a>
  </div>
</div>

<div class="cuadro6" id="vent">
<p>&nbsp;</p>
  <div align="center">BIENVENIDO</div>
  <p></p>
  <div align="center">Administrador</div>
  <p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <center><img src="../img/JAGUAR.png" alt="itselogo" width="277" height="269"></center>
  </p>
</div>

<div id="cerrar">
<a href="javascript:cerrar()"><img src="../img/cerrar.png" alt="cerrar" width="20" height="20"></a>
</div>
</div>

<script>
function abrir(){
  document.getElementById("vent").style.display="block";
  document.getElementById("cerrar").style.display="block";
}
function cerrar(){
  document.getElementById("vent").style.display="none";
  document.getElementById("cerrar").style.display="none";
}
</script>

</div>
</body>
</html>
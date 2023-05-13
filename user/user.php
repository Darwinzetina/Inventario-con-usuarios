<?php
$conexion = mysqli_connect('localhost','root','12345','login'); 

session_start();
if(!isset($_SESSION['id_usuario'])) {
      header("Location: ../loginu.php");
}
$iduser=$_SESSION['id_usuario'];

$sql = "SELECT id, nombre FROM roluser WHERE id = '$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc();  
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="shortcut icon" href="../favicon.png">
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
-->
</style>
</head>

<body>
<div class="cuadro1">

</div>
<div class="cuadro2">
  
<div id="menu">
<ul class="Estilo1">
<li class="Estilo5"><a href="javascript:abrir()","user.php"><img src="../img/inicio.png" alt="itselogo" width="15" height="15">  Inicio</a></li>
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

<div class="cuadro6" id="vent">
<p>&nbsp;</p>
  <div align="center">BIENVENIDO
  <p><?php echo utf8_encode($row['nombre']);?></p>
  </div>
  <p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <center><img src="../img/JAGUAR.png" alt="itselogo" width="277" height="269"></center>
  </p>

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

</body>
</html>
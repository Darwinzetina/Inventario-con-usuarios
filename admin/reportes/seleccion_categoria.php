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
<link rel="stylesheet" href="estilo11.css" type="text/css">
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
.Estilo8 {
	color: #455A64;
	font-size: 18px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
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
  <a href= "../salir.php" class="sesion"><img src="../../img/cerrar-sesion.png" alt="itselogo" width="35" height="35"><p><text>Cerrar Sesión</text></p></a>
  </div>
</div>

<div class="cuadro6">
  <div align="center">Gestión de reportes</div>
</div>

<div class="cuadro8">

<p>
<center>
<span class="Estilo8">Selecciona el tipo de reporte que deseas generar</span>
<div class="cuadro9">
<form name="form1" method="post" action="seleccion_usuarios.php">
<center><input type="submit" class="usuarios" id="boton" value="Usuarios">
</form>
</div>

<div class="cuadro10">
<form name="form2" method="post" action="seleccion_productos.php">
<center><input type="submit" class="productos" id="boton" value="Artículos">
</form>
</div>

<div class="cuadro11">
<form name="form3" method="post" action="seleccion_prestamos.php">
<center><input type="submit" class="prestamos" id="boton" value="Préstamos">
</form>
</div>

<div class="cuadro12">
<form name="form4" method="post" action="seleccion_matricula.php">
<center><input type="submit" class="matricula" id="boton" value="Matrícula">
</form>
</div>

<div class="cuadro14">
<form name="form5" method="post" action="seleccion_categoria.php">
<center><input type="submit" class="categoria" id="boton" value="Categoría">
</form>
</div>

<div class="cuadro13">
<p>
<span class="Estilo8">Selecciona la categoría</span>
</p>
<form name="form6" method="post" action="reporte_categoria.php" target="_blank">

<label> 
       <select name="seleccioncategoria" class="seleccioncategoria" required>
        <option disabled selected="">Selecciona la categoría</option>
        <?php
        $query = $conexion -> query ("SELECT nombre_categoria  FROM categorias");
 
        while ($valores = mysqli_fetch_array($query)) {
        echo '<option value="'.$valores[nombre_categoria].'">'.$valores[nombre_categoria].'</option>';
        }    
        ?>
       </select>
</label>

<div class="send1">
<center><input type="submit" class=send id="boton" value="Generar Reporte">

</div>
</form>
</div>
</div>

</body>
</html>
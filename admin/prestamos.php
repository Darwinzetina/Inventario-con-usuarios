<?php
$conexion = mysqli_connect('localhost','root','12345','login'); 

session_start();
if(!isset($_SESSION['id_usuario'])) {
      header("Location: ../logina.php");
}

?>

<html>
<head>
<meta charset="UTF-8" />
<link rel="shortcut icon" href="../favicon.png">
<link rel="stylesheet" href="estiles5.css" type="text/css">
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


<div class="cuadro2"><div>

  
<div id="menu">
<ul class="Estilo1">
<li class="Estilo5"><a href="admin.php"><img src="../img/inicio.png" alt="itselogo" width="15" height="15">  Inicio</a></li>
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

<div class="cuadro6">
  <div align="center">Préstamos</div>
</div>

<div class="cuadro7">
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
      <td><span class="Estilo7">Editar cantidad</span></td>
      <td><span class="Estilo7">Devolver</span></td>

    </tr>
    <?php
// mostrar tabla de base de datos//
// query original:



$sq = "SELECT id, nombre, matricula, codigo_articulo,institucional,imagen,articulo, cantidad, fecha_prestamo, fecha_devolucion, (id+nombre+matricula+codigo_articulo+institucional+imagen+articulo+cantidad+fecha_prestamo+fecha_devolucion) FROM prestamos WHERE nombre like '$buscar' '%' or matricula like '$buscar' '%'or codigo_articulo like '$buscar' '%' order by codigo_articulo desc";
// Query donde ya aparezcan los datos (luego de registrar o relacionar)
// $sql = "SELECT nombre, matricula, codigo_articulo, articulo, cantidad, fecha_prestamo, fecha_devolucion, (nombre+matricula+codigo_articulo+cantidad+fecha_prestamo+fecha_devolucion) FROM prestamos WHERE matricula = '$_SESSION[id_usuario]' order by codigo_articulo desc";
$rta = mysqli_query($conexion, $sq);
while ($mostrar = mysqli_fetch_array($rta) ) {
?>
    <tr>
      <td><?php echo utf8_encode($mostrar['nombre']) ?></td>
      <td><?php echo $mostrar['matricula'] ?></td>
      <td><?php echo $mostrar['codigo_articulo'] ?></td>
      <td><?php echo $mostrar[4] ?></td>
      <td class="imagen"><img height="80px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['imagen']);?>"/></td>
      <td><?php echo utf8_encode($mostrar['articulo']) ?></td>
      <td><?php echo $mostrar['cantidad'] ?></td>
      <td><?php echo $mostrar['fecha_prestamo'] ?></td>
      <td><?php echo $mostrar['fecha_devolucion'] ?></td>

    <td>
        <a href="prestamos/editprestamos.php? 
        id=<?php echo $mostrar['id'] ?>&
        codigo_articulo=<?php echo $mostrar[3] ?> &
        matricula=<?php echo $mostrar['matricula'] ?> &
        cantidad=<?php echo $mostrar[7] ?>">
    <input type="submit" class="devolver" value="Editar" id="devolver" onClick="return confirm('¿Estás seguro que deseas editar la cantidad?');"></a>
    </td>
    <td> 
    <a href="prestamos/devolverarticulos.php?
    id=<?php echo $mostrar['id'] ?>&
    nombre=<?php echo utf8_encode($mostrar['nombre']) ?> &
    matricula=<?php echo $mostrar['matricula'] ?> &
    codigo_articulo=<?php echo $mostrar['codigo_articulo'] ?>&
    articulo=<?php echo utf8_encode($mostrar['articulo']) ?>&
    cantidad=<?php echo $mostrar['cantidad'] ?>&
    fecha_prestamo=<?php echo $mostrar['fecha_prestamo'] ?>&
    fecha_devolucion=<?php echo $mostrar['fecha_devolucion'] ?>">
        <input type="submit" class="devolver" value="Devuelto" id="devolver" onClick="return confirm('¿Estás seguro que devolvierón el artículo?');"></a>
    </td>

    </tr>
    <?php
}
?>
  </table>
</div>

</html>
</body>
</html>
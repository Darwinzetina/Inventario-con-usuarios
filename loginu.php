<?php
$conexion = mysqli_connect('localhost','root','12345','login'); 

session_start();
if(isset($_SESSION['id_usuario'])){
      header("Location: user/user.php");
}

if (!empty($_POST)){
  $usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
  $password = mysqli_real_escape_string($conexion,$_POST['contrasena']);
  $sql = "SELECT id FROM roluser
          WHERE usuario = '$usuario' AND pass = '$password'";
  $resultado = $conexion->query($sql);
  $rows = $resultado->num_rows;
  if ($rows>0){
    $row=$resultado->fetch_assoc();
    $_SESSION['id_usuario'] = $row["id"];
    header("Location: user/user.php");
  }else{
    echo "<script>
            window.location = 'falsos/loginu.php';
          </script>";
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.png">
<title>inicio</title>
<link rel="stylesheet" href="log/css/style3.css">
<style type="text/css">
<!--
.Estilo1 {
	font-family: Helvetica, Arial, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
.Estilo3 {color: #999999}
.Estilo4 {font-family: Helvetica, Arial, sans-serif}
-->
    </style>
</head>



<body>
<div id="particles-js"></div>

<script src="log/particles.js"></script>
<script src="log/js/app.js"></script>
<div class="header">

<div class="imglogin">
<div class="imglogoitse"><img src="img/itselogo.png" alt="img" width="289" height="95"></a></div>
<div class="texto Estilo1 Estilo3">Login Usuario</div>

<div class="correo">
<p>&nbsp;</p>
<form id="form1" name="form1" method="POST" action="<?php $_SERVER["PHP_SELF"];?>">
  <p>
    <label>
    <input type="text" placeholder="Ingresa tu matrícula" name="usuario" id="usuario" required/>
    </label>
  </p>
  <p>&nbsp;</p>
  <p>
    <label>
      <input type="password" placeholder="Ingresa tu contraseña" name="contrasena" id="contraseña" required/>
      </label>
  </p>
  <p>&nbsp;</p>
  <p>
      <label>
        <input type="submit" name="enviar" id="enviar" value="Iniciar sesión" />
      </label>
    </p>
  </form>
  <p>&nbsp; </p>
  <h2>¿no tienes cuenta?</h2>
  <p>&nbsp; </p>
  <p><strong><a href="log/guardar.php"><button class="registro" id="registro">Registrate</button></a></strong></p>
</div>
</div>



</div>
</body>
</html>

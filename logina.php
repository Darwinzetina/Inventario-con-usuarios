<?php
$conexion = mysqli_connect('localhost','root','12345','login'); 

session_start();
if(isset($_SESSION['id_usuario'])){
      header("Location: admin/admin.php");
}

if (!empty($_POST)){
  $usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
  $password = mysqli_real_escape_string($conexion,$_POST['contrasena']);
  $sql = "SELECT id FROM roles
          WHERE usuario = '$usuario' AND pass = '$password'";
  $resultado = $conexion->query($sql);
  $rows = $resultado->num_rows;
  if ($rows>0){
    $row=$resultado->fetch_assoc();
    $_SESSION['id_usuario'] = $row["id"];
    header("Location: admin/admin.php");
  }else{
    echo "<script>
            window.location = 'falsos/logina.php';
          </script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.png">
<meta name="vierwport" content="width=device=width, initial-scale=1.0">
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

<div class="imglogin"><img src="img/login.png" alt="img" width="329" height="406"></a></div>
<div class="imglogoitse"><img src="img/itselogo.png" alt="img" width="289" height="95"></a></div>
<div class="texto Estilo1 Estilo3">Login Administrador</div>

<div class="login_cuadro">
<div class="correo">
<p>&nbsp;</p>
<form id="form1" name="form1" method="POST" action="<?php $_SERVER["PHP_SELF"];?>">
  <p>
    <label>
    <input type="text" placeholder="Nombre de usuario" name="usuario" id="usuario" required/>
    </label>
  </p>
  <p>&nbsp;</p>
  <p>
    <label>
      <input type="password" placeholder="Ingrese su contraseña" name="contrasena" id="contraseña" required/>
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
  <div class="registrarse">
  <p>&nbsp;</p>
  <p><label><a href="demo/index.html"><button class="registro" id="registro">Regresar</button></a></label></p>
</div>
</div>


</div>
</body>
</html>

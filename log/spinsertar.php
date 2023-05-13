<?php
$conexion = mysqli_connect('localhost','root','12345','login');
$conexion -> set_charset("utf8");
//variable de la fecha
$time=time();
$fecha= date('y/m/d H:i:s', time());
//registrar usuario 
if(isset($_POST["enviar"])){
  $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
  $usuario = mysqli_real_escape_string($conexion,$_POST['usuario']);
  $carrera = mysqli_real_escape_string($conexion,$_POST['carrera']);
  $telefono = mysqli_real_escape_string($conexion,$_POST['telefono']);
  $pass = mysqli_real_escape_string($conexion,$_POST['pass']);
  
  $sqluser = "SELECT usuario FROM roluser WHERE usuario = '$usuario'";
  $resultado = $conexion->query($sqluser);
  $filas=$resultado->num_rows;
  if ($filas > 0){
    echo "<script>
            alert('Este usuario ya esta registrado, favor de verificar con el administrador');
            window.location = 'guardar.php';
          </script>";
  }else{
    //insertar informacion del usuario
    $sqlusuario = "INSERT INTO roluser(nombre, usuario, carrera, telefono, pass, fecha) VALUES ('$nombre', '$usuario', '$carrera', '$telefono', '$pass', '$fecha')";
    $resultadousuario = $conexion->query($sqlusuario);
    if ($resultadousuario > 0){
      echo "<script>
              alert('Registro Exitoso');
              window.location = '../loginu.php';
            </script>";
    }else{
     echo "<script>
            alert('Error al registrar');
            window.location = '../loginu.php';
          </script>";
    }
  }
}

?>
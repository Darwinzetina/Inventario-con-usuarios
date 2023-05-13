<?php
//insertar datos en la tabla //
$conexion = mysqli_connect("localhost", "root", "12345", "login");
$conexion -> set_charset("utf8");
$time=time();
//registrar usuario 
if(isset($_POST["agregar"])){
  $codigo = mysqli_real_escape_string($conexion,$_POST['codigo']);
  $codigoi = mysqli_real_escape_string($conexion,$_POST['codigoi']);
  $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
  $articulo = mysqli_real_escape_string($conexion,$_POST['articulo']);
  $marca = mysqli_real_escape_string($conexion,$_POST['marca']);
  $color = mysqli_real_escape_string($conexion,$_POST['color']);
  $tipo = mysqli_real_escape_string($conexion,$_POST['seleccioncategoria']);
  $cantidad = mysqli_real_escape_string($conexion,$_POST['cantidad']);
  $observaciones = mysqli_real_escape_string($conexion,$_POST['observaciones']);
  $fecha= date('y-m-d', time());
  
  $sqluser = "SELECT codigo FROM productos WHERE codigo= '$codigo'";
  $resultado = $conexion->query($sqluser);
  $filas=$resultado->num_rows;
  if ($filas > 0){
    echo "<script>
            alert ('El codigo interno que estas ingresando ya esta registrado, favor ingresar un codigo diferente');
            window.location = '../productos.php';
          </script>";
  }else{
    //insertar informacion del usuario
    $sql = "INSERT INTO productos(codigo, institucional, imagen, articulo, marca, color, tipo, cantidad, observaciones, fecha) 
    VALUES('$codigo', '$codigoi', '$imagen', '$articulo', '$marca', '$color', '$tipo', '$cantidad', '$observaciones','$fecha')";
    $rta = $conexion->query($sql);

    if ($rta > 0){
      echo "<script>
              alert('Registro Exitoso');
              window.location = '../productos.php';
            </script>";
    }else{
     echo "<script>
            alert('Error al registrar');
            window.location = '../productos.php';
          </script>";
    }
  }
}
?>
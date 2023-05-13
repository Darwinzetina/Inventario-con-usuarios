<?php
//insertar datos en la tabla //
$conexion = mysqli_connect("localhost", "root", "12345", "login");
$conexion -> set_charset("utf8");

session_start();
if(!isset($_SESSION['id_usuario'])) {
      header("Location: ../loginu.php");
}
$iduser=$_SESSION['id_usuario'];
$sql = "SELECT id, nombre,usuario FROM roluser WHERE id = '$iduser'";
$resultado = $conexion->query($sql);
$row = $resultado->fetch_assoc(); 
$riw = $row['nombre'];
$raw = $row['usuario'];

$time=time();
$codigo = $_POST['codigo'];
$institucional = $_POST['institucional'];
$articulo = $_POST['articulo'];
$cantidad = $_POST['cantidad'];
$fechaprestamo= date('y-m-d H:i:s', time());
$fechadevolucion = $_POST['fecha_devolucion'];

$sql="SELECT cantidad from productos where codigo=$codigo";
$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($result)) {

      if ($cantidad<=$mostrar['cantidad']) {

            $sql = "INSERT INTO prestamos(nombre,matricula,codigo_articulo,institucional,articulo, cantidad, fecha_prestamo, fecha_devolucion) VALUES('$riw','$raw','$codigo','$institucional','$articulo', '$cantidad', '$fechaprestamo', '$fechadevolucion')";
            $rta = mysqli_query($conexion, $sql);
            
            $sql = "UPDATE productos a, prestamos b SET a.cantidad=(a.cantidad-$cantidad) WHERE a.codigo = '$codigo'";
            $rta = mysqli_query($conexion, $sql);
            
            $sql = "UPDATE productos a, prestamos b SET b.imagen=a.imagen WHERE a.codigo =b.codigo_articulo";
            $rta = mysqli_query($conexion, $sql);
            
            echo utf8_decode( "<script> alert('se ha gestionado correctamento el préstamo');
                            window.location = '../solicitar.php';
                </script>");
            
            } else {
                                      
            echo "<script> alert('La cantidad que estas solicitando no esta disponible');
                        window.location = '../consultar.php';
                  </script>";
                  
            }
}

?>
<?php
//editar datos de la tabla//
$conexion = mysqli_connect("localhost", "root", "12345", "login");


$codigo=$_POST['codigo_articulo'];
$cantidad = $_POST['cantidad'];
$id=$_POST['id'];
$matricula=$_POST['matricula'];

//$sql ="UPDATE productos a, prestamos b SET a.cantidad=(a.cantidad+b.cantidad-$cantidad) WHERE a.codigo = b.codigo_articulo";
//$rta = mysqli_query($conexion, $sql);

$sql="SELECT cantidad from prestamos where id=$id";
$result = mysqli_query($conexion, $sql);

while ($mostrar = mysqli_fetch_array($result)) {

      if ($cantidad<$mostrar['cantidad']) {

        $sql ="UPDATE productos a, prestamos b SET a.cantidad=(a.cantidad+b.cantidad-$cantidad) WHERE a.codigo='$codigo'";
        $rta = mysqli_query($conexion, $sql);
        
        $sql ="UPDATE prestamos SET cantidad=$cantidad WHERE id='$id'";
        $rta = mysqli_query($conexion, $sql);
            
        echo utf8_decode("<script> alert('Artículos devuelto con exito');
                            window.location = '../prestamos.php';
                </script>");
            
      } else {
                                      
            echo "<script> alert('La cantidad debe ser menor a la cantidad prestada');
                        window.location = '../prestamos.php';
                  </script>";
            }
}





//$sql ="UPDATE productos a, prestamos b SET a.cantidad=(a.cantidad+b.cantidad-$cantidad),b.cantidad='$cantidad' WHERE b.id=$id";
//$rta = mysqli_query($conexion, $sql);
     

?>
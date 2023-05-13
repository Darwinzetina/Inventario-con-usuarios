<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8"/>
  <script src="log/lib.php"></script>
  <link rel="shortcut icon" href="../favicon.png">
  <title>inicio</title>
    <link rel="stylesheet" href="css/style2.css">
 

    <style type="text/css">

.Estilo1 {
	font-family: Helvetica, Arial, sans-serif;
	font-weight: bold;
	font-size: 24px;
}
.Estilo3 {color: #999999}
.Estilo4 {font-family: Helvetica, Arial, sans-serif}

    </style>
</head>
	
<body>
<div id="particles-js"></div>

<script src="particles.js"></script>
<script src="js/app.js"></script>

<div class="imglogin"><img src="../img/login.png" alt="img" width="329" height="485"></a></div>
<div class="imglogoitse"><img src="../img/itselogo.png" alt="img" width="289" height="95"></a></div>
<div class="texto Estilo1 Estilo3">Registrate</div>

<div class="registro">
  
  <form name="form1" method="post" action="spinsertar.php">
    <p>
    <label><input type="text" min='15' placeholder="Nombre completo" name="nombre" id="nombre" required></label>
  </p>
  <p>&nbsp;</p>

    <p>
    <label><input type="text" placeholder="Ingresa tu matrícula" name="usuario" id="usuario" required></label>
  </p>
  <p>&nbsp;</p>
    <p>
    <select name="carrera" class="carrera" required>
        <option disabled selected="">Selecciona tu carrera</option>
        <option value="Ingeniería en animación digital y efectos visuales">Ingeniería en animación digital y efectos visuales</option>
        <option value="Ingeniería en sistemas computacionales">Ingeniería en sistemas computacionales</option>
        <option value="Ingeniería en industrias alimentarias">Ingeniería en industrias alimentarias</option>
        <option value="Ingeniería en energias renovables">Ingeniería en energías renovables</option>
        <option value="Licenciartura en administración">Licenciatura en administración</option>
        <option value="Licenciatura en gastronomia">Licenciatura en gastronomía</option>
        <option value="Licenciatura en turismo">Licenciatura en turismo</option>
       </select>
  </p>
    <p>&nbsp;</p>

   <p>
    <label><input type="text" placeholder="Numero de teléfono" name="telefono" id="telefono" required></label>
  </p>
  <p>&nbsp;</p>

    <p>
    <label><input type="password" placeholder="ingrese una contraseña" name="pass" id="pass" required></label>
  </p>
  <p>&nbsp;</p>

    <p>
    <label><input type="submit" name="enviar" value="Registrar" id="boton" onclick="mostrar()"><label> 
  </p>
  <p>&nbsp;</p>
  <script tupe="text/javascript">
            function mostrar(){
                swal('Usuario Registrado Con Exito','Ya puedes ingresar al sistema','success');
            }
        </script>
</form>
</div>



<div class="regresar1 Estilo4">
  <p>&nbsp;</p>
  <p><strong><a href="../demo/index.html"><button class="atras" id="atras">Regresar</button></a></strong></p>
</div>
</body>
</html>


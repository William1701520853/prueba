<?php
include "conexion/conexion.php";
include "conexion/funciones.php";

if (!isset($modulo)) {
  $modulo = "inicio";
} else {
  $modulo = $modulo;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prueba</title>
</head>


<body>


  <head>
    <link rel="stylesheet" href="vista/css/estilos.css">
    <title>Prueba</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </head>
  <header class="enca">
    <div class="wrapper">
      <div class="logo">
Prueba
      </div>
      <nav class="nav-b">
        <a href="?modulo=inicio">Inicio</a>
        <a href="?modulo=citas">Citas</a>
        <a href="?modulo=pacientes">Pacientes</a>
        <a href="?modulo=consultorios">Consultorios</a>
      </nav>
    </div>
  </header>


  <div class="hero-image">

  </div>



  </div>

  <br />
  <div>
    <?php
    if (file_exists("vista/modulos/" . $modulo . ".php")) {
      include "vista/modulos/" . $modulo . ".php";
    } else {
      echo "<i>no se encontro el modulo <br>" . $modulo . "</br> <a href= './'>Regresar</a></i>";
    }

    ?>

  </div>

</body>


</html>
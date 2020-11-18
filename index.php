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

</html>

<html>

<head>
  <link rel="stylesheet" href="vista/css/estilos.css">
  <title>Prueba</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</head>

<body >

<nav class="navbar navbar-expand-lg navbar-light" >

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="?modulo=inicio">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?modulo=citas">Citas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?modulo=pacientes">Pacientes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="?modulo=consultorios">Consultorios</a>
      </li>
    </ul>
  </div>
</nav>

<div class="hero-image">

</div>



</div>

  <br />
  <div >
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
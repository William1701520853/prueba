
<?php
$mysqli = $mysqlC;

$pac = "SELECT pac_cedula FROM citas where cit_codigo ='$borrar'";


$consulta = mysqli_query($mysqli, $pac);
while ($respuesta = mysqli_fetch_array($consulta)) {

    $code = $respuesta['pac_cedula'];
}
echo $code;
$dato = "DELETE FROM citas where cit_codigo ='$borrar'";
$consulta = mysqli_query($mysqli, $dato);



if ($consulta) {
    echo "borrar";
    echo $code;

    header("Location: ?modulo=frmsearch&buscar=$code");
}
?>
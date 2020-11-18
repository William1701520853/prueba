<?php

echo $del;


$mysqli = $mysqlC;
$dato = "DELETE FROM consultorios where cons_codigo ='$del'";
$consulta = mysqli_query($mysqli, $dato);



if ($consulta) {
echo "borrar";
echo $code;
    
    header("Location: ?modulo=consultorios");
}

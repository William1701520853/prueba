<?php
$mysqlC= new mysqli($mysql_host, $mysql_userName, $mysql_password, $mysql_db, $mysql_puerto) or dir("error al conectar al servidor mysql");

function limpiar($variable)
{
    htmlspecialchars($variable);
    return $variable;
}

function alert($msg) { 
    echo "<script type='text/javascript'>alert('$msg');</script>"; 
}
<?php
$dato = "SELECT cit_fecha, cit_hora, cons_codigo, citas.pac_cedula, concat_ws(' ', pacientes.pac_nombre, pacientes.pac_apellido) as nombre,pac_correo FROM citas inner join pacientes on citas.pac_cedula=pacientes.pac_cedula";
if (isset($buscar)) {
    $date1 =  limpiar($date1);
    $date2 =  limpiar($date2);
    $consultorio =  limpiar($consultorio);
    $cedula =  limpiar($cedula);
    $nombre =  limpiar($nombre);
    if ($date1 != null && $date2 != null) {
        $dato = "SELECT cit_fecha, cit_hora, cons_codigo, citas.pac_cedula, concat_ws(' ', pacientes.pac_nombre, pacientes.pac_apellido) as nombre,pac_correo FROM citas inner join pacientes on citas.pac_cedula=pacientes.pac_cedula where cit_fecha between '$date1' and '$date2'";
    } elseif ($consultorio != null) {
        $dato = "SELECT cit_fecha, cit_hora, cons_codigo, citas.pac_cedula, concat_ws(' ', pacientes.pac_nombre, pacientes.pac_apellido) as nombre,pac_correo FROM citas inner join pacientes on citas.pac_cedula=pacientes.pac_cedula where upper(cons_codigo) = upper('$consultorio')";
    } elseif ($nombre != null) {
        $dato = "SELECT cit_fecha, cit_hora, cons_codigo, citas.pac_cedula, concat_ws(' ', pacientes.pac_nombre, pacientes.pac_apellido) as nombre,pac_correo FROM citas inner join pacientes on citas.pac_cedula=pacientes.pac_cedula where trim(upper(concat_ws(' ', pacientes.pac_nombre, pacientes.pac_apellido))) like trim(upper('%$nombre%'))";
    } elseif ($cedula != null) {
        $dato = "SELECT cit_fecha, cit_hora, cons_codigo, citas.pac_cedula, concat_ws(' ', pacientes.pac_nombre, pacientes.pac_apellido) as nombre,pac_correo FROM citas inner join pacientes on citas.pac_cedula=pacientes.pac_cedula where upper(pacientes.pac_cedula) like upper('%$cedula%')";
    }
}
?>

<div >
    <form method="post" action="" enctype="multipart/form-data">
        <div class="frm-cite">
            <div class="cit-search-date-1 ">
                <p>Ingrese la primer fecha</p>
                <input type="date" name="date1" >
            </div>
            <div class="cit-search-date-2">
                <p>Ingrese la segunda fecha</p>
                <input type="date" name="date2" value="<?php echo date("Y-m-d"); ?>">
            </div>
            <div class="cit-search-cons">
                <p>Ingresa el consultorio</p>
                <input type="text" class="form-control" name="consultorio" placeholder="Consultorio" style="width: 200px" />
            </div>
            <div class="cit-search-name">
                <p>Ingrese el nombre</p>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" />
            </div>
            <div class="cit-search-cc">
                <p>Ingresa la cedula</p>
                <input type="text" class="form-control" name="cedula" placeholder="Cedula" />
            </div>
            <div class="btn-search-cite">
                <button type="submit" name="buscar" class="btn btn-primary"> <i class="fa fa-search"></i>Buscar</button>
            </div>
        </div>

</div>
</form>
</div>
<div>
    <table class="table table-bordered table-dark">
        <tr>
            <th colspan="5">Citas</th>
        </tr>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Codigo consultorio</th>
            <th scope="col"> Cedula paciente</th>
            <th scope="col"> Nombre completo</th>
            <th scope="col"> Correo</th>
        </tr>
        <?php
        $mysqli = $mysqlC;
        $consulta = mysqli_query($mysqli, $dato);
        while ($respuesta = mysqli_fetch_array($consulta)) {
            $fecha = $respuesta['cit_fecha'];
            $hora = $respuesta['cit_hora'];
            $codigoc = $respuesta['cons_codigo'];
            $cedula = $respuesta['pac_cedula'];
            $nombre = $respuesta['nombre'];
            $correo = $respuesta['pac_correo'];

        ?>
            <tr>
                <td><?= $fecha ?></td>
                <td><?= $hora ?></td>
                <td><?= $codigoc ?></td>
                <td><?= $cedula ?></td>
                <td><?= $nombre ?></td>
                <td><?= $correo ?></td>

            </tr>

        <?php

        }

        ?>
    </table>
</div>
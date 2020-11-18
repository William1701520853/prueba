<?php

$nombre = "SELECT concat_ws(' ', pacientes.pac_nombre, pacientes.pac_apellido) as nombre from pacientes where pac_cedula ='$buscar'";
$dato = "SELECT cit_codigo,cit_fecha, cit_hora, cons_codigo FROM citas where pac_cedula ='$buscar'";

?>
<div style="margin-top:25px">
    <table class="table table-bordered table-dark">
        <?php
        $mysqli = $mysqlC;
        $consulta = mysqli_query($mysqli, $nombre);
        while ($respuesta = mysqli_fetch_array($consulta)) {
            $name = $respuesta['nombre'];
        ?>
            <a href="?modulo=frmsearch&buscar=<?= $cedula ?>"><input type="submit" value="" width="5" name="search" style="background:url(left-arrow/lupa.png) no-repeat; border:none; width:32px; height:24px;" title="search"></a>

            <tr>
                <th colspan="6">Cita del paciente <?= $name ?> </th>
            </tr>
        <?php
        }
        ?>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Consultorio</th>
            <th scope="col">Eliminar</th>
            </th>
        </tr>
        <?php

        $consulta = mysqli_query($mysqli, $dato);
        while ($respuesta = mysqli_fetch_array($consulta)) {
            
            $code = $respuesta['cit_codigo'];
            $fecha = $respuesta['cit_fecha'];
            $hora = $respuesta['cit_hora'];
            $consultorio = $respuesta['cons_codigo'];

        ?>
            <tr>
                <td><?= $fecha ?></td>
                <td><?= $hora ?></td>
                <td><?= $consultorio ?></td>
                <td>
                <a href="?modulo=frmdelete&borrar=<?= $code ?>"><input type="submit" value="" width="5" name="search" style="background:url(imagenes/remove.png) no-repeat; border:none; width:32px; height:32px;" title="search"></a>

                </td>



            </tr>

        <?php

        }
        if (isset($borrar)) {
            $dato = "DELETE FROM citas where cit_codigo ='$borrar'";
        }
        ?>
    </table>
</div>
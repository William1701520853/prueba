<?php
$mysqli = $mysqlC;
$dato = "SELECT cons_codigo FROM consultorios order by cons_codigo asc";
$searchDate = "SELECT cit_fecha FROM citas order by cit_fecha asc";
$searchHour = "SELECT cit_hora FROM citas order by cit_hora asc";

$sql_resultado = mysqli_query($mysqli, $searchDate);
while ($fila = mysqli_fetch_assoc($sql_resultado)) {
    $nuevo_array_date[] = $fila;
}
$sql_resultado = mysqli_query($mysqli, $searchHour);
while ($fila = mysqli_fetch_assoc($sql_resultado)) {
    $nuevo_array_hour[] = $fila;
}
if (isset($return)) {
    header("Location: ?modulo=pacientes");
}
if (!empty($_POST)) {
    if (isset($insertar)) {

        $date =  $_POST['date'];
        $time =  $_POST['time'];
        $consu =  $_POST['consu'];
        if ($date != null && $time != null && $consu != null) {
            if (!in_array($date, $nuevo_array_date) &&  !in_array($time, $nuevo_array_hour)) {
                $insert = "INSERT INTO `citas` (`cit_codigo`, `cit_fecha`, `cit_hora`, `cons_codigo`, `pac_cedula`) VALUES (NULL, '$date', '$time', '$consu', '$adicionar');";

                $insertar1 = mysqli_query($mysqli, $insert);

                if ($insertar1) {
                    header("Location: ?modulo=pacientes");
                }
            } else {
?> <div class="alert alert-danger" role="alert">
                    Seleccione otra hora o fecha por favor.
                </div>
            <?php
            }
        } else {
            ?> <div class="alert alert-danger" role="alert">
                La cita no se pudo agregar correctamente, verifique los campos.
            </div>
<?php

        }
    }
}
?>
<form action="" method="post">
    <div class="frm-cit-pac">
        <div class="add-cit-date-pac">
            <label for="pac_ced" class="control-label">Ingrese la fecha</label>
            <input type="date" name="date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>">
        </div>
        <div class="add-cit-hour-pac">
            <label for="nombre" class="control-label">Ingrese la hora</label>
            <input type="time" name="time" min="06:00" value="<?php echo time('H:m'); ?>">
        </div>
        <div class=" add-cit-cons-pac">
            <label for="consul" class="control-label">Consultorio</label>
            <?php
            $consulta = mysqli_query($mysqli, $dato);
            $resultado = mysqli_num_rows($consulta);
            ?>
            <select class="" name="consu">
                <?php
                if ($resultado > 0) {
                    while ($respuesta = mysqli_fetch_array($consulta)) {
                        $consu = $respuesta['cons_codigo'];
                ?>
                        <option value="<?php echo $consu ?>"><?php echo $consu ?></option>
                <?php
                    }
                }

                ?>
            </select>
        </div>
        <div class="btn-cit-add">
            <a href="?modulo=pacientes"><button type="submit" name="insertar" class="btn btn-primary"> <i class="fa fa-search"></i>Adicionar</button></a>
        </div>

        <div class="btn-return">
            <button type="submit" name="return" class="btn btn-primary">Volver</button>
        </div>
    </div>
</form>
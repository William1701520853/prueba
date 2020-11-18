<?php
$mysqli = $mysqlC;
$dato = "SELECT cons_codigo FROM consultorios order by cons_codigo asc";

if (!empty($_POST)) {
    if (isset($insertar)) {

        $date =  $_POST['date'];
        $time =  $_POST['time'];
        $consu =  $_POST['consu'];
        $insert = "INSERT INTO `citas` (`cit_codigo`, `cit_fecha`, `cit_hora`, `cons_codigo`, `pac_cedula`) VALUES (NULL, '$date', '$time', '$consu', '$adicionar');";

        $insertar1 = mysqli_query($mysqli, $insert);

        if ($insertar1) {
            header("Location: ?modulo=pacientes");
        }
    }
}
?>
<form action="" method="post">
    <div style="width: 400px; background: #24303c;padding: 30px;margin:auto;margin-top: 10px;border-radius: 4px;">
        <div class="form-group">
            <!-- Full Name -->
            <label for="pac_ced" class="control-label">Ingrese la fecha</label>
            <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>">

        </div>

        <div class="form-group">
            <!-- Street 1 -->
            <label for="nombre" class="control-label">Ingrese el nombre</label>
            <input type="time" name="time" value="<?php echo time('H:m'); ?>">
        </div>


        <div class=" form-group">
            <!-- State Button  https://www.youtube.com/watch?v=1N6HarnrBcU&ab_channel=AbelOS 2:00 -->
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

        <div class="row w-100" style="margin-left:50px ;">
            <div class="col v-center">
                <button type="submit" name="insertar" class="btn btn-primary"> <i class="fa fa-search"></i>Adicionar</button>
            </div>
        </div>
    </div>
</form>

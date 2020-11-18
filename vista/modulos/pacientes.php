<?php
$dato = "SELECT * FROM pacientes ORDER BY pac_cedula ASC";
$dato1 = " ";
$alert = "";
$mysqli = $mysqlC;
if (isset($return_pac)) {
    header("Location: ?modulo=pacientes");
}
if (isset($added)) {
    $cedula = limpiar($cedula);
    $name = limpiar($name);
    $lname = limpiar($lname);
    $mail = limpiar($mail);
    $bdate = limpiar($bdate);
    $q = mysqli_query($mysqli, "SELECT * FROM pacientes WHERE `pac_cedula` = '$cedula'");
    $veri =   mysqli_num_rows($q);


    if ($cedula != null && $name != null && $lname != null && $mail != null && $bdate != null) {
        if ($veri == 0) {
            $dato1 = "INSERT INTO pacientes VALUES ('$cedula', '$name', '$lname', '$mail','$bdate')";

        } else {

        ?> <div class="alert alert-danger" role="alert">
               El documento ingresado ya se encuentra registrado, digite nuevamente.
            </div>
<?php

        }
    }
    else{
        ?> <div class="alert alert-danger" role="alert">
                asdasEl paciente no se pudo agregar por favor intentar de nuevo.
            </div>
            <?php

    }
}
if (isset($buscar)) {
    $cedula =  limpiar($cedula);
    $name =  limpiar($name);
    if ($cedula != null) {
        $dato =  "SELECT * FROM pacientes WHERE upper(pac_cedula ) like upper('%$cedula%')";
    } elseif ($name != null) {
        $dato =  "SELECT * FROM pacientes WHERE trim(upper(concat_ws(' ', pac_nombre, pac_apellido))) like trim(upper('%$name%'))";
    }
}
?>
<div>
    <?php
    if (!isset($adicionar)) {
    ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="campos-pacientes">
                <div class="pac-text-cc">

                    <p>Ingrese cedula</p>
                    <input type="text" name="cedula" placeholder="Ingresa el numero de cedula" />

                </div>
                <div class="pac-text-name">
                    <p>Ingrese nombre</p>
                    <input type="text" name="name" placeholder="Ingresa el nombre del paciente" />
                </div>
                <div class="btn-search-pac">
                    <button type="submit" name="buscar" class="btn btn-primary"> <i class="fa fa-search"></i>Buscar</button>
                </div>
                <div class="btn-add-pac">
                    <button type="submit" name="adicionar" class="btn btn-success"> <i class="fa fa-search"></i>Agregar</button>
                </div>
            </div>
        </form>
    <?php
    } else {

    ?>

        <form method="post" action="" enctype="multipart/form-data">
            <div>
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="cont-frm-added">
                        <div class="pac-text-add-cc">
                            <p>Ingrese cedula</p>
                            <input type="text" class="form-control" name="cedula" placeholder="Cedula" />
                        </div>
                        <div class="pac-text-add-name">
                            <p>Ingrese nombre</p>
                            <input type="text" class="form-control" name="name" placeholder="Nombre" />
                        </div>
                        <div class="pac-text-add-lname">
                            <p>Ingresa apelldo</p>
                            <input type="text" class="form-control" name="lname" placeholder="Apellido" />
                        </div>
                        <div class="pac-text-add-mail">
                            <p>Ingrese el correo</p>
                            <input type="mail" class="form-control" name="mail" placeholder="Correo" />
                        </div>
                        <div class="pac-text-add-date">
                            <p>Ingresa la fecha de nacimiento</p>
                            <input type="date" name="bdate" max="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>
            </div>


            <div class="btn-added-pac">
                <button type="submit" name="added" class="btn btn-success"> <i class="fa fa-search"></i>Añadir</button>
            </div>
            <div class="btn-return">
                <button type="submit" name="return_pac" class="btn btn-primary"> <i class="fa fa-search"></i>Volver</button>
            </div>
</div>
</div>
</form>
<?php
    }


?>
</div>
<div>
    <table class="table table-bordered table-dark">
        <tr>
            <th colspan="6">Pacientes</th>
        </tr>
        <tr>
            <th scope="col">Cedula paciente</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col"> Fecha de nacimiento</th>
            <th scope="col"> Opciones</th>

            </th>
        </tr>
        <?php
        $mysqli = $mysqlC;
        if (mysqli_query($mysqli, $dato1)) {
        ?> <div class="alert alert-success" role="alert">
                El paciente se registró con éxito.
            </div>
        <?php
        }
        $consulta = mysqli_query($mysqli, $dato);

        while ($respuesta = mysqli_fetch_array($consulta)) {
            $cedula = $respuesta['pac_cedula'];
            $nombre = $respuesta['pac_nombre'];
            $apellido = $respuesta['pac_apellido'];
            $correo = $respuesta['pac_correo'];
            $fnac = $respuesta['pac_fnacimiento'];
        ?>
            <tr>
                <td><?= $cedula ?></td>
                <td><?= $nombre ?></td>
                <td><?= $apellido ?></td>
                <td><?= $correo ?></td>
                <td><?= $fnac ?></td>
                <td>
                    <a href="?modulo=frmAdd&adicionar=<?= $cedula ?>"><input type="submit" value="" width="5" name="add" class="btn-add" title="Agregar cita"></a>
                    <a href="?modulo=frmSearch&buscar=<?= $cedula ?>"><input type="submit" value="" width="5" name="search" class="btn-search" title="Buscar citas"></a>
                </td>


            </tr>
        <?php

        }


        ?>
    </table>
</div>
</form>
</div>
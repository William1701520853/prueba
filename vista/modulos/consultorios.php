<?php
$dato = "SELECT * FROM consultorios ORDER BY cons_codigo ASC";
$dato1 = " ";

if (isset($return_pac)) {
    header("Location: ?modulo=consultorios");
}
if (isset($added)) {
    $code = limpiar($code);
    $name = limpiar($name);
    $location = limpiar($location);
    $state = limpiar($state);
    if ($code != null && $name != null && $location != null && $state != null) {
        $dato1 = "INSERT INTO consultorios VALUES (upper('$code'),'$name', '$location', '$state')";
    } else {
?> <div class="alert alert-danger" role="alert">
            No se completó el formulario intente nuevamente.
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
<div >
    <?php
    if (!isset($adicionar)) {
    ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="add-cons">
                <button type="submit" name="adicionar" class="btn btn-success"> <i class="fa fa-search"></i>Agregar</button>

            </div>
        </form>
    <?php
    } else {

    ?>

        <form method="post" action="" enctype="multipart/form-data">
            <div class="frm-cons">

                <form method="post" action="" enctype="multipart/form-data">
                    <div class="frm-dates-cons">
                        <div class="add-cod-cons">
                            <p>Ingrese codigo</p>
                            <input type="text" class="form-control" name="code" placeholder="codigo" class="text-camp" />
                        </div>
                        <div class="add-nam-cons">
                            <p>Ingrese nombre</p>
                            <input type="text" class="form-control" name="name" placeholder="Nombre" class="text-camp" />
                        </div>
                        <div>
                            <div class="add-loc_cons">
                                <p>Ingresa locación</p>
                                <input type="text" class="form-control" name="location" placeholder="locación" class="text-camp" />
                            </div>
                        </div>
                        <div class="select-state">
                            <p>Activo</p>
                            <select name="state" class="select-opt">
                                <option value="Si">Si</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                        <div class="btn-cons-add">
                            <button type="submit" name="added" class="btn btn-success"> <i class="fa fa-search"></i>Añadir</button>
                        </div>
                        <div class="btn-return">
                            <button type="submit" name="return_pac" class="btn btn-primary"> <i class="fa fa-search"></i>Volver</button>
                        </div>
                    </div>
            </div>
        </form>
</div>
</form> <?php
    }
        ?> <form class="frm-cons-table">
    <table class="table table-bordered table-dark">
        <div class="frm-consultorios">
        <tr>
            <th colspan=5>Consultorios</th>
        </tr>
        </div>
        <tr>
            <th scope="col">Codigo consultorio</th>
            <th scope="col">NomNombre consultoriobre</th>
            <th scope="col">Ubicacion</th>
            <th scope="col">Activo</th>
            <th scope="col">Opciones</th>
            </th>
        </tr>
        <?php
        $mysqli = $mysqlC;
        if (mysqli_query($mysqli, $dato1)) {
        ?> <div class="alert alert-success" role="alert">
                El consultorio se agregó satisfactoriamente.
            </div>
        <?php
        }
        $consulta = mysqli_query($mysqli, $dato);
        while ($respuesta = mysqli_fetch_array($consulta)) {
            $codigo = $respuesta['cons_codigo'];
            $nombre = $respuesta['cons_nombre'];
            $ubicacion = $respuesta['cons_ubicacion'];
            $activo = $respuesta['cons_activo'];
        ?>
            <tr>
                <td><?= $codigo ?></td>
                <td><?= $nombre ?></td>
                <td><?= $ubicacion ?></td>
                <td><?= $activo ?></td>
                <td>
                <a href="?modulo=frmDelCons&del=<?= $codigo ?>"><input type="button" value="" width="5" name="add" class="btn-del" title="Eliminar consultorio"></a>

                <a href="?modulo=frmUpdCons&upd=<?= $codigo ?>"><input type="button" value="" width="5" name="add" class="btn-upd" title="Editar datos de consultorio"></a>

            </tr>
        <?php

        }


        ?>
    </table>


</form>
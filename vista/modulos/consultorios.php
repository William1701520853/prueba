<?php
$dato = "SELECT * FROM consultorios ORDER BY cons_codigo ASC";
$dato1 = " ";

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
<div style="margin-top:25px">
    <?php
    if (!isset($adicionar)) {
    ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-2">
                    <button type="submit" name="adicionar" class="btn btn-primary"> <i class="fa fa-search"></i>Agregar</button>

                </div>
            </div>
        </form>
    <?php
    } else {

    ?>

        <form method="post" action="" enctype="multipart/form-data">
            <div style="margin-top:25px">
                <form method="post" action="" enctype="multipart/form-data">
                    <div style="width: 400px; background: #24303c;padding: 30px;margin:auto;margin-top: 10px;border-radius: 4px;">
                        <div class="form-group">
                            <div class="form-group">
                                <p>Ingrese codigo</p>
                                <input type="text" class="form-control" name="code" placeholder="codigo" style="width: 200px" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <p>Ingrese nombre</p>
                                <input type="text" class="form-control" name="name" placeholder="Nombre" style="width: 200px" />
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <div class="form-group">
                                    <p>Ingresa locación</p>
                                    <input type="text" class="form-control" name="location" placeholder="locación" style="width: 200px" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="form-group">
                                    <p>Ingrese el estado</p>
                                    <input type="text" class="form-control" name="state" placeholder="estado" />
                                </div>
                            </div>

                        </div>



                        <div class="row w-100">
                            <div class="col v-center" style=" margin-bottom: 15px;">
                                <button type="submit" name="added" class="btn btn-primary"> <i class="fa fa-search"></i>Añadir</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
        }


            ?>
            <form>
                <table class="table table-bordered table-dark">
                    <tr>
                        <th colspan=5>Consultorios</th>
                    </tr>
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
                                <label class="lbldelcon" style="margin-left:25px"><a href="?modulo=frmdelcons&del=<?= $codigo ?>" style='text-decoration:none'>
                                        <font size=3 color="red">Borrar
                                    </a></font></label>
                                <label class="lblupdcon" style="margin-left:25px"><a href="?modulo=frmupdcons&upd=<?= $codigo ?>" style='text-decoration:none'>
                                        <font size=3 color="blue">Editar
                                    </a></font></label> </td>


                        </tr>
                    <?php

                    }


                    ?>
                </table>


            </form>
<?php
$dato = "SELECT * FROM pacientes ORDER BY pac_cedula ASC";
$dato1 = " ";
$alert = "";

if (isset($added)) {
    $cedula = limpiar($cedula);
    $name = limpiar($name);
    $lname = limpiar($lname);
    $mail = limpiar($mail);
    $bdate = limpiar($bdate);
    if ($cedula != null && $name != null && $lname != null && $mail != null && $bdate != null) {
        $dato1 = "INSERT INTO pacientes VALUES ('$cedula', '$name', '$lname', '$mail','$bdate')";
    } else {

?> <div class="alert alert-danger" role="alert">
            El paciente no se pudo agregar por favor intentar de nuevo.
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
                <div class="col-md-4" style="margin-left: 20%;">
                    <div class="form-groups">
                        <p>Ingrese cedula</p>
                        <input type="text" name="cedula" placeholder="Ingresa el numero de cedula" />
                    </div>
                </div>
                <div class="col-md-4" style="margin-left:-80px">
                    <div class="form-groups">
                        <p>Ingrese nombre</p>
                        <input type="text" name="name" placeholder="Ingresa el nombre del paciente" />
                    </div>
                </div>
                <div class="col-md-2" style="margin-left:-250px;margin-top: 30px;">
                    <button type="submit" name="buscar" class="btn btn-primary"> <i class="fa fa-search"></i>Buscar</button>
                </div>
                <div class="buttons">
                    <button type="submit" name="adicionar" class="btn btn-primary" style="margin-top:75px;margin-left:-1000px"> <i class="fa fa-search"></i>Agregar</button>
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
                                <p>Ingrese cedula</p>
                                <input type="text" class="form-control" name="cedula" placeholder="Cedula" style="width: 200px" />
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
                                    <p>Ingresa apelldo</p>
                                    <input type="text" class="form-control" name="lname" placeholder="Apellido" style="width: 200px" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="form-group">
                                    <p>Ingrese el correo</p>
                                    <input type="text" class="form-control" name="mail" placeholder="Correo" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <p>Ingresa la fecha de nacimiento</p>
                                    <input type="date" name="bdate" value="<?php echo date("Y-m-d"); ?>">
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
                                <a href="?modulo=frmadd&adicionar=<?= $cedula ?>"><input type="submit" value="" width="5" name="add" style="background:url(imagenes/add.png) no-repeat; border:none; width:24px; height:24px;" title="add"></a>

                                <a href="?modulo=frmsearch&buscar=<?= $cedula ?>"><input type="submit" value="" width="5" name="search" style="background:url(imagenes/lupa.png) no-repeat; border:none; width:24px; height:24px;" title="search"></a>
                            </td>


                        </tr>
                    <?php

                    }


                    ?>
                </table>
            </div>
        </form>
</div>
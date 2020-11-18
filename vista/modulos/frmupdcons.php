<?php
$dato = "SELECT * FROM consultorios where cons_codigo = '$upd' ORDER BY cons_codigo ASC";
$mysqli = $mysqlC;

$consulta = mysqli_query($mysqli, $dato);

while ($respuesta = mysqli_fetch_array($consulta)) {
    $codigo = $respuesta['cons_codigo'];
    $nombre = $respuesta['cons_nombre'];
    $ubicacion = $respuesta['cons_ubicacion'];
    $activo = $respuesta['cons_activo'];
}

if(isset($return))
{
    header("Location: ?modulo=consultorios");
}
if (isset($update)) {
    $code = limpiar($code);
    $name = limpiar($name);
    $location = limpiar($location);
    $state = limpiar($state);
    if ($code != null && $name != null && $location != null && $state != null) {
        $dato1 = "UPDATE consultorios SET cons_codigo = '$code', cons_nombre = '$name', cons_ubicacion = '$location', cons_activo = '$state' WHERE consultorios.cons_codigo = '$upd'";
        $consulta = mysqli_query($mysqli, $dato1);
        header("Location: ?modulo=consultorios");
    } else {
        echo "No se completó el formulario";
    }
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <div style="margin-top:25px">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="frm-upd-cons">
                <div class="upd-code-cons">
                    <p>Ingrese codigo</p>
                    <input type="text" value="<?= $codigo ?>" class="form-control" name="code" placeholder="codigo" style="width: 200px" />
                </div>
                <div class="upd-name-cons">
                    <p>Ingrese nombre</p>
                    <input type="text" value="<?= $nombre ?>" class="form-control" name="name" placeholder="Nombre" style="width: 200px" />
                </div>
                <div class="upd-loc-cons">
                    <p>Ingresa locación</p>
                    <input type="text" value="<?= $ubicacion ?>" class="form-control" name="location" placeholder="locación" style="width: 200px" />
                </div>
                <div class="upd-state-cons">
                    <p>Activo</p>
                    <select name="state">
                        <option value="si">Si</option>
                        <option value="no" selected>No</option>
                    </select>
                </div>
                <div class="btn-upd-cons" style=" margin-bottom: 15px;">
                    <button type="submit" name="update" class="btn btn-primary"> <i class="fa fa-search"></i>Actualizar</button>
                </div>
                <div class="btn-return" style=" margin-bottom: 15px;">
                    <button type="submit" name="return" class="btn btn-primary"> <i class="fa fa-search"></i>Volver</button> </div>
            </div>
        </form>
    </div>
</form>
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

if (isset($return)) {
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
    <div class="frm-upd-cons-dates">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="frm-upd-cons">
                <div class="upd-code-cons">
                    <p>Ingrese codigo</p>
                    <input type="text" value="<?= $codigo ?>" class="text-camp" name="code" placeholder="codigo" />
                </div>
                <div class="upd-name-cons">
                    <p>Ingrese nombre</p>
                    <input type="text" value="<?= $nombre ?>" class="text-camp" name="name" placeholder="Nombre" />
                </div>
                <div class="upd-loc-cons">
                    <p>Ingresa locación</p>
                    <input type="text" value="<?= $ubicacion ?>" class="text-camp" name="location" placeholder="locación" />
                </div>
                <div class="upd-state-cons">
                    <p>Activo</p>
                    <select name="state" class="select-opt">
                        <option value="Si">Si</option>
                        <option value="No" selected>No</option>
                    </select>
                </div>
                <div class="btn-upd-cons">
                    <button type="submit" name="update" class="btn btn-primary"> <i class="fa fa-search"></i>Actualizar</button>
                </div>
                <div class="btn-return" >
                    <button type="submit" name="return" class="btn btn-primary"> <i class="fa fa-search"></i>Volver</button> </div>
            </div>
        </form>
    </div>
</form>
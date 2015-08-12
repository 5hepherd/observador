<?php
include("../scripts/conexion.php");
include("../scripts/sesion.php");
$consulta = "select distinct grupo from estudiantes ORDER BY `estudiantes`.`grupo` ASC";
$resultado = $conexion->query($consulta);

$listado = "";
while($registro = $resultado->fetch_assoc()){
    $listado .= '<option value="'.$registro["grupo"].'">'.$registro["grupo"].'</option>';
};
?>

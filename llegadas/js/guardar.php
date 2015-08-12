<?php
if(isset($_POST["cod"])){
    include("../../scripts/conexion.php");
    include("../../scripts/limpiar.php");
    include("../../scripts/sesion.php");
    $codigo = limpiarCadena($_POST["cod"]);
    $observaciones = limpiarCadena($_POST["observacion"]);
    $consulta = "UPDATE estudiantes SET faltas = faltas+1 WHERE codigo='".$codigo."' ";
    $resultado = $conexion->query($consulta);
    $consulta = "INSERT INTO actividad(codigo,accion,observaciones) VALUES ('".$codigo."','llegada','".$observaciones."')";
    $resultado = $conexion->query($consulta);
};
?>

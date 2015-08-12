<?php
if(isset($_GET["id"])){
    include("../../scripts/conexion.php");
    include("../../scripts/limpiar.php");
    include("../../scripts/sesion.php");
    $id = limpiarCadena($_GET["id"]);
    $tipo = limpiarCadena($_GET["tipo"]);
    $codigo = limpiarCadena($_GET["c"]);
    $consulta = "DELETE FROM actividad WHERE id=".$id."";
    $resultado = $conexion->query($consulta);
    if($tipo == "llegadas"){
        $consulta = "UPDATE estudiantes SET faltas = faltas-1 WHERE codigo = '".$codigo."'";
    }else if($tipo == "salidas"){
        $consulta = "UPDATE estudiantes SET salidas = salidas-1 WHERE codigo = '".$codigo."'";
    }else if($tipo == "faltas"){
        $consulta = "UPDATE estudiantes SET ausente = ausente-1 WHERE codigo = '".$codigo."'";
    };
    $conexion->query($consulta);
};

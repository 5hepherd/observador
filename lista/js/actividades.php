<?php
if(isset($_GET["t"])){
    include("../../scripts/conexion.php");
    include("../../scripts/limpiar.php");
    include("../../scripts/sesion.php");
    $tabla = limpiarCadena($_GET["t"]);
    $codigo = limpiarCadena($_GET["c"]);
    if($tabla == "llegadas"){
    $consulta = "SELECT * FROM actividad WHERE codigo='".$codigo."' AND accion='llegada' ORDER BY actividad.fecha ASC;";
    }
    else if($tabla == "salidas"){
    $consulta = "SELECT * FROM actividad WHERE codigo='".$codigo."' AND accion='salida' ORDER BY actividad.fecha ASC;";
    }
    else if($tabla == "faltas"){
    $consulta = "SELECT * FROM actividad WHERE codigo='".$codigo."' AND accion='ausente' ORDER BY actividad.fecha ASC;";
    }
    $resultado = $conexion->query($consulta);
    $i = 0;
    $arreglo = array();
    while($registro = $resultado->fetch_assoc()){
        $id = $registro['id'];
        $fecha = substr($registro['fecha'],0,16);
        $observaciones = $registro['observaciones'];
        $arreglo[$i]=array("id"=>$id,"fecha"=>$fecha,"observaciones"=>$observaciones,"borrar"=>"x");
        $i++;
    };
    print_r(json_encode($arreglo));
};

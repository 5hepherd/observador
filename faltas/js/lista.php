<?php
$_SERVER['PHP_SELF'];
if(isset($_GET["g"])){
    include("../../scripts/conexion.php");
    include("../../scripts/limpiar.php");
    include("../../scripts/sesion.php");
    $grado = limpiarCadena($_GET["g"]);
    $consulta = "SELECT codigo,nombre,ausente FROM estudiantes WHERE grupo='".$grado."' ORDER BY `estudiantes`.`nombre` ASC;";
    $resultado = $conexion->query($consulta);
    while($registro = $resultado->fetch_assoc()){
        $str = $registro['nombre'];
        $arreglo = explode(" ", $str);
        $apellidos = $arreglo[0]." ".$arreglo[1];
        $nombres = "";
        for($i=2;$i<count($arreglo);$i++){
            $nombres = $nombres.$arreglo[$i]." ";
        };
        $nombre = $nombres." ".$apellidos;
        $print = "<tr>";
        $print .= '<td class="codigo">'.$registro['codigo'].'</td>';
        $print .= '<td class="nombre">'.$nombre.'</td>';
        $print .= '<td class="incidencias">'.$registro['ausente'].'</td>';
        $print .= '</tr>';
        echo $print;
    };
};

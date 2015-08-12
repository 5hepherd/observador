<?php
include("../scripts/conexion.php");
include("../scripts/sesion.php");
include("../scripts/limpiar.php");

if(isset($_POST["grupo"])){
    $grupo = limpiarCadena($_POST["grupo"]);
    $filtro = limpiarCadena($_POST["filtro"]);
    switch ($filtro) {
        case "todos":
            $cond = "1";
            $Htabla = "<th>faltas</th><th>salidas</th>";
        break;
        case "llegadas":
            $cond = "faltas > 0";
            $Htabla = "<th>faltas</th>";
        break;
        case "salidas":
            $cond = "salidas > 0";
            $Htabla = "<th>salidas</th>";
        break;
    };
    if(isset($_POST["mas3"])){
        $cond = "faltas > 2";
    }
    if(isset($_POST["observaciones"])){
        $observaciones = true;
    }
    if($grupo == "todos"){

        $consulta = "SELECT * FROM estudiantes WHERE ".$cond." ORDER BY `estudiantes`.`nombre` ASC;";
    }
    else{
        $consulta = "SELECT * FROM estudiantes WHERE grupo='".$grupo."' AND ".$cond." ORDER BY `estudiantes`.`nombre` ASC;";
    };


    $resultado = $conexion->query($consulta);
    $tbHtml= "
<table>

<header>

<tr>

<th>grupo</th>

<th>nombre</th>".

$Htabla."

</tr>

</header>";
    while($registro = $resultado->fetch_assoc()){
        //formato nombre
        $str = $registro['nombre'];
        $arreglo = explode(" ", $str);
        $apellidos = $arreglo[0]." ".$arreglo[1];
        $nombres = "";
        for($i=2;$i<count($arreglo);$i++){
            $nombres = $nombres.$arreglo[$i]." ";
        };
        $nombre = $nombres." ".$apellidos;

        switch ($filtro) {
        case "todos":
            $Btabla = "<td>".$registro['faltas']."</td><td>".$registro['salidas']."</td>";
        break;
        case "llegadas":
            $Btabla = "<td>".$registro['faltas']."</td>";
        break;
        case "salidas":
            $Btabla = "<td>".$registro['salidas']."</td>";
        break;
        };
        $tbHtml.="<tr><td>".$registro['grupo']."</td><td>".$nombre."</td>".$Btabla."</tr>";


    };
    $tbHtml.="</table>";
    header(
    "Content-type: application/octet-stream"
    );
    //indicamos al navegador que se está devolviendo un archivo
    header(
    "Content-Disposition: attachment; filename=informe.xls"
    );
    //con esto evitamos que el navegador lo grabe en su caché
    header(
    "Pragma: no-cache"
    );
    header(
    "Expires: 0"
    );
    //damos salida a la tabla
    echo

    $tbHtml
;
};
?>

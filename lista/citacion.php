<?php
    include("../scripts/conexion.php");
    include("../scripts/sesion.php");
    include("../scripts/limpiar.php");
    include("../dompdf/dompdf_config.inc.php");
    if(isset($_GET["c"])){
    $codigo = limpiarCadena($_GET["c"]);
    $consulta = "SELECT * FROM estudiantes WHERE codigo='".$codigo."'";
    $resultado = $conexion->query($consulta);
    $registro = $resultado->fetch_assoc();
        //nombre
        $str = $registro['nombre'];
        $arreglo = explode(" ", $str);
        $apellidos = $arreglo[0]." ".$arreglo[1];
        $nombres = "";
        for($i=2;$i<count($arreglo);$i++){
            $nombres = $nombres.$arreglo[$i]." ";
        };
        $alumno = $nombres." ".$apellidos;

    $grado = $registro["grupo"];
    $llegadas = $registro["faltas"];
    function hoy(){
        $dia2=date("l");

        if ($dia2=="Monday") $dia2="Lunes";
        if ($dia2=="Tuesday") $dia2="Martes";
        if ($dia2=="Wednesday") $dia2="Miércoles";
        if ($dia2=="Thursday") $dia2="Jueves";
        if ($dia2=="Friday") $dia2="Viernes";
        if ($dia2=="Saturday") $dia2="Sabado";
        if ($dia2=="Sunday") $dia2="Domingo";

        $mes1=date("F");

        if ($mes1=="January") $mes1="Enero";
        if ($mes1=="February") $mes1="Febrero";
        if ($mes1=="March") $mes1="Marzo";
        if ($mes1=="April") $mes1="Abril";
        if ($mes1=="May") $mes1="Mayo";
        if ($mes1=="June") $mes1="Junio";
        if ($mes1=="July") $mes1="Julio";
        if ($mes1=="August") $mes1="Agosto";
        if ($mes1=="September") $mes1="Setiembre";
        if ($mes1=="October") $mes1="Octubre";
        if ($mes1=="November") $mes1="Noviembre";
        if ($mes1=="December") $mes1="Diciembre";

        $ano1=date("Y");

        $dia3=date("d");
        return "$dia2, $dia3 de $mes1 del $ano1";
        };

    $dias = array();
    $dias_str = "";
    $meses = array();
    $meses_str = "";

    $consulta = "SELECT fecha FROM actividad WHERE codigo='".$codigo."' AND accion='llegada'";
    $resultado = $conexion->query($consulta);
    while($registro = $resultado->fetch_assoc()){
        $fecha = explode("-", substr($registro['fecha'],0,10));
        $mes = $fecha[1];
            if ($mes=="01") $mes="Enero";
            if ($mes=="02") $mes="Febrero";
            if ($mes=="03") $mes="Marzo";
            if ($mes=="04") $mes="Abril";
            if ($mes=="05") $mes="Mayo";
            if ($mes=="06") $mes="Junio";
            if ($mes=="07") $mes="Julio";
            if ($mes=="08") $mes="Agosto";
            if ($mes=="09") $mes="Setiembre";
            if ($mes=="10") $mes="Octubre";
            if ($mes=="11") $mes="Noviembre";
            if ($mes=="12") $mes="Diciembre";
        $meses[] = $mes;
        $dia = $fecha[2];
        $dias[] = $dia;
    };
        for($i=0;$i<count($dias);$i++){
            $dias_str .= $dias[$i].",";
        };
        for($i=0;$i<count($meses);$i++){
            $meses_str .= $meses[$i].",";
        };
    $html = "<html><head><style>html,body{    font-family:Helvetica;    font-size: 14px;}p{}</style></head>".
"<body>".
"<center>".
"<h3>INSTITUCIÓN EDUCATIVA PRESBITERO LUIS EDUARDO PEREZ MOLINA</h3>".
"<h4>COORDINACION DE CONVIVENCIA</h4>".
"</center>".
"<p>Señor(a) ____________________________________________ acudiente del alumno $alumno  del grado $grado, a la fecha presenta $llegadas llegadas tarde los dias $dias_str de los meses de $meses_str respectivamente sin causa justificada. Próxima llegada tarde se le suspenderá un día de clase y usted deberá asistir a la institución a una video conferencia con su acudido.</p><br>".
"<center>".
"<TABLE border='0'>".
"<TR><TD>______________________________________________</TD> <TD width='200'></TD> <TD>______________________________________________</TD></TR>".
"<TR><td>Coordinador</td><TD></TD> <TD>Alumno</TD></TR>".
"<TR><TD height='50'></TD> <TD></TD> <TD></TD></TR>".
"<TR><TD>______________________________________________</TD> <TD></TD> <TD>fecha: ".hoy()."</TD></TR>".
"<TR><TD>Padre de familia y/o acudiente</TD> <TD></TD> <TD></TD></TR>".
"</TABLE><br>".
"</center> ".
"</body>".
"</html>";

$dompdf = new DOMPDF();
  $dompdf->load_html($html);
  $dompdf->set_paper("letter", "portrait");
  $dompdf->render();

  $dompdf->stream("citacion.pdf", array("Attachment" => false));

  exit(0);

    };



?>

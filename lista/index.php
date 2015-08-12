<?php
include("../scripts/conexion.php");
include("../scripts/sesion.php");
$consulta = "select distinct grupo from estudiantes ORDER BY `estudiantes`.`grupo` ASC";
$resultado = $conexion->query($consulta);
//$registro = $resultado->fetch_all();
$listado = "";
while($registro = $resultado->fetch_assoc()){
    $listado .= '<a title="'.$registro["grupo"].'">'.$registro["grupo"].'</a>';
};
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Listado de estudiantes</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
        <div id="cuadro">
            <div id='cerrar' class='icono'>'</div>
            <div id="nombre"></div>
            <div id="grupo"></div><br>

            <div class="contador left"><span id="llegadas"></span></div>
            <h2 class="left">llegadas</h2>
            <h2 class="right">salidas</h2>
            <div class="contador right"><span id="salidas"></span></div>

            <div style="clear:both">
                <table class="tabla llegadas">
					<thead>
						<tr>
                            <th>Id</th>
							<th>Fecha</th>
							<th>Observacion</th>
							<th>Borrar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
                <table class="tabla salidas">
					<thead>
						<tr>
                            <th>Id</th>
							<th>Fecha</th>
							<th>Observacion</th>
							<th>Borrar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

            </div>
            <div id="cont_faltas">
                <div class="contador left"><span id="faltas"></span></div>
            <h2 class="left">faltas</h2>
            </div>
            <div>

                <table class="tabla faltas">
					<thead>
						<tr>
                            <th>Id</th>
							<th>Fecha</th>
							<th>Observacion</th>
							<th>Borrar</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
            </div>
        </div>
        <div id="back"></div>
        <nav id="navegacion">
            <div class='icono nav'>²</div>
            <span class="nav">menu</span>
        </nav>
		<div class="container">
			<header>
				<h1>Listado de <em>Estudiantes</em> </h1>
				<nav class="codrops-demos">
					<?=$listado ?>
				</nav>
			</header>
			<div class="component" >
				<h2 id="grado"></h2>
				<table id="tabla">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Nombre</th>
                            <th>faltas</th>
							<th>Llegadas tarde</th>
                            <th>Salidas temprano</th>
						</tr>
					</thead>
					<tbody class="lista">

					</tbody>
				</table>

		</div><!-- /container -->
		<script src="../scripts/jquery.min.js"></script>
        <script src="../scripts/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
        <script src="js/script.js"></script>
	</body>
</html>

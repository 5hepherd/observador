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
		<title>Llegadas tarde</title>
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
            <textarea id="observaciones" placeholder='Observaciones (opcional)'></textarea>
            <div id='contador'><span class='icono'>P</span><span id="llegadas"></span></div>
            <div id='fuckear' class='icono'>)</div>
        </div>
        <div id="back"></div>
        <nav id="navegacion">
            <div class='icono nav'>²</div>
            <span class="nav">menu</span>
        </nav>
		<div class="container">
			<header>
				<h1>Registro de llegadas <em>Tarde</em> </h1>
				<nav class="codrops-demos">
					<?php echo $listado ?>
				</nav>
			</header>
			<div class="component" >
				<h2 id="grado"></h2>
				<table>
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Nombre</th>
							<th># incidencias</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>

		</div><!-- /container -->
		<script src="../scripts/jquery.min.js"></script>
        <script src="../scripts/jquery.ba-throttle-debounce.min.js"></script>
		<script src="js/jquery.stickyheader.js"></script>
        <script src="js/script.js"></script>
	</body>
</html>

<?php
include("scripts/sesion.php");
?>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/estilos_index.css" />
    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<body>
    <div class="container">
            <a href="salir" id="salir">salir</a>
            <h1>Control de Faltas</h1>
            <div class="content">
                <ul class="ca-menu">
                    <li>
                        <a href="lista">
                            <span class="ca-icon">U</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Lista de estudiantes</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="faltas">
                            <span class="ca-icon">'</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Registro de <br />faltas</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="llegadas">
                            <span class="ca-icon">P</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Registro de llegadas</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="salidas">
                            <span class="ca-icon">.</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Registro de salidas</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="informes">
                            <span class="ca-icon">³</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Informes</h2>
                            </div>
                        </a>
                    </li>
                </ul>
            </div><!-- content -->
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</body>
</html>

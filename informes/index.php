<?php
include("scripts/grupos.php");
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/estilos_ingreso.css" />
        <style type="text/css">
            select{
                background-color: #272727;
                color: #e3e3e3;
                box-shadow:rgb(0, 196, 245) 0 0 10px;
            }
            #navegacion{
    height: 50px;
    width: 100%;
    background-color: rgb(51, 51, 51);
}
.nav{
    float:left;
    font-size:40px;
    cursor: pointer;
    color: rgb(187, 187, 187);
}
            @font-face {
    font-family: 'WebSymbolsRegular';
    src: url('../../css/websymbols/websymbols-regular-webfont.eot');
    src: url('../../css/websymbols/websymbols-regular-webfont.eot?#iefix') format('embedded-opentype'),
        url('../../css/websymbols/websymbols-regular-webfont.woff') format('woff'),
        url('../../css/websymbols/websymbols-regular-webfont.ttf') format('truetype'),
        url('../../css/websymbols/websymbols-regular-webfont.svg#WebSymbolsRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}
            .icono{
    font-family: 'WebSymbolsRegular', cursive;

    /*text-shadow: 0px 0px 1px #333;
    line-height: 150px;
    width: 100%;*/
    height: 50%;
    left: 0px;
    text-align: center;
    -webkit-transition: all 400ms linear;
    -moz-transition: all 400ms linear;
    -o-transition: all 400ms linear;
    -ms-transition: all 400ms linear;
    transition: all 400ms linear;
}
        </style>
        <script src="../scripts/jquery.min.js"></script>
        <script src="../scripts/jquery.ba-throttle-debounce.min.js"></script>
        <script>
            $("#navegacion").click(function(){
    window.location ="http://"+location.hostname;
});
        </script>
    </head>
<body>
<a id="navegacion" href="../">
    <div class='icono nav'>²</div>
    <span class="nav">menu</span>
</a>
<form action="informe" name="form" method="post" enctype="application/x-www-form-urlencoded">
        <fieldset>
            <legend>Exportar informe</legend>
            <div>
                <label for="grupo">Grupo:</label><br />
                <select name="grupo">
                    <option value="todos" selected>Todos</option>
                    <?=$listado ?>
                </select>
            </div>
            <div>
                <label for="filtro">Filtro:</label><br />
                <select name="filtro">
                    <option value="todos" selected>Todo</option>
                    <option value="llegadas" >solo llegadas</option>
                    <option value="salidas" >solo salidas</option>
                </select>
            </div>
            <div>
                <label for="mas3">Acumulan mas de 3 llegadas tarde:</label>
                <input type="checkbox" name="mas3" value="si">
            </div>
            <!--<div>
                <label for="observaciones">Incluir observaciones:</label>
                <input type="checkbox" name="observaciones" value="si">
            </div>-->
            <div>
                <input type="submit" value="descargar a excel">
            </div>
        </fieldset>
    </form>
</body>
</html>

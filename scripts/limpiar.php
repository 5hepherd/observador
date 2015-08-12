<?php
function limpiarCadena($valor)
{
$valor = htmlspecialchars(trim(addslashes(stripslashes(strip_tags($valor)))));
$valor = str_replace(chr(160),'',$valor);
return mysql_real_escape_string($valor);
}
?>

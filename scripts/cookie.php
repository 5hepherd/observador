<?php
$mesa = $_GET["m"];
setcookie("mesa", $mesa,time()+9*9*9*9*9,"/");
header("Location: http://".$_SERVER['SERVER_NAME']."/");
?>

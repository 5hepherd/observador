<?php
session_start();
if(!$_SESSION["autentificado"]){
    session_destroy();
    header("Location: http://".$_SERVER['SERVER_NAME']."/ingreso");}
?>

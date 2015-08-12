<?php

function conectarse(){
    $servidor="localhost";
    $usuario="root";
    $password="root";
    $db="registro";

    $conectar = new mysqli($servidor,$usuario,$password,$db);
    return $conectar;
}

$conexion = conectarse();
$conexion->query("SET NAMES 'utf8'");
?>

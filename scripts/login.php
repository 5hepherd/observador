<?php
include("conexion.php");
include("limpiar.php");
if(isset($_POST["name"])){

$usuario = limpiarCadena($_POST["name"]);
$pass = hash('sha512',(md5($_POST["pass"])));

$consulta = "SELECT pass FROM encargados WHERE usuario='".$usuario."'";
$resultado = $conexion->query($consulta);
$passdb = $resultado->fetch_assoc()["pass"];

    if($pass==$passdb){
        session_start();
        $_SESSION["autentificado"] = true;
        $_SESSION["usuario"] = $usuario;
        $consulta = "INSERT INTO logs(usuario,accion) VALUES ('".$usuario."','entrada')";
        $resultado = $conexion->query($consulta);
        header("Location: http://".$_SERVER['SERVER_NAME']."/");
    }else{
        include("../redireccion.php");
    }
}else{
    header("Location: http://".$_SERVER['SERVER_NAME']."/");
}
?>

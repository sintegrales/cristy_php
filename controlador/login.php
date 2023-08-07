<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once('../conexion.php');
    require_once('../modelo/login.php');

    $user = $_GET['user'];
    $cla = $_GET['clave'];
    $log = new login($conexion);

    $datos=$log->consulta($user, $cla);
    

    $cad=json_encode($datos);
    echo $cad;
    header('Content-Type: application/json');
?>
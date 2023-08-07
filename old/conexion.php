<?php
    $servidor = "localhost";
    $usuario = "u569832097_admin";
    $clave = "Nicolas-13";
    $bd = "u569832097_cristy"; 

    $conexion = mysqli_connect($servidor, $usuario,$clave) or die("no se conecton a mysql");
    mysqli_select_db($conexion, $bd) or die("no encontro la base de datos");
    mysqli_set_charset($conexion,"utf8");

?>
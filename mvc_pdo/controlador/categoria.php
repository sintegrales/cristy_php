<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once('../conexion.php');
    require_once('../modelo/categoria.php');

    $cate = new Categoria();

    $control = $_GET['control'];

    switch($control){
        case 'con':
            $datos = $cate->consulta();
            print_r($datos);
        break;
            
            /* $cad=json_encode($vec);
            echo $cad;
            header('Content-Type: application/json'); */
    }

?>
<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once('../conexion.php');
    require_once('../modelo/usuario.php');

    $control = $_GET['control'];
    $cate = new usuario($conexion);

    switch($control){
        case 'con':
            $datos = $cate->consulta();
            //print_r($datos);
        break;
        case 'ins':
            $json = file_get_contents('php://input');
            $params = json_decode($json);
            $datos = $cate->insertar($params);
            //print_r($datos);
        break;
        case 'del':
            $id = $_GET['id'];
            $datos = $cate->borrar($id);
            //print_r($datos);
        break;
        case 'edi':
            $json = file_get_contents('php://input');
            $params = json_decode($json);
            $id = $_GET['id'];
            $datos = $cate->editar($id, $params);
            //print_r($datos);
        break;
        case 'fil':
            $dato = $_GET['dato'];
            $datos = $cate->filtro($dato);
            //print_r($datos);
        break;
    } 

    $cad=json_encode($datos);
    echo $cad;
    header('Content-Type: application/json');
?>
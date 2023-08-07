<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once('../conexion.php');
    require_once('../modelo/pedido.php');

    $control = $_GET['control'];
    $cate = new pedido($conexion);

    switch($control){
        case 'con':
            $datos = $cate->consulta();
            //print_r($datos);
        break;
        case 'ins':
            $json = file_get_contents('php://input');
            $params = json_decode($json);
            $productos = serialize($params->productos);
            $datos = $cate->insertar($params, $productos);
            //print_r($datos);
        break;
        case 'can':
            $id = $_GET['id'];
            $datos = $cate->cancelar($id);
            //print_r($datos);
        break;
        case 'edi':
            $json = file_get_contents('php://input');
            $params = json_decode($json);
            $id = $_GET['id'];
            $datos = $cate->editar($id, $params);
            //print_r($datos);
        break;
        case 'pro':
            $id = $_GET['id'];
            $datos = $cate->productos($id);
        break;
    } 

    $cad=json_encode($datos);
    echo $cad;
    header('Content-Type: application/json');
?>
<?php
    header('Access-Control-Allow-Origin: *'); 
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

    require_once('../conexion.php');
    require_once('../modelo/cliente.php');

    $control = $_GET['control'];
    $cate = new cliente($conexion);

    switch($control){
        case 'con':
            $datos = $cate->consulta();
            //print_r($datos);
        break;
        case 'coni':
            $dato = $_GET['ident'];
            $datos = $cate->consultai($dato);
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
        case 'ciu':
            $id_dpto = $_GET['idpto'];
            $datos = $cate->conciudad($id_dpto);
            //print_r($datos);
        break;
        case 'dpt':
            $datos = $cate->condpto();
            //print_r($datos);
        break;
        /* case 'fil':
            $dato = $_GET['dato'];
            $datos = $cate->filtro($dato);
            //print_r($datos);
        break; */
    } 

    $cad=json_encode($datos);
    echo $cad;
    header('Content-Type: application/json');
?>
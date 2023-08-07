<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input');
  //$json = '{"codigo":"003", "nombre":"Prueba", "fo_cate": "1", "fo_marca": "1", "precio":"100000", "descripcion": "asdsa asdas"}';
 
  $params = json_decode($json);

  /*echo "<pre>";
  print_r($params);
  echo "</pre><hr>";*/

  $id = $_GET['id'];
  
  require("../conexion.php");
  
  $editar = "UPDATE producto SET codigo='$params->codigo', nombre='$params->nombre', fo_cate=$params->fo_cate, fo_marca=$params->fo_marca, precio=$params->precio, descripcion='$params->descripcion' WHERE id_producto=$id";
  
  mysqli_query($conexion, $editar) or die('no edito'); 
  
  $vec=[]; 
  $vec['resultado']="OK";
  $vec['mensje']="Registro editado";

  header('Content-Type: application/json');
  echo json_encode($vec); 
?>
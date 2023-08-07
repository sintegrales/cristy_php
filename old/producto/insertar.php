<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input');
  //$json = '{"codigo":"003", "nombre":"Prueba", "fo_cate": "1", "fo_marca": "1", "precio":"100000", "descripcion": "asdsa asdas"}';
 
  $params = json_decode($json);

 
  require("../conexion.php");
  
  $ins = "INSERT INTO producto(codigo, nombre, fo_cate, fo_marca, precio, descripcion) 
          VALUES('$params->codigo','$params->nombre', $params->fo_cate, $params->fo_marca, $params->precio, '$params->descripcion')";
  
 mysqli_query($conexion, $ins) or die('no inserto');
  
  $vec=[]; 
  $vec['resultado']="OK";
  $vec['mensje']="Datos grabados";
  

  header('Content-Type: application/json');
  echo json_encode($vec);
?>
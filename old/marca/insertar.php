<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input');
 
  $params = json_decode($json);
  
  require("../conexion.php");
  
  $ins = "INSERT INTO marca(nombre) VALUES('$params->nombre')";
  
  mysqli_query($conexion, $ins) or die('no inserto');
  
  $vec=[]; 
  $vec['resultado']="OK";
  $vec['mensje']="Datos grabados";
  

  header('Content-Type: application/json');
  echo json_encode($vec);  
?>
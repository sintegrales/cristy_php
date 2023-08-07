<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input');
 
  $params = json_decode($json);
  $id = $_GET['id'];
  
  require("../conexion.php");
  
  $editar = "UPDATE categoria SET nombre='$params->nombre' WHERE id_cate=$id";
  mysqli_query($conexion, $editar) or die('no edito'); 
  
  $vec=[]; 
  $vec['resultado']="OK";
  $vec['mensje']="Registro editado";

  header('Content-Type: application/json');
  echo json_encode($vec);  
?>
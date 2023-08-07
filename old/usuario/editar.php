<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input');
 
  $params = json_decode($json);
  $id = $_GET['id'];
  
  require("../conexion.php");
  
  $editar = "UPDATE usuario SET nombre='$params->nombre', email='$params->email', clave=sha1('$params->clave'), rol='$params->rol', estado='$params->estado'  WHERE id_usuario=$id";
  mysqli_query($conexion, $editar) or die('no edito'); 
  
  $vec=[]; 
  $vec['resultado']="OK";
  $vec['mensje']="Registro editado";

  header('Content-Type: application/json');
  echo json_encode($vec);  
?>
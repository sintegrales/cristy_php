<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  require("../conexion.php");
  
  $del = "DELETE FROM usuario WHERE id_usuario=".$_GET['id'];
  mysqli_query($conexion,$del) or die("no elimino");
    
  
  $vec=[]; 
  $vec['resultado']="OK";
  $vec['mensje']="Registro Eliminado";

  header('Content-Type: application/json');
  echo json_encode($vec);  
?>
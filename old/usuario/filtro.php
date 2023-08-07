<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  require("../conexion.php");

  $dato = $_GET['dato'];
  
  $con = "SELECT * from usuarios WHERE nombre LIKE '%$dato%' OR email LIKE '%$dato%' OR rol LIKE '%$dato%'";
  $res=mysqli_query($conexion,$con) or die('no consulto usuarios');

  
  $vec=[];  
  while ($reg=mysqli_fetch_array($res))  
  {
    $vec[]=$reg;
  }
  
  $cad=json_encode($vec);
  echo $cad;
  header('Content-Type: application/json');
?>
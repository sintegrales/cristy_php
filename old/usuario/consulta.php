<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

   
  require("../conexion.php");
  
  $limite = $_GET['limite'];

  $con = "SELECT * from usuario ORDER BY nombre";
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
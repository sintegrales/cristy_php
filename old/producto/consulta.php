<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

   
  require("../conexion.php");
  
  $limite = $_GET['limite'];

  $con = "SELECT p.*, c.nombre AS categoria, m.nombre AS marca FROM producto p 
          INNER JOIN categoria c ON p.fo_cate = c.id_cate
          INNER JOIN marca m ON p.fo_marca = m.id_marca
          ORDER BY p.nombre LIMIT $limite,5";

  $res=mysqli_query($conexion,$con) or die('no consulto producto');

  
  $vec=[];  
  while ($reg=mysqli_fetch_array($res))  
  {
    $vec[]=$reg;
  }
  
  $cad=json_encode($vec);
  echo $cad;
  header('Content-Type: application/json');
?>
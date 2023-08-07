<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

   
  require("../conexion.php");
  
  $id = $_GET['id'];

  $con = "SELECT imagenes FROM producto WHERE id_producto = $id";

  $res=mysqli_query($conexion,$con) or die('no consulto producto');

  
  $reg=mysqli_fetch_array($res);  
  
  echo $reg[0];
  header('Content-Type: application/json');
?>
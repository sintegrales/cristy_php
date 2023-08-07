<?php
    class login{
        
        public $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function consulta($user, $cla){
            $con = "SELECT * from usuario WHERE email='$user' AND clave=sha1('$cla')";
            $res=mysqli_query($this->conexion,$con) or die('no consulto ');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }

            if($vec==[]){
                $vec[0] = array("validar"=>"no valida");
            }else{
                $vec[0]['validar']="valida";
            }

            return $vec;
        }

        

    }
?>
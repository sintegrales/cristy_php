<?php
    class categoria{
        
        public $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con = "SELECT * from categoria ORDER BY nombre";
            $res=mysqli_query($this->conexion,$con) or die('no consulto categoria');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO categoria(nombre) VALUES('$params->nombre')";
            mysqli_query($this->conexion, $ins) or die('no inserto');
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Datos grabados";
            return $vec;
        }

        public function borrar($id){
            $del = "DELETE FROM categoria WHERE id_cate=$id";
            mysqli_query($this->conexion,$del) or die("no elimino");
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Registro Eliminado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE categoria SET nombre='$params->nombre' WHERE id_cate=$id";
            mysqli_query($this->conexion, $editar) or die('no edito'); 
            
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensje']="Registro editado";
            return $vec;
        }

        public function filtro($dato){
            $con = "SELECT * from categoria WHERE nombre LIKE '%$dato%'";
            $res=mysqli_query($this->conexion,$con) or die('no consulto categoria');
            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

    }
?>
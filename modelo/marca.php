<?php
    class marca{
        
        public $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con = "SELECT * from marca ORDER BY nombre";
            $res=mysqli_query($this->conexion,$con) or die('no consulto marca');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO marca(nombre) VALUES('$params->nombre')";
            mysqli_query($this->conexion, $ins) or die('no inserto');
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Datos grabados";
            return $vec;
        }

        public function borrar($id){
            $del = "DELETE FROM marca WHERE id_marca=$id";
            mysqli_query($this->conexion,$del) or die("no elimino");
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Registro Eliminado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE marca SET nombre='$params->nombre' WHERE id_marca=$id";
            mysqli_query($this->conexion, $editar) or die('no edito'); 
            
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensje']="Registro editado";
            return $vec;
        }

        public function filtro($dato){
            $con = "SELECT * from marca WHERE nombre LIKE '%$dato%'";
            $res=mysqli_query($this->conexion,$con) or die('no consulto');
            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

    }
?>
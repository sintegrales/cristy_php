<?php
    class cliente{
        
        public $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con = "SELECT cl.*, ci.nombre AS ciudad, dp.nombre AS dpto FROM cliente cl
                        INNER JOIN ciudad ci ON cl.fo_ciudad = ci.id_ciudad
                        INNER JOIN dpto dp ON cl.fo_dpto = dp.id_dpto
                        ORDER BY nombre";
            $res=mysqli_query($this->conexion,$con) or die('no consulto');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function consultai($dato){
            $con = "SELECT cl.*, ci.nombre AS ciudad, dp.nombre AS dpto FROM cliente cl 
                            INNER JOIN ciudad ci ON cl.fo_ciudad = ci.id_ciudad 
                            INNER JOIN dpto dp ON cl.fo_dpto = dp.id_dpto 
                            WHERE cl.ident LIKE '%$dato%' OR cl.nombre LIKE '%$dato%' OR cl.celular LIKE '%$dato%' OR cl.direccion LIKE '%$dato%' OR ci.nombre LIKE '%$dato%' 
                            ORDER BY nombre;";
            $res=mysqli_query($this->conexion,$con) or die('no consulto');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO cliente(ident, nombre, direccion, celular, email, fo_ciudad, fo_dpto) 
                    VALUES('$params->ident', '$params->nombre', '$params->direccion', '$params->celular', '$params->email', $params->fo_ciudad, $params->iddpto)";
            mysqli_query($this->conexion, $ins) or die('no inserto');
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Datos grabados";
            return $vec;
        }

        public function borrar($id){
            $del = "DELETE FROM cliente WHERE id_cliente=$id";
            mysqli_query($this->conexion,$del) or die("no elimino");
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Registro Eliminado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE cliente SET ident='$params->ident', nombre='$params->nombre', direccion='$params->direccion', celular='$params->celular', email='$params->email', fo_ciudad=$params->fo_ciudad WHERE id_cliente=$id";
            mysqli_query($this->conexion, $editar) or die('no edito'); 
            
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensje']="Registro editado";
            return $vec;
        }

        public function condpto(){
            $con = "SELECT * from dpto ORDER BY nombre";
            $res=mysqli_query($this->conexion,$con) or die('no consulto');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function conciudad($id_dpto){
            $con = "SELECT * from ciudad WHERE fo_dpto = $id_dpto ORDER BY nombre";
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
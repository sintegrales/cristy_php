<?php
    class producto{
        
        public $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con = "SELECT p.*, c.nombre AS categoria, m.nombre AS marca FROM producto p 
                        INNER JOIN categoria c ON p.fo_cate = c.id_cate
                        INNER JOIN marca m ON p.fo_marca = m.id_marca
                        ORDER BY categoria";
            $res=mysqli_query($this->conexion,$con) or die('no consulto marca');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function consultauno($id){
            $con = "SELECT p.*, c.nombre AS categoria, m.nombre AS marca FROM producto p 
                        INNER JOIN categoria c ON p.fo_cate = c.id_cate
                        INNER JOIN marca m ON p.fo_marca = m.id_marca
                        WHERE p.id_producto = $id
                        ORDER BY p.nombre";
            $res=mysqli_query($this->conexion,$con) or die('no consulto marca');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO producto(codigo, nombre, fo_cate, fo_marca, precio, descripcion, promo) 
                    VALUES('$params->codigo','$params->nombre', $params->fo_cate, $params->fo_marca, $params->precio, '$params->descripcion', '$params->promo')";
            mysqli_query($this->conexion, $ins) or die('no inserto');
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Datos grabados";
            return $vec;
        }

        public function borrar($id){
            $del = "DELETE FROM producto WHERE id_producto=$id";
            mysqli_query($this->conexion,$del) or die("no elimino");
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Registro Eliminado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE producto SET codigo='$params->codigo', nombre='$params->nombre', fo_cate=$params->fo_cate, fo_marca=$params->fo_marca, precio=$params->precio, descripcion='$params->descripcion', promo='$params->promo' WHERE id_producto=$id";
            mysqli_query($this->conexion, $editar) or die('no edito'); 
            
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensje']="Registro editado";
            return $vec;
        }

        public function filtro($dato){
            $con = "SELECT p.*, c.nombre AS categoria, m.nombre AS marca FROM producto p 
                        INNER JOIN categoria c ON p.fo_cate = c.id_cate
                        INNER JOIN marca m ON p.fo_marca = m.id_marca
                        WHERE p.nombre LIKE '%$dato%' OR c.nombre LIKE '%$dato%' OR m.nombre LIKE '%$dato%' OR codigo LIKE '%$dato%' 
                        ORDER BY p.nombre LIMIT 0,5;";
            $res=mysqli_query($this->conexion,$con) or die('no consulto');
            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function verimg($id){
            $con = "SELECT imagenes FROM producto WHERE id_producto = $id";
            $res=mysqli_query($this->conexion,$con) or die('no consulto');

            $vec=mysqli_fetch_array($res);   
            
            return $vec;
        }

        public function promocion(){
            $con = "SELECT p.*, c.nombre AS categoria, m.nombre AS marca FROM producto p 
                        INNER JOIN categoria c ON p.fo_cate = c.id_cate
                        INNER JOIN marca m ON p.fo_marca = m.id_marca
                        WHERE promo = 'SI' 
                        ORDER BY p.nombre";
            $res=mysqli_query($this->conexion,$con) or die('no consulto marca');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function ultimos(){
            $con = "SELECT p.*, c.nombre AS categoria, m.nombre AS marca FROM producto p 
                        INNER JOIN categoria c ON p.fo_cate = c.id_cate
                        INNER JOIN marca m ON p.fo_marca = m.id_marca
                        ORDER BY id_producto DESC Limit 12";
            $res=mysqli_query($this->conexion,$con) or die('no consulto marca');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }


    }
?>
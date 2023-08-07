<?php
    class pedido{
        
        public $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con = "SELECT p.*, c.*, ci.nombre AS ciudad, d.nombre AS dpto FROM pedido p
                        INNER JOIN cliente c ON p.fo_cliente = c.id_cliente
                        INNER JOIN ciudad ci ON c.fo_ciudad = ci.id_ciudad
                        INNER JOIN dpto d ON c.fo_dpto = d.id_dpto
                        ORDER BY fecha DESC";
            $res=mysqli_query($this->conexion,$con) or die('no consulto');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function insertar($params, $productos){
            $ins = "INSERT INTO pedido(fecha, fo_cliente, productos, subtotal, envio, total, notas) 
                    VALUES('$params->fecha', $params->fo_cliente, '$productos', $params->subtotal, $params->envio, $params->total, '$params->notas')";
            mysqli_query($this->conexion, $ins) or die('no inserto');
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Datos grabados";
            return $vec;
        }

        public function cancelar($id){
            $del = "UPDATE pedido SET cancelado='SI' WHERE id_pedido=$id";
            mysqli_query($this->conexion,$del) or die("no elimino");
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Registro Cancelado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE pedido SET fecha='$params->fecha', fo_cliente=$params->fo_cliente, productos='$params->productos', subtotal=$params->subtotal, envio=$params->envio, total=$params->total, notas='$params->notas' WHERE id_pedido=$id";
            mysqli_query($this->conexion, $editar) or die('no edito'); 
            
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensje']="Registro editado";
            return $vec;
        }

        public function productos($id){
            $con = "SELECT productos FROM pedido WHERE id_pedido = $id";
            $res=mysqli_query($this->conexion,$con) or die('no consulto');
            $pro = mysqli_fetch_array($res);
            $vec = unserialize($pro[0]);
            return $vec;
        }

    }
?>
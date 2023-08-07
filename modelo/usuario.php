<?php
    class usuario{
        
        public $conexion;

        public function __construct($conexion)
        {
            $this->conexion = $conexion;
        }

        public function consulta(){
            $con = "SELECT * from usuario ORDER BY nombre";
            $res=mysqli_query($this->conexion,$con) or die('no consulto marca');

            $vec=[];  
            while ($reg=mysqli_fetch_array($res))  
            {
                $vec[]=$reg;
            }
            return $vec;
        }

        public function insertar($params){
            $ins = "INSERT INTO usuario(nombre, email, clave, rol) VALUES('$params->nombre', '$params->email', sha1('$params->clave'), '$params->rol')";
            mysqli_query($this->conexion, $ins) or die('no inserto');
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Datos grabados";
            return $vec;
        }

        public function borrar($id){
            $del = "DELETE FROM usuario WHERE id_usuario=$id";
            mysqli_query($this->conexion,$del) or die("no elimino");
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensaje']="Registro Eliminado";
            return $vec;
        }

        public function editar($id, $params){
            $editar = "UPDATE usuario SET nombre='$params->nombre', email='$params->email', clave=sha1('$params->clave'), rol='$params->rol', estado='$params->estado'  WHERE id_usuario=$id";
            mysqli_query($this->conexion, $editar) or die('no edito'); 
            
            $vec=[]; 
            $vec['resultado']="OK";
            $vec['mensje']="Registro editado";
            return $vec;
        }

        public function filtro($dato){
            $con = "SELECT * from usuarios WHERE nombre LIKE '%$dato%' OR email LIKE '%$dato%' OR rol LIKE '%$dato%'";
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
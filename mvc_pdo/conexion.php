<?php
    class Conexion{
        public $servidor, $usuario, $clave, $bd, $driver, $charset; 

        public function __construct()
        {
            $this->driver = "mysql";
            $this->servidor = "localhost";
            $this->usuario = "u569832097_admin";
            $this->clave = "Nicolas-13";
            $this->bd = "u569832097_cristy";     
            $this->charset = "utf8";
        }

        protected function conexion(){
            try{
                $pdo = new PDO("$this->driver:host=$this->servidor; dbname=$this->bd; charset=$this->charset", $this->usuario, $this->clave);
                return $pdo;
            }catch(PDOException $mensaje){
                echo $mensaje->getMessage();
            }
        }
    }

?>
<?php
    require_once('../conexion.php');
    class Categoria extends Conexion{
        
        private $pdo;

        public function __construct()
        {
            $this->pdo = $this->conexion();    
        }

        public function consulta(){
            try{
                $con = $this->pdo->prepare("SELECT * from categoria ORDER BY nombre");
                $con->execute();
                return $con->fetchAll(PDO::FETCH_ASSOC);
            }catch(PDOException $mensaje){
                echo $mensaje->getMessage();
            }
        }

        public function insertar($dato){
            try{
                $con = $this->pdo->prepare("INSERT INTO categoria(nombre) VALUES('?')");
                $con->execute($dato);
            }catch(PDOException $mensaje){
                echo $mensaje->getMessage();
            }
        }

        public function borrar($id){
            try{
                $con = $this->pdo->prepare("DELETE FROM categoria WHERE id_cate=?");
                $con->execute([$id]);
            }catch(PDOException $mensaje){
                echo $mensaje->getMessage();
            }
        }

        public function editar($id, $dato){
            try{
                $con = $this->pdo->prepare("UPDATE categoria SET nombre=? WHERE id_cate=?");
                $con->execute($dato);
            }catch(PDOException $mensaje){
                echo $mensaje->getMessage();
            }
        }


    }
?>
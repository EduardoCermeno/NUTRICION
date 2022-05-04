<?php 
     require_once 'Conexion.php';
    class EliminarEncargadoPaciente extends Conectar{

        public function eliminaencargadopaciente($idencargado){
           
                $conexion=Conectar::conexion();
                $sql="DELETE FROM tb_encargadopaciente where Id_EncargadoPaciente=?";
                $query=$conexion->prepare($sql);
                $query->bind_param('i',$idencargado);
                $respuesta=$query->execute();
                
                return $respuesta;
                
                

        }

    }



?>
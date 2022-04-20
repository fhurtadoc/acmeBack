<?php

class Conexion{
    private $host   ="bfoz3v67dffbceoi7uh3-mysql.services.clever-cloud.com";
    private $usuario="uzkgb0sreyuz1zuk";
    private $clave  ="uzkgb0sreyuz1zuk";
    private $db     ="bfoz3v67dffbceoi7uh3";
    public $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli ($this->host, $this->usuario, $this->clave,$this->db);
    }

    public function query($query){                             
        $resultado=$this->conexion->query($query);        
        if($resultado){
            return $this->conexion->insert_id;
        }else{
            return 'error query';
        }
    }

    public function getArray($query){
    $resultado=$this->conexion->query($query);        
        if($resultado){
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }else{
            return 'error query';
        }
    }

} 


?>
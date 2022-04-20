<?php

class Conexion{
    private $host   ="localhost";
    private $usuario="codigodeplaton";
    private $clave  ="12345";
    private $db     ="acme";
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
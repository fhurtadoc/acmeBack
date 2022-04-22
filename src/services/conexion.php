<?php

class Conexion{
    private $host   ="bwoxoohyve5xvcagbqu7-mysql.services.clever-cloud.com";
    private $usuario="uj243zlxdbpx69ow";
    private $clave  ="CpMvdN9wcSgpkEi54QpD";
    private $db     ="bwoxoohyve5xvcagbqu7";
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
<?php
    include_once('conexion.php');    

    class Singleton {
        
        private static $conexion_singleton;

        public final function __construct(){         
        }      
    
        public static function getConnect(){
            if(!isset(self::$conexion_singleton)){
                self::$conexion_singleton=new Conexion;
            }
            return self::$conexion_singleton;
        }


    }
?>
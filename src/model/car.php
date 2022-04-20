<?php
include_once("src/services/singleton.php");

class Car {


    public function __construct()
    {
        
    }

    public function createCar($car){
        $db= Singleton::getConnect();
        $license=$car['license'];
        $brand=$car['brand'];
        $type_car=$car['type_car'];
        $sql="INSERT INTO cars (license, brand, type_car )
        VALUES ( '$license', '$brand', $type_car)";
        $res=$db->query($sql);
        if($res){                   
            return $res;
        }else{
            return "error ejecucion";
        }
    }

    public function list_typeCar(){
        $db= Singleton::getConnect();
        $sql="SELECT name from type";
        $res=$db->getArray($sql);
        if($res){                   
            return $res;
        }else{
            return "error ejecucion";
        }
    }

    public function list_Cars(){
        $db= Singleton::getConnect();
        $sql="SELECT c.license, c.brand, t.name , owner.name as owner_name , owner.id as owner_id, driver.name as driver_name, driver.id  as driver_id  from cars c 
        inner join users owner on c.owner=owner.id
        inner join drivers d on d.id_car=c.id
        inner join users driver on driver.id=d.id_user
        inner join `type` t on t.id_type=c.type_car";
        $res=$db->getArray($sql);
        if($res){                   
            return $res;
        }else{
            return "error ejecucion";
        }
    }

    public function CarFor_id($id){
        $db= Singleton::getConnect();
        $sql="SELECT c.license, c.brand, c.type_car,  u.name as owner  from cars c 
        inner join users u on u.id = c.owner 
        where c.id=$id";
        $res=$db->getArray($sql);
        if($res){                   
            return $res;
        }else{
            return $res;
        }
    }

    public function carsoutDriver(){
        $db= Singleton::getConnect();
        $sql="SELECT c.id, c.license, c.brand  from cars c  
        INNER join drivers d on c.id <>d.id_car";
        $res=$db->getArray($sql);
        if($res){                   
            return $res;
        }else{
            return "error ejecucion";
        }
    }
    
    public function asingCar($id_car, $id_user){
        $db= Singleton::getConnect();
        $sql="INSERT into drivers (id_user, id_car) values ($id_car, $id_user)";        
        $res=$db->query($sql);
        if($res){                   
            return $res;
        }else{
            return "error ejecucion";
        }
    }

    


}

?>
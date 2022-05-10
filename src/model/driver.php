<?php
    include_once('I_user.php');

    class Driver implements I_user {

        public function __construct(){
        
        }

        public function create_user($user){
            $db= Singleton::getConnect();
            $name=$user['name'];
            $id_card=$user['id_card'];
            $second_name =$user['second_name'];
            $last_name=$user['last_name'];
            $address =$user['address'];
            $phone =$user['phone'];
            $city=$user['city'];
            $rol=$user['rol'];
            $sql="INSERT INTO users (name ,second_name ,last_name ,address ,phone ,city, rol, id_card) VALUES ('$name','$second_name','$last_name','$address','$phone','$city', $rol,  '$id_card')";
            $res=$db->query($sql);            
            if($res){                   
                return $res;
            }else{
                return $res;
            }            
        }

        public function listAll_user($rol){
            $db= Singleton::getConnect();
            $sql="SELECT u.id, u.id_card, CONCAT_WS(' ', u.name, u.second_name, u.last_name) as name ,u.address, u.phone,  u.city, r.name as rol FROM users u
            join rols r on r.id=u.rol
            WHERE rol=$rol";
            $res=$db->getArray($sql);
            if($res){                   
                return $res;
            }else{
                return $res;
            }
        }

        public function userFor_id($id, $rol){            
            $db= Singleton::getConnect();
            $sql="SELECT * FROM users WHERE rol=$rol and id=$id";
            $res=$db->getArray($sql);
            if($res){                   
                return $res;
            }else{
                return $res;
            }
        }

        public function list_drivers_outcars($rol){
            $db= Singleton::getConnect();
            $sql="SELECT * from users u
            where id not in (SELECT d.id_user from drivers d) and rol=1";
            $res=$db->getArray($sql);
            if($res){                   
                return $res;
            }else{
                return $res;
            }

        }
    }

?>
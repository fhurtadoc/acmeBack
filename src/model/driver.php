<?php
    include_once('I_user.php');

    class Driver implements I_user {

        public function __construct(){
        
        }

        public function create_user($user){
            $db= Singleton::getConnect();
            $name=$user['name'];
            $second_name =$user['second_name'];
            $last_name=$user['last_name'];
            $address =$user['address'];
            $phone =$user['phone'];
            $city=$user['city'];
            $rol=$user['rol'];
            $sql="INSERT INTO users (name ,second_name ,last_name ,address ,phone ,city, rol) VALUES ('$name','$second_name','$last_name','$address','$phone','$city', $rol)";
            $res=$db->query($sql);            
            if($res){                   
                return $res;
            }else{
                return $res;
            }            
        }

        public function listAll_user($rol){
            $db= Singleton::getConnect();
            $sql="SELECT * FROM users WHERE rol=$rol";
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
            INNER join drivers d on u.id <> d.id_user 
            WHERE rol=1";
            $res=$db->getArray($sql);
            if($res){                   
                return $res;
            }else{
                return $res;
            }

        }
    }

?>
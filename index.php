<?php
include_once('src/model/car.php');
include_once('src/model/driver.php');
include_once('src/model/owners.php');


header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}
$car_new= new Car();
$driver_new= new Driver();
$owner_new= new Owners();

if(isset($_GET['action'])){    
    switch($_GET['action']){
        
        //CRUD DRIVER

        case 'create_driver':
            $user=$_POST;            
            $estado=[];
            if( 
                !empty($user['name']) &&                  
                !empty($user['id_card']) &&  
                !empty($user['last_name']) &&
                !empty($user['address']) &&
                !empty($user['phone']) &&
                !empty($user['city'])                
            )
            {
                $user['rol']=1;
                $inserUser=$driver_new->create_user($user);
                if($inserUser){
                    $estado=array("http"=>200, "mensaje"=>"creado correctamente", 'id'=>$inserUser);
                }                
            }else{
                $estado=array("http"=>400, "mensaje"=>"bad_request because vars");
            }

        echo json_encode($estado);

        break;

        case 'list_drivers':
            $rol=1;
            $list_drivers=$driver_new->listAll_user($rol);            
            echo json_encode($list_drivers);
            

        break;

        case 'list_drivers_outcars':
            $rol=1;
            $list_drivers=$driver_new->list_drivers_outcars($rol);            
            echo json_encode($list_drivers);
            

        break;

        case 'driversFor_id':
            $rol=1;
            $id=$_GET['id'];
            $list_drivers=$driver_new->userFor_id($id, $rol);
            echo json_encode($list_typeCar);
        break;

        //CRUD OWNER

        case 'create_owner':            
            $user=$_POST;            
            $estado=[];
            if( 
                !empty($user['name']) &&                  
                !empty($user['id_card']) &&  
                !empty($user['last_name']) &&
                !empty($user['address']) &&
                !empty($user['phone']) &&
                !empty($user['city'])                
            )
            {
                $user['rol']=2;
                $inserUser=$owner_new->create_user($user);
                $estado=array("http"=>200, "mensaje"=>"creado correctamente", 'id'=>$inserUser);
            }else{
                $estado=array("http"=>400, "mensaje"=>"bad_request because vars");
            }
        echo json_encode($estado);

        break;

        case 'list_owner':
            $rol=2;
            $list_drivers=$owner_new->listAll_user($rol);
            echo json_encode($list_drivers);
        break;
    
        
        //CRUD CAR

        

        case 'create_car':
            $car=$_POST;            
            $estado=[];            
            if( !empty($car['license']) &&  !empty($car['brand']) &&  !empty($car['type_car']) &&  !empty($car['owner']))
            {                
                $inserCar=$car_new->createCar($car);
                $estado=array("http"=>200, "mensaje"=>"creado correctamente", 'id'=>$inserCar);
                //echo $inserCar;
            }else{
                $estado=array("http"=>400, "mensaje"=>"bad_request because vars");
            }

        echo json_encode($estado);

        break;

        case 'list_typeCar':
            $list_typeCar=$car_new->list_typeCar();
            echo json_encode($list_typeCar);            
        break;

        case 'carsoutDriver':
            $list_typeCar=$car_new->carsoutDriver();
            echo json_encode($list_typeCar);            
        break;

        case 'list_Cars':            
            $list_typeCar=$car_new->list_Cars();
            echo json_encode($list_typeCar);
        break;

        case 'CarFor_id':
            
            $id=$_GET['id'];
            $list_typeCar=$car_new->CarFor_id($id);
            echo json_encode($list_typeCar);
        break;

        case 'assign_car':
            $estado=[];            
            $id_user=$_POST['id_user'];
            $id_car=$_POST['id_car'];
            if( !empty($id_user=$_POST['id_user']) &&  !empty($id_car=$_POST['id_car'])){
                $assing_car=$car_new->asingCar($id_car, $id_user);
                //echo $assing_car;
                $estado=array("http"=>200, "mensaje"=>"creado correctamente", 'id'=>$assing_car);
                
            }else{
                $estado=array("http"=>400, "mensaje"=>"bad_request because vars");
            }
        echo json_encode($estado);
        break;




    }
}

?>
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../../config/Database.php';
    include_once '../../class/WorkerShift.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new WorkerShift($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->workerId = $data->workerId;
    $item->shiftId = $data->shiftId;
    $item->date = $data->date;
    
    $dataFetch = $item->getSingleWorkerShiftByDate($item->date,$item->workerId);
    $itemCount = $dataFetch->rowCount();
    
    
    if($itemCount>0){
        http_response_code(404);
        echo json_encode(array("message" => "Worker already registered for this date. One Worker can join a single shift per day"));
    }else{
        if($item->createWorkerShift()){
            echo 'Worker created successfully.';
        } else{
            echo 'Worket could not be created.';
        }
    }

        
    /*if($item->createWorkerShift($item->workerId,$item->shiftId,$item->date)){
        echo 'Worker Shift created successfully.';
    } else{
        echo 'Worker could not be created.';
    }*/
?>
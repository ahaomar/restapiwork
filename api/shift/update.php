<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../../config/Database.php';
    include_once '../../class/Shift.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new Shift($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    
    // shift values
    $item->title = $data->title;
    
    if($item->updateShift()){
        echo json_encode("Shifts data updated.");
    } else{
        echo json_encode("Shifts could not be updated");
    }
?>
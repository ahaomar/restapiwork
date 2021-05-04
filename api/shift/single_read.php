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

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();

    $rowData = $item->getSingleShift();
   

    if($rowData["title"] != null){
        
   
        // create array
        $shiftArr = array(
            "id" =>  $rowData["id"],
            "title" => $rowData["title"]
        );
        echo json_encode($shiftArr);
        http_response_code(200);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Shift not found.");
    }
?>
<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/Database.php';
    include_once '../../class/Shift.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new Shift($db);

    $stmt = $items->getShifts();

    $itemCount = $stmt->rowCount();



    if($itemCount > 0){
        
        $shiftsArr = array();
        $shiftsArr["body"] = array();
        $shiftsArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "title" => $title
            );

            array_push($shiftsArr["body"], $e);
        }
        echo json_encode($shiftsArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>
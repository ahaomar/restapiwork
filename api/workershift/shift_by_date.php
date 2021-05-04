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

    $item->date = isset($_GET['date']) ? $_GET['date'] : die();
    $stmt = $item->getShiftByDate($item->date);
    $itemCount = $stmt->rowCount();


     if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        $employeeArr["itemCount"] = $itemCount;

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "workerId" => $workerId,
                "workerName" => $workerName,
                "shiftId" => $shiftId,
                "shiftName" => $shiftName,
                "date" => $date
            );

            array_push($employeeArr["body"], $e);
        }
        echo json_encode($employeeArr);
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>
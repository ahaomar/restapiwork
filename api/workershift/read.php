<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../../config/Database.php';
    include_once '../../class/WorkerShift.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new WorkerShift($db);

    $stmt = $items->getWorkersShift();
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
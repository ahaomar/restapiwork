<?php
    class WorkerShift{

        // Connection
        private $conn;

        // Table
        private $db_table = "workershift";

        // Columns
        public $id;
        public $workerId;
        public $workerName;
        public $shiftId;
        public $shiftName;
        public $date;

        /**
         * [__construct description]
         * @param object $db 
         */
        public function __construct($db){
            $this->conn = $db;
        }

        /**
         * [getWorkersShift Get Worker shift by workerId and and ShiftId]
         * @return PDO Query Data
         */
        public function getWorkersShift(){
            $sqlQuery = "SELECT 
            w.id as workerId ,
            w.name as workerName ,
            s.id as shiftId ,
            s.title as shiftName ,
            ws.date  as date
            FROM worker as w, shift as s, workershift as ws 
            WHERE ws.workerid = w.id AND ws.shiftid = s.id";

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        /**
         * @param  int workerId
         * @return PDO
         */
        public function getSingleWorkerShift($workerId){
            $sqlQuery = "SELECT 
            w.id as workerId ,
            w.name as workerName ,
            s.id as shiftId ,
            s.title as shiftName ,
            ws.date  as date
            FROM worker as w, shift as s, workershift as ws 
            WHERE ws.workerid = w.id AND ws.shiftid = s.id AND w.id = ".$workerId;

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }        


        /** [getShiftByDate Get the shift data by date wise] */
        /**
         * [getShiftByDate description]
         * @param  date $date [description]
         * @return PDO [query result from database]
         */
        public function getShiftByDate($date){
            $sqlQuery = "SELECT 
            w.id as workerId ,
            w.name as workerName ,
            s.id as shiftId ,
            s.title as shiftName ,
            ws.date  as date
            FROM worker as w, shift as s, workershift as ws 
            WHERE ws.workerid = w.id AND ws.shiftid = s.id AND ws.date = ".$date;

            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;

        }     


        /**
         * [getSingleWorkerShiftByDate - Get Single worker shift by date]
         * @param  date $date     [date will be passed format YYYY-MM-DD]
         * @param  int $workerId [worker id will be passed]
         * @return PDO $stmt [db record output]
         */
        public function getSingleWorkerShiftByDate($date,$workerId){
            $sqlQuery = "SELECT 
            w.id as workerId ,
            w.name as workerName ,
            s.id as shiftId ,
            s.title as shiftName ,
            ws.date  as date
            FROM worker as w, shift as s, workershift as ws 
            WHERE ws.workerid = w.id AND ws.shiftid = s.id AND ws.date = '".$date."'
            AND w.id = ".$workerId;
           
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }           


        /**
         * createWorkerShift - create worker shift data
         * @return PDO $stmt
         */
        public function createWorkerShift(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        workerId  = :workerId, 
                        shiftId = :shiftId, 
                        date = :date";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->workerId=htmlspecialchars(strip_tags($this->workerId));
            $this->shiftId=htmlspecialchars(strip_tags($this->shiftId));
            $this->date=htmlspecialchars(strip_tags($this->date));
        
            // bind data
            $stmt->bindParam(":workerId", $this->workerId);
            $stmt->bindParam(":shiftId", $this->shiftId);
            $stmt->bindParam(":date", $this->date);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        /**
         * [deleteWorkerShift Delete the record
         * @param  date $date    
         * @param  int $workerId 
         * @return boolen true/flase        
         */
        function deleteWorkerShift($date,$workerId){
            $sqlQuery = "DELETE FROM workershift WHERE date='" . $date . "' AND workerId = ".$workerId;
            $stmt = $this->conn->prepare($sqlQuery);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>


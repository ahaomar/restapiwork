<?php
/**
 * description : Shift
 * for shift related functions listed down
 */
    class Shift{

        // Connection
        private $conn;

        // Table
        private $db_table = "shift";

        // Columns
        public $id;
        public $title;

        /**
         * [__construct constructor function for initiazlied the db]
         * @param object $db 
         */
        public function __construct($db){
            $this->conn = $db;
        }

        /**
         * [getShifts getShifts information from this function]
         * @return PDO Database query results
         */
        public function getShifts(){
            $sqlQuery = "SELECT id, title FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        /**
         * [getSingleShift description]
         * @return PDO $dataRow
         */
        public function getSingleShift(){
            $sqlQuery = "SELECT id, title FROM ". $this->db_table ." WHERE id = ? LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

            return $dataRow;
        }        


       /**
        * createShift - for Shift creation this will be used 
        * @return boolen true/false
        */
        public function createShift(){
            $sqlQuery = "INSERT INTO ". $this->db_table ." SET title = :title";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->title=htmlspecialchars(strip_tags($this->title));
        
            // bind data
            $stmt->bindParam(":title", $this->title);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        
        /**
         * [updateShift - for update the shiftrecord]
         * @return boolen true/false 
         */
        public function updateShift(){
            $sqlQuery = "UPDATE ". $this->db_table ." SET title = :title WHERE id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":id", $this->id);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        /**
         * [deleteShift -for deletion of shift data]
         * @return boolen true/false
         */
        function deleteShift(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>


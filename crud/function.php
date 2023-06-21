<?php

class database{

    private $host = "localhost";
    private $user = "root";
    private $pass = "a@123";
    private $db = "todo";
    private $conn = false;
    private $mysqli = "";
    private $result = array();
    
    #Database Connection
    public function __construct(){
        if(!$this->conn){
            $this->mysqli = new mysqli($this->host,$this->user,$this->pass,$this->db);
            $this->conn = true;
            echo "<script>alert('Database Connected');</script>";
            if($this->mysqli->connect_error){
                array_push($this->result,$this->mysqli->connect_error);
                return false;
            }
            else{
                return true;
            }
        }
    }

    #Insering data

    public function insert($table,$params=array()){
        if($this->tablecheck($table)){
            $table_key = implode(", ",array_keys($params));
            $table_val = implode("', '",$params);
            $sql = "INSERT INTO $table ($table_key) VALUES ('$table_val')";
            print($sql);
            echo "<script>alert('data inserted');</script>";
            if($this->mysqli->query($sql)){
                array_push($this->result,$this->mysqli->insert_id);
                return true;
            }
            else{
                return false;
            }
            
        }
        else{

        }
    }

    #Update Data
    public function update(){

    }

    #Deleting Data
    public function delete(){

    }

    #Select data
    public function select(){

    }

    public function tablecheck($table){
        $sql = "SHOW TABLES FROM $this->db LIKE '$table'";
        $tableindb = $this->mysqli->query($sql);
        if($tableindb){
            if($tableindb->num_rows==1){
                return true;
            }
            else{
                array_push($this->result,$table." does not exist check table!!");
                return false;
            }
        }
    }


    #Closing Connection
    public function __destruct(){
        if($this->conn){
            if($this->mysqli->close()){
                $this->conn = false;
                // return true;
                print_r($this->result);
            }
            else{
                return false;
            }
        }
    }
}
?>
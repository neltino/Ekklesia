<?php
    class DBConn{
        
        private $dbhost = "localhost";
        private $dbuser = "admin";
        private $dbpass = "admin";
        private $db = "ekklesia";

        protected function OpenConn(){
           
           try{
            //data source name
            $dsn = 'mysql:host='.$this->dbhost.'; dbname='.$this->db.'; charset=UTF8';
            $conn = new PDO($dsn, $this->dbuser, $this->dbpass);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
           } catch(PDOException $e){
             $e->getMessage();
           }
        }
        
        protected function CloseConn(){
            $this->conn = null;
        }
    }
?>
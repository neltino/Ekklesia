<?php
        //for new db only
       class NewDb{
               private $host = "localhost";
                private $root = "root";
                private $pass = "";
                private $db = "ekklesia";
                private $user = "admin";
                private $orig = "jesuslovesme";
                private $userPass = "admin";

            public function createDB(){
                
                        try {
                            $dbh = new PDO("mysql:host=$this->host", $this->root, $this->pass);
                            $dbh->exec("CREATE DATABASE `$this->db`;
                            CREATE USER '$this->user'@'localhost' IDENTIFIED BY '$this->userPass';
                            GRANT ALL ON `$this->db`.* TO '$this->user'@'localhost';
                            FLUSH PRIVILEGES;")
                            or die(print_r($dbh->errorInfo(), true));


                            $myfile = fopen("psd/initialize.htpasswd", "w") or die("Unable to open file!");
                            $txt = "admin\nadmin\n1+ 1 equals\n2";
                            fwrite($myfile, $txt);
                            fclose($myfile);

                    $dbh->exec("use mysql");
                    $dbh->exec("SET PASSWORD = PASSWORD('$this->orig')");
                    $dbh->exec("FLUSH PRIVILEGES");
                    
                        } catch (PDOException $e) {
                            echo "DB ERROR: " . $e->getMessage();
                        }
                    }
                
                
       }
?>
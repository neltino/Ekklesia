<?php 
        error_reporting(0);
        include 'includes/loaderr.inc.php';

        $initialize = file("psd/initialize.htpasswd");
        
        if($initialize && isset($_POST['username']) && isset($_POST['password'])){
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            //checking if new envi should be initialized
            if($initialize[4] != NULL){
                $newdb = new NewDb();
                $newdb->createDB();
            }
            //verifying login
            $user = trim($initialize[0]);
            $pass = trim($initialize[1]);
            if($username == $user && $password == $pass){
                echo "redirect";
            }else{
                echo "incorrect";
            }

        }else{
            echo "wrong";
        }
?>
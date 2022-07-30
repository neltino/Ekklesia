<?php
    error_reporting(0);
    include "../includes/loader.inc.php";
        
    if(isset($_POST['church'])){
        $church = trim($_POST['church']);
        $report = trim($_POST['report']);
        //creating table if not exists
        $user = new Users;
        $user->createInfo();
        //Inserting data
        $user->insertInfo($church, $report);
    }elseif(isset($_POST['user'])){
        $username = trim($_POST['user']);
        $pass = trim($_POST['pass1']);
        
        $security = trim($_POST['security']);
        $answer = trim($_POST['answer']);
        $myfile = fopen("../psd/initialize.htpasswd", "w") or die("Unable to open file!");
            $txt = $username."\n\r".$pass."\n\r".$security."\n\r".$answer;
           
            fwrite($myfile, $txt);
            fclose($myfile);
            echo "Successful! Please Login!";
    }elseif(isset($_POST['churchup'])){
        $churchup = trim($_POST['churchup']);
        $reportup = trim($_POST['reportup']);
        $user = new Users;
        $user->updateInfo($churchup, $reportup);
    }

?>
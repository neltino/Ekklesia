<?php
            //error_reporting(0);
            include "../includes/loader.inc.php";
        
        $week = trim($_POST['week']);
        $amount = $_POST['amount'];
        $id = $_POST['id'];
       
        $user = new Users;
        $user->stewUpdate($week,$amount, $id);
        header("Location: ../stewardship.php");
?>
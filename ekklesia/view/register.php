<?php
        error_reporting(0);
        include "../includes/loader.inc.php";
       
       $user = new Users;

    if(isset($_POST['fullname'])){
        $name = strtolower($_POST['fullname']);
        $name = ucwords($name);
        $user->createMembers();
        $user->insertMember($name);
        
    }
?>
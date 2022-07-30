<?php
    spl_autoload_register(function($className){
        $path = "classes/".$className.".class.php";
        include_once $path; 
    })
?>
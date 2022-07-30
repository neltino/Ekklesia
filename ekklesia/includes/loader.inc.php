<?php
    spl_autoload_register(function($className){
        if(file_exists("../classes/".$className.".class.php")){
            $path = "../classes/".$className.".class.php";

        }elseif(file_exists("classes/".$className.".class.php")){
            
            $path = "classes/".$className.".class.php";
        }
        include_once $path; 
    })
?>
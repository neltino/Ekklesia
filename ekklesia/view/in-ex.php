<?php
    error_reporting(0);
    include "../includes/loader.inc.php";
   
   $user = new Users;

   if(isset($_POST['income'])){
       
           $amount = trim($_POST['amount']);
           $amount = str_replace(",", "", $amount);
               $description = trim($_POST['income']);
               
               if($_POST['transdate'] !== ""){
                $date = $_POST['transdate'];
                    }else{
                     $date = date('Y-m-d');
                }
             
              // creating table if not exists
              $table = "income";
               $user->createInEx($table);
               //Inserting data
               $user->insertInEx($table, $date, $description, $amount);
   }elseif(isset($_POST['expenses'])){

        $amount = trim($_POST['amount']);
        $amount = str_replace(",", "", $amount);
        $description = trim($_POST['expenses']);
            
            if($_POST['transdate'] !== ""){
                $date = $_POST['transdate'];
            }else{
                $date = date('Y-m-d');
         }
         $table = "expenses";
         $user->createInEx($table);
         $user->insertInEx($table, $date, $description, $amount);
   }

?>
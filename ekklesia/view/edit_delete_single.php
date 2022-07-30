<?php
    session_start();
    include '../includes/loader.inc.php';
    $link = "redir";
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Edit/Delete:.</title>
    <link rel="shortcut icon" href="../img/tish.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/css/all.css">
  <link rel="stylesheet" href="../css/w3.css">
  <style> 
        @font-face{
                font-family: laila;
                src: url(../font/laila.ttf);
            } 
        body{
            background-image: linear-gradient(to right, #8360c3, #2ebf91);
            background-size: cover;
            font-family: laila;
        }
        #header{
                font-family: Laila;
                font-size: 2.5vw;
                margin-left: 30%;
                margin-top: 20%;
            }
            img{
                width: 35%;
                cursor: pointer;
            }
            h3{
                font-size: 1.5vw;
                font-family: laila;
                text-align: center;
                margin-top: 2%;
                font-size: 2vw;
            }
            .form{
                margin-top: 3%;
                max-width: 60%;
                margin-left: 20%;
                background-color: #ffffff;
                padding: 5px;
                opacity: .8;
            }
            .form button{
                width: 100%;
                padding-left: 1%;
            }
            input{
                margin-bottom: 1%;
            }
            .but{
                width: 15%;
                font-weight: bold;
                margin-left: 20%;
            }
           
           
            @media only screen and (max-width: 768px) {
                h3{font-size: 4vw;}
                .form{margin-left:15%; min-width: 82%;}
            }
  </style>
</head>
<body>
        <?php
                if(!isset($_SESSION["active"])){
                    echo "<h3>Please login properly!</h3>";
                    header("Refresh: 3; url= 'index.php' ");
                    die();
                }
        ?>
        
                        <div class="w3-container w3-black">
                                <div class="w3-row">
                                            <div class="w3-col s2 m2 l2">
                                                <img src="../img/tishbeh.png" alt="Tishbehsoft Logo" class = 'w3-image w3-hover-opacity' onclick = "window.location.href= '../outlog.php'">
                                            </div>
                                            <div class="w3-col s10 m10 l10">
                                                    <span id='header'><?php
                                                        if(isset($_POST['ForEditIn'])){
                                                            echo "Edit Income";
                                                        }elseif(isset($_POST['ForDeleteIn'])){
                                                            echo "Delete Income";

                                                        }elseif(isset($_POST['ForEditEx'])){
                                                            echo "Edit Expenses";
                                                        }elseif(isset($_POST['ForDeleteEx'])){
                                                            echo "Delete Expenses";

                                                        }
                                                        ?></span>
                                            </div>
                                            
                                        </div>
                                    </div> <!--end of container-->
            <?php

            include '../includes/aside.php';
            ?>

<div id="app">
    <div class="form w3-col s12 m12 l12">
                    <?php
                   
                            $user = new Users;
                                        if(isset($_POST['ForEditIn'])){
                                        
                                            $table = "income";
                                            $id = trim($_POST['id']);
                                            $user->selectSingle($table, $id); 

                                        }elseif(isset($_POST['forDeleteIn'])){
                                                $id = trim($_POST['id']);
                                                $dat = trim($_POST['dat']);
                                            echo  "<form action = '../income.php' method = 'POST' enctype='multipart/form-data' autocomplete='off'> 
                                                    <h5 class = 'w3-text-deep-purple w3-center'>Are you sure you want to delete this income item?</h5>
                                                    <input  type='hidden' name = 'id' value = '$id' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                                                    <input  type='hidden' name = 'datee' value = '$dat' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                                                    <input name = 'deleteIncome1' Value = 'Yes' type = 'submit' class = 'w3-button w3-green w3-round-large w3-hover-deep-purple but'> &emsp; &emsp;
                                                    <input name = 'deleteIncome2' Value = 'No' type = 'submit' class = 'w3-button w3-green w3-round-large w3-hover-deep-purple but'>
                                            </form>";
                                        
                                        }elseif(isset($_POST['ForEditEx'])){
                                            
                                            $table = "expenses";
                                            $id = trim($_POST['id']);
                                            $user->selectSingle($table, $id); 

                                        }elseif(isset($_POST['ForDeleteEx'])){
                                                $id = trim($_POST['id']);
                                                $dat = trim($_POST['dat']);
                                            echo  "<form action = '../expenses.php' method = 'POST' enctype='multipart/form-data' autocomplete='off'> 
                                                    <h5 class = 'w3-text-deep-purple w3-center'>Are you sure you want to delete this income item?</h5>
                                                    <input  type='text' name = 'id' value = '$id' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                                                    <input  type='hidden' name = 'datee' value = '$dat' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                                                    <input name = 'deleteIncome1' Value = 'Yes' type = 'submit' class = 'w3-button w3-green w3-round-large w3-hover-deep-purple but'> &emsp; &emsp;
                                                    <input name = 'deleteIncome2' Value = 'No' type = 'submit' class = 'w3-button w3-green w3-round-large w3-hover-deep-purple but'>
                                            </form>";
                                        
                                        }
                                        
                                            
                    ?>    
        </div>
                        
        </div>
        <script src = "js/vue.js"></script>
        <script src = "js/income.js"></script>
</body>
</html>
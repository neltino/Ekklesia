<?php
    session_start();
    include 'includes/loader.inc.php';
    //editing or deleting

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Expenses:.</title>
    <link rel="shortcut icon" href="img/tish.png" type="image/x-icon">
  <link rel="stylesheet" href="css/css/all.css">
  <link rel="stylesheet" href="css/w3.css">
  <style>
        @font-face{
                font-family: laila;
                src: url(font/laila.ttf);
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
                opacity: .9;
            }
            .form button{
                width: 100%;
                padding-left: 1%;
            }
            input{
                margin-bottom: 1%;
            }
            .record{
                margin-top: 22.2%;
                max-width: 60%;
                margin-left: 20%;
                background-color: #ffffff;
                padding: 5px;
                opacity: .9;
            }
            table th{
                text-align: center;
            }
            table button{
                font-size: 0.8vw;
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
                                                <img src="img/tishbeh.png" alt="Tishbehsoft Logo" class = 'w3-image w3-hover-opacity' onclick = "window.location.href= 'outlog.php'">
                                            </div>
                                            <div class="w3-col s10 m10 l10">
                                                    <span id='header'>Expenses</span>
                                            </div>

                                </div>
                        </div> <!--end of container-->
        <?php
            include 'includes/aside.php';
        ?>

        <div id="app">
                        <div class="form w3-col s12 m12 l12">
                                <datalist id = "descriptioinList">
                                    <option value="Vicar's Allowance">
                                    <option value="Curate's Allowance">
                                    <option value="Water for vicarage">
                                    <option value="Assessment for the month of">
                                    <option value="Diocesan Levy">
                                    <option value="Generator Repair">
                                    <option value="Church of Nigeria Collection">
                                    <option value="Medical bill">
                                    <option value="Bank Charges">
                                    <option value="Newspaper Allowance">
                                    <option value="Airtime Allowance">
                                    <option value="Water Allowance">
                                    <option value="Car maintaintenance">
                                    <option value="Fuel">
                                    <option value="Transport fare to">
                                    <option value="Christmas Bonus">
                                    <option value="Easter Bonus">
                                    <option value="Vicarage Maintenance">
                                </datalist>
                                <form id="inc" autocomplete="off"> 
                                        <h3 class = "w3-text-deep-purple">Expenses</h3>
                                    <input  type="date" name = "transdate" class = "w3-input w3-border-green w3-round-large w3-border">
                                    <input List = "descriptioinList" type="text" name = "expenses" class = "w3-input w3-border-green w3-round-large w3-border" placeholder = "Description" required v-model = "description" @input = 'oninp'>
                                    <input id = 'convert' type="text" name = "amount" class = "w3-input w3-border-green w3-round-large w3-border" placeholder = "Amount" required v-model = "amount"  @input = 'oninp'>  
                                </form>
                                <button id="sub" class = "w3-button w3-green w3-round-large w3-hover-deep-purple" disabled  @click = 'onsub'>Submit</button><br>
                                
                        </div>
                        <br>
                        <div class="record">
                                <h4 class = "w3-text-deep-purple">Please Select Date</h4>
                            <form action="" method = 'POST' enctype="multipart/form-data">
                                <input name = 'datee' type="date" class = "w3-input w3-border-green w3-round-large w3-border" required>
                                <input type="submit" class = "w3-button w3-green w3-hover-deep-purple w3-round-large w3-border">
                            </form>
                            <?php
                                    $user = new Users;
                                
                                 //deleting
                                 if(isset($_POST['deleteIncome1'])){
                                    $table = "expenses";
                                    $id = trim($_POST['id']);
                                    $transdate = trim($_POST['datee']);
                                    $user->deleteSingle($table,$id);
                                }
                                
                                    //editing
                                if(isset($_POST['editExpenses'])){
                                    $table = "expenses";
                                    $id = trim($_POST['id']);
                                    $transdate = trim($_POST['datee']);
                                    $description = trim($_POST['descr']);
                                    $amount = trim($_POST['amoun']);

                                    $user->editSingle($table, $id, $transdate, $description, $amount);
                                    
                                }
                               
                                //fetching
                                if(isset($_POST['datee'])){
                                            $date = $_POST['datee'];
                                            $table = "expenses";
                                            $user->selectInExDate($table, $date);
    
                                }
                            ?>
                        </div>
        </div>
        <script src = "js/vue.js"></script>
        <script src = "js/income.js"></script>
</body>
</html>
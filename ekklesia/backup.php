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
    <title>.:Backup & Reset:.</title>
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
                width: 30%;
                padding-left: 1%;
                font-weight: bold;
                margin-left: 35%;
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
                                                    <span id='header'>Backup & Reset</span>
                                            </div>

                                </div>
                        </div> <!--end of container-->
        <?php
            include 'includes/aside.php';
        ?>

        <div id="app" >
                <div class="form"> 
                            <div class = 'w3-row'>
                                    <div class="w3-col s12 m12 l12">
                                            <form id="back" autocomplete="off"> 
                                                    <h3 class = "w3-text-deep-purple"> Are you sure you want to backup data?</h3>
                                                
                                                </form>
                                    </div>
                        </div>
                        <div class = "w3-row">
                                    <div class="w3-col s6 m6 l6"> 
                                                <button id="yes" name = 'yes' class = "w3-button w3-green w3-round-large w3-hover-deep-purple"   @click = 'yes'>Yes</button>
                                    </div>
                                    <div class="w3-col s6 m6 l6"> 
                                    <button id="no" name = 'no' class = "w3-button w3-green w3-round-large w3-hover-deep-purple"     @click = 'no'>No</button>
                                    </div>
                        </div>

                </div>
                    <br><br> 
                    <div class="form"> 
                            <div class = 'w3-row'>
                                    <div class="w3-col s12 m12 l12">
                                            <form id="reset" autocomplete="off"> 
                                                    <span class = 'w3-text-red' >PLEASE BACKUP DATA IF YOU HAVE NOT DONE SO!</span>
                                                    <h3 class = "w3-text-deep-purple"> Are you sure you want to <span class = 'w3-text-red'>DELETE ALL RECORDS?</span></h3>
                                                
                                                </form>
                                    </div>
                        </div>
                        <div class = "w3-row">
                                    <div class="w3-col s6 m6 l6"> 
                                                <button id="yes" name = 'yes' class = "w3-button w3-green w3-round-large w3-hover-deep-purple"   @click = 'yesoo'>Yes</button>
                                    </div>
                                    <div class="w3-col s6 m6 l6"> 
                                    <button id="no" name = 'no' class = "w3-button w3-green w3-round-large w3-hover-deep-purple"     @click = 'no'>No</button>
                                    </div>
                        </div>





           
                        
        </div>
        <script src = "js/vue.js"></script>
        <script src = "js/backup.js"></script>
</body>
</html>
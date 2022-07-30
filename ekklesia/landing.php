<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>.:Dashboard:.</title>
  <link rel="shortcut icon" href="img/tish.png" type="image/x-icon">
  <link rel="stylesheet" href="css/css/all.css">
  <link rel="stylesheet" href="css/w3.css">
    <style> 
           @font-face{
                font-family: laila;
                src: url(font/laila.ttf);
            } 

            body {
            
            background-image: url("img/venice.jpg");
            background-size: cover;
            font-family: laila;
            }

            a {
            font-size: 14px;
            text-decoration: none;
            outline: 0;
            }

            .circle,
            .ring {
            height: 256px;
            position: relative;
            width: 256px;
            }

            .circle {
            margin: 0 auto;
            margin-top: 4%;
            }

            .ring {
            background-color: rgba(0,0,0,0.5);
            border-radius: 50%;
            opacity: 0;

            -webkit-transform-origin: 50% 50%;
            -moz-transform-origin: 50% 50%;
            transform-origin: 50% 50%;

            -webkit-transform: scale(0.1) rotate(-270deg);
            -moz-transform: scale(0.1) rotate(-270deg);
            transform: scale(0.1) rotate(-270deg);

            -webkit-transition: all 0.4s ease-out;
            -moz-transition: all 0.4s ease-out;
            transition: all 0.4s ease-out;
            }

            .open .ring {
            opacity: 1;
            
            -webkit-transform: scale(1) rotate(0);
            -moz-transform: scale(1) rotate(0);
            transform: scale(1) rotate(0);
            }

            .center {
            background-color: rgba(255,255,255,0.3);
            border-radius: 50%;
            border: 2px solid #ffffff;
            bottom: 0;
            color: white;
            height: 80px;
            left: 0;
            line-height: 80px;
            margin: auto;
            position: absolute;
            right: 0;
            text-align: center;
            top: 0;
            width: 80px;
            
            -webkit-transition: all 0.4s ease-out;
            -moz-transition: all 0.4s ease-out;
            transition: all 0.4s ease-out;
            }

            .open .center {
            border-color: #aaaaaa;
            }

            .menuItem {
            border-radius: 50%;
            color: #eeeeee;
            display: block;
            height: 40px;
            line-height: 40px;
            margin-left: -20px;
            margin-top: -20px;
            position: absolute;
            text-align: center;
            width: 40px;
            }
            .menuItem:hover{
                color: #d8b4ae;
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
                color: white;
                font-size: 1.5vw;
                font-family: laila;
                text-align: center;
                margin-top: 2%;
                font-size: 2vw;
            }
            @media only screen and (max-width: 768px){
              #header{font-size: 5vw;}
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
                                                    <span id='header'>Dashboard</span>
                                            </div>

                                </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col s12 m12 l12">
                            <h3>Welcome, Please click the menu below to begin!</h3>
                            </div>
                        </div>


<!-- partial:index.partial.html -->
<div class="w3-row"> 
          <div class="round w3-col s12 m12 l12">
                  <div class="circle">
                  <div class="ring">
                    <a href="settings.php" class="menuItem fa fa-user-cog fa-2x" title = "Settings"></a>
                    <a href="register.php" class="menuItem fa fa-user-plus fa-2x" title = "Register Members"></a>
                    <a href="income.php" class="menuItem fa fa-hand-holding-usd fa-2x" title = "Income"></a>
                    <a href="expenses.php" class="menuItem fa fa-money-check-alt fa-2x" title = "Expenses"></a>
                    <a href="stewardship.php" class="menuItem fa fa-users fa-2x" title = "Stewardship"></a>
                    <a href="report.php" class="menuItem fa fa-chart-bar fa-2x" title = "Monthly Reports"></a>
                    <a href="backup.php" class="menuItem fa fa-database fa-2x" title = "Backup & Reset"></a>
                    <a href="annual stew.php" class="menuItem fa fa-chart-line fa-2x" title = "Annual Stewardship"></a>
                    <a href="outlog.php" class="menuItem fa fa-power-off fa-2x" title = "Logout"></a>
                  </div>
                  <a href="#" class="center fa fa-th fa-2x" title = "Menu"></a>
                </div>
          </div>
</div>
<!-- partial -->
  <script  src="js/landing.js"></script>

</body>
</html>

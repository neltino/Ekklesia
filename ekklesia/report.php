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
    <title>.:Monthly Report:.</title>
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
                margin-top: 2%;
                width: 60%;
                margin-left: 20%;
                background-color: #ffffff;
                padding: 5px;
                opacity: .9;
                float: left;
            }
            /* For CSS tabs */

                            .tabset > input[type="radio"] {
                            position: absolute;
                            left: -200vw;
                            }

                            .tabset .tab-panel {
                            display: none;
                            }

                            .tabset > input:first-child:checked ~ .tab-panels > .tab-panel:first-child,
                            .tabset > input:nth-child(3):checked ~ .tab-panels > .tab-panel:nth-child(2),
                            .tabset > input:nth-child(5):checked ~ .tab-panels > .tab-panel:nth-child(3),
                            .tabset > input:nth-child(7):checked ~ .tab-panels > .tab-panel:nth-child(4),
                            .tabset > input:nth-child(9):checked ~ .tab-panels > .tab-panel:nth-child(5),
                            .tabset > input:nth-child(11):checked ~ .tab-panels > .tab-panel:nth-child(6) {
                            display: block;
                            }

                            /*
                            Styling
                            */
                            body {
                            font: 16px/1.5em "Overpass", "Open Sans", Helvetica, sans-serif;
                            color: #333;
                            font-weight: 300;
                            }

                            .tabset > label {
                            position: relative;
                            display: inline-block;
                            padding: 15px 15px 25px;
                            border: 1px solid transparent;
                            border-bottom: 0;
                            cursor: pointer;
                            font-weight: 600;
                            }

                            .tabset > label::after {
                            content: "";
                            position: absolute;
                            left: 15px;
                            bottom: 10px;
                            width: 22px;
                            height: 4px;
                            background: #8d8d8d;
                            }

                            .tabset > label:hover,
                            .tabset > input:focus + label {
                            color: #06c;
                            }

                            .tabset > label:hover::after,
                            .tabset > input:focus + label::after,
                            .tabset > input:checked + label::after {
                            background: #06c;
                            }

                            .tabset > input:checked + label {
                            border-color: #ccc;
                            border-bottom: 1px solid #fff;
                            margin-bottom: -1px;
                            }

                            .tab-panel {
                            padding: 30px 0;
                            border-top: 1px solid #ccc;
                            }

                            /*
                            Demo purposes only
                            */
                            


                            .tabset {
                            max-width: 65em;
                            }
                            .tabset{
                                min-width: 100%;
                            }
                            
            /* For CSS tabs */
            table{border: 2px solid #000000; border-collapse: collapse; width: 100%;}
            table td, table th{border: 1px solid #000000; padding: 0 5px;}
            .wardens{padding: 0 5%;}
           
           
            @media only screen and (max-width: 768px) {
                h3{font-size: 4vw;}
                .form{margin-left:15%; min-width: 82%;}
            }
            @media print{
                .w3-container, form, nav, input, label, .tabset > label, .noprint{display: none;}
                .record{margin-left: 0; min-width: 100%;}
                .tab-panel {padding: 0 0; border-top: 0px solid red;}
                table{color: black;}
            }
            @page{
		        size: A4 portrait;
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
                                                    <br>
                                                    <span id='header'>Monthly Report</span>
                                            </div>

                                </div>
                        </div> <!--end of container-->
        <?php
            include 'includes/aside.php';
        ?>

        <div id="app">
                        <div class="form w3-col s12 m12 l12">
                                
                                <form action = '' method = 'POST' enctype="multipart/form-data" autocomplete="off"> 
                                    <label class = "w3-text-deep-purple">Select Month</label>
                                    <input  type="month" name = "month" class = "w3-input w3-border-green w3-round-large w3-border" required>
                                    <label class = "w3-text-deep-purple">Select Report Presentation Date</label>
                                    <input  type="date" name = "presdate" class = "w3-input w3-border-green w3-round-large w3-border" required>
                                    <label class = "w3-text-deep-purple">Cash at hand, if any</label>
                                    <input  type="number" step = 'any' name = "athand" value = '0' class = "w3-input w3-border-green w3-round-large w3-border">
                                    <button type="submit" class = "w3-button w3-green w3-round-large w3-hover-deep-purple">Submit</button><br>
                                </form>
                                
                        </div>
                        <div class="record">
                               
                            <?php
                                if(isset($_POST['month'])){
                                    $user = new Users;
                                    $monthy = trim($_POST['month']);
                                    $presdate = trim($_POST['presdate']);
                                    $athand = trim($_POST['athand']);
                                    $user->monthylyReport($monthy, $presdate, $athand);
                                }
                            ?>
                        </div>
        </div>
        
</body>
</html>
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
    <title>.:Annual Stewardship Summary:.</title>
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
            button{
                margin-left: 5%;
                width: 10%;
            }
            table th{
                text-align: center;
                color: black;
                border: 1px solid #ffffff;
            }
            table button{
                font-size: 0.8vw;
            }
            table{
			border-collapse: collapse;
			border: 2px solid #000000;
			background: #ffffff;
			margin-left: 2%;
			font-size: 14px;
		}
		
		tr td{
			cursor: pointer;
		}
            #app{
                overflow-x: auto;
                margin-left: 5%;
            }
            h2, th{
                color: white;
                text-align: center;
            }
            @page{
		        size: A3 landscape;
	        }
            @media print{
                    table{border: 2px solid #000000; color: black; margin-left: 0; max-width: 98%; font-size: 0.5vw;}
                    #app{overflow-x: visible; margin-left: 0;}
                    .w3-container, nav, .tabset > label, .noprint{display: none;}
                    h2{color: black;}
                    table th{border: 1px solid #000000;}
		            td{border: 1px solid #000000; text-align: right; padding-right: 2px;}
		
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
                                                    <span id='header'>Annual Stewardship Summary</span>
                                            </div>

                                </div>
                        </div> <!--end of container-->
        <?php
            include 'includes/aside.php';
        ?>

        <div id="app">
                <h2>STEWARDSHIP SUMMARY FOR THE YEAR <?php echo date('Y');?> </h2>
                  <?php
                    $user = new Users();
                    $user->annualStew();
                  ?> 
        </div>
        <br>
        <div class="noprint"> 
            <button class = 'w3-button w3-green w3-round' onClick = "print()">Print</button>
        </div>
        
</body>
</html>
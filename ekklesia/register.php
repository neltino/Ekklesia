<?php
    session_start();
    include 'includes/loader.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Register Members:.</title>
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
            .record button{
                font-size: 0.8vw;
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
                                                    <span id='header'>Registr Members</span>
                                            </div>

                                </div>
                        </div> <!--end of container-->
        <?php
            include 'includes/aside.php';
        ?>

        <div id="app" class = 'w3-row'>
                        <div class="form w3-col s12 m12 l12">
                                <form id = "reg" autocomplete="off"> 
                                    
                                    <input  type="text" name = "fullname" class = "w3-input w3-border-green w3-round-large w3-border" v-model = 'fullname' placeholder = "Full name" required @input = 'oninp'>
                                    <button id = 'sub' type="submit" class = "w3-button w3-green w3-round-large w3-hover-deep-purple" disabled @click = 'onsub'>Submit</button><br>
                                </form>
                                
                        </div>
                        <div class="record"> 
                            <?php
                               
                               $user = new Users;
                               if(isset($_POST['edit'])){
                                    $id = trim($_POST['id']);
                                    $fullname = trim($_POST['fullname']);
                                    $fullname = ucwords(strtolower($fullname));
                                    $user->editMember($fullname, $id);
                                }
                                if(isset($_POST['yes'])){
                                    $table = 'members';
                                    $id = trim($_POST['id']);
                                    $user->deleteSingle($table, $id);
                                }
                                $user->getMembers();
                            ?>
                        </div>
                        
        </div>
        <script src = "js/vue.js"></script>
        <script src = "js/register.js"></script>
</body>
</html>
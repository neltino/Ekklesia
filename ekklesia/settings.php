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
    <title>.:Settings:.</title>
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
                color: white;
                font-size: 1.5vw;
                font-family: laila;
                text-align: center;
                margin-top: 2%;
                font-size: 2vw;
            }
            .back{
                width: 60%;
                padding-bottom: 0.5%;
                background: #c5d7de;
                margin-left: 20%;
                margin-top: 5%;
            }
            
            form{
                margin-top: 0.3%;
            }
            .form{
                max-width: 98%;
                margin-left: 1%;
                background-color: #ffffff;
                padding: 5px;
                opacity: .8;
            }
           #info{
               width: 90%;
               margin-left: 5%;
           }
           
            input{
                margin-bottom: 1%;
            }
            select option{
                color: red;
            }
            button{
                width: 90%;
                margin-left: 5%;
            }
            #accord-button{
                width: 98%;
                margin-left: 1%;
                margin-top: 0.5%;
            }
            #accord-button i:first-child{
                float: left;
            }
            #accord-button i:last-child{
                float: right;
            }
            #accord-button span{
                font-weight: bold;
            }
            #accord-button i{
                font-size: 1.5vw;
            }
            #accordion1, #accordion2{
                display: none;
            } 
            #error{
                color: red;
                text-align: center;
                margin-left: 5%;
                display: none;
            }
           
            table caption{
                font-weight: bold;
            }
            #edit{
                background:whitesmoke;
                height: 87.8vh;
                position: absolute;
                opacity: .97;
                margin-top: -5%;
                width: 100%;
                display: none;
                z-index: 1;
               
            }
            #edit p{
                float: right;
                margin-right: -90%;
                cursor: pointer;
            }
            #editform{
                background: white;
                width: 60%;
                margin-left: 20%;
            }
            #editform form{
                margin-top: 5%;
                background: white;
                padding: 5px;
            }
            #updat{
                width: 98%;
                margin-left: 1%;
               
            }
           
            @media only screen and (max-width: 768px) {
                h3{font-size: 4vw;}
                .back{width:90%; margin-left: 5%;}
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
                                                    <span id='header'>Settings</span>
                                            </div>

                                </div>
                        </div> <!--end of container-->
        <?php
            include 'includes/aside.php';
        ?>

        <div id="app">
                        <div id="edit" class = "w3-row" > 
                                            <p  title = "Close" @click = 'show' class = 'w3-col s12 m12 l12' ><i class = 'fas fa-window-close fa-2x w3-hover-red' ></i></p>
                                            <div id="editform">
                                                        
                                                    <form id = "update" autocomplete="off">
                                                    <h4 class = 'w3-text-deep-purple w3-center'>Edit Church Info</h4>
                                                                    <input type="text" name = "churchup" class = "w3-input w3-border-green w3-round-large w3-border w3-pale-red" placeholder = "Church Name" required v-model = "up1" @input = "onupdate">
                                                                        <select class = 'w3-input w3-border-green w3-round-large w3-border w3-pale-red' v-model = "up2" name="reportup" required @change = "onupdate">
                                                                           <option disabled value="">Financial Report is presented to:</option>
                                                                            <option value = "PCC" >PCC</option>
                                                                            <option value = "Standing Committee" >Standing Committee</option>
                                                                        </select>
                                                    </form>
                                                    <br>
                                                        <button id="updat" class = "w3-button w3-green w3-round-large w3-hover-deep-purple" disabled @click = "subupdate" >Submit</button><br><br>
                                                      
                                            </div>
                                            
                        </div>
                        <div class="w3-row back"> 
                                <div id="accord-button" class = "w3-button w3-green w3-roud w3-hover-deep-purple" @click = "expand1">
                                    <i class = 'fas fa-church' ></i>
                                    <span>Church Info</span>
                                    <i id = "ang1" class = 'fas fa-angle-double-down'></i>
                                </div>
                               
                                    <div id="accordion1">
                                                    <div class="form w3-col s12 m12 l12">
                                                        <form id="info" autocomplete="off"> 
                                                               
                                                                        
                                                                        <input type="text" name = "church" class = "w3-input w3-border-green w3-round-large w3-border" placeholder = "Church Name" required v-model = "church" @input = "oninp1">
                                                                        <select class = 'w3-input w3-border-green w3-round-large w3-border' v-model = "report" name="report" required @change = "oninp1">
                                                                           <option disabled value="">Financial Report is presented to:</option>
                                                                            <option value = "PCC" >PCC</option>
                                                                            <option value = "Standing Committee" >Standing Committee</option>
                                                                        </select>
                                                                
                                                        </form>
                                                        <br>
                                                        <button id="sub" class = "w3-button w3-green w3-round-large w3-hover-deep-purple" disabled @click = "dbsub" >Submit</button><br><br>
                                                       
                                                        <div id="infotable"> 
                                                              <?php
                                                                         $info = new Users;
                                                                         $info->selectInfo();
                                                                         $info->getInfo();
                                                                        
                                                                        
                                                                       
                                                                        
                                                              ?> 
                                                        </div>

                                                    </div>
                                           

                                    </div>
                                    
                                             <div id="accord-button" class = "w3-button w3-green w3-roud w3-hover-deep-purple" @click = "expand2">
                                                    <i class = 'fas fa-user-lock' ></i>
                                                    <span>Change  Login Details</span>
                                                    <i id = "ang2" class = 'fas fa-angle-double-down'></i>
                                                </div>
                                    <div id="accordion2"> 
                                                    <div class="form w3-col s12 m12 l12">
                                                        <form id="file" autocomplete="off"> 
                                                               
                                                                        
                                                                        <input type="text" name = "user" class = "w3-input w3-border-green w3-round-large w3-border" placeholder = "Username" required v-model = "user" @input = "activate">
                                                                        <input type="text" name = "pass1" class = "w3-input w3-border-green w3-round-large w3-border" placeholder = "Password" required v-model = "pass1" @focusout = "checkPass" @input = 'activate'>
                                                                        <input type="text" name = "pass2" class = "w3-input w3-border-green w3-round-large w3-border" placeholder = "Retype Password" required v-model = "pass2" @focusout = "checkPass" @input = 'activate'>
                                                                        <input type="text" name = "security" class = "w3-input w3-border-green w3-round-large w3-border" placeholder = "Password Recovery Question" required v-model = "security" @input = "activate">
                                                                        <input type="text" name = "answer" class = "w3-input w3-border-green w3-round-large w3-border" placeholder = "Right Answer" required v-model = "answer" @input = "activate">
                                                                        
                                                        </form>
                                                        <span id="error">Both passwords above must match!</span>
                                                        <br>
                                                        <button id="sub2" class = "w3-button w3-green w3-round-large w3-hover-deep-purple" disabled @click = "filesub" >Submit</button><br><br>
                                                       
                                                    </div>
                                    </div>
                        </div>
                </div>
            </div>
        <script src = "js/vue.js"></script>
        <script src = "js/settings.js"></script>
</body>
</html>
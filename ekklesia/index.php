<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Home:.</title>
    <link rel="shortcut icon" href="img/tish.png" type="image/x-icon">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/css/all.css">
    <style> 
            @font-face{
                font-family: laila;
                src: url(font/laila.ttf);
            }
            @font-face{
                font-family: zeyada;
                src: url(font/zeyada.ttf);
            }
            @font-face{
                font-family: papyrus;
                src: url(font/papyrus.ttf);
            }
            body{
                background-image: url("img/ekk2.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                font-family: laila;
            }
            .mainContainer{
                width: 60%;
                margin-left: 20%;
                margin-top: 7%;
                background: black;
                height: 70vh;
                opacity: .8;
            }
            #second{
                background: #ffffff;
                height: 70vh;
            }
            #second h6{
                margin-left: 1%;
                font-family: Laila;
                padding: 0 2%;
            }
            .log{
                float: left;
                position: absolute;
                background: #ffffff;
                font-size: 2vw;
                padding: 2%;
                border-radius: 47%;
                margin-left: 39%;
                margin-top: -2%;
            }
            form{
               padding: 0 3%;
            }
            input{
                padding: 40px;
                margin: 8px 0;
                display: inline-block;
                box-sizing: border-box;
            }
            .input-group1, .input-group2{
                position: relative;
            }
            .input-group1 input, .input-group2 input{
                padding-left: 7%;
            }
            .input-group1 i, .input-group2 i{
                 position: absolute;
                margin: 2% 0.5%;
                color: grey;
            }
            #show{
                position: absolute;
                margin-left: 90%;
                margin-top: -7%;
                cursor: pointer;
                color: #673ab7;
            }
            .sub{
                margin: 2%;
            }
            .sub input{
                cursor: pointer;
            }
            #first{
                padding: 0.5%;
                text-align: center;
                color: #ffffff;
                font-size: 1.5vw;
                font-weight: bold;
            }
            
            input[type=submit]{
                width: 100%;
            }
            #first span{
                font-family: Zeyada;
                color: pink;
            }
            #first small{
                font-family: papyrus;
                font-size: 3vw;
                color: #34b2ff;
            }
            
            .allCallouts{
              margin-top: 17%;
              padding: 1%;
            }
            #callout1, #callout2{
                display: none
            }
            #forgot{
                margin-left: 40%;
                font-weight: bold;
                color: #053567;
                cursor: pointer;
            }
            #forgot:hover{
                color:#58af73;
            }
            #spinner{
                margin-top: 1%;
                position: absolute;
                margin-left: 30%;
            }
            @media only screen and (max-width: 768px) {
                .log{display: none;}
                #first{font-size: 2.9vw;}
                #first small{font-size: 4vw;}
                #show{margin-top: -10%;}
                .allCallouts{margin: 0;}
                .mainContainer{width: 80%; margin-left: 10%;}
                #spinner{margin-left: 70%; margin-top: 1.7%;}
                body{ background-size: cover;}
            }
            @media only screen and (max-width: 600px) {
                .mainContainer{width: 90%; margin-left: 5%}
                #second h6{margin-top: -12%;}
                .log{margin-left: 60%;}
            }

            
    </style>
</head>
<body>
    <div id = "app"> <!-- for vue -->
                <div class="mainContainer"> <!-- for the logo and form -->
                        <div class = "w3-row">
                                <div class = 'w3-col m12 l5' id = 'first'>
                                    <span>Tishbehsoft</span> <small>Ekklesia</small>
                                    <p>New Covenant Anglican Church, Yelengruza</p>
                                    <br><br>
                                    <p> 
                                        <img src="img/tishbeh.png" alt="Tishbehsoft Logo">
                                    </p>
                                </div>   
                               
                                <div class="log">
                                    <i class="fas fa-church"></i>
                                </div>
                               
                                <div class = 'w3-col m12 l7' id ='second'>
                                       <div class="allCallouts w3-row"> 
                                                    <div id="callout1" class = "w3-col m12 l12 w3-panel w3-pale-red w3-leftbar w3-border-red" > 
                                                            <span><b>Username and/or password is inccorect!
                                                                <br>
                                                                Please type the correct values!
                                                            </b></span>
                                                    </div>
                                                    <div id="callout2" class = "w3-col m12 l12 w3-panel w3-pale-green w3-leftbar w3-border-green" > 
                                                            <span><b>Login, successful!
                                                                <br>
                                                                Redirecting...
                                                            </b></span>
                                                    </div>

                                       </div>

                                        <h6 class = 'w3-text-deep-purple' >Please, login!</h6>
                                        <br> 
                                        <form id = 'login' autocomplete="off">
                                                <div class = 'input-group1'> 
                                                    <span> <i class = 'fas fa-user-alt fa-lg' ></i> </span>
                                                    <input class = 'w3-input w3-border-xlarge w3-round w3-border-deep-purple' placeholder = 'Username' name = 'username' type="text" id = 'user' required v-model = 'username' @input = 'onin'>
                                                </div>
                                                <br>
                                                <div class = 'input-group2'> 
                                                    <span> <i class = 'fas fa-lock fa-lg' ></i> </span>
                                                    <input class = 'w3-input w3-border-xlarge w3-round w3-border-deep-purple' placeholder = 'Password' name = 'password' type="password" id = 'pass' required v-model = 'password' @input = 'onin'>
                                                    <span class = 'fas fa-eye fa-lg' id = 'show' @click = 'alter' > </span>
                                                </div>
                                                
                                            </form>
                                            
                                            <div class="sub"> 
                                                <span id = 'spinner' class = ''></span>
                                            <input type = 'submit' class = 'w3-button w3-border-xlarge w3-round w3-deep-purple w3-hover-indigo' value = 'Login' id = 'sub' disabled @click = 'onsub'>

                                            </div>
                                            <span id = "forgot" onclick = "window.location= 'recover.php' ">Forgot password?</span>
                                            
                                </div>

                        </div>
                </div> <!-- end of form container -->
    </div> <!-- end of app --> 

    <script src = 'js/vue.js' ></script>
    <script src = 'js/login.js' ></script>

</body>
</html>
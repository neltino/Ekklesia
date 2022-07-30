<?php
         error_reporting(0);
         $initialize = file("psd/initialize.htpasswd");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/tish.png" type="image/x-icon">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/css/all.css">
    <title>.:Password Recovery:.</title>
    <style> 
         @font-face{
                font-family: laila;
                src: url(font/laila.ttf);
            }
         body{
                background-color: #8EC5FC;
                background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
                font-family: Laila;
            }
            #header{
                font-family: Laila;
                font-size: 2.5vw;
                margin-left: 25%;
                margin-top: 20%;
            }
            img{
                width: 35%;
                cursor: pointer;
            }
            #app{
                background: whitesmoke;
                width: 70%; 
                margin-left: 15%;
                margin-top: 5%;
                height: 70vh;
                opacity: 0.8;
                border-radius: 5px;
            }
            .forms{
                width: 40%;
                margin-left:0%;
                background: white;
                height: 65vh;
                padding: 1%;
                margin-top: 2%;
            }
            input[type=submit]{
                cursor: pointer;
                width: 99%;
            }
            @media only screen and (max-width: 768px) {
               .forms{margin-left:0;}
               #app{width: 90%; margin-left: 5%;}
               #header{font-size: 5vw;}
            }
           
    </style>
</head>
<body>
           <div class="w3-container w3-black">
                   <div class="w3-row">
                            <div class="w3-col s2 m2 l2">
                                <img src="img/tishbeh.png" alt="Tishbehsoft Logo" class = 'w3-image w3-hover-opacity' onclick = "window.location.href= 'index.php'">
                            </div>
                            <div class="w3-col s10 m10 l10">
                                    <span id='header'>Password Recovery</span>
                            </div>

                   </div>
           </div>


           <div id="app"  class = "w3-row" > 

                    <div class="forms w3-col s12 m12 l12"> 
                    <form id="recovery" action = "" method = "POST" enctype = "multipart/form-data" class = 'w3-round' autocomplete="off">
                        <br>
                        <?php
                                    if($initialize){
                                        echo "<p class = 'w3-text-deep-purple' >Please provide the correct answer to the password recovery question below!</p>";
                                        echo trim($initialize[2]);
                                        echo "<br> </br>";
                                        echo "<input type='text' class='w3-input w3-round-large  w3-border w3-border-deep-purple' id = 'answer' name = 'answer' placeholder = 'type answer' required> <br>";
                                        echo "<input type='submit' class='w3-button w3-round-large  w3-deep-purple w3-hover-green' disabled  id = 'sub' >";

                                    }else{
                                        echo "<p?>Sorry, no recovery question set!</p>";
                                        die();
                                    }
                                   
                            ?>
                    </form>
                    <?php
                             if(isset($_POST['answer'])){
                                $answer = trim($_POST['answer']);
                                $ans = trim($initialize[3]);
                                if($answer == $ans){
                                    
                                    echo "<p> Your username is <span style = 'color: red; font-weight: bold;'>".trim($initialize[0]). "</span> and your password is <span style = 'color:red; font-weight: bold;'>". $initialize[1]. "</span> <br>";
                                    echo "<button onclick = 'window.location.href=`index.php`' class = 'w3-button w3-round w3-deep-purple w3-hover-green' >Login</button>";
                                    
                                }else{
                                    echo "<p style = 'color:red;'>Your answer is incorrect, please try again!</p>";
                                }
                            }
                    
                    ?>
                    
                    </div>

            </div>
            <script> 
                    answer.addEventListener('input', ()=>{
                            if(answer.value.length> 0){
                                sub.disabled = false
                            }else{
                                sub.disabled = true;
                            }
                    });
            </script>
</body>
</html>
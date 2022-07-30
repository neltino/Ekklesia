<?php
    session_start();
    include 'includes/loader.inc.php';
    //editing or deleting
    if(isset($_POST['week'])){
        $week = $_POST['week'];
    }else{
        $week = date('W');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Stewardship:.</title>
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
            button{
                width: 100%;
                padding-left: 1%;
                margin-top: 1%;
            }
            input{
                margin-bottom: 1%;
            }
            input[type = 'submit']{
                cursor: pointer;
            }
            .record{
                margin-top: 12%;
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
                                                    <span id='header'>Stewardship Card</span>
                                            </div>

                                </div>
                        </div> <!--end of container-->
        <?php
            include 'includes/aside.php';
        ?>

        <div id="app" class = 'w3-row'>
                    <div class="form w3-col s12 m12 l12">
                     <span style = 'font-weight: bold;'><b>Current Selected Week:</b> <?php echo "<span style = 'color: red'>$week</span>";?></span> <br>                  
                     <span style ='font-weight: bold;'>Week Range: <?php
                            $start = new DateTime();
                            $year = date("Y");
                            $first = $start->setISODate($year, $week);
                            $first = $start->format("dS M, Y");
                            $last = date("dS M, Y", strtotime($first. ' + 7 days'));
                            echo "<span style = 'color: red;'>$first TO $last</span>"
                     ?></span> <br>                  
                     <form action = "" autocomplete="off" id = 'change' method = 'POST' enctype = 'multipart/form-data'> 
                                    <select name="week" required class = "w3-input  w3-round-large w3-border-green w3-border" @change = 'change'>
                                        <option >Change Week</option>
                                        <option value="1">Week 1</option>
                                        <option value="2">Week 2</option>
                                        <option value="3">Week 3</option>
                                        <option value="4">Week 4</option>
                                        <option value="5">Week 5</option>
                                        <option value="6">Week 6</option>
                                        <option value="7">Week 7</option>
                                        <option value="8">Week 8</option>
                                        <option value="9">Week 9</option>
                                        <option value="10">Week 10</option>
                                        <option value="11">Week 11</option>
                                        <option value="12">Week 12</option>
                                        <option value="13">Week 13</option>
                                        <option value="14">Week 14</option>
                                        <option value="15">Week 15</option>
                                        <option value="16">Week 16</option>
                                        <option value="17">Week 17</option>
                                        <option value="18">Week 18</option>
                                        <option value="19">Week 19</option>
                                        <option value="20">Week 20</option>
                                        <option value="21">Week 21</option>
                                        <option value="22">Week 22</option>
                                        <option value="23">Week 23</option>
                                        <option value="24">Week 24</option>
                                        <option value="25">Week 25</option>
                                        <option value="26">Week 26</option>
                                        <option value="27">Week 27</option>
                                        <option value="28">Week 28</option>
                                        <option value="29">Week 29</option>
                                        <option value="30">Week 30</option>
                                        <option value="31">Week 31</option>
                                        <option value="32">Week 32</option>
                                        <option value="33">Week 33</option>
                                        <option value="34">Week 34</option>
                                        <option value="35">Week 35</option>
                                        <option value="36">Week 36</option>
                                        <option value="37">Week 37</option>
                                        <option value="38">Week 38</option>
                                        <option value="39">Week 39</option>
                                        <option value="40">Week 40</option>
                                        <option value="41">Week 41</option>
                                        <option value="42">Week 42</option>
                                        <option value="43">Week 43</option>
                                        <option value="44">Week 44</option>
                                        <option value="45">Week 45</option>
                                        <option value="46">Week 46</option>
                                        <option value="47">Week 47</option>
                                        <option value="48">Week 48</option>
                                        <option value="49">Week 49</option>
                                        <option value="50">Week 50</option>
                                        <option value="51">Week 51</option>
                                        <option value="52">Week 52</option>
                                    </select>
                            
                                </form>                    
                    </div>
                    <div class="record"> 
                            <?php
                                $user = new Users();
                                $wk = "WK".$week;
                                $user->memStew($wk);
                            ?>
                    </div>
        </div>
        <script src = "js/vue.js"></script>
        <script src = "js/stewardship.js"></script>
</body>
</html>
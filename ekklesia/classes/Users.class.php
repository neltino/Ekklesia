<?php
    error_reporting(0);
    date_default_timezone_set("Africa/Lagos");
    class Users extends DBConn{
        
        public $inf;
        //creating tables
        public function createInfo(){
            
                $query = "CREATE TABLE IF NOT EXISTS info( 
                    ID   INT AUTO_INCREMENT,
                    church  VARCHAR(100) NOT NULL,
                    report VARCHAR(100) NOT NULL,
                    PRIMARY KEY(ID))";
                $this->OpenConn()->exec($query);
                $this->CloseConn();
            
        }
        public function createInEx($table){
           
            $query = "CREATE TABLE IF NOT EXISTS $table( 
                ID   INT AUTO_INCREMENT,
                transDate  date NOT NULL,
                description text NOT NULL,
                amount float NOT NULL,
                PRIMARY KEY(ID))";
            $this->OpenConn()->exec($query);
            $this->CloseConn();
        } 
       
        public function createMembers(){
            $query = "CREATE TABLE IF NOT EXISTS members( 
                ID   INT AUTO_INCREMENT,
                fullname  text NOT NULL,
                WK1 double NOT NULL,
                WK2 double NOT NULL,
                WK3 double NOT NULL,
                WK4 double NOT NULL,
                WK5 double NOT NULL,
                WK6 double NOT NULL,
                WK7 double NOT NULL,
                WK8 double NOT NULL,
                WK9 double NOT NULL,
                WK10 double NOT NULL,
                WK11 double NOT NULL,
                WK12 double NOT NULL,
                WK13 double NOT NULL,
                WK14 double NOT NULL,
                WK15 double NOT NULL,
                WK16 double NOT NULL,
                WK17 double NOT NULL,
                WK18 double NOT NULL,
                WK19 double NOT NULL,
                WK20 double NOT NULL,
                WK21 double NOT NULL,
                WK22 double NOT NULL,
                WK23 double NOT NULL,
                WK24 double NOT NULL,
                WK25 double NOT NULL,
                WK26 double NOT NULL,
                WK27 double NOT NULL,
                WK28 double NOT NULL,
                WK29 double NOT NULL,
                WK30 double NOT NULL,
                WK31 double NOT NULL,
                WK32 double NOT NULL,
                WK33 double NOT NULL,
                WK34 double NOT NULL,
                WK35 double NOT NULL,
                WK36 double NOT NULL,
                WK37 double NOT NULL,
                WK38 double NOT NULL,
                WK39 double NOT NULL,
                WK40 double NOT NULL,
                WK41 double NOT NULL,
                WK42 double NOT NULL,
                WK43 double NOT NULL,
                WK44 double NOT NULL,
                WK45 double NOT NULL,
                WK46 double NOT NULL,
                WK47 double NOT NULL,
                WK48 double NOT NULL,
                WK49 double NOT NULL,
                WK50 double NOT NULL,
                WK51 double NOT NULL,
                WK52 double NOT NULL,
                PRIMARY KEY(ID))";
            $this->OpenConn()->exec($query);
            $this->CloseConn();
        }

        public function insertInfo($church, $report){

            try {
                $query = "SELECT * FROM info";
                $inf = $this->OpenConn()->query($query);
                $inf = $inf->fetch();
                if($inf !== false && $inf !== NULL){
                    echo "Sorry, church info exists already!";
                }else{
                    $query = "INSERT INTO info (`church`, `report`) VALUES (?, ?)";
                    $prep = $this->OpenConn()->prepare($query);
                    $prep->bindParam(1, $church, PDO::PARAM_STR);
                    $prep->bindParam(2, $report, PDO::PARAM_STR);
                    $prep->execute();
                    $this->CloseConn();
                    echo "Successful!";
                }
            } catch(PDOException $e){
                echo "Something went wrong!";
            }
           
            
            
           
        }

        public function selectInfo(){
                //check if table exists
                try {
                    $query = "SELECT * FROM info";
                    $inf = $this->OpenConn()->query($query);
                    $inf = $inf->fetch();
                    $this->inf = $inf;
                } catch(PDOException $e){
                    $this->inf = NULL;
                }
               
                    
            
                 
                   
                
        }
        public function getInfo(){
            $info = $this->inf;
            
           if($info !== NULL && $info !== false){
            echo "<table class = 'w3-table-all w3-striped'>
                    <caption>Church Info</caption>
                    <th class = 'w3-deep-purple' >Church Name</th>
                    <th class = 'w3-deep-purple'>Report Presentation</th>
                    <th class = 'w3-deep-purple w3-centered'>Edit</th>
                    <tr>
                            <td>$info[church]</td>
                            <td>$info[report]</td>
                            <td>
                                <button @click = 'reveal' class = 'w3-button w3-green w3-hover-deep-purple w3-round' title = 'Edit'><i class = 'fas fa-pen'></i></button>
                               
                            </td>
                    </tr>
            </table>";
            }
        }
        public function updateInfo($churchup, $reportup){
            $query = "UPDATE info SET church = ?, report = ? ";
            $prep = $this->OpenConn()->prepare($query);
            $prep->bindParam(1, $churchup, PDO::PARAM_STR);
            $prep->bindParam(2, $reportup, PDO::PARAM_STR);
            $prep->execute();
            echo "Update Successful";
        }

        public function insertInEx($table, $date, $description, $amount){
            
            $query = "INSERT INTO $table (transDate, description, amount) VALUES(?,?,?)";
            $prep =$this->OpenConn()->prepare($query);
            $prep->bindParam(1, $date, PDO::PARAM_STR);
            $prep->bindParam(2, $description, PDO::PARAM_STR);
            $prep->bindParam(3, $amount, PDO::PARAM_STR);
            $prep->execute();
           
        }

        public function selectInExDate($table, $datee){
            
             //selecting today's transaction
             $query = "SELECT * FROM $table WHERE transDate = ?";
             $prep = $this->OpenConn()->prepare($query);
             $prep->bindParam(1, $datee, PDO::PARAM_STR);
             $prep->execute();
             $result = $prep->fetchAll();
             if($table == "income"){
                 $dir1 = "ForEditIn";
                 $dir2 = "forDeleteIn";
             }else{
                $dir1 = "ForEditEx";
                $dir2 = "ForDeleteEx";
             }
            if(!$result){
                echo "<h5 class = 'w3-text-red'>No Income record found for $datee</h5>";
            }else{
                echo "<table class = 'w3-table-all w3-striped'>
             <th class = 'w3-deep-purple' >Date</th>
             <th class = 'w3-deep-purple'>Description</th>
             <th class = 'w3-deep-purple w3-center'>Amount</th>
             <th class = 'w3-deep-purple w3-centered'>Edit</th>
             <th class = 'w3-deep-purple w3-centered'>Delete</th>";
            foreach($result as $row){
        
                   echo "<tr class = 'w3-hover-pale-red'>
                   <td>$row[transDate]</td>
                   <td>$row[description]</td>
                   <td class = 'w3-center'>".number_format($row['amount'],2)."</td>
                   <td>
                        <form action = 'view/edit_delete_single.php' method = 'POST' enctype = 'multipart/form-data'>
                            <input type = 'text' value = '$row[ID]' name = 'id' hidden>
                            <button type='submit' name = '$dir1' class = 'w3-button w3-green w3-hover-deep-purple w3-round' title = 'Edit'><i class = 'fas fa-pen'></i></button>
                        </form>
                   </td>
                   <td>
                        <form action = 'view/edit_delete_single.php' method = 'POST' enctype = 'multipart/form-data'>
                            <input type = 'text' value = '$row[ID]' name = 'id' hidden> 
                            <input type = 'text' value = '$row[transDate]' name = 'dat' hidden> 
                            <button type='submit' name = '$dir2'  class = 'w3-button w3-green w3-hover-deep-purple w3-round' title = 'Delete'><i class = 'fas fa-trash-alt'></i></button>
                        </form>
                   </td>
           </tr>";
    
            }
             
                  //total      
                    echo "</table>";
                    $query2 = "SELECT SUM(amount) AS total FROM $table WHERE transDate = ?";
                    $prep2 = $this->OpenConn()->prepare($query2);
                    $prep2->bindParam(1, $datee, PDO::PARAM_STR);
                    $prep2->execute();
                    $result2 = $prep2->fetch();
                   ;
                    echo "<h6 class = 'w3-text-red'>Total: ".number_format($result2['total'],2)."</h6> <br>";
            }
               

        }
        public function selectSingle($table, $id){
            $query = "SELECT * FROM $table WHERE ID = ?";
            $prep = $this->OpenConn()->prepare($query);
            $prep->bindParam(1, $id, PDO::PARAM_STR);
            $prep->execute();
            $result = $prep->fetch();
            if($table == "income"){
                $dir = "editIncome";
                echo  "<form action = '../$table.php' method = 'POST' enctype='multipart/form-data' autocomplete='off'> 
                <h5 class = 'w3-text-deep-purple'>Edit Income Item</h5>
                <input  type='hidden' name = 'id' value = '$result[ID]' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                <input  type='date' name = 'datee' value = '$result[transDate]' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                <input  type='text' name = 'descr' value = '$result[description]' class = 'w3-input w3-border-green w3-round-large w3-border' required>  
                <input  type='text' name = 'amoun' value = '$result[amount]' class = 'w3-input w3-border-green w3-round-large w3-border' required>  
                <input name = '$dir' type = 'submit' class = 'w3-button w3-green w3-round-large w3-hover-deep-purple'>
            </form>";
            }elseif($table == 'expenses'){
                $dir = "editExpenses";
                echo  "<form action = '../$table.php' method = 'POST' enctype='multipart/form-data' autocomplete='off'> 
                <h5 class = 'w3-text-deep-purple'>Edit Income Item</h5>
                <input  type='hidden' name = 'id' value = '$result[ID]' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                <input  type='date' name = 'datee' value = '$result[transDate]' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                <input  type='text' name = 'descr' value = '$result[description]' class = 'w3-input w3-border-green w3-round-large w3-border' required>  
                <input  type='text' name = 'amoun' value = '$result[amount]' class = 'w3-input w3-border-green w3-round-large w3-border' required>  
                <input name = '$dir' type = 'submit' class = 'w3-button w3-green w3-round-large w3-hover-deep-purple'>
            </form>";
            }elseif($table == 'members'){
                echo  "<form action = '../register.php' method = 'POST' enctype='multipart/form-data' autocomplete='off'> 
                <h5 class = 'w3-text-deep-purple'>Edit Member</h5>
                <input  type='hidden' name = 'id' value = '$result[ID]' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                <input  type='text' name = 'fullname' value = '$result[fullname]' class = 'w3-input w3-border-green w3-round-large w3-border' required>
                <input name = 'edit' type = 'submit' class = 'w3-button w3-green w3-round-large w3-hover-deep-purple'>
        </form>";
            }
           
    
        }
        public function editSingle($table, $id, $transdate, $description, $amount){
            
            $query = "UPDATE $table SET transDate = ?, description = ?, amount = ? WHERE ID = ? ";
            $prep = $this->OpenConn()->prepare($query);
            $prep->bindParam(1, $transdate, PDO::PARAM_STR);
            $prep->bindParam(2, $description, PDO::PARAM_STR);
            $prep->bindParam(3, $amount, PDO::PARAM_STR);
            $prep->bindParam(4, $id, PDO::PARAM_STR);
            $prep->execute();
        }
        public function deleteSingle($table,$id){
            $query = "DELETE FROM $table WHERE ID = ? ";
            $prep = $this->OpenConn()->prepare($query);
            $prep->bindParam(1, $id, PDO::PARAM_STR);
            $prep->execute();
        }
        public function monthylyReport($monthy, $presdate, $athand){
            
            //church info
            $info = "SELECT * FROM info";
            $inf = $this->OpenConn()->query($info);
            $churchinfo = $inf->fetchAll();
            $myChurch = "";
            $myReport = "";
            foreach($churchinfo as $infom){
                $myChurch = strtoupper($infom['church']);
                $myReport = strtoupper($infom['report']);
            }
            
            // month & year
            $newmonth = strtotime($monthy);
            $newmonth = strtoupper(date('F Y',$newmonth));
            $pres = strtotime($presdate);
            $pres1 = date('d',$pres);

            if($pres1[0] == 0){
                $only = $pres1[1];
            }else{
                $only = $pres1;
            }
            if($pres1[1] == 1){
                $suffix = "ST";
            }elseif($pres1[1] == 2){
                $suffix = "ND";
            }elseif($pres1[1] == 3){
                $suffix = "RD";
            }else{
                $suffix = "TH";
            }
            $dDay = strtoupper($only.$suffix." ". date('F, Y', $pres));
            //for income table
            $query = "SELECT * FROM income WHERE transDate LIKE '$monthy%' ORDER BY transDate ASC";
            $res1 = $this->OpenConn()->query($query);
            $result1 = $res1->fetchAll();
            //for income total
            $totalQuery = "SELECT SUM(amount) AS incTotal FROM income WHERE transDate LIKE '$monthy%'";
            $incTotal = $this->OpenConn()->query($totalQuery);
            $total = $incTotal->fetch();
            // Expenses
             
             $query2 = "SELECT * FROM expenses WHERE transDate LIKE '$monthy%' ORDER BY transDate ASC";
             $res2 = $this->OpenConn()->query($query2);
             $result2 = $res2->fetchAll();
             //for expenses total
             $totalQuery2 = "SELECT SUM(amount) AS exTotal FROM expenses WHERE transDate LIKE '$monthy%'";
             $exTotal = $this->OpenConn()->query($totalQuery2);
             $total2 = $exTotal->fetch();
            //Report
                            echo "<div class='tabset'>
                                     <!-- Tab 1 -->
                                    
                                        <input type='radio' name='tabset' id='tab1' checked class = 'w3-deep-purple'>
                                        <label for='tab1' class = 'tabb'>Income</label>
                                        
                                        <!-- Tab 2 -->
                                        <input type='radio' name='tabset' id='tab2'>
                                        <label for='tab2'>Expenditure</label>
                                        
                                        
                                        <div class='tab-panels'>
                                        <section id='marzen' class='tab-panel'>";
                                        
                                if($result1 == NULL && $result1 == false){
                                    echo "<h4 class = 'w3-text-red'> No income record found for this month!</h4>";
                                }else{
                                    echo "<h5 style = 'text-align: center; font-weight: bold;'>DIOCESE OF GOMBE, $myChurch</h5>
                                        <h6 style = 'text-align: center; font-weight: bold;'>FINANCIAL REPORT FOR THE MONTH OF $newmonth, PRESENTED TO THE $myReport ON $dDay</h6>
                                    <table>
                                            <caption style = 'text-align: left; font-weight: bold;'>BREAKDOWN OF INCOME ACCRUED</caption>
                                    <tr>
                                        <th>Date</th>
                                        <th>Item Description</th>
                                        <th>Amount(&#x20a6;)</th>
                                    </tr>";
                                    foreach($result1 as $row){
                                        echo "<tr>
                                            <td>$row[transDate]</td>
                                            <td>$row[description]</td>
                                            <td style = 'text-align: right'>".number_format($row['amount'],2)."</td>
                                            </tr>
                                            ";
                                       
                                    }
                                    echo "<tr>
                                            <td colspan = '2' style = 'font-weight: bold;'>TOTAL</td>
                                            <td style = 'text-align: right; font-weight: bold;'>".number_format($total['incTotal'], 2)."</td>
                                    </tr>
                                    </table>
                                <div class = 'w3-row wardens'> <br>
                                        <div class = 'w3-col s6 m6 l6'>___________________ <br><span>PEOPLE'S WARDEN</span></div>
                                        <div class = 'w3-col s6 m6 l6' style = 'text-align: right;'>___________________ <br><span>PASTOR'S WARDEN</span></div>
                                        
                                </div>   
                                <br>
                                    <div class = 'noprint'>
                                    <button class = 'w3-button w3-deep-purple w3-round' onClick = 'window.print()'>Print Report</button>
                                    </div>";
                                }
                          
                                
                                echo "</section>
                                <section id='rauchbier' class='tab-panel'>";
                                        if($result2 == NULL && $result2 == false){
                                    echo "<h4 class = 'w3-text-red'> No expenses record found for this month!</h4>";
                                }else{
                                    echo "<table>
                                            <caption style = 'text-align: left; font-weight: bold;'>BREAKDOWN OF EXPENDITURE</caption>
                                    <tr>
                                        <th>Date</th>
                                        <th>Item Description</th>
                                        <th>Amount(&#x20a6;)</th>
                                    </tr>";
                                    foreach($result2 as $row){
                                        echo "<tr>
                                            <td>$row[transDate]</td>
                                            <td>$row[description]</td>
                                            <td style = 'text-align: right'>".number_format($row['amount'],2)."</td>
                                            </tr>
                                            ";
                                       
                                    }
                                    echo "<tr>
                                            <td colspan = '2' style = 'font-weight: bold;'>TOTAL</td>
                                            <td style = 'text-align: right; font-weight: bold;'>".number_format($total2['exTotal'], 2)."</td>
                                    </tr>
                                    </table>
                                    <div class = 'summary' style = 'font-weight: bold; margin-left: 10px;'>
                                        <h6 style = 'font-weight: bold'>BALANCE = INCOME - EXPNDITURE</h6>
                                        <span> BALANCE = ".number_format($total['incTotal'], 2)." - ".number_format($total2['exTotal'], 2)."</span> <br> BALANCE = ";
                                        $balance = $total['incTotal'] - $total2['exTotal'];
                                        echo number_format($balance,2);
                                     echo "<br>
                                        <span>Total Cash @ Bank =". number_format($balance -$athand,2)." Total Cash @ Hand = ". number_format($athand,2)."</span>
                                    </div>
                                    <div class = 'w3-row wardens'> <br>
                                            <div class = 'w3-col s6 m6 l6'>___________________ <br><span>PEOPLE'S WARDEN</span></div>
                                            <div class = 'w3-col s6 m6 l6' style = 'text-align: right;'>___________________ <br><span>PASTOR'S WARDEN</span></div>
                                            
                                    </div>   
                                    <br>
                                        <div class = 'noprint'>
                                        <button class = 'w3-button w3-deep-purple w3-round' onClick = 'window.print()'>Print Report</button>
                                        </div>
                                    </section>
                                    
                                </div>
                                
                                </div>";
                                }
        }

        public function insertMember($name){
            $query = "INSERT INTO members (fullname) VALUES(?)";
            $prep =$this->OpenConn()->prepare($query);
            $prep->bindParam(1, $name, PDO::PARAM_STR);
            $prep->execute();
           
        }
        public function getMembers(){
           try{
            $query = "SELECT ID, fullname FROM members ORDER BY fullname ASC";
            $prep = $this->OpenConn()->query($query);
            $result = $prep->fetchAll();
            if ($result) {
                echo "<table class = 'w3-table-all w3-striped'>
                <th class = 'w3-deep-purple' >S/N</th>
                <th class = 'w3-deep-purple' >Name</th>
                <th class = 'w3-deep-purple w3-center'>Edit</th>
                <th class = 'w3-deep-purple w3-center'>Delete</th>";
                $i =1;
                foreach ($result as $row) {
                    echo "<tr class = 'w3-hover-pale-red'>
                      <td>$i.</td>
                      <td>$row[fullname]</td>
                      
                      <td class = 'w3-center'>
                           <form action = 'view/register_edit_del.php' method = 'POST' enctype = 'multipart/form-data'>
                               <input type = 'text' value = '$row[ID]' name = 'id' hidden>
                               <button type='submit' name = 'edit' class = 'w3-button w3-green w3-hover-deep-purple w3-round' title = 'Edit'><i class = 'fas fa-pen'></i></button>
                           </form>
                      </td>
                      <td class = 'w3-center'>
                           <form action = 'view/register_edit_del.php' method = 'POST' enctype = 'multipart/form-data'>
                               <input type = 'text' value = '$row[ID]' name = 'id' hidden> 
                               <button type='submit' name = 'del'  class = 'w3-button w3-green w3-hover-deep-purple w3-round' title = 'Delete'><i class = 'fas fa-trash-alt'></i></button>
                           </form>
                      </td>
              </tr>";
              $i++;
                }
            }
           }catch(PDOException $e){
            echo "<h6 class = 'w3-text-red'>No Registered Members yet!";
           }
        }
        public function editMember($fullname, $id){
            $query = "UPDATE members SET fullname = ? WHERE ID = ? ";
            $prep = $this->OpenConn()->prepare($query);
            $prep->bindParam(1, $fullname, PDO::PARAM_STR);
            $prep->bindParam(2, $id, PDO::PARAM_STR);
            $prep->execute();
        }
        public function memStew($week){
            
           
            try{
                $query = "SELECT ID, fullname, $week FROM members ORDER BY fullname ASC";
            $prep = $this->OpenConn()->query($query);
            $result = $prep->fetchAll();
            if ($result) {
                echo "<form action = 'view/stew.php' method = 'POST' enctype = 'multipart/form-data'>
                    <input type = 'text' value = '$week' name = 'week' hidden>
                <table class = 'w3-table-all w3-striped'>
                        <tr>
                            <th class = 'w3-deep-purple' >S/N</th>
                            <th class = 'w3-deep-purple' >Name</th>
                            <th class = 'w3-deep-purple w3-center'>Amount</th>
                        </tr>
                        
                        ";
                $i =1;
                foreach ($result as $row) {
                    echo "<tr class = 'w3-hover-pale-red'>
                            <td>$i.</td>
                            <td>$row[fullname]</td>
                           
                            <td class = 'w3-center'>
                                    <input type = 'text' value = '$row[ID]' name = 'id[]' hidden>
                                    <input type = 'number' value = '$row[$week]' step = 'any' name = 'amount[]' >
                                    
                            </td>
                             
                        </tr>";
                    $i++;
                }
                echo "</table>
                <input type='submit' class = 'w3-input w3-green w3-hover-deep-purple w3-round'>
                </form>
                ";
            }
                
            }catch(PDOException $e){
                echo "<h6 class = 'w3-text-red'>No Registered Members yet!";
            }
        }
        public function stewUpdate($week,$amount, $id){
            $query = "UPDATE members SET $week = ? WHERE ID = ? ";
            $prep = $this->OpenConn()->prepare($query);

            for($i =0; $i< count($amount); $i++){
            $prep->bindParam(1, $amount[$i], PDO::PARAM_STR);
            $prep->bindParam(2, $id[$i], PDO::PARAM_STR);
            $prep->execute();
        }
           
        }
        public function annualStew(){
            try{
             $query = "SELECT * FROM members ORDER BY fullname ASC";
             $prep = $this->OpenConn()->query($query);
             $result = $prep->fetchAll();
             if ($result) {
                 echo "<table class = 'w3-table-all w3-striped'>
                 <th>S/N</th>
                 <th>Name</th>
                 <th>WK1</th>
                 <th>WK2</th>
                 <th>WK3</th>
                 <th>WK4</th>
                 <th>WK5</th>
                 <th>WK6</th>
                 <th>WK7</th>
                 <th>WK8</th>
                 <th>WK9</th>
                 <th>WK10</th>
                 <th>WK11</th>
                 <th>WK12</th>
                 <th>WK13</th>
                 <th>WK14</th>
                 <th>WK15</th>
                 <th>WK16</th>
                 <th>WK17</th>
                 <th>WK18</th>
                 <th>WK19</th>
                 <th>WK20</th>
                 <th>WK21</th>
                 <th>WK22</th>
                 <th>WK23</th>
                 <th>WK24</th>
                 <th>WK25</th>
                 <th>WK26</th>
                 <th>WK27</th>
                 <th>WK28</th>
                 <th>WK29</th>
                 <th>WK30</th>
                 <th>WK31</th>
                 <th>WK32</th>
                 <th>WK33</th>
                 <th>WK34</th>
                 <th>WK35</th>
                 <th>WK35</th>
                 <th>WK37</th>
                 <th>WK38</th>
                 <th>WK39</th>
                 <th>WK40</th>
                 <th>WK41</th>
                 <th>WK42</th>
                 <th>WK43</th>
                 <th>WK44</th>
                 <th>WK45</th>
                 <th>WK46</th>
                 <th>WK47</th>
                 <th>WK48</th>
                 <th>WK49</th>
                 <th>WK50</th>
                 <th>WK51</th>
                 <th>WK52</th>
                 <th>Total</th>";
                 
                 $i =1;
                 foreach ($result as $row) {
                     echo "<tr class = 'w3-hover-pale-red'>
                       <td>$i.</td>
                       <td>$row[fullname]</td>
                       
                       <td class = 'w3-center'>$row[WK1]</td>
                       <td class = 'w3-center'>$row[WK2]</td>
                       <td class = 'w3-center'>$row[WK3]</td>
                       <td class = 'w3-center'>$row[WK4]</td>
                       <td class = 'w3-center'>$row[WK5]</td>
                       <td class = 'w3-center'>$row[WK6]</td>
                       <td class = 'w3-center'>$row[WK7]</td>
                       <td class = 'w3-center'>$row[WK8]</td>
                       <td class = 'w3-center'>$row[WK9]</td>
                       <td class = 'w3-center'>$row[WK10]</td>
                       <td class = 'w3-center'>$row[WK11]</td>
                       <td class = 'w3-center'>$row[WK12]</td>
                       <td class = 'w3-center'>$row[WK13]</td>
                       <td class = 'w3-center'>$row[WK14]</td>
                       <td class = 'w3-center'>$row[WK15]</td>
                       <td class = 'w3-center'>$row[WK16]</td>
                       <td class = 'w3-center'>$row[WK17]</td>
                       <td class = 'w3-center'>$row[WK18]</td>
                       <td class = 'w3-center'>$row[WK19]</td>
                       <td class = 'w3-center'>$row[WK20]</td>
                       <td class = 'w3-center'>$row[WK21]</td>
                       <td class = 'w3-center'>$row[WK22]</td>
                       <td class = 'w3-center'>$row[WK23]</td>
                       <td class = 'w3-center'>$row[WK24]</td>
                       <td class = 'w3-center'>$row[WK25]</td>
                       <td class = 'w3-center'>$row[WK26]</td>
                       <td class = 'w3-center'>$row[WK27]</td>
                       <td class = 'w3-center'>$row[WK28]</td>
                       <td class = 'w3-center'>$row[WK29]</td>
                       <td class = 'w3-center'>$row[WK30]</td>
                       <td class = 'w3-center'>$row[WK31]</td>
                       <td class = 'w3-center'>$row[WK32]</td>
                       <td class = 'w3-center'>$row[WK33]</td>
                       <td class = 'w3-center'>$row[WK34]</td>
                       <td class = 'w3-center'>$row[WK35]</td>
                       <td class = 'w3-center'>$row[WK36]</td>
                       <td class = 'w3-center'>$row[WK37]</td>
                       <td class = 'w3-center'>$row[WK38]</td>
                       <td class = 'w3-center'>$row[WK39]</td>
                       <td class = 'w3-center'>$row[WK40]</td>
                       <td class = 'w3-center'>$row[WK41]</td>
                       <td class = 'w3-center'>$row[WK42]</td>
                       <td class = 'w3-center'>$row[WK43]</td>
                       <td class = 'w3-center'>$row[WK44]</td>
                       <td class = 'w3-center'>$row[WK45]</td>
                       <td class = 'w3-center'>$row[WK46]</td>
                       <td class = 'w3-center'>$row[WK47]</td>
                       <td class = 'w3-center'>$row[WK48]</td>
                       <td class = 'w3-center'>$row[WK49]</td>
                       <td class = 'w3-center'>$row[WK50]</td>
                       <td class = 'w3-center'>$row[WK51]</td>
                       <td class = 'w3-center'>$row[WK52]</td>
                       <td class = 'w3-center'>";
                       $tot = $row['WK1']+$row['WK2']+$row['WK3']+$row['WK4']+$row['WK5']+$row['WK6']+$row['WK7']+$row['WK8']+$row['WK9']+$row['WK10']
                       +$row['WK11']+$row['WK12']+$row['WK13']+$row['WK14']+$row['WK15']+$row['WK16']+$row['WK17']+$row['WK18']+$row['WK19']+$row['WK20']
                       +$row['WK21']+$row['WK22']+$row['WK23']+$row['WK24']+$row['WK25']+$row['WK26']+$row['WK27']+$row['WK28']+$row['WK29']+$row['WK30']
                       +$row['WK31']+$row['WK32']+$row['WK33']+$row['WK34']+$row['WK35']+$row['WK36']+$row['WK37']+$row['WK38']+$row['WK39']+$row['WK40']
                       +$row['WK41']+$row['WK42']+$row['WK43']+$row['WK44']+$row['WK45']+$row['WK46']+$row['WK47']+$row['WK48']+$row['WK49']+$row['WK50']
                       +$row['WK51']+$row['WK52'];
                      echo  number_format($tot,2);
                      echo" </td>
                       
               </tr>";
               $i++;
                 }
                 echo "</table>";

             }
            }catch(PDOException $e){
             echo "<h6 class = 'w3-text-red'>No Registered Members yet!";
            }
         }
         public function backup(){
             try{
                $items = ['income', 'expenses', 'members', 'info'];
                foreach($items as $item){
                    $query = "SELECT * FROM $item";
                    $prep = $this->OpenConn()->query($query);
                    $result = $prep->fetchAll();
                    $drop = json_encode($result);
                    $today = date('Y-m-d-H-i-s');
                    $link = $today." ".$item.".json";
                   if(!file_exists("../../../../ekklesia_backup")){
                    mkdir("../../../../ekklesia_backup");
                   }
                   file_put_contents("../../../../ekklesia_backup/$link", $drop);
                }
                echo "Data backup SUCCESSFUL";
             }catch(PDOException $e){
                echo "Sorry data backup UNSUCCESSFUL!";
             }
         }
         public function reset(){
            try{
                $trunc = ["income", "expenses"];
                foreach($trunc as $trunk){
                    $query = "TRUNCATE TABLE $trunk";
                    $$prep = $this->OpenConn()->query($query);
                }
                $up = "UPDATE members SET WK1 = 0, WK2 = 0, WK3 = 0, WK4 = 0, WK5 = 0, WK6 = 0, WK7 = 0, WK8 = 0, WK9 = 0, WK10 = 0,
                WK11 = 0, WK12 = 0, WK13 = 0, WK14 = 0, WK15 = 0, WK16 = 0, WK17 = 0, WK18 = 0, WK19 = 0, WK20 = 0, WK21 = 0, 
                WK22 = 0, WK23 = 0, WK24 = 0, WK25 = 0, WK26 = 0, WK27 = 0, WK28 = 0, WK29 = 0, WK30 = 0, WK31 = 0, WK32 = 0, 
                WK33 = 0, WK34 = 0, WK35 = 0, WK36 = 0, WK37 = 0, WK38 = 0, WK39 = 0, WK40 = 0, WK41 = 0, WK42 = 0, WK43 = 0,
                WK44 = 0, WK45 = 0, WK46 = 0, WK47 = 0, WK48 = 0, WK49 = 0, WK50 = 0, WK51 = 0, WK52 = 0";
                $upsub = $this->OpenConn()->query($up);
                echo "Data Reset Successful!";
            }catch(PDOException $e){
                echo "Reset UNSUCCESSFUL!";
            }
         }
                     
    }
 ?>
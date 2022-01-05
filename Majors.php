<?php require_once "insert.php"; ?>
<!DOCTYPE html>
<html dir="rtl">
  <head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>  عنوان الطالب </title>
    <style>

/******** in form *********/

      body, div, form, input, select, p { 
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 18px;
      color: #666;
      line-height: 22px;
      }

/******** header *********/
     
      h2 {
      font-weight: 500;
      }

/******** testbox *********/

      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      }

/******** form *********/

      form {
      width:70%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0 #001624; 
      }

/******** header img *********/

      .banner {
      position: relative;
      height: 110px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }

/******** input/select *********/

      input, select {
      margin-bottom: 50px;
      border: 2px solid #ccc;
      border-radius: 5px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      .item:hover p, .item:hover i,input:hover::placeholder, a {
      color: #00131f;
      }
      .item input:hover, .item select:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #00131f;
      color: #00131f;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }

/******** date *********/

      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size:20px;
      color: #a9a9a9;
      }
      .item i {
      right: 2%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .fa-calendar-alt:before {
       content: "\f073";
      }
    
/******** submit *********/
      
      .btn- input[type=submit] {
      margin-top: 20px;
      text-align: center;
      }
      input[type=submit] {
      width: 180px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: black;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      input[type=submit]:hover {
        background: rgba(0, 0, 0, 0.774);
      }
      @media (min-width: 568px) {
      .tow-item, .tow-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .tow-item input, .tow-item input {
      width: calc(50% - 20px);
      }
      .tow-item select {
      width: calc(50% - 8px);
      }
      }

/******** span (*) *********/
     
      .item span {
      color: red;
      }

/******** footer *********/

      .footer {
    position: relative;
    margin-bottom:25px;
    bottom:0;
    width:100%;
    background-color:#121518;;
    color: rgb(226, 226, 226);
    text-align: center;
    font-family: 'Amiri', serif;
    font-weight:bold;
    font-size:16px;
      }
      h3{
        color :red;
      }
      /******** log out *********/
.img2 {
  width: 50px;
  border-radius: 90px;
  float: left;
}

.logout {
  font-size: .8em;
	position: relative;
  right: -8px;
  bottom: -4px;
  overflow: hidden;
  opacity: 0;
  transition: opacity .30s;
  -webkit-transition: opacity .35s;
  margin-right:10px;
  margin-left:20px;
  color: rgb(226, 226, 226);

}

.button {
	text-decoration: none;
	float: right;
  padding: 9px;
  margin: 1px;
  color: white;
  width: 50px;
  background-color: black;
  transition: width .35s;
  -webkit-transition: width .35s;
  overflow: hidden;
  margin-bottom:90%;
}

a:hover {
  width: 100px;
}

a:hover .logout{
  opacity: .9;
}

a {
  text-decoration: none;
}
    </style>
  </head>
  <body>
  <div class="navigation">
  
	<a class="button" href="logout.php">
  <img class="img2" src="img/about.png" alt="Image">
  
  <div class="logout">تسجيل الخروج</div>

	</a>
  </div>
    <div class="testbox">
          <form action="insert.php" method="POST" >
            <div class="banner">
            <img src="img/header1.png" alt="logo" style="max-width:100%;height:auto;">
            </div>
            <hr>
            <center>
            <h2> - التخصصات التي ترغب بها - </h2>
            </center>
            <h2>املأ المعلومات أدناه :</h2>
            <p> التخصصات التي ترغب بها - حسب الأولوية - <span>*</span></p>
            <div class="tow-item">
            <?php

                $sql = "SELECT * FROM registeration WHERE email = '$email'";
                $result =  mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $reg_id  = $row['id'];
                    }

                $sql2 = "SELECT * FROM student WHERE reg_id = '$reg_id'";
                $result2 =  mysqli_query($con, $sql2);
                $resultCheck2 = mysqli_num_rows($result2);

                if ($resultCheck2 > 0){
                    while($row = mysqli_fetch_assoc($result2)){
                      $student_acceptance = $row['student_acceptance'];
                      $student_id = $row['student_id'];

                    }

                    $sql3 = "SELECT * FROM high_school_certificate WHERE student_id = '$student_id'";
                    $result3 =  mysqli_query($con, $sql3);
                    $resultCheck3 = mysqli_num_rows($result3);
    
                    if ($resultCheck3 > 0){
                        while($row = mysqli_fetch_assoc($result3)){
                            $certificate_avg    = $row['certificate_avg'];
                            $certificate_branch = $row['certificate_branch'];
                        }
                  if(str_contains($student_acceptance, 'موازي')){
                    $result = $con->query("select * from major Where major_minimum_avg_2 <= $certificate_avg and major_branch LIKE '%$certificate_branch%' ;");
                    echo "<select name='major_name1' required>";
                    echo "<option value=''>- الخيار الاول -</option>";

                        while ($row = $result->fetch_assoc()) {

                            unset($major_name);

                                $major_name = $row['major_name'];
                                echo '<option value=" '.$major_name.'"  >'.$major_name.'</option>';
                    }
                    echo "</select>";
                }
              
                echo "</div>";
                echo "<div class='tow-item'>";

                }
                  if(str_contains($student_acceptance, 'موازي')){
                      $result = $con->query("select * from major Where major_minimum_avg_2 <= $certificate_avg and major_branch LIKE '%$certificate_branch%';");
                      echo "<select name='major_name2' required>";
                      echo "<option value='' >- الخيار الثاني -</option>";
  
                          while ($row = $result->fetch_assoc()) {
  
                              unset($major_name);
  
                                  $major_name = $row['major_name'];
                                  echo '<option value=" '.$major_name.'"  >'.$major_name.'</option>';
                      }
                      echo "</select>";
                  }
  
                  echo "</div>";
                  echo "<div class='tow-item'>";

                    if(str_contains($student_acceptance, 'موازي')){
                      $result = $con->query("select * from major Where major_minimum_avg_2 <= $certificate_avg and major_branch LIKE '%$certificate_branch%';");
                      echo "<select name='major_name3' required>";
                      echo "<option value=''>- الخيار الثالث -</option>";
  
                          while ($row = $result->fetch_assoc()) {
  
                              unset($major_name);
  
                                  $major_name = $row['major_name'];
                                  echo '<option value=" '.$major_name.'"  >'.$major_name.'</option>';
                      }
                      echo "</select>";
                  }
  } }
             ?>
          </div>


        <center>
          <input type="submit"  name= "add_majors" value = " ادخل وثائقك   " />

      </form>
      <br>
                  <!-- Footer Start -->
                  <div class="footer" align="center">
                    <h4>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </h4>
                </div>
                <!-- Footer End -->
    </div>
  </body>
</html>
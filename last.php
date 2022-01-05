<?php require_once "insert.php"; ?>
<!DOCTYPE html>
<html dir="rtl">
  <head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>   تم </title>
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
      .imp{
        color: red;
      }
    </style>
  </head>
  <body>
    <div class="testbox">
    <form action="logout.php" method="post">
            <div class="banner">
            <img src="img/header1.png" alt="logo" style="max-width:100%;height:auto;">
            </div>
            <center>
<hr>
            <div class="item">
            <h2> يجب عليك دفع رسوم طلب الالتحاق ليتم ارساله والموافقة عليه  </h2>
            <h2>  رقم الدفع الخاص بك هو :     </h2>
            <?php
            $sql = "SELECT * FROM student WHERE student_email = '$email'";
            $result =  mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
    echo $student_email;
            if ($resultCheck > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $reg_id  = $row['reg_id'];
                    echo "<div class = 'imp'>";
                    echo $reg_id ;
                }

            $sql2 = "SELECT * FROM student WHERE student_email = '$email'";
            $result2 =  mysqli_query($con, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);

            if ($resultCheck2 > 0){
                while($row = mysqli_fetch_assoc($result2)){
                    $student_nationality    = $row['student_nationality'];
                    $student_acceptance = $row['student_acceptance'];
                    $student_id  = $row['student_id'];
                    echo $student_id ;
                    echo "</div>";

                }
    
            $sql3 ="select * from request_fee Where request_type LIKE '%$student_acceptance%' and request_nationality LIKE '%$student_nationality%';";
            $result3 =  mysqli_query($con, $sql3);
            $resultCheck3 = mysqli_num_rows($result3);

            if ($resultCheck3 > 0){
                while($row = mysqli_fetch_assoc($result3)){
                  $request_value = $row['request_value'];
                  echo "<br><br>احرص على دفع رسم طلب الالتحاق على eFAWATEERcom ";
                  $request_value = $row['request_value'];
                  echo "<br><br> قيمة الدفع : <br>" ;
                  echo "<div class = 'imp'>";
                  echo  $request_value;
                  echo "</div>";
                  echo " دينار اردني" ;
                  echo "<br><br> بعد ان تتم عملية الدفع سيتم ارسال رسالة في غضون 48 ساعة على بريدك الالكتروني تتضمن نتائج قبولك في جامعة العلوم الاسلامية العالمية";
                }
              }
              $sql4 = "SELECT * FROM year WHERE year_effective = '1'";
              $result4 =  mysqli_query($con, $sql4);
              $resultCheck4 = mysqli_num_rows($result4);
  
              if ($resultCheck4 > 0){
                  while($row = mysqli_fetch_assoc($result4)){
                      $year_id    = $row['year_id'];
                  }
              $insert_data = "INSERT INTO payment_request (reg_id, student_id, year_id, request_id, pay_status)
              VALUES ('$reg_id' ,'$student_id', '$year_id', '$request_value', '0');";
              $run_query = mysqli_query($con, $insert_data);

            }
            }
            }               

            ?>

            </div>
            <center>
            <input type="submit" value="تسجيل الخروج " name="submit">
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
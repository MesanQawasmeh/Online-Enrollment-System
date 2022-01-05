<?php require_once "insert.php"; ?>
<!DOCTYPE html>
<html dir="rtl">
  <head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="css/admin.css" rel="stylesheet">
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
    <form action="admin-show.php" method="post">
            <div class="banner">
            <img src="img/header1.png" alt="logo" style="max-width:100%;height:auto;">
            </div>
            <center>
<hr>
            <div class="item">
            <?php
$name =1;
$order =1;
$con = mysqli_connect('localhost', 'root', '', 'online_enrollment_system');
  echo "   <center>
  <div class='main'>
  <table  class ='approved-students'>
  <thead>
  <tr>
  <th>الرقم</th>
  <th> اسم الطالب</th>
  <th> البريد الالكتروني </th>
  <th>المبلغ</th>
  </tr>
  </thead>";
 

 
      $result1 = mysqli_query($con,"SELECT * FROM student;");
 
while($row = mysqli_fetch_array($result1))
{
         $reg_id = $row['reg_id'];
         $student_id = $row['student_id'];
         $student_a_name = $row['student_a_name'];
         $student_nationality = $row['student_nationality'];
         $student_acceptance = $row['student_acceptance'];
         $major_id = $row['major_id'];
         if ($reg_id == 1){
                     $student_email = $row['student_email'];
                     $sql3 ="select * from request_fee Where request_type LIKE '%$student_acceptance%' and request_nationality LIKE '%$student_nationality%' ";
                     $result3 =  mysqli_query($con, $sql3);
                     $resultCheck3 = mysqli_num_rows($result3);
         
                     if ($resultCheck3 > 0){
                         while($row = mysqli_fetch_assoc($result3)){
                            $request_id = $row['request_id'];
                            $request_value = $row['request_value'];
                            
                          echo "<form action='admin_control.php' method='POST'>";
                          echo "<tbody>";
                          echo "<tr>";
                          echo "<td>" . $reg_id;
                          echo $student_id. "</td>";
                          echo "<td>" . $student_a_name . "</td>";
                          echo "<td>" . $student_email . "</td>";
                          echo "<td>" . $request_value . "</td>";
                          echo "</tr>";
                            }
                                    
                        }}
                  
                      

                
              
  }       
  
  echo 
  "             </div>
  </center>
  </table>      
  </form>

  ";  
  ?>

            </div>
            <center>
            <input type="submit" value=" الخروج " name="submit">
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
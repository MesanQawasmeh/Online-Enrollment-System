<?php
session_start();
require "connection.php";

?>
<!DOCTYPE html >
<html>
<head>
  <title>الطلبة المقبولون</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/admin.css" rel="stylesheet">

</head>
<body>
  <center>
    <div class="banner">
      <img src="img/header1.png" alt="logo" style="max-width:100%; height:auto;">
    </div>
</center>

    <hr>
   <div class='sidenav'>
       <a href='admin-show.php'> الشاشة الرئيسية  </a>
       <a href='admin.php'>  الموافقة وتحديد التخصص</a>
       <a href='approved.php'><div class ="m"> الطلبة المقبولون </div></a>
       <a href='student-info.php'> اضافة طالب</a>
       <a href='admin-delete.php'>حذف طالب</a>
       <a href='logout.php'>تسجيل الخروج</a>
     </div>



<?php
$name =1;
$order =1;
$con = mysqli_connect('localhost', 'root', '', 'online_enrollment_system');
$sql = "SELECT * FROM payment_request WHERE pay_status = '1';";
$result =  mysqli_query($con, $sql);
$resultCheck = mysqli_num_rows($result);
echo "
<center>
<div class='main'>
<table class ='students' style='width:80%' >
<thead>
<thead>
<tr>
<th>الرقم</th>
<th> اسم الطالب</th>
<th> البريد الالكتروني </th>
<th> المعدل </th>
<th> الجنسية </th>
<th> نوع القبول</th>
<th> التخصصات</th>
</tr>
</thead>";

if ($resultCheck > 0){

    while($row = mysqli_fetch_assoc($result)){
      $student_id  = $row['student_id'];
      $reg_id  = $row['reg_id'];
      $request_id  = $row['request_id'];
      
      $result0 = mysqli_query($con,"SELECT * FROM year where 	year_effective = '1';");
      while($row = mysqli_fetch_array($result0))
        {

          $year_id  = $row['year_id'];
        }

      $result1 = mysqli_query($con,"SELECT * FROM student where student_id = '$student_id' ;");
      $result3 = mysqli_query($con,"SELECT * FROM  admission_fee where admission_id  = '$request_id' ;");
      $result5 = mysqli_query($con,"SELECT * FROM  payment where 	pay_status  = '1' and 	delivered  = '0' and reg_id = '$reg_id';");
      $result6 = mysqli_query($con,"SELECT * FROM  high_school_certificate where student_id  = '$student_id';");
  //payment
  while($row = mysqli_fetch_array($result5))
  {
      //student
while($row = mysqli_fetch_array($result1))
{
         $student_id = $row['student_id'];
         $student_a_name = $row['student_a_name'];
         $student_nationality = $row['student_nationality'];
         $student_acceptance = $row['student_acceptance'];
         $major_id = $row['major_id'];
         $student_email = $row['student_email'];
        if ($major_id != 26) {

                                //high_school_certificate
                          while($row = mysqli_fetch_array($result6))
                          {
                            $certificate_avg = $row['certificate_avg'];
                            //major
                            $result7 = mysqli_query($con,"SELECT * FROM  major where major_id  = '$major_id';");
                            while($row = mysqli_fetch_array($result7))
                            {
                          $major_name  = $row['major_name'];
                          echo "<form action='admin_control.php' method='POST'>";
                          echo "<tbody>";
                          echo "<tr>";
                          echo "<td>" . $reg_id;
                          echo $student_id. "</td>";
                          echo "<td>" . $student_a_name . "</td>";
                          echo "<td>" . $student_email . "</td>";
                          echo "<td>" . $certificate_avg . "</td>";
                          echo "<td>" . $student_nationality . "</td>";
                          echo "<td>" . $student_acceptance . "</td>";
                          echo "<td>" . $major_name ."</td>";
                          echo "</tr>";
                            }
                                    
                            }
                  }
                  }        

                }
              }
            }
  echo 
  "   </table>
   
    <center>
              <input class='btn' type='submit'  name= 'send' value =' ارسال الرقم الجامعي وكلمة السر '/>
              <br>
              <br>
              <br>
          </center>
         </form>
  
  ";  
  ?>
                    <div class="footer" align="center">
                    <h4>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </h4>
                </div>
  



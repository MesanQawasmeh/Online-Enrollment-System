<?php
session_start();
require "connection.php";

?>
<!DOCTYPE html >
<html>
<head>
  <title> الشاشة الرئيسية </title>
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
       <a href='admin-show.php'> <div class ="m">الشاشة الرئيسية </div> </a>
       <a href='admin.php'>  الموافقة وتحديد التخصص</a>
       <a href='approved.php'> الطلبة المقبولون </a>
       <a href='student-info.php'> اضافة طالب</a>
       <a href='admin-delete.php'>حذف طالب</a>
       <a href='logout.php'>تسجيل الخروج</a>
     </div>



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
  <th>اسم الطالب</th>
  <th>البريد الالكتروني</th>
  <th>طلب الالتحاق</th>
  <th>القبول</th>
  <th>الوثائق</th>
  </tr>
  </thead>";
  
$result1 = mysqli_query($con,"SELECT * FROM student");
while($row = mysqli_fetch_array($result1))
{
         $student_id = $row['student_id'];
         $reg_id = $row['reg_id'];
         $student_a_name = $row['student_a_name'];
         $student_nationality = $row['student_nationality'];
         $student_acceptance = $row['student_acceptance'];
         $major_id = $row['major_id'];
         $student_email = $row['student_email'];
         
            echo "<form action='admin_control.php' method='POST'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $reg_id;
            echo $student_id. "</td>";
            echo "<td>" . $student_a_name . "</td>";
            echo "<td>" . $student_email . "</td>";
            if ($major_id == 25){
              echo "<td>مرفوض</td>";
              echo "<td>مرفوض</td>";
            }else{
            $sql = "SELECT * FROM payment_request WHERE student_id = $student_id ;";
            $result =  mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
              while($row = mysqli_fetch_assoc($result)){
                $request_id  = $row['request_id'];
                $pay_status  = $row['pay_status'];

                echo "<td>" . $request_id ;
              if ($pay_status ==1){
                  echo " / مدفوع</td>";
                 }else{
              echo " / غير مدفوع</td>";
            }}
            if ($major_id == null){
              echo "<td>غير محدد</td>";

            }else{
            $sql = "SELECT * FROM payment WHERE student_id = $student_id ;";
            $result =  mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
              while($row = mysqli_fetch_assoc($result)){
                $admission_id   = $row['admission_id'];
                $service_id    = $row['service_id'];
                $exams_id    = $row['exams_id'];
                $insurances_id    = $row['insurances_id'];
                $hour_fee   = $row['hour_fee'];
                $total = $admission_id + $service_id + $exams_id + $insurances_id + $hour_fee ;
                echo "<td>" . $total ;
                $sql = "SELECT * FROM payment WHERE pay_status = '1' ;";
                $result =  mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                 while($row = mysqli_fetch_assoc($result)){
                  echo " / مدفوع</td>";
                 }
            }else{
              echo " / غير مدفوع</td>";

            }
              }}else{echo "<td>مرفوض</td>";}
            
           

}}}
$sql = "SELECT * FROM documents WHERE student_id = '$student_id' ;";
$result =  mysqli_query($con, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0){
 while($row = mysqli_fetch_assoc($result)){
echo "<td> <a href='uploads/pdf/".$reg_id.$student_id.".pdf' target='_blank'>".$reg_id. $student_id."</a></td>";
               
echo "</tr>";  }        
 }  else{
  echo "<td>غير مكتمل</td>";
  echo "<td>غير مكتمل</td>";
  echo "<td>غير مكتمل</td>";
 }}
                     
  
  echo 
  "
  </div>
  </center>
  </table>      
  </form>

  ";  
  ?>
                    <div class="footer" align="center">
                    <h4>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </h4>
                </div>
  



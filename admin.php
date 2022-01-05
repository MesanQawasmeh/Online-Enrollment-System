<?php
session_start();
require "connection.php";

?>
<!DOCTYPE html >
<html>
<head>
  <title> الموافقة وتحديد التخصص</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/admin.css" rel="stylesheet">


</head>
<body>
  <center>
    <div class="banner">
      <img src="img/header1.png" alt="logo" style="max-width:100%; height:auto; ">
    </div>
    </center>

    <hr>
   <div class='sidenav'>
       <a href='admin-show.php'> الشاشة الرئيسية  </a>
       <a href='admin.php'>  <div class ="m"> الموافقة وتحديد التخصص</div></a>
       <a href='approved.php'> الطلبة المقبولون </a>
       <a href='student-info.php'> اضافة طالب</a>
       <a href='admin-delete.php'>حذف طالب</a>
       <a href='logout.php'>تسجيل الخروج</a>
     </div>
<?php
$name =1;
$order =1;
$con = mysqli_connect('localhost', 'root', '', 'online_enrollment_system');

  echo "
  <center>
  <div class='main'>
  <table class ='students' style='width:80%' >
  <thead>
  <tr>
  <th>الرقم</th>
  <th> اسم الطالب</th>
  <th> البريد الالكتروني </th>
  <th> المعدل </th>
  <th> الجنسية </th>
  <th> التخصصات</th>
  <th> الموافقة</th>
  </tr>
  </thead>
  ";
  $sql = "SELECT * FROM payment_request WHERE pay_status = '1';";
  $result =  mysqli_query($con, $sql);
  $resultCheck = mysqli_num_rows($result);
  if ($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
      $student_id  = $row['student_id'];
      $reg_id  = $row['reg_id'];

      
      $result1 = mysqli_query($con,"SELECT * FROM student where student_id = '$student_id' and major_id IS NULL;");

      $result5 = mysqli_query($con,"SELECT * FROM desired_majors where student_id  = '$student_id';");
      $result6 = mysqli_query($con,"SELECT * FROM high_school_certificate where student_id  = '$student_id';");


//student
while($row = mysqli_fetch_array($result1))
{
         $student_id = $row['student_id'];
         $student_a_name = $row['student_a_name'];
         $student_nationality = $row['student_nationality'];
         $student_acceptance = $row['student_acceptance'];
         $student_email = $row['student_email'];  
         //admission_fee
         $result2 = mysqli_query($con,"SELECT * FROM admission_fee Where admission_type LIKE '%$student_acceptance%' and admission_nationality LIKE '%$student_nationality%';");              
                while($row = mysqli_fetch_array($result2))
                {
                  $admission_value = $row['admission_value'];
          
                           //high_school_certificate
                          while($row = mysqli_fetch_array($result6))
                        {
                          $certificate_avg = $row['certificate_avg'];
                          echo "<tr class='style1'>";
                          echo "<tbody>";
                          echo "<tr>";     
                          echo "<td rowspan='5'>" . $reg_id;
                          echo $student_id. "</td>";
                          echo "<td rowspan='5'>" . $student_a_name . "</td>";
                          echo "<td rowspan='5'>" . $student_email . "</td>";
                          echo "<td rowspan='5'>" . $certificate_avg . "</td>";
                          echo "<td rowspan='5'>" . $student_nationality . "</td>";
                          //desired_majors
                              while($row = mysqli_fetch_array($result5))
                              {
                                  echo "<tr>";
                                  $desired_majors_name = $row['desired_majors_name'];
                                  echo "<td>" . $desired_majors_name."</td>";
                                  echo "<form action='admin_control.php' method='POST'>";
                                  echo "<td> <input type='radio' name =".$name." value =".$desired_majors_name." ></td>";
                                  echo "</tr>";
                                  
                                  if ($order%3 == 0)
                                  {
                                    $name =$name+1;
                                  }
                                  $order =$order+1;

                                }
                           
                               
                  }
                
             
          echo "<tr>";
          echo "<td> رفض طلب الالتحاق</td>";
          echo "<td> <input type='radio' name = ".($name-1)." value =".$student_id." ></td>";
          echo "</tr>
          </div>
     
          </center>";      }
              }
         
            }


          }       
                     
  

 
echo 
"   
</table>
 
            <input class='btn' type='submit'  name= 'approved' value =' حفظ البيانات'/>
       </form>
       <br><br><br><br><br><br>
     
";
 
?>
                  <div class="footer" align="center">
                    <h4>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </h4>
                </div>
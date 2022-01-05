<?php
session_start();
require "connection.php";

?>
<!DOCTYPE html >
<html>
<head>
  <title>حذف طالب</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/admin.css" rel="stylesheet">

</head>
<body>
  <center>
    <div class="banner">
      <img src="./img/header1.png" alt="logo" style="max-width:100%; height:auto;">
    </div>
</center>

    <hr>
   <div class='sidenav'>
       <a href='admin-show.php'> الشاشة الرئيسية  </a>
       <a href='admin.php'>  الموافقة وتحديد التخصص</a>
       <a href='approved.php'> الطلبة المقبولون </a>
       <a href='student-info.php'> اضافة طالب</a>
       <a href='admin-delete.php' ><div class ="m">حذف طالب</div></a>
       <a href='logout.php'>تسجيل الخروج</a>
     </div>
     <form action="admin-delete.php" method="POST" >
  <div class='deletethis'>
  <label for="num"> رقم الطالب :</label>
  <br>
  <center>    
  <input type="text" id="num" name="num">
    <input type="submit" class='btn2'  name= 'delete' value =' حذف ' onClick="return confirm('هل أنت متأكد من رغبتك في حذف ؟')">
    </center>    

  </div>

</form>

<?php
if(isset($_POST['delete'])){

$num  = $_POST['num'];

$sql2 = "SELECT * FROM student WHERE  CONCAT(reg_id,student_id) = '$num';";
$result2 =  mysqli_query($con, $sql2);
$resultCheck2 = mysqli_num_rows($result2);
if ($resultCheck2 > 0){
  while($row = mysqli_fetch_assoc($result2)){
  $reg_id = $row['reg_id'];

          $delete1 = "DELETE FROM address WHERE CONCAT(reg_id,student_id) = '$num';";
          mysqli_query($con, $delete1);
            $delete2 = "DELETE FROM desired_majors WHERE CONCAT(reg_id,student_id) = '$num';";
              mysqli_query($con, $delete2);
              $delete3 = "DELETE FROM documents WHERE CONCAT(reg_id,student_id) = '$num';";
               mysqli_query($con, $delete3);
                $delete4 = "DELETE FROM high_school_certificate WHERE CONCAT(reg_id,student_id) = '$num';";
                 mysqli_query($con, $delete4);
                  $delete5 = "DELETE FROM parents WHERE CONCAT(reg_id,student_id) = '$num';";
                   mysqli_query($con, $delete5);
                    $delete6 = "DELETE FROM payment WHERE CONCAT(reg_id,student_id) = '$num';";
                     mysqli_query($con, $delete6);
                      $delete7 = "DELETE FROM payment_request WHERE CONCAT(reg_id,student_id) = '$num';";
                       mysqli_query($con, $delete7);
                        $delete8 = "DELETE FROM student WHERE CONCAT(reg_id,student_id) = '$num';";
                         mysqli_query($con, $delete8);
                   
                            echo "<center>
                            <h1>تم حذف بيانات الطالب  </h1>";}
                         
}else {          
  echo "<center>
  <h1>رقم الطالب غير موجود  </h1>";}
}
?>
                  <div class="footer" align="center">
                    <h4>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </h4>
                </div>
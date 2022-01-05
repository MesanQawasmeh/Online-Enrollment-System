<?php 
require "connection.php";
require "admin.php";

  $order = ($order-1) /3;
  $name = 1;

// admin button
  if(isset($_POST['approved'])){
    
          if (isset($_POST[$name])){
            $checked = $_POST[$name];

          $sql = "SELECT * FROM payment_request WHERE pay_status = '1' ;";
          $result =  mysqli_query($con, $sql);
          $resultCheck = mysqli_num_rows($result);
          if ($resultCheck > 0){
          while($row = mysqli_fetch_assoc($result)){
                $student_id = $row['student_id'];
                $request_id = $row['request_id'];
                $year_id    = $row['year_id'];

            $sql1 = "SELECT * FROM student WHERE student_id = '$student_id' and major_id IS NULL;";
            $result1 =  mysqli_query($con, $sql1);
            $resultCheck1 = mysqli_num_rows($result1);
            if ($resultCheck1 > 0){
             while($row = mysqli_fetch_assoc($result1)){
              $student_email = $row['student_email'];
              $reg_id = $row['reg_id'];

              if ($checked == $student_id)
              {
                $subject = "اشعار القبول ";           
                $message = "تم رفض طلب الالتحاق ";
                
                $sender = "From: wiseuniversity11@gmail.com";
  
                if(mail($student_email, $subject, $message, $sender))
                { 
                  $majorid = 26;
                  $update_data2="UPDATE  student SET major_id = $majorid where student_id = '$student_id';";    
                  $run_query2 = mysqli_query($con, $update_data2);
             
                   if ($name < $order){
                  $name= $name + 1;
                  $checked = $_POST[$name];
             }
          }else {echo "<center> <h1> - خطأ اثناء الارسال  <h1></center>
            ";}
              }else{


                
                  $update_data1 ="UPDATE desired_majors SET desired_majors_status = '1' where student_id = '$student_id' and desired_majors_name  LIKE '%$checked%'";
                  $run_query1 = mysqli_query($con, $update_data1);
                  if($run_query1)
                  {
                      $sql3 = "SELECT * FROM major WHERE major_name  LIKE '%$checked%';";
                      $result3 =  mysqli_query($con, $sql3);
                      $resultCheck3 = mysqli_num_rows($result3);
                      if ($resultCheck3 > 0){
                        while($row = mysqli_fetch_assoc($result3)){
                          $major_id            = $row['major_id'];
                          $jordanian_fees      = $row['jordanian_fees'];
                          $non_jordanians_fees = $row['non_jordanians_fees'];

                       
                          $sql2 ="SELECT * FROM  student where student_id  = '$student_id';";
                          $result2 =  mysqli_query($con, $sql2);
                          $resultCheck2 = mysqli_num_rows($result2);
                          if ($resultCheck2 > 0){
                            while($row = mysqli_fetch_assoc($result2)){
                            $student_nationality = $row['student_nationality'];
                            $student_acceptance = $row['student_acceptance'];
                            if (str_contains($student_nationality, 'أردنية')) 
                            { 
                              $price = $jordanian_fees;
                              $price = $price*12;
                            }else {
                              $price = $non_jordanians_fees;
                              $price = $price*12;
                            }
                            $sql2 ="SELECT * FROM  admission_fee  Where admission_type LIKE '%$student_acceptance%' and admission_nationality LIKE '%$student_nationality%';";
                            $result2 =  mysqli_query($con, $sql2);
                            $resultCheck2 = mysqli_num_rows($result2);
                            if ($resultCheck2 > 0){
                              while($row = mysqli_fetch_assoc($result2)){
                              $admission_value = $row['admission_value'];
                              $admission_id    = $row['admission_id'];
                            $sql2 ="SELECT * FROM  exams_fee Where exams_type LIKE '%$student_acceptance%' and exams_nationality LIKE '%$student_nationality%';";
                            $result2 =  mysqli_query($con, $sql2);
                            $resultCheck2 = mysqli_num_rows($result2);
                            if ($resultCheck2 > 0){
                              while($row = mysqli_fetch_assoc($result2)){
                              $exams_value = $row['exams_value'];
                              $exams_id = $row['exams_id'];

                              $sql2 ="SELECT * FROM  refunded_insurances_fee  Where insurances_type LIKE '%$student_acceptance%' and insurances_nationality LIKE '%$student_nationality%';";
                              $result2 =  mysqli_query($con, $sql2);
                              $resultCheck2 = mysqli_num_rows($result2);
                              if ($resultCheck2 > 0){
                                while($row = mysqli_fetch_assoc($result2)){
                                $insurances_value = $row['insurances_value'];
                                $insurances_id = $row['insurances_id'];

                                $sql2 ="SELECT * FROM  service_fees  Where service_type LIKE '%$student_acceptance%' and service_nationality LIKE '%$student_nationality%';";
                                $result2 =  mysqli_query($con, $sql2);
                                $resultCheck2 = mysqli_num_rows($result2);
                                if ($resultCheck2 > 0){
                                  while($row = mysqli_fetch_assoc($result2)){
                                    $service_value = $row['service_value'];
                                    $service_id = $row['service_id'];

                                                

                          $insert_data = "INSERT INTO payment (reg_id, student_id, admission_id, exams_id , insurances_id , service_id ,hour_fee ,pay_status)
                          VALUES ('$reg_id' ,'$student_id','$admission_value', '$exams_value', '$insurances_value', '$service_value', ' $price', '0');";
                          $run_query = mysqli_query($con, $insert_data);


                          $total = $price + $admission_value + $exams_value + $service_value + $insurances_value;
                          $subject = "اشعار القبول ";
                         
                          $message = "تمت الموافقة على طلب الالتحاق الخاص بك لجامعة العلوم الاسلامية العالمية بتخصص $checked ، ويجب عليك دفع رسوم القبول والبالغ مقدارها $total 
                      
                                    رسوم قبول لأول مرة :  $admission_value 
                                    رسوم خدمات ونشاطات أخرى : $service_value
                                    رسوم امتحان مستوى اللغة العربية واللغة الانجليزية ومهارات الحاسوب : $exams_value
                                    التأمينات المستردة : $insurances_value
                                    ورسوم ساعات تخصص $checked ل12 ساعة هي : $price
                                   
                                    رقم الدفع الخاص بك هو : $reg_id$student_id                                      
                                    ";
                          }
                          $sender = "From: wiseuniversity11@gmail.com";
      
                          if(mail($student_email, $subject, $message, $sender))
                          {

                            $update_data2 ="UPDATE  student SET major_id  = $major_id where student_id = '$student_id';";
                            $run_query2 = mysqli_query($con, $update_data2);
                            
                            if($run_query2)
                            {
                              $insert_data = "INSERT INTO payment (reg_id, student_id, admission_id, exams_id , insurances_id , service_id ,hour_fee ,pay_status)
                              VALUES ('$reg_id' ,'$student_id','$admission_value', '$exams_value', '$insurances_value', '$service_value', ' $price', '0');";
                              $run_query = mysqli_query($con, $insert_data);
                             if ($name < $order){
                                  $name= $name + 1;
                                  $checked = $_POST[$name];

                             } 
                          }
                        }else {echo "<center> <h1> - خطأ اثناء الارسال  <h1></center>
                          ";}
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }}
}}}}}}
}
  if(isset($_POST['send'])){
    $sql = "SELECT * FROM payment WHERE pay_status = '1' ;";
    $result =  mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
      while($row = mysqli_fetch_assoc($result)){
          $reg_id  = $row['reg_id'];
          $student_id  = $row['student_id'];

          $sql1 = "SELECT * FROM registeration WHERE id = '$reg_id';";
          $result1 =  mysqli_query($con, $sql1);
          $resultCheck1 = mysqli_num_rows($result1);
          if ($resultCheck1 > 0){
           while($row = mysqli_fetch_assoc($result1)){
            $email  = $row['email'];  

            $sql2 = "SELECT * FROM student WHERE student_id = '$student_id';";
            $result2 =  mysqli_query($con, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);
            if ($resultCheck2 > 0){
             while($row = mysqli_fetch_assoc($result2)){
              $major_id   = $row['major_id'];
              $student_a_name = $row['student_a_name'];
              $student_email = $row['student_email'];

              $sql3 = "SELECT * FROM major WHERE major_id = '$major_id';";
              $result3 =  mysqli_query($con, $sql3);
              $resultCheck3 = mysqli_num_rows($result3);
              if ($resultCheck3 > 0){
                while($row = mysqli_fetch_assoc($result3)){
                $major_name   = $row['major_name'];

            $subject = "الموافقة";
            $message = "
            $student_a_name
            تم التحاقك بجامعة العلوم الاسلامية بنجاح 
            رقمك الجامعي هو : $reg_id$student_id
            كلمة السر هي : $reg_id$student_id
           يمكنك الدخول الى بوابة الطالب لتسجيل المواد
           http://grades.wise.edu.jo:8889/index.php
            ";
            $sender = "From: wiseuniversity11@gmail.com";
            if(mail($student_email, $subject, $message, $sender)){
              $update_data="UPDATE  payment SET 	delivered = '1' where student_id = '$student_id';";    
              $run_query = mysqli_query($con, $update_data);
         
            }else {echo "<center> <h1> - خطأ اثناء الارسال  <h1></center>
              ";}
          }
        }
      }
    }
  }
}
}}}


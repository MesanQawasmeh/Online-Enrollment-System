<?php 
include_once "controllerUserData.php"; 
$email = $_SESSION['email'];
$password = $_SESSION['password'];

$errors = array();
$student_email          = "";
$student_id             = "";
$student_a_name         = "";
$student_e_name         = "";
$student_nationality    = "";
$student_nationality_id = "";      
$student_religion       = "";
$student_birthdate      = "";
$student_birthplace     = "";
$student_acceptance     = "";
$student_gender         = "";
$student_social_status  = "";
$certificate_id         = "";
$certificate_type       = "";
$certificate_avg        = "";
$certificate_place      = "";
$certificate_year       = "";
$certificate_city       = "";
$certificate_town       = "";
$certificate_branch     = "";
$address_residence      = "";
$address_city           = "";
$address_neighborhood   = "";
$address_street         = "";
$address_mail_box       = "";
$address_phone          = "";
$parents_name           = "";
$parents_phone          = "";
$parents_name2          = "";
$parents_phone2         = "";      
$major_name1            = "";
$major_name2            = "";
$major_name3            = ""; 

//add student-info
if(isset($_POST['add_student']))
{
    $sql = "SELECT * FROM student WHERE student_email = '$email';";
        $result =  mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            header('location: certification.php');
        }else{
    $sql = "SELECT * FROM registeration WHERE email = '$email'";
    $result =  mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $reg_id= $row['id']; 
            $email= $row['email']; 
        }
        if ($reg_id == 1){
            $student_email          = $_POST['student_email'];
        }else{
            $student_email          = $email;
        }
            $student_a_name         = $_POST['student_a_name'];
            $student_e_name         = $_POST['student_e_name'];
            $student_nationality    = $_POST['student_nationality'];
            $student_nationality_id = $_POST['student_nationality_id'];       
            $student_religion       = $_POST['student_religion'];
            $student_birthdate      = $_POST['student_birthdate'];
            $student_birthplace     = $_POST['student_birthplace'];
            $student_acceptance     = "موازي";
            $student_gender         = $_POST['student_gender'];
            $student_social_status  =$_POST['student_social_status'];
            $email_check = "SELECT * FROM student WHERE student_email = '$student_email'";
            $res = mysqli_query($con, $email_check);
            if(mysqli_num_rows($res) > 0){
                if ($reg_id == 1){
                    header('Location: certification.php');
                }else{
                $errors['email'] = "<h3>البريد الالكتروني تم ادخاله مسبقاً<h3>";
                }
            }else{
            if(count($errors) === 0){
            if (str_contains($student_nationality, 'أردنية')) 
            { 
                    $nationality_id = (string)$student_nationality_id;
                     if (preg_match('/^\d{10}$/', $nationality_id)) 
                    {
                    $nationality= $student_nationality_id;
                    ;
                    $insert_data = "INSERT INTO student (reg_id, student_id ,student_a_name, student_e_name, student_nationality, student_nationality_id, student_religion, student_birthdate , student_birthplace, student_acceptance, student_gender,student_social_status, major_id, student_email)
                    VALUES ('$reg_id', NULL ,'$student_a_name', '$student_e_name', '$student_nationality', '$nationality', '$student_religion', '$student_birthdate', '$student_birthplace' ,'$student_acceptance', '$student_gender','$student_social_status',NULL,'$student_email');";
                        $run_query = mysqli_query($con, $insert_data);
                        if($run_query)
                        {
                            header('Location: certification.php');
                        }else{                                     
                              $errors['exist'] = "<h3>الرقم التسلسلي ( الوطني ) مدخل مسبقاً</h3>";
                        }
                } else {
                    $errors['nationality_id'] = "<h3>يجب أن يتكون رقمك التسلسلي ( الوطني ) من 10 أرقام</h3>";
                }
            }   
           
           if (str_contains($student_nationality, 'أخرى')) 
           { 
            $nationality_id = (string)$student_nationality_id;
            if(is_numeric($student_nationality_id)) 
            {
                $insert_data = "INSERT INTO student (reg_id, student_a_name, student_e_name, student_nationality, student_nationality_id, student_religion, student_birthdate , student_birthplace, student_acceptance, student_gender,student_social_status, major_id, student_email)
                VALUES ('$reg_id' ,'$student_a_name', '$student_e_name', '$student_nationality', '$student_nationality_id', '$student_religion', '$student_birthdate', '$student_birthplace' ,'$student_acceptance', '$student_gender','$student_social_status',NULL,'$student_email');";
                $run_query = mysqli_query($con, $insert_data);

                if($run_query)
                {
                    header('Location: certification.php');
                }else{                    

                    $errors['exist'] = "<h3>تم ادخال جميع بياناتك أو الرقم التسلسلي مسبقاً  </h3>";
                }
            } else {
                if ($reg_id == 1){
                    header('Location: certification.php');
                }else{
                    $errors['nationality_id'] = "<h3>يجب أن يتكون رقمك التسلسلي ( الوطني ) من أرقام</h3>";
                }  
            }
            }
    }}
  }
 
}}

//add certification-info
if(isset($_POST['add_certification'])){
  
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
                $student_id = $row['student_id'];
            }
            $sql = "SELECT * FROM high_school_certificate WHERE student_id = '$student_id';";
            $result =  mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
                header('location: address.php');
            }else{
            $certificate_id     = $_POST['certificate_id'];
            $certificate_type   = $_POST['certificate_type'];
            $certificate_avg    = $_POST['certificate_avg'];
            $certificate_place  = $_POST['certificate_place'];
            $certificate_year   = $_POST['certificate_year'];
            $certificate_city   = $_POST['certificate_city'];
            $certificate_town   = $_POST['certificate_town'];
            $certificate_branch = $_POST['certificate_branch'];
            if(is_numeric($certificate_id)) 
            {
            $insert_data = "INSERT INTO high_school_certificate (reg_id,student_id ,certificate_id , certificate_type, certificate_avg, certificate_place, certificate_year , certificate_city,certificate_town, certificate_branch)
            VALUES ('$reg_id' ,'$student_id', '$certificate_id ', '$certificate_type', '$certificate_avg', '$certificate_place', '$certificate_year', '$certificate_city' ,'$certificate_town', '$certificate_branch');";
            $run_query = mysqli_query($con, $insert_data);
            if($run_query){
                header('Location: address.php');
            }else{
                $errors['certificate_id'] = "<h3> رقم الجلوس مُدخل لمستخدم آخر </h3>";

            }

        } else {
            $errors['nationality_id'] = "<h3>يجب أن يتكون رقم الجلوس من أرقام</h3>";
        }
    }
}}}


//add address-info
if(isset($_POST['add_address'])){
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
        $student_id ;
        if ($resultCheck2 > 0){
            while($row = mysqli_fetch_assoc($result2)){
                $student_id = $row['student_id'];
            }
            $sql = "SELECT * FROM address WHERE student_id = '$student_id';";
            $result =  mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
                header('location: Majors.php');
            }else{
        $address_residence      = $_POST['address_residence'];
        $address_city           = $_POST['address_city'];
        $address_neighborhood   = $_POST['address_neighborhood'];
        $address_street         = $_POST['address_street'];
        $address_mail_box       = $_POST['address_mail_box'];
        $address_phone          = $_POST['address_phone'];

        $parents_name       = $_POST['parents_name'];
        $parents_phone      = $_POST['parents_phone'];

        $parents_name2       = $_POST['parents_name2'];
        $parents_phone2      = $_POST['parents_phone2'];        
       
            $insert_data = "INSERT INTO address ( reg_id,student_id ,address_residence , address_city, address_neighborhood	, address_street, address_mail_box,address_phone)
            VALUES ('$reg_id' ,'$student_id', '$address_residence ', '$address_city', '$address_neighborhood', '$address_street', '$address_mail_box', '$address_phone' );";
            $run_query = mysqli_query($con, $insert_data);
      
            $insert_parents_data = "INSERT INTO parents (reg_id,student_id ,parents_name , parents_phone)
            VALUES ('$reg_id' ,'$student_id', '$parents_name ', '$parents_phone');";
            $run_query1 = mysqli_query($con, $insert_parents_data);

            $insert_parents_data2 = "INSERT INTO parents (reg_id,student_id ,parents_name , parents_phone)
            VALUES ('$reg_id' ,'$student_id', '$parents_name2 ', '$parents_phone2');";
            $run_query2 = mysqli_query($con, $insert_parents_data2);
          
            if($run_query){
                if($run_query1){
                    if($run_query2){
                          header('Location: Majors.php');
                    }else {
                        echo "لم يتم ادخال المعرف 2";
                    }
                }else {
                    echo "لم يتم ادخال المعرف 2";
                }
            }else {
                echo "لم يتم ادخال العنوان ";
            }

        }
    
    }
}}
//add majors-info
if(isset($_POST['add_majors'])){
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
        $student_id ;
        if ($resultCheck2 > 0){
            while($row = mysqli_fetch_assoc($result2)){
                $student_id = $row['student_id'];
                $student_nationality    = $row['student_nationality'];
                $student_acceptance = $row['student_acceptance'];
            }
            $sql = "SELECT * FROM desired_majors WHERE student_id = '$student_id';";
            $result =  mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
                header('location: apply.php');
            }else{
        $major_name1   = $_POST['major_name1'];
        $major_name2   = $_POST['major_name2'];
        $major_name3   = $_POST['major_name3'];        
       
            $insert_data = "INSERT INTO desired_majors ( reg_id ,student_id ,desired_majors_name)
            VALUES ('$reg_id' ,'$student_id', ' $major_name1' );";
            $run_query = mysqli_query($con, $insert_data);

            $insert_data1 = "INSERT INTO desired_majors ( reg_id ,student_id ,desired_majors_name)
            VALUES ('$reg_id' ,'$student_id', ' $major_name2' );";
            $run_query1 = mysqli_query($con, $insert_data1);

            $insert_data2 = "INSERT INTO desired_majors ( reg_id ,student_id ,desired_majors_name)
            VALUES ('$reg_id' ,'$student_id', ' $major_name3' );";
            $run_query2 = mysqli_query($con, $insert_data2);

            if($run_query){
                if($run_query1){
                    if($run_query2){
                          header('Location: apply.php');
                        }
                    }
                }}
            }
        }
    
    }

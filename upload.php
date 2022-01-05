<?php
 include_once "controllerUserData.php"; 
 $email = $_SESSION['email'];
 $password = $_SESSION['password'];

if(isset($_POST["submit"]))
{
    
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
            $allowedExts = array("pdf");
    $temp = explode(".", $_FILES["pdf_file"]["name"]);
    $extension = end($temp);
    $upload_pdf=$_FILES["pdf_file"]["name"];
    $newfilename = round(microtime(true)) . '.' . end($temp);

    move_uploaded_file($_FILES["pdf_file"]["tmp_name"],'uploads/pdf/'.$student_id.".pdf");

            $sql2 = "SELECT * FROM documents WHERE student_id = '$student_id'";
            $result2 =  mysqli_query($con, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);
            
            if ($resultCheck2 > 0){
                while($row = mysqli_fetch_assoc($result2)){
                    if ($reg_id == 1){
                        header('Location: ok.php');
                    }else{
                    header('Location:  last.php');
                    }}
                }else{
                 
            if ($reg_id == 1){
                $sql2 = "SELECT * FROM student WHERE reg_id = '$reg_id'";
                $result2 =  mysqli_query($con, $sql2);
                $resultCheck2 = mysqli_num_rows($result2);
    
                if ($resultCheck2 > 0){
                    while($row = mysqli_fetch_assoc($result2)){
                        $student_nationality  = $row['student_nationality'];
                        $student_acceptance   = $row['student_acceptance'];
                        $student_id             = $row['student_id'];

                $sql3 ="select * from request_fee Where request_type LIKE '%$student_acceptance%' and request_nationality LIKE '%$student_nationality%';";
                $result3 =  mysqli_query($con, $sql3);
                $resultCheck3 = mysqli_num_rows($result3);
    
                if ($resultCheck3 > 0){
                    while($row = mysqli_fetch_assoc($result3)){
                      $request_value = $row['request_value'];

                      $result0 = mysqli_query($con,"SELECT * FROM year where year_effective = '1';");
                      while($row = mysqli_fetch_array($result0))
                        {
                          $year_id  = $row['year_id'];
                        }
                $insert_data = "INSERT INTO payment_request (reg_id, student_id, year_id, request_id, pay_status)
                VALUES ('$reg_id' ,'$student_id', '$year_id', '$request_value', '0');";
                $run_query = mysqli_query($con, $insert_data);
                if ( $run_query){
                header('Location: ok.php');
                }}}}}
            }
            $sql=mysqli_query($con,"INSERT INTO documents (reg_id,student_id,pdf_name,pdf_file,date) VALUES ('$reg_id','$student_id','$upload_pdf','$upload_pdf',NOW());");
            if($sql){
                if ($reg_id == 1){
                    header('Location: ok.php');
                }else{
                header('Location:  last.php');
                }
            }
            else{
                echo "Data Submit Error!!";
            }
   
}}}}
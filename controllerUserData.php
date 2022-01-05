<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = " ! كلمة السر غير متطابقة ";
    }
    $email_check = "SELECT * FROM registeration WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "! البريد الالكتروني تم ادخاله مسبقاً ";
    }
    $email_check = "SELECT * FROM student WHERE student_email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "! البريد الالكتروني تم ادخاله مسبقاً ";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO registeration (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "  رمز التحقق";
            $message = "  $code
              هذا هو رمز التحقق الخاص بك لتتم عملية انشاء الحساب بنجاح
               ";
            $sender = "From: wiseuniversity11@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "تم ارسال رمز تحقق لحسابك - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "   خطأ اثناء ارسال رمز التحقق";
            }
        }else{
            $errors['db-error'] = "خطأ ادخال البيانات الى قاعدة البيانات";
        }
    }

}
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM registeration WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE registeration SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: student-info.php');
                exit();
            }else{
                $errors['otp-error'] = "خطأ في تعديل الرمز";
            }
        }else{
            $errors['otp-error'] = "رمز التحقق خاطئ";
        }
    }
    if(isset($_POST['login'])){
        
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        if($email == "admin1@example.com"){
            $check_email = "SELECT * FROM registeration WHERE email = '$email'";
            $res = mysqli_query($con, $check_email);
            if(mysqli_num_rows($res) > 0){
                $fetch = mysqli_fetch_assoc($res);
                $fetch_pass = $fetch['password'];
                if(password_verify($password, $fetch_pass)){
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                        header('location: admin-show.php');  
                }else{
                    $errors['email'] = "البريد الالكتروني او كلمة السر خاطئة";
                }
            }
        }
else{
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $email_check = "SELECT * FROM student WHERE student_email = '$email'";
        $res = mysqli_query($con, $email_check);
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "! البريد الالكتروني تم ادخاله مسبقاً ";
        }else{
        $check_email = "SELECT * FROM registeration WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $reg_id= $fetch['id'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;


                  $sql = "SELECT * FROM student WHERE reg_id = '$reg_id'";
                  $result =  mysqli_query($con, $sql);
                  $resultCheck = mysqli_num_rows($result);
                  if ($resultCheck > 0){
                    $sql = "SELECT * FROM high_school_certificate WHERE reg_id = '$reg_id'";
                    $result =  mysqli_query($con, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0){
                        $sql = "SELECT * FROM address WHERE reg_id = '$reg_id'";
                        $result =  mysqli_query($con, $sql);
                        $resultCheck = mysqli_num_rows($result);
                        if ($resultCheck > 0){
                                $sql = "SELECT * FROM desired_majors WHERE reg_id = '$reg_id'";
                                $result =  mysqli_query($con, $sql);
                                $resultCheck = mysqli_num_rows($result);
                                if ($resultCheck > 0){
                                    $sql = "SELECT * FROM documents WHERE reg_id = '$reg_id'";
                                    $result =  mysqli_query($con, $sql);
                                    $resultCheck = mysqli_num_rows($result);
                                    if ($resultCheck > 0){
                                        $sql = "SELECT * FROM payment_request WHERE reg_id = '$reg_id' and pay_status = '1'";
                                        $result =  mysqli_query($con, $sql);
                                        $resultCheck = mysqli_num_rows($result);
                                        if ($resultCheck > 0){
                                          header('location: paid.php');
                                        }else{
                                        header('location: last.php');
                                        }
                                    }else{ header('location: apply.php');
                                    }
                                }else{ header('location: Majors.php');
                                }
                        }else{ header('location: address.php');
                        }
                    }else{ header('location: certification.php');
                    }
                 }else{
                    header('location: student-info.php');
                }

                }else{
                    $info = "يبدو انك لم تفم بعملية التحقق من حسابك ، ادخل الى حسابك الالكتروني وادخل رمز التحقق - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }
            else{
                $errors['email'] = "البريد الالكتروني او كلمة السر خاطئة";
            }
        }else{
            $errors['email'] = "لا يوجد لديك حساب ، انشئ حسابك الخاص ";
        }
    }
    }}
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM registeration WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE registeration SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "رمز اعادة انشاء كلمة سر";
                $message = " رمز اعادة انشاء كلمة السر الخاصة بك هو $code";
                $sender = "From: wiseuniversity11@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "تم ارسال رمز لانشاء كلمة سر جديدة - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "خطأ أثناء ارسال رمز انشاء كلمة السر";
                }
            }else{
                $errors['db-error'] = "خطأ";
            }
        }else{
            $errors['email'] = "البريد الالكتروني غير موجود";
        }
    }

    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM registeration WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "ادخل كلمة سر جديدة ";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "الرمز خاطئ";
        }
    }
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "كلمة السر غير متطابقة";
        }else{
            $code = 0;
            $email = $_SESSION['email']; 
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE registeration SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "تم تغيير كلمة السر، يمكنك تسجيل الدخول بكلمة السر الجديدة";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "فشل في تغيير كلمة السر";
            }
        }
    }
        if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }

?> 
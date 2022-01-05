<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html  lang="en">
    <head>
    <meta charset="UTF-8">
        <title> تسجيل الدخول</title> 
        <meta content="width=device-width, initial-scale=1.0" name="viewport">


        <!-- CSS Libraries -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
        <!-- Template Stylesheet -->
        <link href="css/reg-style.css" rel="stylesheet" >
        <link href="css/style.css" rel="stylesheet">

    </head>
    
    <body>
   
<center>
        <div class="wrapper" >
            <!-- Top Bar Start -->
            <div class="top-bar" dir ="rtl">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="logo">
                                <a href="index.php">
                                <img src="img/header.png" alt="Logo"> 
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="top-bar-right">
                                <div class="social">
                                    <a href="https://twitter.com/wiseEduJo"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/wise.univ"><i class="fab fa-facebook-f"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br> 
            <br>     <br>
            <br>     <br>
            <br>     <br>
            <br>     <br>
            <br>      <br>
            <br>    <br>
            <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">تسجيل الدخول</h2>
                    <p class="text-center">ادخل بريدك الالكتروني و كلمة السر الخاصة بك</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" dir="rtl" placeholder=" البريد الالكتروني" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" dir="rtl" placeholder="كلمة السر" required>
                    </div>
                    <div class="link forget-pass text-left">
                      <a href="forgot-password.php" > نسيت كلمة السر</a> 
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="تسجيل الدخول">
                    </div>
                    <div class="link login-link text-center">ليس لديك حساب؟  
                   <a href="signup-user.php">انشاء حساب </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <div class="footer" align="center">
                <p>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </p>
                </div>

</body>
</html>

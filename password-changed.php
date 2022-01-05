<?php require_once "controllerUserData.php"; ?>
  <?php
if($_SESSION['info'] == false){
    header('Location: login-user.php');  
}
?>
<!DOCTYPE html>
<html  lang="en">
    <head>
    <meta charset="UTF-8">
    <title>تغيير كلمة سر جديدة</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">


        <!-- CSS Libraries -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

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
            <hr>
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
            <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>
                <form action="login-user.php" method="POST">
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login-now" value=" تسجيل الدخول ">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>
    <br><br><br>

    <div class="footer" align="center">
                <p>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </p>
     </div>
</body>
</html>

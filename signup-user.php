<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html  lang="en">
    <head>
    <meta charset="UTF-8">
    <title>انشاء حساب</title>
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
            <div class="col-md-4 offset-md-4 form">
            <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center"> لانشاء حساب</h2>
                    <p class="text-center">ادخل البيانات التالية لانشاء حسابك الخاص</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" dir="rtl" name="name" placeholder=" اسمك الكامل"  required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" dir="rtl" name="email" placeholder=" بريدك لالكتروني" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" dir="rtl"  name="password" placeholder="كلمة السر" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" dir="rtl" name="cpassword" placeholder=" تأكيد كلمة السر" required>
                    </div>

                        <div>
                        <input type="checkbox" value="none" id="check_1"  name="ok" required/>
                        <label for="check_1" dir="rtl" class="ok">أقر وأعترف بأن جميع المعلومات التي سيتم تعبأتها في طلب الالتحاق صحيحة ووافية واتحمل مسؤولية أي خطأ فيها سواء كان متعمدا او غير متعمدا وستقوم الجامعة بمراسلة من يلزم للتأكد من صحة الشهادة و للجامعة الحق في الغاء قبول الطالب وتسجيله وتحويل مقدم الطلب وصاحبه للمدعي العام في حال ثبوت تزويرها دون التقيد بمدة زمنية محددة وسيتحمل الطالب مسؤولية الرسوم المدفوعة.</label>
                        </div>
                   
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="انشاء الحساب">
                    </div>
                    
                    <div class="link login-link text-center">لديك حساب؟ 
                       <a href="login-user.php"> تسجيل الدخول</a> 
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>
    <br><br><br>

    <div class="footer" align="center">
                <p>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </p>
                </div>
</body>
</html>

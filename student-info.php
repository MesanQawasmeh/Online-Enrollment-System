<?php 
include_once "controllerUserData.php"; 
include_once "insert.php"; 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM registeration WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $id = $fetch_info['id'];

        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
  }  
   
?>

<!DOCTYPE html>
<html dir="rtl">
  <head>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <meta charset="utf-8">
    <title> بيانات مقدم الطلب</title>
    <style>

/******** in form *********/

      body, div, form, input, select, p { 
      margin: 0;
      font-family: Roboto, Arial, sans-serif;
      font-size: 18px;
      color: #666;
      line-height: 22px;
      }

/******** header *********/
     
      h2 {
      font-weight: 500;
      }

/******** testbox *********/

      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      }

/******** form *********/

      form {
      width:70%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0 #001624; 
      }

/******** header img *********/

      .banner {
      position: relative;
      height: 110px;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }

/******** input/select *********/

      input, select {
      margin-bottom: 50px;
      border: 2px solid #ccc;
      border-radius: 5px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      .item:hover p, .item:hover i,input:hover::placeholder, a {
      color: #00131f;
      }
      .item input:hover, .item select:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #00131f;
      color: #00131f;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }

/******** date *********/

      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size:20px;
      color: #a9a9a9;
      }
      .item i {
      right: 2%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      .fa-calendar-alt:before {
       content: "\f073";
      }
    
/******** submit *********/
      
      .btn- input[type=submit] {
      margin-top: 20px;
      text-align: center;
      }
      input[type=submit] {
      width: 180px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: black;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      input[type=submit]:hover {
      background: rgba(0, 0, 0, 0.774);
      }
      @media (min-width: 568px) {
      .tow-item, .tow-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .tow-item input, .tow-item input {
      width: calc(50% - 20px);
      }
      .tow-item select {
      width: calc(50% - 8px);
      }
      }

/******** span (*) *********/
     
      .item span {
      color: red;
      }

/******** footer *********/

      .footer {
    position: relative;
    margin-bottom:25px;
    bottom:0;
    width:100%;
    background-color:#121518;;
    color: rgb(226, 226, 226);
    text-align: center;
    font-family: 'Amiri', serif;
    font-weight:bold;
    font-size:16px;
      }

/******** error *********/

      h3{
        color :red;
      }
      @import url(https://fonts.googleapis.com/css?family=Oswald:400);
/******** log out *********/
.img2 {
  width: 50px;
  border-radius: 90px;
  float: left;
}

.logout {
  font-size: .8em;
	position: relative;
  right: -8px;
  bottom: -4px;
  overflow: hidden;
  opacity: 0;
  transition: opacity .30s;
  -webkit-transition: opacity .35s;
  margin-right:10px;
  margin-left:20px;
  color: rgb(226, 226, 226);

}

.button {
	text-decoration: none;
	float: right;
  padding: 9px;
  margin: 1px;
  color: white;
  width: 50px;
  background-color: black;
  transition: width .35s;
  -webkit-transition: width .35s;
  overflow: hidden;
  margin-bottom:90%;
}

a:hover {
  width: 100px;
}

a:hover .logout{
  opacity: .9;
}

a {
  text-decoration: none;
}

    </style>
  </head>
  <body>
  <div class="navigation">
  
	<a class="button" href="logout.php">
  <img class="img2" src="img/about.png" alt="Image">
  
  <div class="logout">تسجيل الخروج</div>

	</a>
  </div>
    <div class="testbox">

          <form action="student-info.php" method="POST" >
            <div class="banner">

            <img src="img/header1.png" alt="logo" style="max-width:100%;height:auto;">
            </div>
            <hr>
            <center>
            <h2>- بيانات مقدم الطلب -</h2> 
            </center>
            <h2>املأ المعلومات أدناه :</h2>
            <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="tow-item">
                        <div class="error">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        </div>

                        <?php
                        }
                        if ($id == 1){
                          echo "  <div class='item'>
                          <p> البريد الالكتروني<span>*</span></p>
                          <input type='email' name='student_email' placeholder='البريد الالكتروني' required>
                          </div>";
                        }
                        ?>

        <div class="item">
        <p> نوع القبول <span>*</span></p>
        <input type="text" name="student_nationality_id" placeholder="الرقم التسلسلي " required value="موازي" disabled style="cursor: not-allowed !important;">
        </div>
            <div class="item">
              <p>الاسم كامل<span>*</span></p>
              <div class="tow-item">
                <input type="text" name="student_a_name" placeholder="اسمك باللغة العربية"  required  value="<?php echo $student_a_name ?>">
                <input type="text" name="student_e_name" placeholder="اسمك باللغة الانجليزية" required value="<?php echo $student_e_name ?>">
            
            </div>
 
            <p> الجنسية والرقم التسلسلي -الوطني-<span>*</span></p>
            <div class="tow-item">
            <select  name="student_nationality" required value="<?php echo $student_nationality ?>">
              <option value="">------</option>
              <option value="أردنية">أردنية</option>
              <option value="أخرى">أخرى</option>
            </select>
 

            <input type="text" name="student_nationality_id" placeholder="الرقم التسلسلي " required value="<?php echo $student_nationality_id ?>">
          </div>

          <p> الديانة  <span>*</span></p>
          <div class="item">
          <select  name="student_religion" required  value="<?php echo $student_religion ?>">
            <option value="">------</option>
            <option value="الاسلام"> الاسلام</option>
            <option value="المسيحية">المسيحية</option>
            <option value="أخرى">أخرى</option>
          </select>
        </div>

        <p>  الجنس  <span>*</span></p>
        <div class="item">
        <select  name="student_gender" required value="<?php echo $student_gender ?>">
          <option value="">------</option>
          <option value="انثى "> انثى</option>
          <option value="ذكر">ذكر</option>
        </select>
      </div>

      <div class="item">
        <p>تاريخ ومكان الولادة <span>*</span></p>
            <div class="tow-item">     
              <input type="date" name="student_birthdate" required  value="<?php echo $student_birthdate ?>">
              <i class="fas fa-calendar-alt"></i>
              <input type="text" name="student_birthplace" placeholder=" مكان الولادة " required value="<?php echo $student_birthplace ?>">
            </div>
      </div>

        <p>  الحالة الاجتماعية  <span>*</span></p>
        <div class="item">
        <select  name="student_social_status" required value="<?php echo $student_social_status ?>">
          <option value="">------</option>
          <option value="عازب/ة "> عازب/ة</option>
          <option value="متزوج/ة">متزوج/ة</option>
        </select>
      </div>


        <center>
            <input type="submit"  name= "add_student" value = " ادخال بيانات الشهادة الثانوية " />
        </center>
      <br>
                  <!-- Footer Start -->
                  <div class="footer" align="center">
                    <h4>All Rights Reserved © 2021 The World Islamic Sciences and Education University - Computer Center </h4>
                </div>
                <!-- Footer End -->
    </div>
    </form>


  </body>
</html>
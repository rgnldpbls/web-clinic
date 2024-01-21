<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    <title>Login</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/login.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Karla:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Questrial:wght@400&display=swap"
    />
    <!-- Add Font Awesome CDN link for the eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  </head>
  <body>
    <?php
      session_start();
      if(isset($_POST['login'])){
        include 'dbconfig.php';
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM patient WHERE patient_Email = '$email'";
        $sql2 = "SELECT * FROM personnel WHERE pers_Email = '$email'";
        $sql3 = "SELECT * FROM admin WHERE admin_Email = '$email'";
        $res = mysqli_query($conn, $sql);
        $res2 = mysqli_query($conn, $sql2);
        $res3 = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($res) == 1){
          $sql = "SELECT * FROM patient WHERE patient_Email = '$email' and patient_Password = '$password'";
          $inner = mysqli_query($conn, $sql);
          if(mysqli_num_rows($inner) == 1){
            $rows = mysqli_fetch_assoc($inner);
            $_SESSION['fullname'] = $rows['patient_Name'];
            $_SESSION['address'] = $rows['patient_Address'];
            $_SESSION['city'] = $rows['patient_City'];
            $_SESSION['birthDate'] = $rows['patient_Birthdate'];
            $_SESSION['sex'] = $rows['patient_Sex'];
            $_SESSION['contactNum'] = $rows['patient_ContactNo'];
            $_SESSION['bType'] = $rows['blood_Type'];
            $_SESSION['pType'] = $rows['patient_Type'];
            $_SESSION['dept'] = $rows['department'];
            $_SESSION['emerName'] = $rows['emer_ContactName'];
            $_SESSION['emerNo'] = $rows['emer_ContactNo'];
            $_SESSION['email'] = $rows['patient_Email'];
            $_SESSION['password'] = $rows['patient_Password'];
            $mdHistId = $rows['mdHist_Id'];
            $sql2 = "SELECT * FROM medhistory WHERE mdHist_Id = '$mdHistId'";
            $inTwo = mysqli_query($conn, $sql2);
            $rowsB = mysqli_fetch_assoc($inTwo);
            $_SESSION['medAttention'] = $rowsB['md_Attention'];
            $_SESSION['medIllness'] = $rowsB['md_Illness'];
            $_SESSION['allergyFood'] = $rowsB['md_AllergiesFoods'];
            $_SESSION['allergyMed'] = $rowsB['md_AllergiesMeds'];
            $_SESSION['smoking'] = $rowsB['ph_Smoking'];
            $_SESSION['alcohol'] = $rowsB['ph_Alcohol'];
            header("location: patient/index.php");
          }else{
            echo '<script>alert("Incorrect Password!")</script>';
          }
        }else if(mysqli_num_rows($res2) == 1){
          $sql = "SELECT * FROM personnel WHERE pers_Email = '$email' and pers_Password = '$password'";
          $inner = mysqli_query($conn, $sql);
          if(mysqli_num_rows($inner) == 1){
            header("location: personnelpage.php");
          }else{
            echo '<script>alert("Incorrect Password!")</script>';
          }
        }else if(mysqli_num_rows($res3) == 1){
          $sql = "SELECT * FROM admin WHERE admin_Email = '$email' and admin_Password = '$password'";
          $inner = mysqli_query($conn, $sql);
          if(mysqli_num_rows($inner) == 1){
            header("location: adminpage.php");
          }else{
            echo '<script>alert("Incorrect Password!")</script>';
          }
        }else{
          echo '<script>alert("Email Cannot be found! Please register first.")</script>';
        }
      }
    ?>
    <div class="login">
      <div class="base">
        <img class="bg-pic-icon" alt="" src="assets/bg-pic@2x.png" />
      </div>
      <div class="login-child"></div>
      <div class="logo-parent">
        <img class="logo-icon" alt="" src="assets/logo@2x.png" />

        <div class="pup-clinic-appointment">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila">Sta. Mesa, Manila</div>
      </div>
      <div class="login-item"></div>
      <div class="login1">Login</div>
      <form action="" method="post">
        <div class="email">
          <img class="icons-1" alt="" src="assets/icons-1@2x.png" />
          <div class="email-child"></div>
          <input
            class="enter-your-email"
            type="email"
            name = "email"
            placeholder="Enter your email"
            required
          />
        </div>
        <div class="password">
          <div class="password-child"></div>
          <input
            class="enter-your-password"
            type="password"
            placeholder="Enter your password"
            name="password"
            id="password"
            required
          />
          <img class="icons-1-1" alt="" src="assets/icons-1-1@2x.png" />
          <i class="fas fa-eye password-toggle" id="togglePassword"></i>
        </div>
        <a href="forgotpass.php" class="forgot-password">Forgot password?</a>
        <div class="login-inner"></div>
        <button type="submit" name="login" class="rectangle-button"></button>
        <div class="login2">Login</div>
        <div class="dont-have-an">Don’t have an account?</div>
          <a href="register.php" class="register-here">Register here.</a>
        </div>
      </form>
      <img class="bg-pic-icon1" alt="" src="assets/bg-pic@2x.png" />
    <script src="script/script.js"></script>
  </body>
</html>

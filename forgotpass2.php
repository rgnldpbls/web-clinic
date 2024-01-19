<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/forgotpass2.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@400&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Karla:wght@400&display=swap"
    />
  </head>
  <body>
    <?php 
      if(isset($_POST['confirm'])){
        session_start();
        $verifCode = $_SESSION['data'];
        $vCode = $_POST['code'];
        if($verifCode == $vCode){
          header("location: forgotpass3.php");
        }else{
          echo '<script>alert("OTP was incorrect, Please try again!")</script>';
        }
      }
    ?>
    <div class="forgot-pass2">
      <div class="base"></div>
      <img class="bg-pic-icon" alt="" src="assets/bg-pic@2x.png" />

      <div class="forgot-pass2-child"></div>
      <div class="logo-parent">
        <img class="logo-icon" alt="" src="assets/logo@2x.png" />

        <div class="pup-clinic-appointment">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila">Sta. Mesa, Manila</div>
      </div>
      <div class="forgot-pass2-item"></div>
      <div class="forgot-your-password">Forgot your password?</div>
      <form action="forgotpass2.php" method="post">
        <div class="email">
          <div class="email-child"></div>
          <img class="icons-1-1" alt="" src="assets/icons-1-1@2x.png" />
          <input class="enter-code" type="number" placeholder="Enter the 6-digit code" name="code" required/>
        </div>
        <div class="a-code-has">A code has been sent to your email.</div>
        <div class="forgot-pass2-inner"></div>
        <button class="confirm" type="submit" name="confirm">
          <div class="confirm-child"></div>
          <div class="confirm1">Confirm</div>
        </button>
        <img class="bg-pic-icon1" alt="" src="assets/bg-pic@2x.png" />
      </form>
    </div>
  </body>
</html>

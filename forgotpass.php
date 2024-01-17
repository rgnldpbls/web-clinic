<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/forgotpass.css" />
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
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    function sendMail($email, $vCode){
      $mail = new PHPMailer(true);
      try{
        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pueblosregienaldnb15@gmail.com';
        $mail->Password = 'fqne cvms spec zztc';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;;
        $mail->Port = 587;

        $mail->setFrom("noreply@gmail.com", 'PUP Clinic Appointment System');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "PUP Clinic Appointment System OTP Code";
        $mail->Body = "Your OTP code is: <b>$vCode<b>";

        $mail->send();
        $_SESSION['data'] = $vCode;
        $_SESSION['email'] = $email;
        header("location: forgotpass2.php");
        exit();
      }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
    }

      if(isset($_POST['proceed'])){
        session_start();
        include 'dbconfig.php';
        $email = $_POST['email'];
        $verificationCode =  rand(100000, 999999);

        $sql = "SELECT * FROM patient WHERE patient_Email = '$email'";
        $sql2 = "SELECT * FROM personnel WHERE pers_Email = '$email'";
        $sql3 = "SELECT * FROM admin WHERE admin_Email = '$email'";
        $res = mysqli_query($conn, $sql);
        $res2 = mysqli_query($conn, $sql2);
        $res3 = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($res) == 1){
          sendMail($email, $verificationCode);
        }else if(mysqli_num_rows($res2) == 1){
          sendMail($email, $verificationCode);
        }else if(mysqli_num_rows($res3) == 1){
          sendMail($email, $verificationCode);
        }else{
          echo "EMAIL CANNOT BE FOUND";
        }
      }
    ?>
    <div class="forgot-pass1">
      <div class="base2"></div>
      <img class="bg-pic-icon4" alt="" src="assets/bg-pic@2x.png" />

      <div class="forgot-pass1-child"></div>
      <div class="logo-container">
        <img class="logo-icon2" alt="" src="assets/logo@2x.png" />

        <div class="pup-clinic-appointment2">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila2">Sta. Mesa, Manila</div>
      </div>
      <div class="forgot-pass1-item"></div>
      <div class="forgot-your-password2">Forgot your password?</div>
      <form action="forgotpass.php" method="post">
        <div class="email1">
          <img class="icons-1" alt="" src="assets/icons-1@2x.png" />
          <div class="email-item"></div>
          <input class="enter-your-registered" type="email" placeholder="Enter your registered email" name="email" required/>
        </div>
        <div class="forgot-pass1-inner"></div>
        <button class="rectangle-button" type="submit" name="proceed"></button>
        <div class="proceed">Proceed</div>
        <img class="bg-pic-icon5" alt="" src="assets/bg-pic@2x.png" />
      </form>
    </div>
  </body>
</html>

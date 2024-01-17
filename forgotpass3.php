<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style/global.css" />
    <link rel="stylesheet" href="style/forgotpass3.css" />
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
        include 'dbconfig.php';
        $email = $_SESSION['email'];
        $password = $_POST['newPass'];
        $password2 = $_POST['cnewPass'];

        $sql = "SELECT * FROM patient WHERE patient_Email = '$email'";
        $sql2 = "SELECT * FROM personnel WHERE pers_Email = '$email'";
        $sql3 = "SELECT * FROM admin WHERE admin_Email = '$email'";
        $res = mysqli_query($conn, $sql);
        $res2 = mysqli_query($conn, $sql2);
        $res3 = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($res) == 1){
          if($password == $password2){
            $sql = "UPDATE patient SET patient_Password = '$password' WHERE patient_Email = '$email'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->close();
            echo "Record updated successfully";
            header("location: login.php");
          }else{
            echo "Unmatched password, Try again!";
          }
        }else if(mysqli_num_rows($res2) == 1){
          if($password == $password2){
            $sql = "UPDATE personnel SET pers_Password = '$password' WHERE pers_Email = '$email'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->close();
            echo "Record updated successfully";
            header("location: login.php");
          }else{
            echo "Unmatched password, Try again!";
          }
        }else if(mysqli_num_rows($res3) == 1){
          if($password == $password2){
            $sql = "UPDATE admin SET admin_Password = '$password' WHERE admin_Email = '$email'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $stmt->close();
            echo "Record updated successfully";
            header("location: login.php");
          }else{
            echo "Unmatched password, Try again!";
          }
        }else{
          echo "EMAIL CANNOT BE FOUND";
        }
      }
    ?>
    <div class="forgot-pass3">
      <div class="base1"></div>
      <img class="bg-pic-icon2" alt="" src="assets/bg-pic@2x.png" />

      <div class="forgot-pass3-child"></div>
      <div class="logo-group">
        <img class="logo-icon1" alt="" src="assets/logo@2x.png" />

        <div class="pup-clinic-appointment1">PUP Clinic Appointment System</div>
        <div class="sta-mesa-manila1">Sta. Mesa, Manila</div>
      </div>
      <form action="forgotpass3.php" method="post">
        <div class="forgot-pass3-item"></div>
        <div class="new-pass">
          <img class="icons-2-1" alt="" src="assets/icons-2-1@2x.png" />
          <div class="new-pass-child"></div>
          <input class="enter-new-password" type="text" placeholder="Enter new password" name="newPass" required/>
        </div>
        <div class="re-enter-pass">
          <div class="re-enter-pass-child"></div>
          <input class="re-enter-new-password" type="text" placeholder="Re-enter new password" name="cnewPass" required/>
          <img class="icons-1-11" alt="" src="assets/icons-1-1@2x.png" />
        </div>
        <div class="line-parent">
          <div class="group-child"></div>
          <div class="forgot-your-password1">Forgot your password?</div>
        </div>
        <button class="forgot-pass3-inner" type="submit" name="confirm"></button>
        <div class="confirm2">Confirm</div>
        <img class="bg-pic-icon3" alt="" src="assets/bg-pic@2x.png" />
      </form>
    </div>
  </body>
</html>

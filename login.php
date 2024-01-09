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
      <form>
        <div class="email">
          <img class="icons-1" alt="" src="assets/icons-1@2x.png" />
          <div class="email-child"></div>
          <input
            class="enter-your-email"
            type="email"
            placeholder="Enter your email"
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
          />
          <img class="icons-1-1" alt="" src="assets/icons-1-1@2x.png" />
          <i class="fas fa-eye password-toggle" id="togglePassword"></i>
        </div>
        <a href="forgotpass.php" class="forgot-password">Forgot password?</a>
        <div class="login-inner"></div>
        <a href="dashboard.html" class="rectangle-button"></a>
        <div class="login2">Login</div>
        <div class="dont-have-an">Don’t have an account?</div>
          <a href="register.php" class="register-here">Register here.</a>
        </div>
      </form>
      <img class="bg-pic-icon1" alt="" src="assets/bg-pic@2x.png" />
    <script src="script/script.js"></script>
  </body>
</html>

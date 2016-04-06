<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="/assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css"> -->

    <link rel="stylesheet" href="/src/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/src/lib/animate.css-3.2.0/animate.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.min.css">
  </head>
  <body class="login">
    <div class="form-signin">
      <div class="text-center">
        <img src="/assets/img/logo.png" alt="Metis Logo">
      </div>
      <hr>
      <div class="tab-content">
        <div id="signin" class="tab-pane active">
          <form id="signinForm" action="#">
            <p class="text-muted text-center">
              Enter your account and password
            </p>
            <input type="text" placeholder="account" id="signin_account" name="signin_account" class="form-control top">
            <input type="password" placeholder="password" id="signin_plaintext" name="signin_plaintext" class="form-control bottom">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
        <div id="forgot" class="tab-pane">
          <form id="forgotForm" action="#">
            <p class="text-muted text-center">Enter your valid e-mail</p>
            <input type="email" placeholder="mail@domain.com"  class="form-control">
            <br>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
          </form>
        </div>
        <div id="signup" class="tab-pane">
          <form id="signupForm" action="#">
            <input type="text" placeholder="mobile/email" id="signup_account" name="signup_account"  class="form-control top">
            <input type="password" placeholder="password" id="signup_plaintext" name="signup_plaintext" class="form-control middle">
            <input type="password" placeholder="re-password" id="signup_plaintext_repeat" name="signup_plaintext_repeat" class="form-control bottom">
            <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
          </form>
        </div>
      </div>

      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Login</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a>  </li>
          <li> <a class="text-muted" href="#signup" data-toggle="tab">Signup</a>  </li>
        </ul>
      </div>
    </div>

    <!--jQuery -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
    <script src="/src/lib/jquery/dist/jquery.min.js"></script>

    <!--Bootstrap -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
    <script src="/src/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/src/lib/jquery-validate-1.13.1/dist/jquery.validate.min.js"></script>
    <script src="/src/lib/jquery.form-3.51/jquery.form.js"></script>

    <script src="/src/lib/jquery.gritter/js/jquery.gritter.min.js"></script>
 
    <script src="/src/js/login.js"></script>

  </body>
</html>
<?php session_start();?>

<?php require 'includes.php'; ?>
      
<div class="container-fluid">
  <div id="login">
    <h3 class="text-center text-white pt-5">  </h3>
    <div class="container">
      <?php
        if(isThisPostSet(array("username","password")))
        {
          if(logIn($_POST['username'],$_POST['password']))
          {
            echo"<div class=\"alert alert-success\">
              Login successful as $_SESSION[currentUser]
              </div>";
          }
          else
          {
            echo"<div class=\"alert alert-danger\">
              Wrong username and/or password.
              </div>";
          }
        }
      ?>
      <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
          <div class="login-box col-md-12">
            <form id="login-form" class="form" action="login.php" method="post">
              <h3 class="text-center text-info">Login</h3>
              <div class="form-group">
                  <label  for="username" class="text-info">Username:</label><br>
                  <input required type="text" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                  <label for="password" class="text-info">Password:</label><br>
                  <input required type="password" name="password" id="password" class="form-control">
              </div>
              <div class="form-group">
                  <label for="remember-me" class="text-info"><span>Remember me</span> 
                  <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                  <input type="submit" name="submit" class="btn btn-info btn-md" value="Log In">
              </div>
              <div id="register-link" class="text-right">
                  <a href="register.php" class="text-info">Register here</a>
              </div>
            </form>
          </div>
        </div>
      </div>          
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
</html>
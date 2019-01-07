<?php 
  require 'includes.php';
?>
<div class="container">
  <div id="register">
    <h3 class="text-center text-white pt-5">  </h3>
    <div class="container">
      <div id="register-row" class="row justify-content-center align-items-center">
        <div id="register-column" class="col-md-6">
          <div class="register-box col-md-12">
            <form id="register-form" class="form" action="accCreate.php" method="post">
              <h3 class="text-center text-info">Register</h3>
              <div class="form-group">
                  <label  for="username" class="text-info">Username:</label><br>
                  <input required type="text" name="username" id="username" class="form-control">
              </div>
              <div class="form-group">
                  <label  for="e-mail" class="text-info">E-Mail:</label><br>
                  <input required type="text" name="e-mail" id="e-mail" class="form-control">
              </div>
              <div class="form-group">
                  <label for="password" class="text-info">Password:</label><br>
                  <input required type="password" name="password" id="password" class="form-control">
              </div>
              <div class="form-group">
                  <label  for="ime" class="text-info">Ime:</label><br>
                  <input required type="text" name="ime" id="ime" class="form-control">
              </div>
              <div class="form-group">
                  <label  for="priimek" class="text-info">Priimek:</label><br>
                  <input required type="text" name="priimek" id="priimek" class="form-control">
              </div>
              <div class="form-group">
                  <input type="submit" name="submit" class="btn btn-info btn-md" value="Register">
              </div>
            </form>
          </div>
        </div>
      </div>          
    </div>
  </div>
</div>
<?php
  require 'footer.php';
?>
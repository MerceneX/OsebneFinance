<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="dashboard.css" rel="stylesheet">
    <!--link href="main.css" rel="stylesheet"-->
    <title>Osebne finance</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark flex-md-nowrap p-0 fixed-top shadow justify-content-between">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">CoinTracker</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="index.php">Add</a>
    </li>
    <li class="nav-item dropdown col">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        User
      </a>
      <div class="dropdown-menu">
      <?php
      if(isset($_SESSION['currentUser'])&&!empty($_SESSION['currentUser']))
      {
        echo"<a class=\"dropdown-item\" href=\"logout.php\">Log Out</a>";
      }
      else{
        echo"<a class=\"dropdown-item\" href=\"login.php\">Log In</a>";
        echo"<a class=\"dropdown-item\" href=\"register.php\">Register</a>";
      }
      ?>
      </div>
    </li>
  </ul>
</nav> 
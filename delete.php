<?php 
  session_start();
  require 'library.php';
  require 'config.php';   
  redirectUnlogged();
  removeExpenseByID($_POST['delete']);
  header("Location: index.php");
?>


<?php
  require 'footer.php';
?>
<?php
    require 'library.php';
    require 'config.php';
    if(isThisPostSet(array('username','e-mail','password','ime','priimek','submit')))
    {
        echo"all set";
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        #$passwordVal = mysqli_real_escape_string($db,$_POST[$password]);
        #$usernameVal = mysqli_real_escape_string($db,$_POST[$username]);
        $emailVal = mysqli_real_escape_string($db,$_POST['e-mail']);
        $usernameVal = mysqli_real_escape_string($db,$_POST['username']);
        $hashPass = md5($_POST['password']);
        $imeVal = mysqli_real_escape_string($db,$_POST['ime']);
        $priimekVal = mysqli_real_escape_string($db,$_POST['priimek']);
        $sql = "INSERT INTO `uporabnik`(`username`, `password`, `email`, `ime`, `priimek`) VALUES ('$usernameVal','$hashPass','$emailVal','$imeVal','$priimekVal')";
        if (mysqli_query($db, $sql)) {
            echo "New record created successfully";
            header("Location: register.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }
?>
<?php
    session_start();
    require 'library.php';
    require 'config.php';
    if(isThisPostSet(array('username','e-mail','password','ime','priimek','submit')))
    {
        echo"all set for account create";
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
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
    if(isThisPostSet(array('sumInput','necessaryInput','timeInput','dateInput')))
    {
        echo"all set for expense create";
        $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
        $sum = mysqli_real_escape_string($db,$_POST['sumInput']);
        if($_POST['necessaryInput']='Yes')
        {
            $necessary = 1;
        }
        else{
            $necessary = 0;
        }
        $time = mysqli_real_escape_string($db,$_POST['timeInput']);
        $date = mysqli_real_escape_string($db,$_POST['dateInput']); 
        $dateTime = "$date $time";
        $userId = getCurrentUserID($_SESSION['currentUser']);
        $sql = "INSERT INTO `izdatek`(`datum`, `vsota`, `nujno`, `fk_uporabnik`) VALUES ('$dateTime','$sum','$necessary','$userId')";
        if (mysqli_query($db, $sql)) {
            echo "New record created successfully";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($db);
        }
    }

?>
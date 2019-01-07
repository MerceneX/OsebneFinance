<?php
function logIn($username, $password){
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    #$passwordVal = mysqli_real_escape_string($db,$_POST[$password]);
    #$usernameVal = mysqli_real_escape_string($db,$_POST[$username]);
    $password = md5($password);
    $sql = "SELECT id FROM uporabnik WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    if($count == 1) {
        $_SESSION['currentUser'] = $username;
        mysqli_close($db);
        return true;
    }else {
        mysqli_close($db);
        return false;
    }
}

function logOut($location)
{
    $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params['path'], $params['domain'],
            $params['secure'], $params['httponly']
        );
        session_destroy();
        unset($_SESSION);
    header("Location:".$location);
}

function isThisPostSet($params)
{
    foreach($params as $param)
    {
        if (isset($_POST[$param]) && !empty($_POST[$param]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

function isThisSessionSet($params)
{
    foreach($params as $param)
    {
        if (isset($_SESSION[$param]) && !empty($_SESSION[$param]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

function isThisCookieSet($params)
{
    foreach($params as $param)
    {
        if (isset($_COOKIE[$param]) && !empty($_COOKIE[$param]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}


function isThisGetSet($params)
{
    foreach($params as $param)
    {
        if (isset($_GET[$param]) && !empty($_GET[$param]))
        {
            $tf = true;
        }
        else
        {
            return false;
        }
    }
    return $tf;
}
?>
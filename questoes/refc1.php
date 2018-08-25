<?php

session_start();

function isSessionLoggedin()
{
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true;
}

function isCookieLoggedin()
{
    return isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == true;
}

function isLoggedin()
{
    return isSessionLoggedin() || isCookieLoggedin();
}

if (isLoggedin()) {
    header("Location: http://www.google.com");
    exit();
}

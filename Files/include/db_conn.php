<?php

$host     = "localhost";
$username = "root";
$password = "";
$db_name  = "titangym";


$con = mysqli_connect($host, $username, $password, $db_name);

if (!$con) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

function page_protect()
{
    session_start();

 
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            session_destroy();
            header("Location: ../login/");
            exit();
        }
    }


    if (
        !isset($_SESSION['user_data']) &&
        !isset($_SESSION['logged']) &&
        !isset($_SESSION['auth_level'])
    ) {
        session_destroy();
        header("Location: ../login/");
        exit();
    }
}
?>
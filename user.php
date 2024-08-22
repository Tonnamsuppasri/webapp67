<?php

$correct_username = 'user';
$correct_password = 'password123';


$username = $_POST['username'];
$password = $_POST['password'];


if ($username === $correct_username && $password === $correct_password) {

    header("Location: welcome.php");
    exit;
} else {

    header("Location: userlogin.html?error=1");
    exit;
}
?>
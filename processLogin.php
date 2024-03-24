<?php
require 'dbInfo.php';

// If returning user, redirect to dashboard
try
{
    $userNameInput = $_POST["username"];
    $passwordInput = $_POST["password"];

    $sql = "SELECT * 
            FROM todolist 
            WHERE username = '". $userNameInput . "' AND password = '". $passwordInput . "';";

    $result = $dbh->query($sql);

    while ($row = $result->fetch())
    {
        session_start();
        $_SESSION["username"] = $userNameInput;
        header("Location: getData.php");
        exit();
    }

    $errorMessage = "Invalid username or password.";
    header("Location: login.php?error=$errorMessage");
    exit();
}
catch(PDOException $e)
{
    echo $e->getMessage() ."";
}
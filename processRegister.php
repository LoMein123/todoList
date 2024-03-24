<?php
require 'dbInfo.php';

try
{
    $userNameInput = $_POST["username"];
    $passwordInput = $_POST["password"];

    // Insert into database, if error, that means the username already exists   
    $sql = "INSERT INTO todolist (username, password)
            VALUES ('$userNameInput' , '$passwordInput');";

    if ($dbh->query($sql))
    {
        session_start();
        $_SESSION["username"] = $userNameInput;
        header("Location: login.php?accountCreated=true");
        exit();
    }
    else
    {
        echo "Database error";
    }
}
catch(PDOException $e)
{
    $errorCode = $e->getCode();

    if ($errorCode == 23000)
    {
        $errorMessage = "Username already taken.";
        header("Location: register.php?error=$errorMessage");
        exit();
    }
    else
        echo "Unknown Error";
}
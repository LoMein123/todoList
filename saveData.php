<?php
require 'dbInfo.php';

session_start();
$username = $_SESSION['username'];
//$data = $_COOKIE['data'];

//echo "<script>localStorage.localStorage.getItem('ul_data');</script>";
//echo "<script>alert(localStorage.getItem('ul_data'));</script>";

/// chi added
// Retrieve data sent from JavaScript
$data = $_POST['data'];

// Now you can use $dataFromLocalStorage as you wish, for example, save it to a file or database.
// For demonstration, let's just print it.
echo "Data received from localStorage: " . $data;
////





$sql = "UPDATE todolist
        SET data='$data' WHERE username='$username';";
$dbh->query($sql);

//setcookie("data", $data, time() + (86400 * 30), "dashboard.php");

header("location:dashboard.php");

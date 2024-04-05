<?php
/******************************************************
 *  This file saves todo list tasks to the database.
 ******************************************************/

require 'dbInfo.php';

session_start();
$username = $_SESSION['username'];

$data = $_POST['data'];

// Add tasks to database of the logged in user
$sql = "UPDATE todolist
        SET data='$data' WHERE username='$username';";
$dbh->query($sql);

// Return to todo list
header("location:dashboard.php");

<?php
require 'dbInfo.php';

session_start();
$username = $_SESSION["username"];

$sql = "SELECT data
        FROM todolist
        WHERE username = '$username'";
$result = $dbh->query($sql);

echo "<script>localStorage.removeItem('ul_data');</script>";

while ($row = $result->fetch())
{
    $temp = $row["data"];
    echo "<script>localStorage.setItem('ul_data', '$temp');</script>";
}

echo "<script>window.location.href='dashboard.php';</script>";
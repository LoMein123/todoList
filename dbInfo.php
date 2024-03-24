<?php
// Creates connection string and database object
$connectionstring = "mysql:host=localhost;dbname=todolist";
$username = "root";
$password = "";

$dbh = new PDO($connectionstring, $username, $password);
# A simple account based to-do list application
 Backend made using PHP and MySQL.

## Features
 - Login/logout
 - Register
 - Add Tasks
 - Delete Tasks
 - Mark tasks as done
 - Save tasks (automatic)

## How to run
 1. Clone the repository to your WAMP or XAMPP 'www' folder.
 2. Create a MySQL database named todolist and execute the following query to create table: 
  `CREATE TABLE `todolist` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `data` varchar(9999) DEFAULT NULL,
  UNIQUE KEY `username` (`username`)
  )`
3. Start the WAMP or XAMPP server.
4. Navigate to `localhost/register.php` in a browser to register an account.
5. Log into your account and add tasks to the to-do list.
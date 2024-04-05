# A simple account based to-do list application
 A dynamic and interactive To-Do List web application using HTML, CSS, JavaScript, and PHP.  Implements and presents Software Engineering principles and practices such as requirements engineering, modeling, development, and testing.  The website can be accessed at: http://mytodolist.free.nf

## Features
 - Login/logout
 - Register
 - Add Tasks
 - Delete Tasks
 - Mark tasks as done
 - Save tasks (automatic)
 - Sort tasks by priority

## How to run on local server
 1. Clone the repository to your WAMP or XAMPP 'www' folder.
 2. Create a MySQL database named `todolist` and execute the MySQL query found in `createDatabase.txt` to create the table.
 3. Start the WAMP or XAMPP server.
 4. Navigate to `localhost/todolist/register.php` in a browser to register an account.
 5. Log into your account and add tasks to the to-do list.

Note: You may need to configure other settings such as phpmyadmin credentials, this can be done in the file `dbInfo.php`.

Note 2: You may need to configure your ports differently if you already have MySQL set up locally or another database system.

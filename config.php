<?php   
[$server, $username, $password, $db] = ['localhost', 'root', 'S1L0V', 'blogcms'];

$connection = mysqli_connect($server, $username, $password);
$dbCheck = mysqli_select_db($connection, $db);

$dbCreate = "CREATE DATABASE [IF NOT EXIST] blogcms";
$tableCreate = "CREATE TABLE if not exists posts (id INT NOT NULL, title VARCHAR(80) NOT NULL, content TEXT NOT NULL, short_description VARCHAR(150), slug VARCHAR(80) NOT NULL, created DATETIME NOT NULL, modified DATETIME, active BIT, PRIMARY KEY (id))";

if (!$connection) {
    die('Failed to connect, erorr: ' . mysqli_connect_error());
}

if (!$dbCheck) { mysqli_query($connection, $dbCreate) === true ? 'Database created' : 'Database was not created';}
    
//if (mysqli_query($connection, $dbCreate)) {echo "Database created";}
//if (mysqli_query($connection, $tableCreate)) {echo "Table created:";}
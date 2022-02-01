<?php   
[$server, $username, $password, $db] = ['localhost', 'root', '', 'blogcms']; //set host/ username/ password/ the name of database you want to create

$connection = mysqli_connect($server, $username, $password);

if (!$connection) {
    die('Failed to connect, erorr: ' . mysqli_connect_error());
}
$dbCreate = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($connection, $dbCreate)) {
    $connection = mysqli_connect($server, $username, $password, $db);
} else {
}


$tableCreate = "CREATE TABLE if not exists posts (id INT NOT NULL, title VARCHAR(80) NOT NULL, content TEXT NOT NULL, short_description VARCHAR(150), slug VARCHAR(80) NOT NULL, created DATETIME NOT NULL, modified DATETIME, active BIT, PRIMARY KEY (id))";
mysqli_query($connection, $tableCreate);
    
//if (mysqli_query($connection, $dbCreate)) {echo "Database created";}
//if (mysqli_query($connection, $tableCreate)) {echo "Table created:";}
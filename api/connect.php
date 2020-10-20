<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "local_chat";

$con=mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die('Could not connect: ' . mysqli_error());
}

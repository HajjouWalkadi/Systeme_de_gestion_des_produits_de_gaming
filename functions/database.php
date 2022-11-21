<?php

require('../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_SERVER'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASS'];
$database= $_ENV['DB_DATABASENAME'];

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

if(!$conn){
    die("connexion failed :" . mysqli_connect_error());
}

?>
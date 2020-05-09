<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'bocadito_2019';
$dbPassword = 'Bocadito2019';
$dbName = 'bocadito_2019';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}
<?php

$configFile = __DIR__ . '/config.php';

if (!file_exists($configFile)) {
    die('config.php does not exist');
}

require_once $configFile;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: $conn->connect_error");
}
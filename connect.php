<?php
    $databaseHost = 'localhost';
    $databaseName = 'test';
    $databaseUsername = 'root';
    $databasePassword = 'root';

try {
    $db = new PDO("sqlite:".__DIR__."/test.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Unable to connect to database<br/>";
    echo $e->getMessage();
    exit;
}

// echo "Connected to the database";

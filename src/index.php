<?php


$mysqli = new mysqli('127.0.0.1', 'root', 'root', 'db');


if (!$result = $mysqli->query('SELECT * FROM hello_world')) {
    echo "Sorry, the website is experiencing problems.";

    // Again, do not do this on a public site, but we'll show you how
    // to get the error information
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

$data = $result->fetch_assoc();
echo $data['name'];

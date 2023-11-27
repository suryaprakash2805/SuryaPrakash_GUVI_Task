<?php
header('Content-Type: application/json'); // Set the content type to JSON

$hostname = 'localhost';
$port = 8000;
$username = 'root';
$password = '';
$databasename = 'profile_db';

$mysqli = mysqli_connect($hostname, $username, $password, $databasename, $port);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$result = $mysqli->query("SELECT 1");
if (!$result) {
    die("Query failed: " . $mysqli->error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $number = $_POST['number'];
    $age = $_POST['age'];
    $location = $_POST['location'];
    $sql = "INSERT INTO profile (name, dob, number, age, location) VALUES ('$name', '$dob', '$number', '$age', '$location')";

    if ($mysqli->query($sql) === TRUE) {
        echo json_encode(["Profile saved successfully!"]);
    } else {
        echo json_encode(["Failed to save profile: " . $mysqli->error]);
    }
} else {
    echo json_encode(["Invalid request method"]);
}

$mysqli->close();
?>

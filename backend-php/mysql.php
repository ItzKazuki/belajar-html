<?php

$servername = "localhost";
$database = "auth_php";
$username = "root";
$password = "kazukikun";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);


function send($data) {
    echo json_encode($data);
    return;
}

// Check connection
if($_GET['conn'] == 'status') {
    send([
        'status' => 200,
        'message' => "Connection succcess: " . $conn->ping()
    ]);
}
if ($conn->connect_error) {
    send([
        'status' => 'error',
        'message' => "Connection failed: " . $conn->connect_error
    ]);
    die("Connection failed: " . $conn->connect_error);
}


?>
<?php

// connect mysql
include 'mysql.php';

// set header content to return json 
header('Content-type: application/json');

$getAction = $_GET['action'];

switch($getAction) {
    case 'login':
        login($conn);
        break;
    case 'register': 
        register($conn);
        break;
    default:
        send([
            'error' => "action params must be correct!"
        ]);
        break;
    }
    
function login($conn) {
    if(!isset($_POST['username']) || !isset($_POST['password'])) return false;
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hashPassword = encrypt($password, 34);

    $sql = "SELECT * FROM users WHERE username='".$username."' AND password='".$hashPassword."'";

    $resQuery = mysqli_query($conn, $sql);

    if($resQuery->num_rows > 0) {
        send([
            'status' => 200,
            'message' => 'success'
        ]);
    } else {
        send([
            'status' => 200,
            'test' => $username,
            'message' => 'failed'
        ]);
    }

    return;
}

function register($conn) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $full_name = $_POST['full_name'];

    $sql = "INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `create_date`) VALUES (NULL, '". $username ."', '". encrypt($password, 34) ."', '". $full_name ."', current_timestamp())";
    
    if (mysqli_query($conn, $sql)) {
        send([
            'status' => 200,
            'message' => 'success'
        ]);
        
    } else {
        send([
            'status' => 200,
            'message' => $conn->error
        ]);
    }

    mysqli_close($conn);
    return;
}

function encrypt($encryptData, $encryptKey) {

    $result = '';

    for($i = 0; $i <= strlen($encryptData) -1; $i++) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-={}[]:;\'"<,>./?~`\\|';
        $whereAlphabetIndex = strpos($alphabet,substr($encryptData, $i, 1));
        $getKey = $whereAlphabetIndex + $encryptKey;

        if($getKey >= strlen($alphabet)) {
            $result .= substr($alphabet, $getKey - strlen($alphabet), 1);

        } else {
            $result .= substr($alphabet, $getKey, 1);
        }

    }

    // send([
    //     'encryptData' => $encryptData,
    //     'encryptKey' => $encryptKey,
    //     'result' => $result
    // ]);
    return $result;
}

function decrypt($decryptData, $decryptKey) {

    $result = '';

    for($i = 0; $i <= strlen($decryptData) - 1; $i++) {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+-={}[]:;\'"<,>./?~`\\|';
        $whereAlphabetIndex = strpos($alphabet,substr($decryptData, $i, 1));
        $getKey = $whereAlphabetIndex - $decryptKey;

        if($getKey == -1) {
            $result .= ' ';
        } else if($getKey >= strlen($alphabet)) {
            $result .= substr($alphabet, $getKey + strlen($alphabet), 1);

        } else {
            $result .= substr($alphabet, $getKey, 1);
        }

    }

    return $result;
}
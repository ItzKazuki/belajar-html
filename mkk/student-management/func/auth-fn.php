<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  header('Location: ../index.php');
}

include 'connection.php';

// now you can access $conn from connection.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type = $_POST['type'];

  switch ($type) {
    case 'login':
      login();
      $conn->close();
      break;
    case 'logout':
      logout();
      $conn->close();
      break;
    case 'register':
      register();
      $conn->close();
      break;
    default:
      header('Location: ../index.php');
      break;
  }
}

// login
/**
 * Like select and find where username and password same, also check is admin/user type is adminstrator
 */

function login(): void
{
  global $conn;
  // get username and password
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

  if ($conn->query($sql)->fetch_array() != null) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['success'] = "Berhasil Login";
    header('Location: ../index.php');
  } else {
    $_SESSION['error'] = "Username atau password tidak di temukan.";
    header('Location: ../login.php');
  }
}

function logout(): void
{
  session_start();
  session_destroy();
  session_start();
  $_SESSION['success'] = "Berhasil Logout";
  header('Location: ../index.php');
}

function register(): void
{
  global $conn;
  // get all user input
  $f_name = $_POST['f_name'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // decrypt password

  $password = md5($password);

  // add data to database
  $sql = "INSERT INTO users VALUES (NULL, '$username', '$password', '$f_name', current_timestamp(), 'users')";

  if ($conn->query($sql)) {
    $_SESSION['success'] = "Berhasil Menambahkan Akun";
    header('Location: ../index.php');
  }
}

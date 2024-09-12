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
    case 'find_username':
      find_username();
      $conn->close();
      break;
    case 'edit_password':
      edit_password();
      $conn->close();
      break;
    default:
      header('Location: ../index.php');
      break;
  }
}

function edit_password(): void
{
  global $conn;

  $email = htmlspecialchars($_POST['email']);

  if (!isset($email)) {
    $_SESSION['error'] = "Something error, please try again from start.";
    header('Location: ../forgot_password.php');
    exit();
  }

  $sql = "SELECT * FROM users WHERE email = '$email'";

  $res = $conn->query($sql)->fetch_array();

  if (!isset($res)) {
    header('Location: ../forgot_password.php');
    exit();
  }

  // $oldPassword = htmlspecialchars($_POST['old_password']);
  $newPassword = htmlspecialchars($_POST['new_password']);
  $confirmNewPassword = htmlspecialchars($_POST['confirm_new_password']);

  // get salt
  // $salt = explode(";", $res['password'])[0];
  // $hashPassword = explode(";", $res['password'])[1];

  // $currentHashPassword = generateHashWithSalt($oldPassword, $salt);

  // cek apakah old password dengan yang di database dan yang di input user sama atau engga
  // if($currentHashPassword !== $hashPassword) {
  //   $_SESSION['error'] = "Something error, please try again from start.";
  //   header('Location: ../forgot_password.php');
  //   exit();
  // }

  if ($newPassword !== $confirmNewPassword) {
    header('Location: ../edit_password.php?email=' . $email);
    exit();
  }

  //hash new password
  $salt = generateSalt();
  $hashNewPassword = generateHashWithSalt($newPassword, $salt);

  $conn->query("UPDATE users SET password = '$salt;$hashNewPassword'");

  header('Location: ../login.php');
  exit();
}

function find_username(): void
{
  global $conn;
  $username = htmlspecialchars($_POST['username']);

  $sql = "SELECT * FROM users WHERE username = '$username'";

  $res = $conn->query($sql)->fetch_array();

  if (isset($res)) {
    header('Location: ../edit_password.php?email=' . $res['email']);
    exit();
  } else {
    $_SESSION['error'] = "Username atau password tidak di temukan.";
    header('Location: ../forgot_password.php');
  }
}

function login(): void
{
  global $conn;
  // get username and password
  $username = htmlspecialchars($_POST['username']);
  $password = htmlspecialchars($_POST['password']);

  $sql = "SELECT * FROM users WHERE username = '$username'";

  $res = $conn->query($sql)->fetch_array();

  // get salt
  $salt = explode(";", $res['password'])[0];
  $hashPassword = explode(";", $res['password'])[1];

  $currentHashPassword = generateHashWithSalt($password, $salt);

  if ($currentHashPassword !== $hashPassword) {
    $_SESSION['error'] = "Username atau password tidak di temukan.";
    header('Location: ../login.php');
    exit();
  }

  if ($res != null) {
    $_SESSION['username'] = $res['username'];
    $_SESSION['password'] = $res['password'];
    $_SESSION['full_name'] = $res['full_name'];
    $_SESSION['role'] = $res['type_user'];
    $_SESSION['avatar'] = $res['avatar'];

    $_SESSION['success'] = "Berhasil Login";
    header('Location: ../dashboard.php');
    exit();
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
  $f_name = htmlspecialchars($_POST['f_name']);
  $username = htmlspecialchars($_POST['username']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $c_password = htmlspecialchars($_POST['c_password']);

  if ($password !== $c_password) {
    $_SESSION['error'] = "Password yang dimasukan harus sama";
    header('Location: ../register.php');  
    exit();
  }

  // insert hash password like this
  // "salt;hash" ex: eb74a563c05dcb66b3f54e26fdfc39dd;197f1c1a6124171a77e28c7e2539c06c6c4c6852e63181030516495e2f049d99
  $salt = generateSalt();
  $hashPassword = generateHashWithSalt($password, $salt);

  $avatar = get_gravatar($email);

  // add data to database
  $user = $conn->query("SELECT * FROM users WHERE username = '$username' OR email = '$email'");

  if ($user->num_rows > 0) {
      $_SESSION['error'] = "Username or Email already use";
      header('Location: ../register.php');
      exit();
  } else {
    $sql = "INSERT INTO users VALUES (NULL, '$username', '$salt;$hashPassword', '$f_name', current_timestamp(), 'users', '$avatar', '$email')";

    if ($conn->query($sql)) {
      $_SESSION['success'] = "Berhasil Menambahkan Akun";
      header('Location: ../login.php');
    }
  }
}

function generateSalt($length = 16)
{
  // Menghasilkan salt acak dengan panjang tertentu
  return bin2hex(random_bytes($length));
}

function generateHashWithSalt($password, $salt)
{
  // Menggabungkan password dengan salt <da></da>n menghasilkan hash SHA-256
  return hash('sha256', $salt . $password);
}

function get_gravatar(
  $email,
  $size = 64,
  $default_image_type = 'mp',
  $force_default = false,
  $rating = 'g',
  $return_image = false,
  $html_tag_attributes = []
) {
  // Prepare parameters.
  $params = [
    's' => htmlentities($size),
    'd' => htmlentities($default_image_type),
    'r' => htmlentities($rating),
  ];
  if ($force_default) {
    $params['f'] = 'y';
  }

  // Generate url.
  $base_url = 'https://www.gravatar.com/avatar';
  $hash = hash('sha256', strtolower(trim($email)));
  $query = http_build_query($params);
  $url = sprintf('%s/%s?%s', $base_url, $hash, $query);

  // Return image tag if necessary.
  if ($return_image) {
    $attributes = '';
    foreach ($html_tag_attributes as $key => $value) {
      $value = htmlentities($value, ENT_QUOTES, 'UTF-8');
      $attributes .= sprintf('%s="%s" ', $key, $value);
    }

    return sprintf('<img src="%s" %s/>', $url, $attributes);
  }

  return $url;
}

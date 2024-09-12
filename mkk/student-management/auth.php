<?php

include 'func/connection.php';

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

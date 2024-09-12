<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';
header('Content-Type: application/json');

// now you can access $conn from connection.php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $type = htmlspecialchars($_GET['type']);

  switch ($type) {
    case 'kelas':
      getClass();
      $conn->close();
      break;
    case 'guru':
      getTeacher();
      $conn->close();
      break;
    default:
      header('Location: ../index.php');
      break;
  }
}

function getClass(): void
{
  global $conn;

  $res = $conn->query("SELECT * FROM class ORDER BY created_at DESC");

  if ($res->fetch_array() != null) {

    while ($row = $res->fetch_row(MYSQLI_ASSOC)) {
      $class[] = $row;
    }
    echo json_encode($class);
  } else {
    echo json_encode(array(
      "error" => "not found"
    ));
  }
}

function getTeacher(): void
{
  global $conn;

  $res = $conn->query("SELECT * FROM guru ORDER BY created_at ASC");

  if ($res->fetch_array() != null) {

    while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
      $teachers[] = $row;
    }
    
    echo json_encode($teachers);
  } else {
    echo json_encode(array(
      "error" => "not found"
    ));
  }
}

<?php
$conn = new mysqli("127.0.0.1", 'root', 'kazukikun', 'auth_php');

if ($conn->connect_errno) {
  die("Failed Connect to database: " . $conn->connect_error);
  // exit();
}

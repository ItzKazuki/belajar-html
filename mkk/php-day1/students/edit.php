<?php

$mysql = new mysqli("127.0.0.1", 'root', 'kazukikun', 'auth_php');

// if($_POST['submit']) {
//   return '<script>alert("hello"</script>';
// }

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $findStudentQuery = "SELECT * FROM students WHERE id = '$id'";

  $student = $mysql->query($findStudentQuery);

  $stdData = [];

  while ($row = $student->fetch_assoc()) {
    $stdData =
  }
}


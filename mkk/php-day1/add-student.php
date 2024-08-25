<?php

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $name = $_POST["name"];
  $class = $_POST["class"];
  $nilai = $_POST["nilai"];
  $id = "STD-" . rand(1000, 9999);

  $sql = "INSERT INTO students (id, name, class, nilai) VALUES ('" . $id . "','" . $name ."', '" . $class . "', '" . $nilai . "')";

  // echo $sql;
  // die;
  // array_push($students, [$name, $class, $nilai]);
  // mysqli_query($connection, "INSERT INTO students (id, name, class, nilai) VALUES ('" . $name ."', '" . $class . "', '" . $nilai . "')");

  if (mysqli_query($connection, $sql)) {
    echo "<script>
    if(confirm('student success add to database')) {window.location.href = 'add-student-db.php'}
    </script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
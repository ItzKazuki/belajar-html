<?php
// here must POST METHOD

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "GET") {
  // echo "<script>window.location.href = 'students.php'</script>"; don't use this again.
  header('Location: index.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $nisn = $_POST['nisn'];
  $name = $_POST["name"];
  $class = $_POST["class"];
  $nilai = $_POST["nilai"];

  $sql = "INSERT INTO nilai_siswa (nisn, name, class, nilai) VALUES ('$nisn', '$name', '$class', '$nilai')";

  // echo $sql;
  // die;
  // array_push($students, [$name, $class, $nilai]);
  // mysqli_query($connection, "INSERT INTO students (id, name, class, nilai) VALUES ('" . $name ."', '" . $class . "', '" . $nilai . "')");

  if ($conn->query($sql)) {
    // echo "<script>
    // if(confirm('student success add to database')) {window.location.href = 'students.php'}
    // </script>";
    header("Location: students.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>


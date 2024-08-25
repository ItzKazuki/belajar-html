<?php
// here must POST METHOD

include 'connection.php';

if($_SERVER["REQUEST_METHOD"] == "GET") {
  // echo "<script>window.location.href = 'students.php'</script>";
  header('Location: index.php');
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $nisn = $_POST['nisn'];
  $sql = "DELETE FROM nilai_siswa WHERE nisn = $nisn";

  if($conn->query($sql)) {
    // echo "<script>window.location.href = 'students.php'</script>";
    header('Location: students.php');
  } else {
    echo "Something error, please try again later!";
  }
}

?>


<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  header('Location: ../index.php');
}

// include connection for connect php to database
include 'connection.php';

// now you can access $conn from connection.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $type = $_POST['type'];

  switch ($type) {
    case 'edit':
      editStudent(htmlspecialchars($_POST['nisn']));
      $conn->close();
      break;
    case 'create':
      createStudent();
      $conn->close();
      break;
    case 'delete':
      deleteStudent(htmlspecialchars($_POST['nisn']));
      $conn->close();
      break;
    default:
      header('Location: ../data-nilai-students.php');
      break;
  }
}

// TODO: using statement and prepare mysqli builtin method for get data from database.
function createStudent(): void
{
  global $conn;

  // Retrieve form data
  $nisn = htmlspecialchars($_POST['nisn']);
  $name = htmlspecialchars($_POST["name"]);
  $class = htmlspecialchars($_POST["class"]);
  $nilai = htmlspecialchars($_POST["nilai"]);

  // cek apakah ada nisn
  if (!isset($nisn)) {
    $_SESSION['error'] = "Nisn wajib di isi!!"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  }

  // cek nama
  if (!isset($name)) {
    $_SESSION['error'] = "Nama wajib di isi!!"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  }

  // cek kelas
  if (!isset($class)) {
    $_SESSION['error'] = "Kelas wajib di isi!!"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  }

  // cek nilai
  if (!isset($nilai)) {
    $_SESSION['error'] = "Nilai wajib di isi!!"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  }

  $student = $conn->query("SELECT * FROM nilai_siswa WHERE name = '$name' OR nisn = $nisn");

  if ($student->fetch_array() != null) {
    $_SESSION['error'] = "Nama atau Nisn siswa sudah ada"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  } else {
    // echo "tidak ada";
    $queryCreate = "INSERT INTO nilai_siswa (nisn, name, class, nilai) VALUES ('$nisn', '$name', '$class', '$nilai')";

    if ($conn->query($queryCreate)) {
      $_SESSION['success'] = "Berhasil Menambah data siswa"; // send success message
      header("Location: ../data-nilai-students.php");
      exit();
    } else {
      // echo "Error: " . $queryCreate . "<br>" . mysqli_error($conn);
      $_SESSION['error'] = "kesalahan ditemukan saat menjalani query: $queryCreate"; // send error message
      header('Location: ../data-nilai-students.php');
    }
  }
}

function editStudent(int $nisn): void
{
  global $conn;

  // cek apakah ada nisn
  if (!isset($nisn)) {
    $_SESSION['error'] = "Nisn wajib di isi!!"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  }

  // $inputNisn = $_POST['nisn'];
  $name = htmlspecialchars($_POST["name"]);
  $class = htmlspecialchars($_POST["class"]);
  $nilai = htmlspecialchars($_POST["nilai"]);

  // cek nama
  if (!isset($name)) {
    $_SESSION['error'] = "Nama wajib di isi!!"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  }

  // cek kelas
  if (!isset($class)) {
    $_SESSION['error'] = "Kelas wajib di isi!!"; // send error message
    header('Location: ../data-nilai-students.php');
  }

  // cek nilai
  if (!isset($nilai)) {
    $_SESSION['error'] = "Nilai wajib di isi!!"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  }

  // cek apakah ada isswa yang namanya atau nisnnya sama
  $student = $conn->query("SELECT * FROM nilai_siswa WHERE name = '$name' AND nisn != $nisn");

  if ($student->fetch_array(MYSQLI_NUM)[0] != null) {
    $_SESSION['error'] = "Nama atau Nisn siswa sudah ada"; // send error message
    header('Location: ../data-nilai-students.php');
    exit();
  } else {
    $queryEdit = "UPDATE nilai_siswa SET name = '$name', class = '$class', nilai = $nilai WHERE nisn = $nisn";
    if ($conn->query($queryEdit)) {
      $_SESSION['success'] = "Berhasil Mengubah data siswa"; // send success message
      header('Location: ../data-nilai-students.php');
      exit();
    } else {
      // echo "something error, please try again later...";
      $_SESSION['error'] = "kesalahan ditemukan saat menjalani query: $queryEdit"; // send error message
      header('Location: ../data-nilai-students.php');
    }
  }
}

function deleteStudent(int $nisn): void
{
  global $conn;
  // get id
  $queryDelete = "DELETE FROM nilai_siswa WHERE nisn = $nisn";

  if ($conn->query($queryDelete)) {
    // return 1;
    $_SESSION['success'] = "Berhasil Menghapus data siswa dengan nisn: $nisn";
    header('Location: ../data-nilai-students.php');
    exit();
  } else {
    // echo "Error";
    $_SESSION['error'] = "kesalahan ditemukan saat menjalani query: $queryDelete"; // send error message
    header('Location: ../data-nilai-students.php');
  }
}

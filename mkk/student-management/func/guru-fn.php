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
    case 'create':
      createGuru();
      $conn->close();
      break;
    default:
      header('Location: ../daftar-guru.php');
      break;
  }
}

function createGuru() {
  global $conn;

  // Retrieve form data
  $nip = htmlspecialchars($_POST['nip']);
  $name = htmlspecialchars($_POST["name"]);
  $jabatan = htmlspecialchars($_POST["jabatan"]);
  $mengajar = htmlspecialchars($_POST["mengajar"]);

  $gambar = upload('foto_guru');

  if(!$gambar) {
    $_SESSION['error'] = "Error saat upload gambar";
    header('Location: ../daftar-guru.php');
    exit();
  }

  if(!isset($nip) || !isset($name) || !isset($jabatan)) {

    // this calling error redirect
    $_SESSION['error'] = "nip, nama, jabatan, dan status mengajar harus di isi!";
    header('Location: ../daftar-guru.php');
    exit();
  }

  // echo "INSERT INTO guru VALUES ('" . $nip ."', '".  $name ."', '". $jabatan ."', '". isset($mengajar) ? $mengajar : "NULL" ."', current_timestamp())";
  $conn->query("INSERT INTO guru VALUES ('" . $nip ."', '".  $name ."', '". $jabatan ."', '". $mengajar ."', current_timestamp(), '". "assets/uploads/" .$gambar ."')");
  $_SESSION['success'] = "Berhasil menambahkan guru kedalam database";
  header('Location: ../daftar-guru.php');
}

function upload(string $name) {
  $file = $_FILES[$name];

  $fileName = $file['name'];
  $fileSize = $file['size'];
  $fileErr = $file['error'];
  $fileTmp = $file['tmp_name'];

  if($fileErr === 4) {
    $_SESSION['error'] = "harus masukan gambar";
    return false;
  }

  $validExstension = ['jpg', 'jpeg', 'png'];
  $fileExstension = explode('.', $fileName);
  $fileExstension = end($fileExstension);
  $fileExstension = strtolower($fileExstension);

  if(!in_array($fileExstension, $validExstension)) {
    $_SESSION['error'] = "gambar tidak valid";
    return false;
  }

  $fileName = date('m-d-Y', time()) . "-" . $fileName;
  // upload gambar
  move_uploaded_file($fileTmp, "../assets/uploads/" . $fileName);

  return $fileName;
}
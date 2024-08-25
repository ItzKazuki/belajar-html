<?php

include "connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$nisn = $_GET['nisn'];

// berfungsi untuk membalikan ke home page
if (!isset($nisn)) {
  // return back to students
  // echo "<script>window.location.href = 'students.php'</script>";
  header('Location: index.php');
}

$student;

$data_students = $conn->query("SELECT * FROM nilai_siswa WHERE nisn = $nisn");

while ($row = $data_students->fetch_row()) {
  // print_r($row);
  $student = $row;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // get all value
  $inputNisn = $_POST['nisn'];
  $name = $_POST['name'];
  $class = $_POST['class'];
  $nilai = $_POST['nilai'];

  $sql = "UPDATE nilai_siswa SET nisn = $inputNisn, name = '$name', class = '$class', nilai = $nilai WHERE nisn = $nisn";
  // echo $sql;

  if ($conn->query($sql)) {
    header('Location: students.php');
    // echo "<script>window.location.href = 'students.php'</script>";
  } else {
    echo "something error, please try again later...";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Nilai Siswa</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="./assets//font-awesome-4.7.0//css/font-awesome.css">
</head>

<body>
  <nav class="navbar bg-base-100">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
          </svg>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li><a>Item 1</a></li>
          <li>
            <a>Parent</a>
            <ul class="p-2">
              <li><a>Submenu 1</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </li>
          <li><a>Item 3</a></li>
        </ul>
      </div>
      <a href="index.php" class="btn btn-ghost text-xl">Manage Siswa</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1">
        <li><a>Item 1</a></li>
        <li>
          <details>
            <summary>Parent</summary>
            <ul class="p-2">
              <li><a>Submenu 1</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </details>
        </li>
        <li><a>Item 3</a></li>
      </ul>
    </div>
    <div class="navbar-end">
      <!-- <a class="btn">Button</a> -->
    </div>
  </nav>

  <div class="min-h-screen mx-4 my-6">
    <div class="flex flex-col-reverse lg:flex-row mx-3 my-8 justify-center gap-4">
      <div class="card bg-base-100 shadow-xl w-full lg:w-[40rem]">
        <div class="card-body">
          <h2 class="card-title">Edit Siswa</h2>
          <div class="grid grid-col-2 gap-3">
            <form method="post">
              <div class="form-control w-full">
                <label for="nisn" class="label-text text-base-content">NISN: </label>
                <input class="input input-bordered mt-2" type="text" inputmode="numeric" name="nisn" id="nisn" value="<?= $student[0] ?>" required>
              </div>
              <div class="form-control w-full">
                <label for="name" class="label-text text-base-content">Nama Siswa: </label>
                <input class="input input-bordered mt-2" type="text" name="name" id="name" value="<?= $student[1] ?>" required>
              </div>
              <div class="form-control w-full">
                <label for="class" class="label-text text-base-content mb-2">Kelas:</label>
                <select class="select select-bordered w-full max-w-xs" name="class" id="class" required>
                  <option value="<?= $student[2] ?>" selected>Default: <?= $student[2] ?></option>
                  <option value="X RPL 1">X RPL 1</option>
                  <option value="X RPL 2">X RPL 2</option>
                  <option value="XI RPL 1">XI RPL 1</option>
                  <option value="XI RPL 2">XI RPL 2</option>
                </select>
              </div>
              <div class="form-control w-full">
                <label for="nilai" class="label-text text-base-content">Nilai Siswa:</label>
                <input type="text" inputmode="numeric" class="input input-bordered mt-2" name="nilai" id="nilai" value="<?= $student[3] ?>" required>
              </div>
              <button class="btn mt-6 w-full btn-primary" type="submit" name="submit">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
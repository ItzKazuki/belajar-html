<?php

session_start();

include "func/connection.php";

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  $_SESSION['error'] = "anda harus login terlebih dahulu";
  header('Location: login.php');
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$data_students = $conn->query("SELECT * FROM nilai_siswa ORDER BY nilai DESC");

while ($row = $data_students->fetch_row()) {
  $students[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Nilai Siswa</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.css">
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
          <li><a href="students.php">Management Nilai Siswa</a></li>
          <!-- <li>
            <a>Parent</a>
            <ul class="p-2">
              <li><a>Submenu 1</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </li>
          <li><a>Item 3</a></li> -->
        </ul>
      </div>
      <a class="btn btn-ghost text-2xl">Dashboard</a>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal px-1 text-xl">
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a href="profile.php">Profile</a>
        </li>
        <li>
          <a href="data-nilai-students.php">Daftar Nilai</a>
        </li>
        <li>
          <a href="daftar-mapel.php">Daftar Mata Pelajaran</a>
        </li>
        <!-- <li>
          <details>
            <summary>Parent</summary>
            <ul class="p-2">
              <li><a>Submenu 1</a></li>
              <li><a>Submenu 2</a></li>
            </ul>
          </details>
        </li>
        <li><a>Item 3</a></li> -->
      </ul>
    </div>
    <div class="navbar-end">
      <?php if (isset($_SESSION['username']) && isset($_SESSION['password'])) : ?>
        <form action="func/auth-fn.php" method="post">
          <button type="submit" name="type" value="logout" class="btn btn-warning mr-6">Logout</button>
        </form>
      <?php else : ?>
        <a class="btn btn-info mr-6" href="login.php">Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <div class="min-h-screen mx-4 my-6">
    <div class="flex flex-col-reverse lg:flex-row mx-3 my-8 justify-center gap-4">
      <div class="grow-0 card bg-blue-400 text-primary-content w-full lg:w-[40rem] h-auto">
        <div class="card-body">
          <h2 class="card-title">Daftar Nilai Siswa</h2>
          <?php if (!isset($students)) : ?>
            <p>Data Not Found!, no students available</p>
          <?php else : ?>
            <div class="overflow-x-auto">
              <table class="table table-auto">
                <!-- head -->
                <thead class="dark:text-black">
                  <tr>
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Nilai</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->
                  <?php foreach ($students as $key => $student) : ?>
                    <tr>
                      <th><?= $key + 1 ?></th>
                      <th><?= $student[0] ?></th>
                      <th><?= $student[1] ?></th>
                      <th><?= $student[2] ?></th>
                      <th><?= $student[3] ?></th>
                      <th class="inline-block">
                        <button onclick="studentEdit(<?= $student[0] ?>, '<?= $student[1] ?>', '<?= $student[2] ?>', <?= $student[3] ?>)" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                        <button onclick="studentDelete(<?= $student[0] ?>)" type="submit" class="btn btn-error"><i class="fa fa-trash" aria-hidden="true"></i></button>
                      </th>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="card bg-base-100 shadow-xl w-full lg:w-[40rem]">
        <div class="card-body">
          <h2 class="card-title">Tambah Siswa</h2>
          <div class="grid grid-col-2 gap-3">
            <form name="add-student" onsubmit="return validateCreateForm()" action="func/students-fn.php" method="post">
              <div class="form-control w-full">
                <label for="nisn" class="label-text text-base-content">NISN: </label>
                <input class="input input-bordered mt-2" type="text" inputmode="numeric" name="nisn" id="nisn" required>
              </div>
              <div class="form-control w-full mt-2">
                <label for="name" class="label-text text-base-content">Nama Siswa: </label>
                <input class="input input-bordered mt-2" type="text" name="name" id="name" required>
              </div>
              <div class="form-control w-full mt-2">
                <label for="class" class="label-text text-base-content mb-2">Kelas:</label>
                <select class="select select-bordered w-full max-w-xs" name="class" id="class" required>
                  <option disabled selected>Pilih kelas</option>
                  <option value="X RPL 1">X RPL 1</option>
                  <option value="X RPL 2">X RPL 2</option>
                  <option value="XI RPL 1">XI RPL 1</option>
                  <option value="XI RPL 2">XI RPL 2</option>
                </select>
              </div>
              <div class="form-control w-full mt-2">
                <label for="nilai" class="label-text text-base-content">Nilai Siswa:</label>
                <input type="text" inputmode="numeric" class="input input-bordered mt-2" name="nilai" id="nilai" required>
              </div>
              <button class="btn mt-6 w-full btn-primary" type="submit" name="type" value="create">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Open the modal using ID.showModal() method -->
  <dialog id="edit_student_modal" class="modal">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Edit Student!</h3>
      <form name="edit-student" onsubmit="return validateEditForm()" method="post" action="func/students-fn.php">
        <input type="hidden" name="nisn" id="default-nisn">
        <div class="form-control w-full">
          <label for="nisn" class="label-text text-base-content">NISN: </label>
          <input class="input input-bordered mt-2" type="text" inputmode="numeric" name="nisn-default" id="edit-nisn" disabled>
        </div>
        <div class="form-control w-full">
          <label for="name" class="label-text text-base-content">Nama Siswa: </label>
          <input class="input input-bordered mt-2" type="text" name="name" id="edit-name" required>
        </div>
        <div class="form-control w-full">
          <label for="class" class="label-text text-base-content mb-2">Kelas:</label>
          <select class="select select-bordered w-full max-w-xs" name="class" id="edit-class" required>
            <option value="X RPL 1">X RPL 1</option>
            <option value="X RPL 2">X RPL 2</option>
            <option value="XI RPL 1">XI RPL 1</option>
            <option value="XI RPL 2">XI RPL 2</option>
          </select>
        </div>
        <div class="form-control w-full">
          <label for="nilai" class="label-text text-base-content">Nilai Siswa:</label>
          <input type="text" inputmode="numeric" class="input input-bordered mt-2" name="nilai" id="edit-nilai" required>
        </div>
        <div class="modal-action">
          <button class="btn btn-primary" type="submit" name="type" value="edit">Edit</button>
          <button onclick="closeModal('edit_student_modal')" class="btn">Close</button>
        </div>
      </form>
    </div>
  </dialog>

  <!-- Open the modal using ID.showModal() method -->
  <dialog id="delete_student_modal" class="modal">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Delete Confirm!</h3>
      <p id="delete_modal_body" class="py-4">Apa anda yakin mengahpus siswa dengan nisn: </p>
      <div class="modal-action">
        <form action="func/students-fn.php" name="delete-student" onsubmit="return validateDeleteForm()" method="post">
          <input type="hidden" name="nisn" id="delete-modal-nisn">
          <button type="submit" class="btn btn-error" name="type" value="delete">Delete</button>
        </form>
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn">Close</button>
        </form>
      </div>
    </div>
  </dialog>

  <!-- error modal -->
  <dialog id="error-modal" class="modal border-red-500">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Error</h3>
      <p class="py-4">THIS MESSAGE ERROR</p>
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn">Close</button>
        </form>
      </div>
    </div>
  </dialog>

  <!-- success modal -->
  <dialog id="success-modal" class="modal">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Success</h3>
      <p class="py-4">THIS MESSAGE Success</p>
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn">Close</button>
        </form>
      </div>
    </div>
  </dialog>

</body>
<script src="assets/script.js"></script>
<script>
  <?php if (isset($_SESSION['error'])) : ?>
    errorModal("<?= $_SESSION['error'] ?>")
    <?php unset($_SESSION['error']) ?> // set error to null 
  <?php endif; ?>
  <?php if (isset($_SESSION['success'])) : ?>
    successModal("<?= $_SESSION['success'] ?>")
    <?php unset($_SESSION['success']) ?> // set error to null 
  <?php endif; ?>
</script>

</html>
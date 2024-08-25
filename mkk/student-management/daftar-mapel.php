<?php 
session_start();

include 'func/connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dataMapel = $conn->query("SELECT * FROM mata_pelajaran ORDER BY title ASC");

while ($row = $dataMapel->fetch_row()) {
  $mataPelajaran[] = $row;
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
          <li><a href="mataPelajaran.php">Management Nilai Siswa</a></li>
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
    <div class="mx-3 my-8">
      <div class="flex justify-between mb-3">
      <h2 class="card-title">Daftar Mata Pelajaran Siswa</h2>
      <?php if (isset($_SESSION['username']) && isset($_SESSION['password'])) : ?>
        <a href="" class="btn btn-primary">Tambah Jadwal</a>
      <?php endif; ?>
      </div>
      <div class="grow-0 card bg-blue-400 text-primary-content w-full h-auto">
        <div class="card-body">
          <?php if (!isset($mataPelajaran)) : ?>
            <p>Data Not Found!, mata pelajaran unavailable</p>
          <?php else : ?>
            <div class="overflow-x-auto">
              <table class="table table-auto">
                <!-- head -->
                <thead class="dark:text-black">
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Nama Guru</th>
                    <th>Untuk Kelas</th>
                    <th>Deskripsi</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- row 1 -->
                  <?php foreach ($mataPelajaran as $key => $student) : ?>
                    <tr>
                      <th><?= $key + 1 ?></th>
                      <th><?= $student[1] ?></th>
                      <th><?= $student[2] ?></th>
                      <th><?= $student[3] ?></th>
                      <th><?= $student[4] ?></th>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

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
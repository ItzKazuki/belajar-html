<?php

session_start();

include "func/connection.php";

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  $_SESSION['error'] = "anda harus login terlebih dahulu";
  header('Location: login.php');
}

$currentFile = basename($_SERVER['PHP_SELF']);

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
  <div class="flex flex-row min-h-screen bg-gray-100 text-black">
    <aside class="sidebar w-64 md:shadow transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in bg-indigo-500">
      <div class="sidebar-header flex items-center justify-center py-2">
        <div class="inline-flex">
          <a href="#" class="inline-flex flex-row items-center">
            <span class="leading-10 text-gray-100 text-2xl font-bold ml-1 uppercase">SMKN 71 Jakarta</span>
          </a>
        </div>
      </div>
      <div class="sidebar-content px-4 py-6 text-white">
        <ul class="flex flex-col w-full">
          <li class="my-px">
            <a href="dashboard.php" class="flex flex-row items-center h-10 px-3 rounded-lg <?= $currentFile == "index.php" ? "text-black bg-gray-100" : "hover:bg-gray-100 hover:text-gray-700" ?>">
              <span class="flex items-center justify-center text-lg">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
              </span>
              <span class="ml-3">Dashboard</span>
            </a>
          </li>
          <li class="my-px">
            <span class="flex font-medium text-sm px-4 my-4 uppercase">Features</span>
          </li>
          <li class="my-px">
            <a href="data-nilai-students.php" class="flex flex-row items-center h-10 px-3 rounded-lg <?= $currentFile == "data-nilai-students.php" ? "text-black bg-gray-100" : "hover:bg-gray-100 hover:text-gray-700" ?>">
              <span class="flex items-center justify-center text-lg">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
              </span>
              <span class="ml-3">Manage Nilai Siswa</span>
            </a>
          </li>
          <li class="my-px">
            <a href="daftar-mapel.php" class="flex flex-row items-center h-10 px-3 rounded-lg <?= $currentFile == "daftar-mapel.php" ? "text-black bg-gray-100" : "hover:bg-gray-100 hover:text-gray-700" ?>">
              <span class="flex items-center justify-center text-lg">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
              </span>
              <span class="ml-3">Daftar Mata Pelajaran</span>
            </a>
          </li>
          <li class="my-px">
            <a href="daftar-guru.php" class="flex flex-row items-center h-10 px-3 rounded-lg <?= $currentFile == "daftar-guru.php" ? "text-black bg-gray-100" : "hover:bg-gray-100 hover:text-gray-700" ?>">
              <span class="flex items-center justify-center text-lg">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </span>
              <span class="ml-3">Daftar Guru</span>
              <!-- <span class="flex items-center justify-center text-xs text-red-500 font-semibold bg-red-100 h-6 px-2 rounded-full ml-auto">1k</span> -->
            </a>
          </li>
          <!-- <li class="my-px">
            <a href="#" class="flex flex-row items-center h-10 px-3 rounded-lg hover:bg-gray-100 hover:text-gray-700">
              <span class="flex items-center justify-center text-lg text-green-400">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </span>
              <span class="ml-3">Add new</span>
            </a>
          </li> -->
          <li class="my-px">
            <span class="flex font-medium text-sm px-4 my-4 uppercase">Account</span>
          </li>
          <li class="my-px">
            <a href="profile.php" class="flex flex-row items-center h-10 px-3 rounded-lg <?= $currentFile == "profile.php" ? "text-black bg-gray-100" : "hover:bg-gray-100 hover:text-gray-700" ?>">
              <span class="flex items-center justify-center text-lg">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </span>
              <span class="ml-3">Profile</span>
            </a>
          </li>
          <!-- <li class="my-px">
            <a href="#" class="flex flex-row items-center h-10 px-3 rounded-lg hover:bg-gray-100 hover:text-gray-700">
              <span class="flex items-center justify-center text-lg">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
              </span>
              <span class="ml-3">Notifications</span>
              <span class="flex items-center justify-center text-xs text-red-500 font-semibold bg-red-100 h-6 px-2 rounded-full ml-auto">10</span>
            </a>
          </li> -->
          <!-- <li class="my-px">
            <a href="#" class="flex flex-row items-center h-10 px-3 rounded-lg hover:bg-gray-100 hover:text-gray-700">
              <span class="flex items-center justify-center text-lg">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                  <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                  <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </span>
              <span class="ml-3">Settings</span>
            </a>
          </li> -->
          <li class="my-px">
            <form action="func/auth-fn.php" method="post">
              <button type="submit" name="type" value="logout" class="flex flex-row items-center h-10 px-3 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                <span class="flex items-center justify-center text-lg text-red-400">
                  <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                  </svg>
                </span>
                <span class="ml-3">Logout</span>
              </button>
            </form>
          </li>
        </ul>
      </div>
    </aside>
    <main class="main flex flex-col flex-grow -ml-64 md:ml-0 transition-all duration-150 ease-in">
      <header class="header bg-white shadow py-4 px-4">
        <div class="header-content flex items-center flex-row">
          <form action="#">
            <div class="hidden md:flex relative">
              <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10">
                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </div>

              <input id="search" type="text" name="search" class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-300 w-full h-10 focus:outline-none focus:border-indigo-400" placeholder="Search..." />
            </div>
            <div class="flex md:hidden">
              <a href="#" class="flex items-center justify-center h-10 w-10 border-transparent">
                <svg class="h-6 w-6 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </a>
            </div>
          </form>
          <div class="flex ml-auto">
            <a href class="flex flex-row items-center">
              <img src="<?= $_SESSION['avatar'] ?>" alt class="h-10 w-10 bg-gray-200 border rounded-full" />
              <span class="flex flex-col ml-2">
                <span class="truncate w-20 font-semibold tracking-wide leading-none"><?= $_SESSION['full_name'] ?></span>
                <span class="truncate w-20 text-gray-500 text-xs leading-none mt-1">Manager</span>
              </span>
            </a>
          </div>
        </div>
      </header>
      <div class="main-content flex flex-col flex-grow p-4">
        <div class="mx-4 my-2">
          <div id="greeting" class="mb-4">
            <h1 class="text-4xl font-bold mb-4">Manage Nilai Siswa</h1>
          </div>
          <div class="flex flex-col-reverse lg:flex-row mx-3 my-8 justify-center gap-4">
            <div class="grow-0 card bg-blue-400 w-full lg:w-[40rem] h-auto">
              <div class="card-body">
                <h2 class="card-title">Daftar Nilai Siswa</h2>
                <?php if (!isset($students)) : ?>
                  <p>Data Not Found!, no students available</p>
                <?php else : ?>
                  <div class="overflow-x-auto">
                    <table class="table table-auto">
                      <!-- head -->
                      <thead class="text-black">
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
      </div>
      <footer class="footer px-4 py-6">
        <div class="footer-content">
          <p class="text-sm text-gray-600 text-center">© Brandname 2020. All rights reserved. <a href="https://twitter.com/iaminos">by iAmine</a></p>
        </div>
      </footer>
    </main>
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
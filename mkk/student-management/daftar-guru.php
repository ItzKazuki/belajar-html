<?php
session_start();

include 'func/connection.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  header('Location: login.php');
}

$currentFile = basename($_SERVER['PHP_SELF']);

$data_guru = $conn->query("SELECT * FROM guru ORDER BY created_at ASC");

while ($row = $data_guru->fetch_row()) {
  $teachers[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <div class="flex flex-row min-h-screen bg-gray-100 text-black">
    <aside class="sidebar w-64 md:shadow transform -translate-x-full md:translate-x-0 transition-transform duration-150 ease-in bg-indigo-500">
      <div class="sidebar-header flex items-center justify-center py-2">
        <div class="inline-flex">
          <a href="dashboard.php" inline-flex flex-row items-center">
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
        <div class="min-h-screen mx-4 my-2">
          <div class="flex justify-between mb-3">
            <h1 class="text-4xl font-bold mb-4">Daftar Guru</h1>
            <?php if (isset($_SESSION['username']) && isset($_SESSION['password'])) : ?>
              <button onclick="document.getElementById('tambah_guru').showModal()" class="btn btn-primary">Tambah Guru</button>
            <?php endif; ?>
          </div>
          <?php if (!isset($teachers)) : ?>
            <p>tidak ada guru yang terdaftar</p>
          <?php else : ?>
            <div class="grid grid-cols-4 gap-4">
              <?php foreach($teachers as $teacher): ?>
              <div class="card bg-base-100 w-80 shadow-xl">
                <figure>
                  <img src="<?= $teacher[5] ?>" alt="Foto Guru" />
                </figure>
                <div class="card-body">
                  <h2 class="card-title"><?= $teacher[1] ?></h2>
                  <p><?= $teacher[2] ?> SMKN 71 Jakarta</p>
                  <div class="card-actions justify-end">
                    <button onclick="errorModal('Sorry, this feature is under development!')" class="btn btn-primary">Details</button>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
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
  <dialog id="tambah_guru" class="modal">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Tambah Guru</h3>
      <form name="edit-student" method="post" action="func/guru-fn.php" enctype="multipart/form-data">
        <div class="form-control w-full">
          <label for="nip" class="label-text text-base-content">NIP: </label>
          <input class="input input-bordered mt-2" type="text" inputmode="numeric" name="nip">
        </div>
        <div class="form-control w-full">
          <label for="name" class="label-text text-base-content">Nama Guru: </label>
          <input class="input input-bordered mt-2" type="text" name="name" required>
        </div>
        <div class="form-control w-full">
          <label for="jabatan" class="label-text text-base-content mb-2 w-full">Jabatan:</label>
          <select class="select select-bordered w-full max-w-xs" name="jabatan" required>
            <option value="Kepala Sekolah">Kepala Sekolah</option>
            <option value="Kesiswaan">Kesiswaan</option>
            <option value="Tata Usaha">Tata Usaha</option>
            <option value="Hubin">Hubin</option>
            <option value="Kepala Jurusan">Kepala Jurusan</option>
            <option value="Guru">Guru</option>
          </select>
        </div>
        <div class="form-control w-full">
          <label for="nilai" class="label-text text-base-content">Mengajar:</label>
          <input type="text" inputmode="numeric" class="input input-bordered mt-2" name="mengajar" required>
        </div>
        <div class="form-control w-full mt-2">
          <label for="nilai" class="label-text text-base-content">Foto background merah:</label>
          <img src="#" alt="" id="file-preview">
          <input type="file" name="foto_guru" id="file-upload" required>
        </div>
        <div class="modal-action">
          <button class="btn btn-primary" type="submit" name="type" value="create">Tambah Guru</button>
          <button onclick="closeModal('tambah_guru')" class="btn">Close</button>
        </div>
      </form>
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
  const inputFile = document.getElementById('file-upload')
  inputFile.addEventListener('change', () => {
    const file = inputFile.files;
    if (file) {
      const fileReader = new FileReader();
      const preview = document.getElementById('file-preview');
      fileReader.onload = event => {
        preview.setAttribute('src', event.target.result);
        preview.setAttribute('class', "my-3");
        preview.setAttribute('width', "150");
        preview.setAttribute('height', "300");
        preview.setAttribute('alt', "Preview Uploaded Image")
      }
      fileReader.readAsDataURL(file[0]);
    }
  })

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
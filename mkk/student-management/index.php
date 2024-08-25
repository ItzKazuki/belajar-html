<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../style.css">
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
      <a class="btn btn-warning mr-6">Logout</a>
    </div>
  </nav>

  <div class="min-h-screen mx-4 my-4">
    <div id="greeting" class="lg:ml-6 mb-4">
      <h1 class="text-2xl font-bold">Welcome!</h1>
      <p class="pl-4 mt-2 lg:pl-6">Welcome to dashboard, thankyou to using our service.</p>
    </div>
    <h1 class="text-2xl font-bold lg:ml-6">Our Service</h1>
    <div class="card bg-base-100 w-full lg:w-96 shadow-xl">
      <div class="card-body">
        <h2 class="card-title">Manajemen Nilai Siswa</h2>
        <p>Memasukan nilai siswa ke dalam database, dimana guru dapat menambah, menghapus, atau mengubah nilai siswa.</p>
        <div class="card-actions justify-end">
          <a href="data-nilai-students.php" class="btn btn-primary">Try Now!</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
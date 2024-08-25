<?php

include "connection.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

// $students[] = [];
$data_students = mysqli_query($connection, "SELECT * FROM students ORDER BY nilai DESC");

while ($row = mysqli_fetch_row($data_students)) {
  // print_r($row);
  $students[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Siswa</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body class="min-h-screen">
  <div class="flex flex-row mx-3 my-8 justify-center gap-4">
    <div class="shrink-0 card bg-primary text-primary-content w-[40rem]">
      <div class="card-body">
        <h2 class="card-title">Daftar Nilai Siswa</h2>
        <?php if (count($students) <= 0) : ?>
          <p>Error, no students available</p>
        <?php else : ?>
          <div class="overflow-x-auto">
            <table class="table">
              <!-- head -->
              <thead class="text-black">
                <tr>
                  <th>id</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Nilai</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- row 1 -->
                <?php foreach ($students as $student) : ?>
                  <tr>
                    <th><?= $student[0] ?></th>
                    <th><?= $student[1] ?></th>
                    <th><?= $student[2] ?></th>
                    <th><?= $student[3] ?></th>
                    <th>
                      <button class="btn btn-error">Del</button>
                      <button class="btn btn-info">edit</button>
                    </th>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="card bg-base-100 shadow-xl w-[40rem]">
      <div class="card-body">
        <h2 class="card-title">Tambah Siswa</h2>
        <div class="grid grid-col-2 gap-3">
          <form action="add-student.php" method="post">
            <div class="form-control w-full">
              <label for="name" class="label-text text-base-content">Nama Siswa: </label>
              <input class="input input-bordered mt-2" type="text" name="name" id="name">
            </div>
            <div class="form-control w-full">
              <label for="class" class="label-text text-base-content mb-2">Kelas:</label>
              <select class="select select-bordered w-full max-w-xs" name="class" id="class">
                <option disabled selected>Pilih kelas</option>
                <option value="X RPL 1">X RPL 1</option>
                <option value="X RPL 2">X RPL 2</option>
                <option value="XI RPL 1">XI RPL 1</option>
                <option value="XI RPL 2">XI RPL 2</option>
              </select>
            </div>
            <div class="form-control w-full">
              <label for="nilai" class="label-text text-base-content">Nilai Siswa:</label>
              <input type="number" class="input input-bordered mt-2" name="nilai" id="nilai">
            </div>
            <button class="btn mt-6 w-full btn-primary" type="submit" name="submit">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  const fieldNilai = document.getElementById('nilai');

  if (fieldNilai.value >= 100) {
    fieldNilai.value = 100
  }
</script>

</html>
<?php

include "connection.php";

$users = mysqli_query($connection, "SELECT * FROM users");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP day 1</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script>    -->
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <h1 class="text-2xl font-bold">List Users</h1>
  <table border="1">
    <td>ID</td>kontol
    <td>Full Name</td>
    <td>Username</td>
    <?php foreach ($users as $user) : ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['full_name'] ?></td>
        <td><?= $user['username'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
  <br>
  <div class="flex justify-center items-center">
    <form action="" method="POST">
      <table class="table-auto">
        <th colspan="2">
          <h1 class="text-xl">Add Users</h1>
        </th>
        <tr>
          <td>Username</td>
          <td><input type="text" class="border rounded w-full" name="username" id="username"></td>
        </tr>
        <tr>
          <td>Full Name</td>
          <td><input type="text" name="f_name" id="f_name"></td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td>
            <select name="kelas" id="kelas">
              <option>Pilih Kelas</option>
              <option value="X RPL 1">X RPL 1</option>
              <option value="X RPL 2">X RPL 2</option>
              <option value="XI RPL 1">XI RPL 2</option>
              <option value="XI RPL 2">XI RPL 1</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
            <input type="radio" name="jk_laki" id="jk_laki"> Laki Laki
            <input type="radio" name="jk_perempuan" id="jk_perempuan"> Perempuan
          </td>
        </tr>
        <tr>
          <td>Nilai</td>
          <td><input type="number" name="nilai" id="nilai"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password"></td>
        </tr>
        <th colspan="2">
          <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </th>
      </table>

    </form>
  </div>
</body>

</html>
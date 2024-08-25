<?php
//koneksi database
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$nisn = $_GET['nisn'];

$siswa = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai_siswa WHERE nisn = $nisn"));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // menangkap data yang di kirim dari form
  // $nisn = $_POST['nisn'];
  $Nama = $_POST['Nama'];
  $Kelas = $_POST['Kelas'];
  $Nilai = $_POST['Nilai'];

  if (mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai_siswa WHERE name = '$Nama' AND nisn != $nisn"))) {
    header("location:belajareca.php");
  } else {
    // menginput data ke database
    if (mysqli_query($koneksi, "UPDATE nilai_siswa SET name = '$Nama', class = '$Kelas', nilai = '$Nilai' WHERE nisn = $nisn ")) {
      // mengalihkan halaman kembali ke indeks.php
      header("location:belajareca.php");
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Nilai MKK Kelas XI RPL</title>
  <meta name="viewport" content="width =device-width,initial-scale=0,1">
  <link rel="stylesheet" type="text/css" href="belajar3.css">
</head>

<body style="justify-content: center; background: url(mid.jpg); background-size: cover; width: 70%;">
  <section style="display: flex;">
    <div class="container" style="display: flex; justify-content: center; margin-left:50%; margin-top: 200px; background: RGB(220, 220, 220, 0.3); padding: 60px; flex-direction: column; ">
      <h1 class="form-title">Edit Nilai MKK Kelas XI RPL</h1>
      <form method="post">
        <div class="main-user-info" style="width: 200%;">
          <div class="user-input-box">
            <label for="nisn">nisn</label>
            <input type="text" name="nisn" placeholder="Enter nisn" value="<?= $siswa[0] ?>" required>
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" placeholder="Enter Nama" value="<?= $siswa[1] ?>" required>
            <label for="Kelas">Kelas</label>
            <input type="text" name="Kelas" placeholder="Enter Kelas" value="<?= $siswa[2] ?>" required>
            <label for="Nilai">Nilai</label>
            <input type="number" name="Nilai" placeholder="Enter Nilai" value="<?= $siswa[3] ?>" required>
          </div>
          <div class="form-submit-btn" style=" margin-top: 10px; margin-right: 70px; width: 150%; display: block; color: rgba(0, 0, 0, 1.0); border: none; padding: 20px;">
            <td><input type="Submit" name="simpan" value="Input"></td>
          </div>
        </div>
      </form>
    </div>
  </section>

  </div>
  </div>
</body>

</html>
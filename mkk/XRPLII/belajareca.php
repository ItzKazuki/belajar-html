<?php
include 'koneksi.php';
$No = 1;
$data = mysqli_query($koneksi, "select * from nilai_siswa");

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
            <h1 class="form-title">Daftar Nilai MKK Kelas XI RPL</h1>
            <form action="tambah_siswa.php" method="post">
                <div class="main-user-info" style="width: 200%;">
                    <div class="user-input-box">
                        <label for="nisn">nisn</label>
                        <input type="text" name="nisn" placeholder="Enter nisn" required>
                        <label for="Nama">Nama</label>
                        <input type="text" name="Nama" placeholder="Enter Nama" required>
                        <label for="Kelas">Kelas</label>
                        <input type="text" name="Kelas" placeholder="Enter Kelas" required>
                        <label for="Nilai">Nilai</label>
                        <input type="number" name="Nilai" placeholder="Enter Nilai" required>
                    </div>
                    <div class="form-submit-btn" style=" margin-top: 10px; margin-right: 70px; width: 150%; display: block; color: rgba(0, 0, 0, 1.0); border: none; padding: 20px;">
                        <td><input type="Submit" name="simpan" value="Input"></td>
                    </div>
                </div>
            </form>

            <center>
                <table border="1">
                    <th colspan="8">Nilai XI RPL 2</th>
                    <tr>
                        <td>No</td>
                        <td>nisn</td>
                        <td>Nama</td>
                        <td>Kelas</td>
                        <td>Nilai</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>
                    <?php
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $No++; ?></td>
                            <td><?php echo $d[0] ?></td>
                            <td><?php echo $d[1] ?></td>
                            <td><?php echo $d[2] ?></td>
                            <td><?php echo $d[3] ?></td>
                            <td>
                                <center><a href="edit-siswa.php?nisn=<?php echo $d[0]; ?>"><i class="fa-solid fa-pen"></i>edit</a></center>
                            </td>
                            <td>
                                <center><a href="delate-siswa.php?nisn=<?php echo $d[0]; ?>"><i class="fa-solid fa-trash"></i>delete</a>
                        </tr>
                    <?php } ?>
                </table>
            </center>
        </div>
    </section>

    </div>
    </div>
</body>

</html>
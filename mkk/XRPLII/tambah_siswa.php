<?php

include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$nisn =$_POST['nisn'];
	$Nama = $_POST['Nama'];
	$Kelas = $_POST['Kelas'];
	$Nilai = $_POST['Nilai'];

	if(mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM nilai_siswa WHERE name = '$Nama' OR nisn = $nisn"))[0] != null) {
		header('Location: belajareca.php');
	} else {
		$sql = "INSERT INTO nilai_siswa (nisn, name, class, nilai) VALUES ('$nisn', '$Nama', '$Kelas', '$Nilai')";

		if(mysqli_query($koneksi, $sql)){
			// echo"<script>window.location.href='belajareca.php'</script>";
			header('Location: belajareca.php');
		}
	}
}
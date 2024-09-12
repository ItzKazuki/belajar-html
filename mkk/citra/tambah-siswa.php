<?php

include 'connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $nilai = $_POST['nilai'];
    $query = $conn->query("SELECT * FROM nilai_siswa WHERE name = '$nama'");
    if ($query->fetch_array()[0] != null) {
        header("location:belajar1.php");
    } else {
        $sql = "INSERT INTO nilai_siswa (nisn, name, class, nilai) VALUES('$nisn','$nama','$kelas','$nilai')";
        if ($conn->query($sql)) {
            header("location:belajar1.php");
        } else {
            echo "ERROR";
        }
    }
}

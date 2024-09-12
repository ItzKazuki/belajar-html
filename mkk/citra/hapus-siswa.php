<?php

include 'connection.php';

$nisn = $_GET['nisn'];  

$conn->query("delete from nilai_siswa WHERE nisn=$nisn");

header("location:belajar1.php");    
?>
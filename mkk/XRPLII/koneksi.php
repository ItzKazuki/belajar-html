<?php

$koneksi = mysqli_connect('localhost', 'root', 'kazukikun', 'auth_php');

if($koneksi->connect_errno){
	echo "Error: ";
}
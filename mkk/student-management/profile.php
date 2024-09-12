<?php
session_start();

if(!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
  $_SESSION['error'] = "anda harus login terlebih dahulu";
  header('Location: login.php');
}

?>
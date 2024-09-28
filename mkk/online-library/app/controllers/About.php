<?php

class About extends Controller {
  public function index($nama = "Ibnu", $pekerjaan = "siswa")
  {
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['title'] = 'About';

    $this->view('layouts/header', $data);
    $this->view('about/index', $data);
    $this->view('layouts/footer', $data);
  }
}
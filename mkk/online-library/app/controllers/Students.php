<?php 

class Students extends Controller {
  public function index() {

    $data['title'] = 'Students';
    $data['students'] = $this->model('StudentsModel')->getAllStudents();
    $this->view('layouts/header', $data);
    $this->view('students/index', $data);
    $this->view('layouts/footer', $data);
  }
}
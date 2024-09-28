<?php

class StudentsModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllStudents()
  {
    $this->db->query("SELECT * FROM students");

    return $this->db->resultSet();
  }
}
